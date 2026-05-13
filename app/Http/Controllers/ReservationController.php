<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $plat = null;

        if ($request->filled('plat_id')) {
            $plat = Plat::find($request->query('plat_id'));
        }

        $plats = Plat::orderBy('nom')->get();

        return view('reservations.create', compact('plat', 'plats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = $request->input('type', 'table');

        $rules = [
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'date' => 'required|date',
            'heure' => 'required|string|max:10',
            'notes' => 'nullable|string|max:1000',
        ];

        if ($type === 'plat') {
            $rules = array_merge($rules, [
                'plat_id' => 'required|exists:plats,id',
                'quantity' => 'required|integer|min:1',
                'order_type' => 'required|in:sur_place,livraison',
                'address' => 'required_if:order_type,livraison|string|max:500',
            ]);
        } else {
            $rules = array_merge($rules, [
                'couverts' => 'required|string',
                'occasion' => 'nullable|string|max:255',
            ]);
        }

        $data = $request->validate($rules);
        $time = str_replace(['h', 'H'], ':', $data['heure']);

        if (! str_contains($time, ':')) {
            $time .= ':00';
        }

        $reservationDate = Carbon::parse($data['date'].' '.$time);
        $reservationValues = [
            'user_id' => Auth::id(),
            'type' => $type,
            'first_name' => $data['prenom'],
            'last_name' => $data['nom'],
            'telephone' => $data['telephone'] ?? null,
            'email' => $data['email'] ?? null,
            'date_reservation' => $reservationDate,
            'heure' => $data['heure'],
            'notes' => $data['notes'] ?? null,
            'payment_status' => $type === 'table' ? 'paid' : 'pending',
            'statut' => $type === 'table' ? 'confirmed' : 'pending',
        ];

        if ($type === 'plat') {
            $plat = Plat::findOrFail($data['plat_id']);
            $reservationValues = array_merge($reservationValues, [
                'plat_id' => $plat->id,
                'quantity' => $data['quantity'],
                'order_type' => $data['order_type'],
                'address' => $data['order_type'] === 'livraison' ? $data['address'] : null,
                'total_amount' => $plat->prix * $data['quantity'],
                'nombre_personnes' => 1,
                'occasion' => null,
            ]);
        } else {
            $reservationValues = array_merge($reservationValues, [
                'nombre_personnes' => $data['couverts'] === '13+' ? 13 : (int) $data['couverts'],
                'occasion' => $data['occasion'] ?? null,
                'plat_id' => null,
                'quantity' => null,
                'order_type' => null,
                'address' => null,
                'total_amount' => 0,
            ]);
        }

        $reservation = Reservation::create($reservationValues);

        if ($type === 'table') {
            return Redirect::route('reservations.confirmation', $reservation->id);
        }

        return Redirect::route('reservations.payment', $reservation->id);
    }

    public function payment(Reservation $reservation)
    {
        abort_if($reservation->user_id !== Auth::id(), 403);

        $reservation->load('plat');

        return view('reservations.payment', compact('reservation'));
    }

    public function processPayment(Request $request, Reservation $reservation)
    {
        abort_if($reservation->user_id !== Auth::id(), 403);

        if ($reservation->type !== 'plat') {
            return Redirect::route('reservations.confirmation', $reservation->id);
        }

        $request->validate([
            'payment_method' => 'required|in:mobile_money,card',
            'payment_channel' => 'required_if:payment_method,mobile_money|in:mtn,moov,oran',
            'card_network' => 'required_if:payment_method,card|in:visa,mastercard',
        ]);

        $reservation->update([
            'payment_method' => $request->payment_method,
            'payment_channel' => $request->payment_channel,
            'card_network' => $request->card_network,
            'payment_status' => 'paid',
            'payment_reference' => Str::upper(Str::random(10)),
            'statut' => 'confirmed',
        ]);

        return Redirect::route('reservations.confirmation', $reservation->id);
    }

    public function confirmation(Reservation $reservation)
    {
        abort_if($reservation->user_id !== Auth::id(), 403);

        if ($reservation->payment_status !== 'paid') {
            return Redirect::route('reservations.payment', $reservation->id);
        }

        $reservation->load('plat');

        return view('reservations.confirmation', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    {
        abort_if($reservation->user_id !== Auth::id(), 403);

        $reservation->update(['statut' => 'cancelled']);

        return Redirect::route('reservations.create')->with('success', 'Votre réservation a été annulée.');
    }
}

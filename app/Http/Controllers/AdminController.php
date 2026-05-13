<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Plat;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function reservations()
    {
        $reservations = Reservation::with(['user', 'plat'])->orderByDesc('created_at')->get();
        $availableBalance = Reservation::where('payment_status', 'paid')
            ->whereNull('withdrawn_at')
            ->sum('total_amount');

        return view('admin.reservations', compact('reservations', 'availableBalance'));
    }

    public function updateReservation(Request $request, Reservation $reservation)
    {
        $request->validate([
            'statut' => 'required|in:pending,confirmed,cancelled',
        ]);

        $reservation->update(['statut' => $request->statut]);
        return redirect()->back()->with('success', 'Réservation mise à jour.');
    }

    public function withdrawPayments()
    {
        $availableBalance = Reservation::where('payment_status', 'paid')
            ->whereNull('withdrawn_at')
            ->sum('total_amount');

        if ($availableBalance <= 0) {
            return redirect()->back()->with('error', 'Aucun paiement disponible pour retrait.');
        }

        Reservation::where('payment_status', 'paid')
            ->whereNull('withdrawn_at')
            ->update(['withdrawn_at' => now()]);

        return redirect()->back()->with('success', 'Retrait effectué : '.number_format($availableBalance, 0, ',', ' ').' FCFA.');
    }

    public function plats()
    {
        $plats = Plat::with('categorie')->get();
        $categories = Categorie::all();
        return view('admin.plats', compact('plats', 'categories'));
    }

    public function storePlat(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['nom', 'description', 'prix', 'categorie_id']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->nom) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $folder = public_path('images/plats');

            if (! File::isDirectory($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $image->move($folder, $filename);
            $data['image_path'] = 'images/plats/' . $filename;
        }

        Plat::create($data);
        return redirect()->back()->with('success', 'Plat ajouté.');
    }

    public function editPlat(Plat $plat)
    {
        $categories = Categorie::all();
        return view('admin.plat-edit', compact('plat', 'categories'));
    }

    public function updatePlat(Request $request, Plat $plat)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['nom', 'description', 'prix', 'categorie_id']);

        if ($request->hasFile('image')) {
            if ($plat->image_path && File::exists(public_path($plat->image_path))) {
                File::delete(public_path($plat->image_path));
            }

            $image = $request->file('image');
            $filename = Str::slug($request->nom) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $folder = public_path('images/plats');

            if (! File::isDirectory($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $image->move($folder, $filename);
            $data['image_path'] = 'images/plats/' . $filename;
        }

        $plat->update($data);
        return redirect()->route('admin.plats')->with('success', 'Plat mis à jour.');
    }

    public function destroyPlat(Plat $plat)
    {
        $plat->delete();
        return redirect()->back()->with('success', 'Plat supprimé.');
    }
}

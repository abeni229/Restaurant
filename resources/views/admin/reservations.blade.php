@extends('layouts.app')

@section('page-hero')
    <div class="page-hero">
        <div class="container">
            <div class="page-hero-label">Administration</div>
            <h1>Gestion des réservations</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="section">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="admin-card-title" style="justify-content:space-between; gap:1rem;">
                <div>
                    <h1>Gestion des réservations</h1>
                    <p class="text-muted">Modifiez les réservations, suivez les paiements et retirez les montants disponibles.</p>
                </div>
                <div style="text-align:right;">
                    <span class="badge badge-gold">{{ $reservations->count() }} réservation{{ $reservations->count() > 1 ? 's' : '' }}</span>
                    <p style="margin:0.5rem 0 0; color:var(--cream);">Disponible à retirer : <strong>{{ number_format($availableBalance, 0, ',', ' ') }} FCFA</strong></p>
                    <form method="POST" action="{{ route('admin.reservations.withdraw') }}" style="margin-top:1rem;">
                        @csrf
                        <button type="submit" class="btn-dark">Retirer les paiements</button>
                    </form>
                </div>
            </div>

            <div class="table-wrapper" style="overflow-x:auto;">
                <table class="table-admin">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Client</th>
                            <th>Date / Heure</th>
                            <th>Commande / Couverts</th>
                            <th>Montant</th>
                            <th>Paiement</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ ucfirst($reservation->type) }}</td>
                                <td>{{ $reservation->user->name }}</td>
                                <td>{{ $reservation->date_reservation->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if($reservation->type === 'plat')
                                        {{ $reservation->quantity }} × {{ $reservation->plat?->nom ?? 'Plat inconnu' }}
                                        @if($reservation->order_type)
                                            <div class="text-muted" style="font-size:0.85rem;">{{ $reservation->order_type === 'livraison' ? 'Livraison' : 'Sur place' }}</div>
                                        @endif
                                    @else
                                        {{ $reservation->nombre_personnes }} personne{{ $reservation->nombre_personnes > 1 ? 's' : '' }}
                                    @endif
                                </td>
                                <td>{{ number_format($reservation->total_amount ?: 0, 0, ',', ' ') }} FCFA</td>
                                <td>
                                    <strong>{{ $reservation->payment_status === 'paid' ? 'Payé' : 'En attente' }}</strong>
                                    @if($reservation->payment_method)
                                        <div class="text-muted" style="font-size:0.85rem;">
                                            {{ $reservation->payment_method === 'mobile_money' ? strtoupper($reservation->payment_channel) . ' (Mobile Money)' : strtoupper($reservation->card_network) . ' (Carte)' }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <span class="status-pill {{ $reservation->statut == 'confirmed' ? 'status-confirmed' : ($reservation->statut == 'cancelled' ? 'status-cancelled' : 'status-pending') }}">
                                        {{ ucfirst($reservation->statut) }}
                                    </span>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.reservation.update', $reservation) }}" style="display:flex; gap:0.75rem; flex-wrap:wrap; align-items:center;">
                                        @csrf
                                        @method('PATCH')
                                        <select name="statut" class="form-input" style="min-width:170px; background: rgba(255,255,255,0.04);">
                                            <option value="pending" {{ $reservation->statut == 'pending' ? 'selected' : '' }}>En attente</option>
                                            <option value="confirmed" {{ $reservation->statut == 'confirmed' ? 'selected' : '' }}>Confirmée</option>
                                            <option value="cancelled" {{ $reservation->statut == 'cancelled' ? 'selected' : '' }}>Annulée</option>
                                        </select>
                                        <button type="submit" class="btn-outline">Mettre à jour</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Confirmation | Saveurs du Bénin')

@section('page-hero')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-label">Confirmation</div>
        <h1>Votre réservation est confirmée</h1>
    </div>
</div>
@endsection

@section('content')
<section class="section">
    <div class="container">
        <div class="card" style="padding:2rem; max-width:720px; margin:0 auto;">
            <h2>Merci, {{ $reservation->first_name }} !</h2>
            <p class="text-muted">Votre réservation est confirmée.</p>

            <div style="margin-top:1.5rem;">
                <p><strong>Type :</strong> {{ ucfirst($reservation->type) }}</p>
                <p><strong>Date :</strong> {{ $reservation->date_reservation->format('d/m/Y') }} à {{ $reservation->heure }}</p>
                @if($reservation->type === 'plat')
                    <p><strong>Référence :</strong> {{ $reservation->payment_reference }}</p>
                    <p><strong>Méthode de paiement :</strong> {{ $reservation->payment_method === 'mobile_money' ? 'Mobile Money (' . strtoupper($reservation->payment_channel) . ')' : 'Carte bancaire (' . strtoupper($reservation->card_network) . ')' }}</p>
                @else
                    <p><strong>Paiement :</strong> Gratuit</p>
                @endif
                @if($reservation->type === 'plat')
                    <p><strong>Plat :</strong> {{ $reservation->plat?->nom ?? 'N/A' }}</p>
                    <p><strong>Quantité :</strong> {{ $reservation->quantity }}</p>
                    <p><strong>Montant :</strong> {{ number_format($reservation->total_amount, 0, ',', ' ') }} FCFA</p>
                    <p><strong>Type de commande :</strong> {{ $reservation->order_type === 'livraison' ? 'Livraison' : 'Sur place' }}</p>
                @else
                    <p><strong>Couverts :</strong> {{ $reservation->nombre_personnes }}</p>
                    <p><strong>Occasion :</strong> {{ $reservation->occasion ?? 'Aucune' }}</p>
                @endif
            </div>

            <div style="margin-top:2rem; display:flex; gap:1rem; flex-wrap:wrap;">
                <a href="{{ route('menu.index') }}" class="btn-dark">Voir le menu</a>
                <a href="{{ route('home') }}" class="btn-outline">Retour à l'accueil</a>
            </div>
        </div>
    </div>
</section>
@endsection
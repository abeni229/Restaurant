@extends('layouts.app')

@section('title', 'Paiement | Saveurs du Bénin')

@section('page-hero')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-label">Paiement</div>
        <h1>Finalisez votre réservation ou commande</h1>
    </div>
</div>
@endsection

@section('content')
<section class="section">
    <div class="container">
        <div class="section-label">Détails de votre commande</div>
        <div class="card" style="padding:2rem; margin-bottom:2rem;">
            <h3 style="margin-bottom:1rem;">Résumé</h3>
            <p><strong>Type :</strong> {{ ucfirst($reservation->type) }}</p>
            <p><strong>Date :</strong> {{ $reservation->date_reservation->format('d/m/Y') }} à {{ $reservation->heure }}</p>
            <p><strong>Client :</strong> {{ $reservation->first_name }} {{ $reservation->last_name }}</p>
            @if($reservation->type === 'plat')
                <p><strong>Plat :</strong> {{ $reservation->plat?->nom ?? 'Sélectionné' }}</p>
                <p><strong>Quantité :</strong> {{ $reservation->quantity }}</p>
                <p><strong>Montant :</strong> {{ number_format($reservation->total_amount, 0, ',', ' ') }} FCFA</p>
                <p><strong>Mode :</strong> {{ $reservation->order_type === 'livraison' ? 'Livraison' : 'Sur place' }}</p>
                @if($reservation->order_type === 'livraison')
                    <p><strong>Adresse :</strong> {{ $reservation->address }}</p>
                @endif
            @else
                <p><strong>Couverts :</strong> {{ $reservation->nombre_personnes }}</p>
                <p><strong>Occasion :</strong> {{ $reservation->occasion ?? 'Aucune' }}</p>
                <p><strong>Montant :</strong> Gratuit pour la réservation de table</p>
            @endif
        </div>

        @if($reservation->type !== 'plat')
            <div class="card" style="padding:2rem;">
                <h3>Réservation gratuite</h3>
                <p>Votre réservation de table est confirmée et ne nécessite aucun paiement.</p>
                <a href="{{ route('reservations.confirmation', $reservation->id) }}" class="btn-dark">Voir le récapitulatif</a>
            </div>
        @elseif($reservation->payment_status === 'paid')
            <div class="card" style="padding:2rem;">
                <h3>Paiement déjà effectué</h3>
                <p>Référence de transaction : <strong>{{ $reservation->payment_reference }}</strong></p>
                <p>Méthode : <strong>{{ $reservation->payment_method === 'mobile_money' ? 'Mobile Money (' . strtoupper($reservation->payment_channel) . ')' : 'Carte bancaire (' . strtoupper($reservation->card_network) . ')' }}</strong></p>
                <a href="{{ route('reservations.confirmation', $reservation->id) }}" class="btn-dark">Voir le récapitulatif</a>
            </div>
        @else
            <form method="POST" action="{{ route('reservations.payment.process', $reservation) }}" class="card" style="padding:2rem;">
                @csrf
                <h3 style="margin-bottom:1rem;">Mode de paiement</h3>

                <div class="form-row" style="gap:1rem; margin-bottom:1.5rem;">
                    <label style="display:flex; align-items:center; gap:0.75rem;">
                        <input type="radio" name="payment_method" value="mobile_money" {{ old('payment_method') === 'mobile_money' ? 'checked' : '' }} required>
                        <span>Mobile Money (MTN / Moov / Oran)</span>
                    </label>
                    <label style="display:flex; align-items:center; gap:0.75rem;">
                        <input type="radio" name="payment_method" value="card" {{ old('payment_method') === 'card' ? 'checked' : '' }}>
                        <span>Carte bancaire (Visa / Mastercard)</span>
                    </label>
                </div>

                <div class="form-group" id="mobileMoneyOptions" style="display:none;">
                    <label class="form-label">Réseau mobile</label>
                    <select class="form-input" name="payment_channel">
                        <option value="">Choisir...</option>
                        <option value="mtn" {{ old('payment_channel') === 'mtn' ? 'selected' : '' }}>MTN</option>
                        <option value="moov" {{ old('payment_channel') === 'moov' ? 'selected' : '' }}>Moov</option>
                        <option value="oran" {{ old('payment_channel') === 'oran' ? 'selected' : '' }}>Oran</option>
                    </select>
                </div>

                <div class="form-group" id="cardOptions" style="display:none;">
                    <label class="form-label">Réseau de carte</label>
                    <select class="form-input" name="card_network">
                        <option value="">Choisir...</option>
                        <option value="visa" {{ old('card_network') === 'visa' ? 'selected' : '' }}>Visa</option>
                        <option value="mastercard" {{ old('card_network') === 'mastercard' ? 'selected' : '' }}>Mastercard</option>
                    </select>
                </div>

                <button type="submit" class="form-submit">Simuler le paiement</button>
            </form>
        @endif
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMoneyRadio = document.querySelector('[value="mobile_money"]');
        const cardRadio = document.querySelector('[value="card"]');
        const mobileMoneyOptions = document.getElementById('mobileMoneyOptions');
        const cardOptions = document.getElementById('cardOptions');

        function updatePaymentOptions() {
            const selected = document.querySelector('[name="payment_method"]:checked');
            if (!selected) {
                mobileMoneyOptions.style.display = 'none';
                cardOptions.style.display = 'none';
                return;
            }

            mobileMoneyOptions.style.display = selected.value === 'mobile_money' ? 'block' : 'none';
            cardOptions.style.display = selected.value === 'card' ? 'block' : 'none';
        }

        document.querySelectorAll('[name="payment_method"]').forEach(function (input) {
            input.addEventListener('change', updatePaymentOptions);
        });

        updatePaymentOptions();
    });
</script>
@endsection
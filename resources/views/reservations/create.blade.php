@extends('layouts.app')

@section('title', 'Réservation & commande | Saveurs du Bénin')

@section('page-hero')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-label">Réservation</div>
        <h1>Réservez une table ou commandez un plat en quelques clics</h1>
    </div>
</div>
@endsection

@section('content')
<section class="section">
    <div class="container">
        <div class="section-label">Choisissez votre expérience</div>
        <p class="text-muted" style="max-width:760px; margin-bottom:2rem;">Réservez une table pour un service confort ou commandez votre plat préféré avec retrait ou livraison.</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger" style="margin-bottom:1.5rem;">
                <ul style="margin:0; padding-left:1.2rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card" style="padding:2rem;">
            <form method="POST" action="{{ route('reservations.store') }}">
                @csrf

                <div class="form-row" style="gap:1rem; margin-bottom:1.5rem;">
                    <label style="display:flex; align-items:center; gap:0.75rem;">
                        <input type="radio" name="type" value="table" {{ old('type', $plat ? 'plat' : 'table') === 'table' ? 'checked' : '' }}>
                        <span>Réservation de table</span>
                    </label>

                    <label style="display:flex; align-items:center; gap:0.75rem;">
                        <input type="radio" name="type" value="plat" {{ old('type', $plat ? 'plat' : 'table') === 'plat' ? 'checked' : '' }}>
                        <span>Commande de plat</span>
                    </label>
                </div>

                @if($plat)
                    <input type="hidden" name="plat_id" value="{{ $plat->id }}">
                @endif

                <div class="form-row" style="gap:1rem;">
                    <div class="form-group">
                        <label class="form-label">Prénom</label>
                        <input type="text" class="form-input" name="prenom" value="{{ old('prenom') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-input" name="nom" value="{{ old('nom') }}" required>
                    </div>
                </div>

                <div class="form-row" style="gap:1rem;">
                    <div class="form-group">
                        <label class="form-label">Téléphone</label>
                        <input type="tel" class="form-input" name="telephone" value="{{ old('telephone') }}" placeholder="+229 97 ...">
                    </div>
                    <div class="form-group">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-input" name="email" value="{{ old('email') }}" placeholder="jean@email.com">
                    </div>
                </div>

                <div class="form-row" style="gap:1rem;">
                    <div class="form-group">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-input" name="date" value="{{ old('date') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Heure</label>
                        <select class="form-input" name="heure" required>
                            <option value="">Choisir...</option>
                            <optgroup label="Déjeuner">
                                <option value="12h00">12h00</option>
                                <option value="12h30">12h30</option>
                                <option value="13h00">13h00</option>
                                <option value="13h30">13h30</option>
                            </optgroup>
                            <optgroup label="Dîner">
                                <option value="19h00">19h00</option>
                                <option value="19h30">19h30</option>
                                <option value="20h00">20h00</option>
                                <option value="20h30">20h30</option>
                                <option value="21h00">21h00</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div id="tableFields" style="display:{{ old('type', $plat ? 'plat' : 'table') === 'table' ? 'block' : 'none' }};">
                    <div class="form-row" style="gap:1rem;">
                        <div class="form-group">
                            <label class="form-label">Nombre de couverts</label>
                            <select class="form-input" name="couverts">
                                <option value="">Choisir...</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ old('couverts') == $i ? 'selected' : '' }}>{{ $i }} {{ $i === 1 ? 'personne' : 'personnes' }}</option>
                                @endfor
                                <option value="13+" {{ old('couverts') == '13+' ? 'selected' : '' }}>Plus de 12 (groupe)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Occasion</label>
                            <select class="form-input" name="occasion">
                                <option value="">Aucune</option>
                                <option value="Anniversaire" {{ old('occasion') == 'Anniversaire' ? 'selected' : '' }}>Anniversaire</option>
                                <option value="Repas d'affaires" {{ old('occasion') == "Repas d'affaires" ? 'selected' : '' }}>Repas d'affaires</option>
                                <option value="Romantique" {{ old('occasion') == 'Romantique' ? 'selected' : '' }}>Romantique</option>
                                <option value="Famille" {{ old('occasion') == 'Famille' ? 'selected' : '' }}>Famille</option>
                                <option value="Autre" {{ old('occasion') == 'Autre' ? 'selected' : '' }}>Autre</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="platFields" style="display:{{ old('type', $plat ? 'plat' : 'table') === 'plat' ? 'block' : 'none' }};">
                    @if($plat)
                        <div class="card" style="margin-bottom:1.5rem; padding:1rem; background:rgba(249,245,236,0.04);">
                            <div style="display:flex; gap:1rem; align-items:center;">
                                <img src="{{ $plat->image_path ? asset($plat->image_path) : 'https://via.placeholder.com/150x110?text=Plat' }}" alt="{{ $plat->nom }}" style="width:120px; height:90px; object-fit:cover; border-radius:1rem;">
                                <div>
                                    <strong>{{ $plat->nom }}</strong>
                                    <p class="text-muted" style="margin:0.5rem 0 0;">{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card" style="margin-bottom:1.5rem; padding:1rem; background:rgba(249,245,236,0.04);">
                            <p class="text-muted" style="margin:0;">Vous pouvez commander un plat depuis le menu ou choisir un plat ci-dessous.</p>
                        </div>
                    @endif

                    @if(!$plat)
                        <div class="form-group">
                            <label class="form-label">Plat</label>
                            <select class="form-input" name="plat_id">
                                <option value="">Choisir un plat</option>
                                @foreach($plats as $menuPlat)
                                    <option value="{{ $menuPlat->id }}" {{ old('plat_id') == $menuPlat->id ? 'selected' : '' }}>{{ $menuPlat->nom }} - {{ number_format($menuPlat->prix, 0, ',', ' ') }} FCFA</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-row" style="gap:1rem;">
                        <div class="form-group">
                            <label class="form-label">Quantité</label>
                            <input type="number" class="form-input" name="quantity" min="1" value="{{ old('quantity', 1) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Type de commande</label>
                            <select class="form-input" name="order_type" id="order_type">
                                <option value="sur_place" {{ old('order_type') == 'sur_place' ? 'selected' : '' }}>Sur place</option>
                                <option value="livraison" {{ old('order_type') == 'livraison' ? 'selected' : '' }}>Livraison</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="addressGroup" style="display:{{ old('order_type') == 'livraison' ? 'block' : 'none' }};">
                        <label class="form-label">Adresse de livraison</label>
                        <textarea class="form-input" rows="2" name="address" placeholder="Adresse, quartier, ville">{{ old('address') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Demandes particulières</label>
                    <textarea class="form-input" rows="3" name="notes" placeholder="Allergies, préférences, livraison spéciale..." style="resize:none; line-height:1.6">{{ old('notes') }}</textarea>
                </div>

                <button type="submit" class="form-submit">Continuer vers le paiement</button>
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tableFields = document.getElementById('tableFields');
        const platFields = document.getElementById('platFields');
        const orderType = document.getElementById('order_type');
        const addressGroup = document.getElementById('addressGroup');
        const typeInputs = document.querySelectorAll('[name="type"]');

        function updateVisibility() {
            const selectedType = document.querySelector('[name="type"]:checked').value;
            tableFields.style.display = selectedType === 'table' ? 'block' : 'none';
            platFields.style.display = selectedType === 'plat' ? 'block' : 'none';
        }

        function updateAddress() {
            if (!orderType) {
                return;
            }
            addressGroup.style.display = orderType.value === 'livraison' ? 'block' : 'none';
        }

        typeInputs.forEach(input => input.addEventListener('change', updateVisibility));
        if (orderType) {
            orderType.addEventListener('change', updateAddress);
        }

        updateVisibility();
        updateAddress();
    });
</script>
@endsection

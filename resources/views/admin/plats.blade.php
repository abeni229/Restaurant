@extends('layouts.app')

@section('page-hero')
    <div class="page-hero">
        <div class="container">
            <div class="page-hero-label">Administration</div>
            <h1>Gestion des plats</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="section">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card admin-grid-2">
            <div>
                <h2>Ajouter un nouveau plat</h2>
                <form method="POST" action="{{ route('admin.plat.store') }}" enctype="multipart/form-data" class="form-section">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nom</label>
                            <input type="text" name="nom" value="{{ old('nom') }}" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Prix</label>
                            <input type="number" step="0.01" name="prix" value="{{ old('prix') }}" class="form-input" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="4" class="form-input">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Catégorie</label>
                            <select name="categorie_id" class="form-input" required>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Photo du plat</label>
                            <input type="file" name="image" accept="image/*" class="form-input">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary">Ajouter le plat</button>
                    </div>
                </form>
            </div>

            <aside class="card">
                <h2>Mode d’emploi</h2>
                <p class="text-muted">Ajoutez une image et une description claire pour un rendu professionnel et attractif sur la page d’accueil.</p>
                <p class="text-muted" style="margin-top:1rem;">Supprimez un plat lorsqu’il n’est plus disponible afin de garder une carte à jour.</p>
            </aside>
        </div>

        <section class="card" style="margin-top:2rem;">
            <div class="admin-card-title">
                <div>
                    <h2>Plats existants</h2>
                    <p class="text-muted">Visualisez vos plats actuels et supprimez rapidement ceux qui ne sont plus disponibles.</p>
                </div>
                <span class="badge badge-gold">{{ $plats->count() }} plat{{ $plats->count() > 1 ? 's' : '' }}</span>
            </div>

            @if($plats->isEmpty())
                <p class="text-muted">Aucun plat ajouté pour le moment.</p>
            @else
                <div class="card-grid" style="margin-top:1.5rem;">
                    @foreach($plats as $plat)
                        <article class="card card-plat">
                            <img src="{{ $plat->image_path ? asset($plat->image_path) : 'https://via.placeholder.com/640x360?text=Photo+manquante' }}" alt="{{ $plat->nom }}">
                            <div class="card-plat-content">
                                <div class="admin-card-title" style="align-items:flex-start;">
                                    <div>
                                        <h3>{{ $plat->nom }}</h3>
                                        <p class="text-muted">{{ $plat->description ?: 'Pas de description' }}</p>
                                    </div>
                                    <span class="badge badge-gold">{{ $plat->categorie->nom }}</span>
                                </div>
                                <div class="form-actions" style="margin-top:auto;">
                                    <span class="badge badge-forest">{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</span>
                                    <a href="{{ route('admin.plat.edit', $plat) }}" class="btn-outline">Modifier</a>
                                    <form method="POST" action="{{ route('admin.plat.destroy', $plat) }}" onsubmit="return confirm('Supprimer ce plat ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-dark">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
</div>
@endsection
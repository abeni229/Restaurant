@extends('layouts.app')

@section('page-hero')
    <div class="page-hero">
        <div class="container">
            <div class="page-hero-label">Administration</div>
            <h1>Modifier le plat</h1>
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

        <div class="card">
            <div class="admin-card-title">
                <div>
                    <h2>Modifier « {{ $plat->nom }} »</h2>
                    <p class="text-muted">Mettez à jour le nom, le prix, la catégorie, la description ou la photo du plat.</p>
                </div>
                <a href="{{ route('admin.plats') }}" class="btn-outline">Retour à la liste</a>
            </div>

            <form method="POST" action="{{ route('admin.plat.update', $plat) }}" enctype="multipart/form-data" class="form-section">
                @csrf
                @method('PATCH')

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom', $plat->nom) }}" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Prix</label>
                        <input type="number" step="0.01" name="prix" value="{{ old('prix', $plat->prix) }}" class="form-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="4" class="form-input">{{ old('description', $plat->description) }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Catégorie</label>
                        <select name="categorie_id" class="form-input" required>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('categorie_id', $plat->categorie_id) == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Photo actuelle</label>
                        @if($plat->image_path)
                            <img src="{{ asset($plat->image_path) }}" alt="{{ $plat->nom }}" style="display:block; max-width:260px; border-radius:1rem; margin-top:0.75rem;" />
                        @else
                            <span class="text-muted">Aucune photo disponible.</span>
                        @endif
                        <label class="form-label" style="margin-top:1rem;">Nouveau fichier image</label>
                        <input type="file" name="image" accept="image/*" class="form-input">
                    </div>
                </div>

                <div class="form-actions" style="margin-top:1.5rem;">
                    <button type="submit" class="btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

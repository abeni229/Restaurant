@extends('layouts.app')

@section('page-hero')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-label">{{ $categorie->nom }}</div>
        <h1>Nos plats les plus savoureux dans la catégorie <em>{{ $categorie->nom }}</em></h1>
    </div>
</div>
@endsection

@section('content')
<section class="section">
    <div class="container">
        <div class="section-label">Détails de la catégorie</div>

        @if($categorie->plats->isEmpty())
            <div class="card">
                <p class="text-muted">Aucun plat n'a encore été ajouté dans cette catégorie. Revenez bientôt pour découvrir nos nouveautés.</p>
            </div>
        @else
            <div class="grid-3" style="gap:2rem;">
                @foreach($categorie->plats as $plat)
                    <article class="card" style="display:flex; flex-direction:column; gap:1rem;">
                        <img src="{{ $plat->image_path ? asset($plat->image_path) : 'https://via.placeholder.com/640x360?text=Photo+manquante' }}" alt="{{ $plat->nom }}" style="width:100%; height:220px; object-fit:cover; border-radius:1rem;">
                        <div style="display:flex; align-items:center; justify-content:space-between; gap:1rem; margin-bottom:1rem;">
                            <div>
                                <h3>{{ $plat->nom }}</h3>
                                <p class="text-muted" style="margin-top:0.5rem;">{{ \Illuminate\Support\Str::limit($plat->description, 110) }}</p>
                            </div>
                            <span class="badge" style="background: rgba(201,168,76,0.12); color: var(--gold);">{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</span>
                        </div>

                        <div style="margin-top:auto; display:flex; justify-content:space-between; align-items:center; gap:1rem;">
                            <span class="text-muted" style="font-size:0.9rem;">Ingrédients frais et recette maison.</span>
                            @if(!auth()->check() || !auth()->user()->isAdmin())
                                <a href="{{ route('reservations.create', ['plat_id' => $plat->id]) }}" class="btn-dark">Commander ce plat</a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        <div style="margin-top:3rem; text-align:center;">
            <a href="{{ route('menu.index') }}" class="btn-outline">Revenir au menu</a>
        </div>
    </div>
</section>
@endsection
@extends('layouts.app')

@section('page-hero')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-label">La Carte</div>
        <h1>Explorez nos spécialités béninoises et contemporaines</h1>
    </div>
</div>
@endsection

@section('content')
<section class="section">
    <div class="container">
        <div class="section-label">Notre menu</div>
        <p class="text-muted" style="max-width:760px; margin-bottom:2rem;">Parcourez nos catégories de plats soigneusement préparés pour offrir une expérience culinaire unique. Chaque carte est pensée pour sublimer les saveurs locales et contemporaines.</p>

        <div class="grid-2" style="gap:2rem;">
            @foreach($categories as $categorie)
                <article class="card" style="display:flex; flex-direction:column; justify-content:space-between;">
                    <div>
                        <div class="badge" style="background: rgba(201,168,76,0.12); color: var(--gold);">{{ strtoupper($categorie->nom) }}</div>
                        <h3 style="margin:1.2rem 0 1rem;">{{ $categorie->nom }}</h3>
                        <p class="text-muted">{{ $categorie->plats->count() }} recettes délicieuses à découvrir.</p>
                    </div>

                    <div style="margin-top:1.8rem;">
                        <ul style="display:grid; gap:0.85rem;">
                            @foreach($categorie->plats->take(3) as $plat)
                                <li style="display:grid; grid-template-columns:auto 1fr auto; gap:1rem; align-items:center; padding:0.75rem 0; border-bottom:1px solid rgba(249,245,236,0.08);">
                                    <img src="{{ $plat->image_path ? asset($plat->image_path) : 'https://via.placeholder.com/120x90?text=Plat' }}" alt="{{ $plat->nom }}" style="width:120px; height:90px; object-fit:cover; border-radius:1rem;">
                                    <div>
                                        <strong>{{ $plat->nom }}</strong>
                                        @if($plat->description)
                                            <p class="text-muted" style="margin:0.4rem 0 0; font-size:0.95rem;">{{ $plat->description }}</p>
                                        @endif
                                    </div>
                                    <span style="font-weight:700; color:var(--gold);">{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div style="margin-top:2rem;">
                        <a href="{{ route('menu.categorie', $categorie->nom) }}" class="btn-outline">Voir tous les plats</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
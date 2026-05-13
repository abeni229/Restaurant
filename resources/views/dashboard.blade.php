@extends('layouts.app')

@section('title', 'Mon compte')

@section('content')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-label">Mon compte</div>
        <h1>Tableau de bord</h1>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="card">
            <h2>Bienvenue {{ auth()->user()->name }} !</h2>
            <p class="text-muted mt-2">Vous êtes connecté à votre compte Saveurs du Bénin.</p>

            <div class="deco-line mt-4">
                <div class="deco-diamond"></div>
            </div>

            <div class="mt-4">
                <h3>Mes actions</h3>
                <div class="mt-3 space-y-2 sm:flex sm:items-center sm:space-y-0 sm:space-x-3">
                    <a href="{{ route('reservations.create') }}" class="btn-primary">Faire une réservation</a>
                    <a href="{{ route('menu.index') }}" class="btn-outline">Voir le menu</a>
                </div>
            </div>

            @if(auth()->user()->isAdmin())
                <div class="mt-6">
                    <h3>Actions administrateur</h3>
                    <div class="mt-3 grid gap-3 sm:flex sm:flex-wrap">
                        <a href="{{ route('admin.reservations') }}" class="btn-primary">Gestion des réservations</a>
                        <a href="{{ route('admin.plats') }}" class="btn-outline">Gestion des plats</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
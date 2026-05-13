@extends('layouts.app')

@section('title', 'Mon profil')

@section('content')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-label">Mon compte</div>
        <h1>Modifier mon profil</h1>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informations du profil -->
            <div class="card">
                <h3>Informations personnelles</h3>
                <div class="mt-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Mot de passe -->
            <div class="card">
                <h3>Changer le mot de passe</h3>
                <div class="mt-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <!-- Suppression du compte -->
        <div class="card mt-6">
            <h3 class="text-red-600">Zone dangereuse</h3>
            <p class="text-muted mt-2">Une fois votre compte supprimé, toutes vos données seront définitivement perdues.</p>
            <div class="mt-4">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection

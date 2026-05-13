@extends('layouts.auth')

@section('title', 'Inscription')

@section('content')
    <h1>Créer un compte</h1>
    <p>Inscrivez-vous pour commander en ligne et suivre votre réservation.</p>

    @if($errors->any())
        <div class="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-field">
            <label for="name">Nom complet</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-field">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
        </div>

        <div class="form-field">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">S'inscrire</button>
    </form>

    <p class="small-text">
        Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a>
    </p>
@endsection

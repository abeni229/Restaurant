@extends('layouts.auth')

@section('title', 'Connexion')

@section('content')
    <h1>Connexion</h1>
    <p>Connectez-vous pour accéder à votre compte et passer vos commandes.</p>

    @if($errors->any())
        <div class="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-field">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div class="form-field" style="grid-template-columns: auto 1fr; align-items: center; gap: 0.75rem;">
            <input id="remember" type="checkbox" name="remember">
            <label for="remember" style="color: rgba(250,246,239,0.68);">Se souvenir de moi</label>
        </div>

        <button type="submit">Se connecter</button>
    </form>

    <p class="small-text">
        Pas encore inscrit ? <a href="{{ route('register') }}">Créer un compte</a>
    </p>
@endsection

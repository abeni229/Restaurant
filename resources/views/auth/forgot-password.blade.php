@extends('layouts.auth')

@section('title', 'Mot de passe oublié')

@section('content')
<div class="auth-form">
    <h2>Mot de passe oublié ?</h2>

    <div class="text-muted mb-4">
        Pas de problème. Indiquez-nous simplement votre adresse email et nous vous enverrons un lien de réinitialisation de mot de passe.
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-6">
            <label for="email" class="form-label">Adresse email</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus />
            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-primary w-full">
            Envoyer le lien de réinitialisation
        </button>
    </form>
</div>
@endsection

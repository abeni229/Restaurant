@extends('layouts.auth')

@section('title', 'Vérification email')

@section('content')
<div class="auth-form">
    <h2>Vérifiez votre email</h2>

    <div class="text-muted mb-4">
        Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer ?
        Si vous n'avez pas reçu l'email, nous vous en enverrons un autre avec plaisir.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mb-4">
            Un nouveau lien de vérification a été envoyé à l'adresse email que vous avez fournie lors de l'inscription.
        </div>
    @endif

    <div class="flex items-center justify-between mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn-primary">
                Renvoyer l'email de vérification
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-primary hover:underline">
                Se déconnecter
            </button>
        </form>
    </div>
</div>
@endsection
</x-guest-layout>

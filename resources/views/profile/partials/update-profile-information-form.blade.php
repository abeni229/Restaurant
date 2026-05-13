<form method="post" action="{{ route('profile.update') }}" class="space-y-6">
    @csrf
    @method('patch')

    <div>
        <label for="name" class="form-label">Nom complet</label>
        <input id="name" name="name" type="text" class="form-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
        @error('name')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email" class="form-label">Adresse email</label>
        <input id="email" name="email" type="email" class="form-input" value="{{ old('email', $user->email) }}" required autocomplete="username" />
        @error('email')
            <p class="form-error">{{ $message }}</p>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="text-sm text-muted">
                    Votre adresse email n'est pas vérifiée.

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-primary hover:underline">
                            Cliquez ici pour renvoyer l'email de vérification.
                        </button>
                    </form>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm text-green-600">
                        Un nouveau lien de vérification a été envoyé à votre adresse email.
                    </p>
                @endif
            </div>
        @endif
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="btn-primary">Enregistrer</button>

        @if (session('status') === 'profile-updated')
            <p class="text-sm text-green-600">Profil mis à jour avec succès.</p>
        @endif
    </div>
</form>
            @endif
        </div>
    </form>
</section>

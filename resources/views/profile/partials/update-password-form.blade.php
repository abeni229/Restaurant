<form method="post" action="{{ route('password.update') }}" class="space-y-6">
    @csrf
    @method('put')

    <div>
        <label for="update_password_current_password" class="form-label">Mot de passe actuel</label>
        <input id="update_password_current_password" name="current_password" type="password" class="form-input" autocomplete="current-password" />
        @error('current_password')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="update_password_password" class="form-label">Nouveau mot de passe</label>
        <input id="update_password_password" name="password" type="password" class="form-input" autocomplete="new-password" />
        @error('password')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="update_password_password_confirmation" class="form-label">Confirmer le mot de passe</label>
        <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-input" autocomplete="new-password" />
        @error('password_confirmation')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="btn-primary">Mettre à jour</button>

        @if (session('status') === 'password-updated')
            <p class="text-sm text-green-600">Mot de passe mis à jour avec succès.</p>
        @endif
    </div>
</form>

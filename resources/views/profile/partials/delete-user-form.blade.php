<div class="border border-red-200 rounded-lg p-4 bg-red-50">
    <h4 class="text-red-800 font-medium">Supprimer mon compte</h4>
    <p class="text-red-600 text-sm mt-1">
        Une fois votre compte supprimé, toutes vos données seront définitivement perdues.
        Téléchargez vos données importantes avant de continuer.
    </p>

    <form method="post" action="{{ route('profile.destroy') }}" class="mt-4" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.')">
        @csrf
        @method('delete')

        <div class="mb-4">
            <label for="delete_password" class="form-label text-red-700">Confirmer avec votre mot de passe</label>
            <input id="delete_password" name="password" type="password" class="form-input border-red-300" placeholder="Votre mot de passe" required />
            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-danger">
            Supprimer définitivement mon compte
        </button>
    </form>
</div>
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

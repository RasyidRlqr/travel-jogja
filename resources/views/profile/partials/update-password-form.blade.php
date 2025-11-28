<div>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-4">
            <div class="form-floating">
                <input id="update_password_current_password" name="current_password" type="password"
                       class="form-control form-control-lg @error('current_password') is-invalid @enderror"
                       autocomplete="current-password" placeholder="Password Saat Ini">
                <label for="update_password_current_password">
                    <i class="bi bi-lock me-2"></i>Password Saat Ini
                </label>
            </div>
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-4">
            <div class="form-floating">
                <input id="update_password_password" name="password" type="password"
                       class="form-control form-control-lg @error('password') is-invalid @enderror"
                       autocomplete="new-password" placeholder="Password Baru">
                <label for="update_password_password">
                    <i class="bi bi-key me-2"></i>Password Baru
                </label>
            </div>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <div class="form-floating">
                <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                       class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                       autocomplete="new-password" placeholder="Konfirmasi Password Baru">
                <label for="update_password_password_confirmation">
                    <i class="bi bi-check-circle me-2"></i>Konfirmasi Password Baru
                </label>
            </div>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-success btn-modern">
                <i class="bi bi-shield-check me-2"></i>Perbarui Password
            </button>

            @if (session('status') === 'password-updated')
                <div class="alert alert-success py-2 px-3 mb-0">
                    <i class="bi bi-check-circle me-2"></i>Password berhasil diperbarui!
                </div>
            @endif
        </div>
    </form>
</div>

<div>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div class="mb-4">
            <div class="form-floating">
                <input id="name" name="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                       :value="old('name', $user->name)" required autofocus autocomplete="name"
                       placeholder="Nama Lengkap">
                <label for="name">
                    <i class="bi bi-person me-2"></i>Nama Lengkap
                </label>
            </div>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-4">
            <div class="form-floating">
                <input id="email" name="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                       :value="old('email', $user->email)" required autocomplete="username"
                       placeholder="Email">
                <label for="email">
                    <i class="bi bi-envelope me-2"></i>Email
                </label>
            </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-3 py-2">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>Email belum diverifikasi.</strong>
                    <button form="send-verification" class="btn btn-link p-0 ms-1 text-decoration-none">
                        Klik di sini untuk mengirim ulang email verifikasi.
                    </button>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-3 py-2">
                        <i class="bi bi-check-circle me-2"></i>
                        Link verifikasi baru telah dikirim ke alamat email Anda.
                    </div>
                @endif
            @endif
        </div>

        <!-- Submit Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary btn-modern">
                <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <div class="alert alert-success py-2 px-3 mb-0">
                    <i class="bi bi-check-circle me-2"></i>Profil berhasil diperbarui!
                </div>
            @endif
        </div>
    </form>
</div>

<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header -->
                <div class="text-center mb-5">
                    <div class="badge bg-primary-subtle text-primary px-3 py-2 mb-3">
                        <i class="bi bi-person-circle me-1"></i>Profil Pengguna
                    </div>
                    <h1 class="display-5 fw-bold text-dark mb-3">Kelola <span class="text-gradient">Akun Anda</span></h1>
                    <p class="lead text-muted fs-6 mx-auto" style="max-width: 600px;">
                        Perbarui informasi profil, ubah password, dan kelola pengaturan akun Anda
                    </p>
                </div>

                <!-- Profile Information Card -->
                <div class="glass-card p-4 p-md-5 mb-4 card-hover">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary bg-opacity-10 rounded-4 d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px;">
                            <i class="bi bi-person-fill text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-1 text-dark">Informasi Profil</h4>
                            <p class="text-muted small mb-0">Perbarui nama dan email Anda</p>
                        </div>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <!-- Password Update Card -->
                <div class="glass-card p-4 p-md-5 mb-4 card-hover">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success bg-opacity-10 rounded-4 d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px;">
                            <i class="bi bi-shield-lock-fill text-success" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-1 text-dark">Ubah Password</h4>
                            <p class="text-muted small mb-0">Pastikan akun Anda aman dengan password yang kuat</p>
                        </div>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>

                <!-- Delete Account Card -->
                <div class="glass-card p-4 p-md-5 card-hover border-danger">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-danger bg-opacity-10 rounded-4 d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px;">
                            <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-1 text-dark">Hapus Akun</h4>
                            <p class="text-muted small mb-0">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

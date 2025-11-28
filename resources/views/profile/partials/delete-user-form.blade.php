<div>
    <div class="alert alert-danger border-danger">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <strong>Perhatian:</strong> Setelah akun dihapus, semua data dan informasi akan hilang secara permanen.
        Pastikan untuk mengunduh data penting sebelum menghapus akun.
    </div>

    <button type="button" class="btn btn-danger btn-modern"
            onclick="confirmDelete()">
        <i class="bi bi-trash me-2"></i>Hapus Akun Saya
    </button>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-card">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger fw-bold" id="deleteAccountModalLabel">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus Akun
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="modal-body">
                    <div class="alert alert-danger">
                        <strong>Apakah Anda yakin ingin menghapus akun?</strong>
                    </div>
                    <p class="text-muted mb-4">
                        Tindakan ini tidak dapat dibatalkan. Semua data, postingan, dan informasi Anda akan dihapus secara permanen.
                    </p>

                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="delete_password" name="password" placeholder="Masukkan password Anda"
                                   required>
                            <label for="delete_password">
                                <i class="bi bi-lock me-2"></i>Masukkan Password untuk Konfirmasi
                            </label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary btn-modern" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-danger btn-modern">
                        <i class="bi bi-trash me-2"></i>Ya, Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    const modal = new bootstrap.Modal(document.getElementById('deleteAccountModal'));
    modal.show();
}
</script>

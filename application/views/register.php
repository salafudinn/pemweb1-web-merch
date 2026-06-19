<div class="row justify-content-center mt-5">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4 text-center">Buat Akun Baru</h4>
                <?= $this->session->flashdata('pesan') ?>
                <form method="post" action="<?= base_url('auth/register') ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required>
                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Min. 4 karakter" required>
                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password_1" class="form-control" placeholder="Min. 6 karakter" required>
                        <?= form_error('password_1', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_2" class="form-control" placeholder="Ulangi password" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 fw-semibold">Daftar</button>
                </form>
                <hr>
                <p class="text-center mb-0 text-muted small">Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Login di sini</a></p>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4 text-center">Masuk Akun</h4>
                <?= $this->session->flashdata('pesan') ?>
                <form method="post" action="<?= base_url('auth/login') ?>">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 fw-semibold">Login</button>
                </form>
                <hr>
                <p class="text-center mb-0 text-muted small">Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar di sini</a></p>
            </div>
        </div>
    </div>
</div>

<?= $this->session->flashdata('pesan') ?>

<h5 class="fw-bold mb-4">Katalog Produk</h5>

<div class="row g-4">
    <?php if (!empty($produk)): foreach ($produk as $brg): ?>
    <div class="col-md-3 col-sm-6">
        <div class="card h-100 shadow-sm border-0">
            <img src="<?= base_url('uploads/'.$brg->gambar) ?>" class="card-img-top" alt="<?= $brg->nama_produk ?>" style="height:200px; object-fit:cover;">
            <div class="card-body text-center">
                <h6 class="card-title fw-bold text-truncate"><?= $brg->nama_produk ?></h6>
                <p class="card-text text-muted small text-truncate"><?= $brg->keterangan ?></p>
                <span class="badge bg-success mb-3">Rp <?= number_format($brg->harga, 0, ',', '.') ?></span>
                <a href="<?= base_url('dashboard/tambah_ke_keranjang/'.$brg->id) ?>" class="btn btn-sm btn-dark w-100">Tambah ke Keranjang</a>
            </div>
        </div>
    </div>
    <?php endforeach; else: ?>
    <div class="col-12 text-center text-muted">Belum ada produk tersedia.</div>
    <?php endif; ?>
</div>

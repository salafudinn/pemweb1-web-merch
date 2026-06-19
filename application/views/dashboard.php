<h3 class="mb-4 text-center fw-bold">Katalog Merchandise</h3>

<div class="row g-4">
    <?php foreach ($produk as $brg) : ?>
    <!-- Sistem Grid Bootstrap: 1 baris isi 4 item di desktop (col-md-3) -->
    <div class="col-md-3 col-sm-6">
        <div class="card h-100 shadow-sm border-0">
            <!-- Asumsi ada folder uploads untuk gambar -->
            <img src="<?= base_url('uploads/'.$brg->gambar) ?>" class="card-img-top" alt="<?= $brg->nama_produk ?>" style="height:200px; object-fit:cover;">
            <div class="card-body text-center">
                <h5 class="card-title fw-bold text-truncate"><?= $brg->nama_produk ?></h5>
                <p class="card-text text-muted small text-truncate"><?= $brg->keterangan ?></p>
                <div class="badge bg-success p-2 mb-3">Rp <?= number_format($brg->harga, 0, ',', '.') ?></div>
                <a href="#" class="btn btn-sm btn-primary w-100">Tambah ke Keranjang</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

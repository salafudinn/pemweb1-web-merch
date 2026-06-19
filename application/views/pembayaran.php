<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-1">Informasi Pengiriman</h5>
                <p class="text-muted small mb-4">Total belanja: <b class="text-dark">Rp <?= number_format($this->cart->total(), 0, ',', '.') ?></b></p>
                <form method="post" action="<?= base_url('dashboard/proses_pesanan') ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Penerima</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama lengkap penerima" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Pengiriman</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Jalan, RT/RW, Kecamatan, Kota" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" name="no_telp" class="form-control" placeholder="Nomor aktif" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jasa Pengiriman</label>
                        <select name="ekspedisi" class="form-select">
                            <option>JNE</option>
                            <option>SiCepat</option>
                            <option>TIKI</option>
                            <option>POS Indonesia</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Metode Pembayaran</label>
                        <select name="bank" class="form-select">
                            <option>BCA - 1100223344</option>
                            <option>BNI - 0988776655</option>
                            <option>Mandiri - 123456789</option>
                            <option>GoPay</option>
                            <option>OVO</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 fw-semibold">Konfirmasi Pesanan</button>
                    <a href="<?= base_url('dashboard/detail_keranjang') ?>" class="btn btn-outline-secondary w-100 mt-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

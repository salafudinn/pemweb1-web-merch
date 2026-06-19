<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="fw-bold mb-4">Keranjang Belanja</h5>
                <?= $this->session->flashdata('pesan') ?>
                <?php if ($this->cart->total_items() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Sub-Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($this->cart->contents() as $item): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['qty'] ?></td>
                                <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr class="table-light">
                                <td colspan="4" class="text-end fw-bold">Total</td>
                                <td class="fw-bold text-success">Rp <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end gap-2 mt-3">
                    <a href="<?= base_url('dashboard/hapus_keranjang') ?>" class="btn btn-outline-danger btn-sm">Hapus Semua</a>
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-secondary btn-sm">Lanjut Belanja</a>
                    <a href="<?= base_url('dashboard/pembayaran') ?>" class="btn btn-dark btn-sm">Checkout</a>
                </div>
                <?php else: ?>
                <p class="text-muted text-center">Keranjang belanja Anda masih kosong.</p>
                <div class="text-center">
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-dark btn-sm">Lihat Produk</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

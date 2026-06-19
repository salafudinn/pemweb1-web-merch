<div class="d-flex align-items-center gap-3 mb-4">
    <a href="<?= base_url('admin/invoice') ?>" class="btn btn-sm btn-outline-secondary">← Kembali</a>
    <h5 class="fw-bold mb-0">Detail Pesanan #<?= $invoice->id ?></h5>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <p class="mb-1"><b>Nama:</b> <?= $invoice->nama ?></p>
        <p class="mb-3"><b>Alamat:</b> <?= $invoice->alamat ?></p>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Sub-Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    if ($pesanan): foreach ($pesanan as $p):
                        $sub = $p->jumlah * $p->harga;
                        $total += $sub;
                    ?>
                    <tr>
                        <td><?= $p->nama_brg ?></td>
                        <td><?= $p->jumlah ?></td>
                        <td>Rp <?= number_format($p->harga, 0, ',', '.') ?></td>
                        <td>Rp <?= number_format($sub, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; endif; ?>
                    <tr class="table-light">
                        <td colspan="3" class="text-end fw-bold">Grand Total</td>
                        <td class="fw-bold text-success">Rp <?= number_format($total, 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

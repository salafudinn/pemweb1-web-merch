<h5 class="fw-bold mb-4">Daftar Pesanan Masuk</h5>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Pemesan</th>
                        <th>Alamat</th>
                        <th>Tanggal Pesan</th>
                        <th>Batas Bayar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($invoice): foreach ($invoice as $inv): ?>
                    <tr>
                        <td><?= $inv->id ?></td>
                        <td><?= $inv->nama ?></td>
                        <td><?= $inv->alamat ?></td>
                        <td><?= $inv->tgl_pesan ?></td>
                        <td><?= $inv->batas_bayar ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/detail_invoice/'.$inv->id) ?>" class="btn btn-sm btn-dark">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr><td colspan="6" class="text-center text-muted">Belum ada pesanan masuk.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

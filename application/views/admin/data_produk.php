<?= $this->session->flashdata('pesan') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Manajemen Produk</h5>
    <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">+ Tambah Produk</button>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; if (!empty($produk)): foreach ($produk as $brg): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $brg->nama_produk ?></td>
                        <td><?= $brg->keterangan ?></td>
                        <td>Rp <?= number_format($brg->harga, 0, ',', '.') ?></td>
                        <td><?= $brg->stok ?></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $brg->id ?>">Edit</button>
                            <a href="<?= base_url('admin/hapus/'.$brg->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="editModal<?= $brg->id ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit: <?= $brg->nama_produk ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('admin/update') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $brg->id ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Produk</label>
                                            <input type="text" name="nama_produk" class="form-control" value="<?= $brg->nama_produk ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" value="<?= $brg->keterangan ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Harga</label>
                                            <input type="number" name="harga" class="form-control" value="<?= $brg->harga ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Stok</label>
                                            <input type="number" name="stok" class="form-control" value="<?= $brg->stok ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-dark w-100">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; else: ?>
                    <tr><td colspan="6" class="text-center text-muted">Belum ada data produk.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah_aksi') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="number" name="id_kategori" class="form-control" value="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

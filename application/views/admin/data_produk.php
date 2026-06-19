<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Manajemen Produk</h3>
    <!-- Tombol pemicu Modal Tambah murni menggunakan data attribute -->
    <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">+ Tambah Barang</button>
</div>

<!-- Menampilkan Session Validasi/Alert -->
<?= $this->session->flashdata('pesan'); ?>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if (!empty($produk)):
                        foreach($produk as $brg) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $brg->nama_produk ?></td>
                            <td><?= $brg->keterangan ?></td>
                            <td>Rp <?= number_format($brg->harga, 0, ',', '.') ?></td>
                            <td><?= $brg->stok ?></td>
                            <td class="text-center">
                                <!-- Toggle Model Edit menggunakan ID Spesifik ($brg->id) -->
                                <button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $brg->id ?>">Edit</button>
                                <a href="<?= base_url('admin/hapus/'.$brg->id) ?>" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Hapus barang ini?')">Hapus</a>
                            </td>
                        </tr>

                        <!-- ================= MODAL EDIT (Loop) ================= -->
                        <div class="modal fade" id="editModal<?= $brg->id ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title text-dark">Edit Data: <?= $brg->nama_produk ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/update') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $brg->id ?>">
                                            <div class="mb-3">
                                                <label>Nama Produk</label>
                                                <input type="text" name="nama_produk" class="form-control" value="<?= $brg->nama_produk ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Keterangan</label>
                                                <input type="text" name="keterangan" class="form-control" value="<?= $brg->keterangan ?>">
                                            </div>
                                            <!-- Untuk sederhana, kategori & stok diskip di View Edit namun di controller tetap ditangkap sesuai struktur -->
                                            <div class="mb-3">
                                                <label>Harga</label>
                                                <input type="number" name="harga" class="form-control" value="<?= $brg->harga ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Stok</label>
                                                <input type="number" name="stok" class="form-control" value="<?= $brg->stok ?>" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary d-block w-100">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ================= AKHIR MODAL EDIT ================= -->
                        
                        <?php endforeach; 
                    else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data produk.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ================= MODAL TAMBAH BARANG ================= -->
<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Tambah Produk Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah_aksi') ?>" method="post">
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>ID Kategori</label>
                        <input type="number" name="id_kategori" class="form-control" value="1">
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary d-block w-100">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

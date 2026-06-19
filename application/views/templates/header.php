<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Merch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url('dashboard') ?>">Toko Merch</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">Katalog</a>
                </li>
                <?php if ($this->session->userdata('role_id') == 1): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin') ?>">Data Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/invoice') ?>">Pesanan Masuk</a>
                </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ms-auto align-items-center gap-2">
                <li class="nav-item">
                    <a class="nav-link text-warning fw-semibold" href="<?= base_url('dashboard/detail_keranjang') ?>">
                        <i class="bi bi-cart-fill"></i> Keranjang (<?= $this->cart->total_items() ?>)
                    </a>
                </li>
                <?php if ($this->session->userdata('username')): ?>
                <li class="nav-item text-white">
                    Hai, <b><?= $this->session->userdata('nama') ?></b>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm btn-outline-light" href="<?= base_url('auth/logout') ?>">Logout</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="btn btn-sm btn-outline-light" href="<?= base_url('auth/login') ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm btn-light text-dark fw-semibold" href="<?= base_url('auth/register') ?>">Register</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4 pb-5">

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (empty($this->session->userdata('role_id'))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
            redirect('auth/login');
        }
        $this->load->model('model_barang');
        $this->load->model('model_invoice');
    }

    public function index() {
        $data['produk'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_ke_keranjang($id) {
        $barang = $this->model_barang->edit_barang(['id' => $id], 'produk')->row();
        if ($barang) {
            $item = array(
                'id'    => $barang->id,
                'qty'   => 1,
                'price' => $barang->harga,
                'name'  => $barang->nama_produk
            );
            $this->cart->insert($item);
        }
        redirect('dashboard');
    }

    public function detail_keranjang() {
        $this->load->view('templates/header');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang() {
        $this->cart->destroy();
        redirect('dashboard/detail_keranjang');
    }

    public function pembayaran() {
        if (empty($this->cart->contents())) {
            redirect('dashboard/detail_keranjang');
        }
        $this->load->view('templates/header');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan() {
        if (empty($this->cart->contents())) {
            redirect('dashboard/detail_keranjang');
        }
        $this->model_invoice->simpan();
        $this->cart->destroy();
        $this->load->view('templates/header');
        $this->load->view('proses_pesanan');
        $this->load->view('templates/footer');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (empty($this->session->userdata('role_id')) || $this->session->userdata('role_id') != 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Akses ditolak. Halaman khusus admin.</div>');
            redirect('auth/login');
        }
        $this->load->model('model_barang');
        $this->load->model('model_invoice');
    }

    public function index() {
        $data['produk'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('admin/data_produk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi() {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">'.validation_errors().'</div>');
            redirect('admin');
        } else {
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'keterangan'  => $this->input->post('keterangan'),
                'id_kategori' => $this->input->post('id_kategori') ?: NULL,
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok'),
                'gambar'      => 'placeholder.jpg'
            );
            $this->model_barang->tambah_barang($data, 'produk');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil ditambahkan.</div>');
            redirect('admin');
        }
    }

    public function update() {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">'.validation_errors().'</div>');
            redirect('admin');
        } else {
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'keterangan'  => $this->input->post('keterangan'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok')
            );
            $this->model_barang->update_data(['id' => $id], $data, 'produk');
            $this->session->set_flashdata('pesan', '<div class="alert alert-info">Data berhasil diperbarui.</div>');
            redirect('admin');
        }
    }

    public function hapus($id) {
        $this->model_barang->hapus_data(['id' => $id], 'produk');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning">Data berhasil dihapus.</div>');
        redirect('admin');
    }

    public function invoice() {
        $data['invoice'] = $this->model_invoice->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates/footer');
    }

    public function detail_invoice($id) {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id);
        $this->load->view('templates/header');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates/footer');
    }
}

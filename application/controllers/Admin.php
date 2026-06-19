<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_barang');
    }

    // Halaman utama admin: menampilkan tabel
    public function index() {
        $data['produk'] = $this->model_barang->tampil_data()->result();
        
        $this->load->view('templates/header');
        $this->load->view('admin/data_produk', $data);
        $this->load->view('templates/footer');
    }

    // Aksi untuk CREATE
    public function tambah_aksi() {
        // [Wajib] Penerapan form_validation
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan dengan pesan error (Session)
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Validasi gagal! Cek inputan.</div>');
            redirect('admin');
        } else {
            // Mengemas data inputan dari Form ke dalam array
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'keterangan'  => $this->input->post('keterangan'),
                'id_kategori' => $this->input->post('id_kategori') ?: NULL,
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok'),
                'gambar'      => 'placeholder.jpg' // Default sementara
            );

            $this->model_barang->tambah_barang($data, 'produk');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil ditambah!</div>');
            redirect('admin');
        }
    }

    // Aksi untuk UPDATE
    public function update() {
        $id = $this->input->post('id'); // Disembunyikan (hidden) di form
        
        // [Wajib] Penerapan form_validation
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Validasi Edit Gagal!</div>');
            redirect('admin');
        } else {
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'keterangan'  => $this->input->post('keterangan'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok')
            );
            $where = array('id' => $id);

            $this->model_barang->update_data($where, $data, 'produk');
            $this->session->set_flashdata('pesan', '<div class="alert alert-info">Data berhasil diubah!</div>');
            redirect('admin');
        }
    }

    // Aksi untuk DELETE
    public function hapus($id) {
        $where = array('id' => $id);
        $this->model_barang->hapus_data($where, 'produk');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data berhasil dihapus!</div>');
        redirect('admin');
    }
}

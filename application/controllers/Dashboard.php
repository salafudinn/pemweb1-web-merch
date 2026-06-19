<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
        // Panggil model_barang untuk mengambil data di dalam database
        $this->load->model('model_barang');
        $data['produk'] = $this->model_barang->tampil_data()->result();

        // Load sistem template dan kirimkan $data ke tampilan
        $this->load->view('templates/header');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}

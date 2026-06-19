<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_barang extends CI_Model {

    // [READ] Mengambil semua data produk
    public function tampil_data() {
        return $this->db->get('produk'); 
    }

    // [CREATE] Menambah data produk baru ke tabel
    public function tambah_barang($data, $table) {
        $this->db->insert($table, $data);
    }

    // Mengambil 1 baris spesifik untuk form edit
    public function edit_barang($where, $table) {
        return $this->db->get_where($table, $where);
    }

    // [UPDATE] Menyimpan perubahan data ke database
    public function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // [DELETE] Menghapus data produk
    public function hapus_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

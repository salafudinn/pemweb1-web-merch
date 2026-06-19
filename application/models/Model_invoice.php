<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_invoice extends CI_Model {

    public function simpan() {
        date_default_timezone_set('Asia/Jakarta');

        $invoice = array(
            'nama'        => $this->input->post('nama'),
            'alamat'      => $this->input->post('alamat'),
            'tgl_pesan'   => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', strtotime('+1 day')),
        );
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $pesanan = array(
                'id_invoice' => $id_invoice,
                'id_brg'     => $item['id'],
                'nama_brg'   => $item['name'],
                'jumlah'     => $item['qty'],
                'harga'      => $item['price'],
                'pilihan'    => ''
            );
            $this->db->insert('tb_pesanan', $pesanan);
        }

        return TRUE;
    }

    public function tampil_data() {
        $result = $this->db->get('tb_invoice');
        return $result->num_rows() > 0 ? $result->result() : FALSE;
    }

    public function ambil_id_invoice($id) {
        $result = $this->db->where('id', $id)->limit(1)->get('tb_invoice');
        return $result->num_rows() > 0 ? $result->row() : FALSE;
    }

    public function ambil_id_pesanan($id_invoice) {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        return $result->num_rows() > 0 ? $result->result() : FALSE;
    }
}

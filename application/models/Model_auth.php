<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model {

    public function cek_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->db->where('username', $username)
                           ->limit(1)
                           ->get('tb_user');

        if ($result->num_rows() > 0) {
            $user = $result->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return FALSE;
    }
}

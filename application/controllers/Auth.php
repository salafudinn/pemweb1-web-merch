<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $method = $this->router->fetch_method();
        if ($method !== 'logout' && !empty($this->session->userdata('role_id'))) {
            $role = $this->session->userdata('role_id');
            redirect($role == 1 ? 'admin' : 'dashboard');
        }
        $this->load->model('model_auth');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            $auth = $this->model_auth->cek_login();

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Username atau Password salah!</div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('nama', $auth->nama);

                if ($auth->role_id == 1) {
                    redirect('admin');
                } else {
                    redirect('dashboard');
                }
            }
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]');
        $this->form_validation->set_rules('password_1', 'Password', 'required|min_length[6]|matches[password_2]');
        $this->form_validation->set_rules('password_2', 'Konfirmasi Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('register');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama'     => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password_1'), PASSWORD_DEFAULT),
                'role_id'  => 2
            );
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Akun berhasil dibuat. Silakan login.</div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

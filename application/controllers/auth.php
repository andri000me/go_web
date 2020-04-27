<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function index($error = NULL) {
        $data = array(
            'title' => 'Login Page',
            'action' => site_url('auth/login'),
            'error' => $error
        );
	    check_already_login();
        $this->load->view('login', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
    }
    public function login() {
        $this->load->model('model_data');
        $login = $this->model_data->login($this->input->post('username'), md5($this->input->post('password')));
        if ($login == 1) {
            $row = $this->model_data->data_login($this->input->post('username'), md5($this->input->post('password')));
            $data = array(
                'logged' => TRUE,
                'username' => $row->username,
                'level' => $row->level
            );
            $this->session->set_userdata($data);
            redirect(site_url('dashboard'));
        } else {
            $error = 'username / password salah';
            $this->index($error);
        }
    }
    function register(){
        $this->load->view('v_register');
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
    }
    function tambah_aksi(){
            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $level = $this->input->post('level');
     
            $data = array(
                'id' => $id,
                'username' => $username,
                'password' => md5($password),
                'level' => $level
                );
            $this->model_data->input_data_register($data,'user');
            redirect('auth');
        }
    function logout() {
        $this->session->sess_destroy();
        redirect(site_url('auth'));
    }
}
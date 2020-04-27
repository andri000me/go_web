<?php

class dashboard extends CI_Controller{

	public function index()
	{
		check_not_login();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}
}
<?php

class cabang extends CI_Controller{
	function __construct(){
        parent::__construct();      
        $this->load->model('model_data');
        $this->load->helper('url');
        $this->load->database();
        }
	public function index()
	{
		$data['datas'] = $this->model_data->tampil_cabang()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_cabang', $data);
		$this->load->view('templates/footer');
	}
	public function hapus($kode_cabang){
        $where = array('kode_cabang' => $kode_cabang);
        $this->model_data->hapus_data_cabang($where,'cabang_tbl');
        redirect('cabang/index');
	}
	public function edit($kode_cabang){
		$where = array('kode_cabang' => $kode_cabang);
		$data['cabang_tbl']= $this->model_data->edit_data_cabang($where,'cabang_tbl')->result();
		//print_r($id	);
		$this->load->view('v_edit_cabang', $data);
	}
	public function update(){
		$kode_cabang = $this->input->post('kode_cabang');
		$cabang_nama = $this->input->post('cabang_nama');
		$cabang_alamat = $this->input->post('cabang_alamat');
		$updated_data = array(
			'kode_cabang' => $kode_cabang,
			'cabang_nama' => $cabang_nama,
			'cabang_alamat' => $cabang_alamat
			);
		$this->model_data->update_data_cabang($updated_data, $this->input->post('kode_cabang'));
		redirect('index.php/cabang/index');
	}
	function tambah_aksi(){
		$kode_cabang = $this->input->post('kode_cabang');
		$cabang_nama = $this->input->post('cabang_nama');
		$cabang_alamat = $this->input->post('cabang_alamat');
 
		$data = array(
			'kode_cabang' => $kode_cabang,
			'cabang_nama' => $cabang_nama,
			'cabang_alamat' => $cabang_alamat
			);
		$this->model_data->input_data_cabang($data,'cabang_tbl');
		redirect('index.php/cabang');
	} 
}
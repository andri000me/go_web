<?php

class barang extends CI_Controller{
	function __construct(){
        parent::__construct();      
        $this->load->model('model_data');
        $this->load->helper('url');
		$this->load->database();
		$this->load->library('session');
        }
	public function index()
	{
		$data['datas'] = $this->model_data->tampil_barang()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_barang', $data);
		$this->load->view('templates/footer');
	}
	function tambah_aksi(){
		date_default_timezone_set('Asia/Karachi');
		$now = date('Y-m-d');	
			$barang_id = $this->input->post('barang_id');
			$barang_nama = $this->input->post('barang_nama');
			$barang_jumlah = $this->input->post('barang_jumlah');
			$barang_harga = $this->input->post('barang_harga');
			$kode_cabang = $this->input->post('kode_cabang');
			$barang_tanggal = $this->input->post('barang_tanggal');
	
	 
			$data = array(
				'barang_id' => $barang_id,
				'barang_nama' => $barang_nama,
				'barang_jumlah' => $barang_jumlah,
				'barang_diterima' => $barang_diterima,
				'barang_harga' => $barang_harga,
				'kode_cabang' => $kode_cabang,
				'barang_tanggal' => date('Y-m-d')
				);
			$this->model_data->input_data_barang($data,'barang_tbl');
			redirect('index.php/barang');
		} 
	public function edit($barang_id){
		$where = array('barang_id' => $barang_id);
		$data['barang_tbl']= $this->model_data->edit_data_barang($where,'barang_tbl')->result();
		//print_r($id	);
		$this->load->view('v_edit_barang', $data);
	}
	public function hapus($barang_id){
		$where = array('barang_id' => $barang_id);
		$data=$this->db->limit(1)->get_where('barang_tbl',array('barang_id'=>$barang_id))->row()->barang_lampiran;
		$this->model_data->hapus_data_barang($where,'barang_tbl');
		unlink('./assets/barang_lampiran/'.$data); 
        redirect('barang/index');
    } 
	public function update(){
		$barang_id = $this->input->post('barang_id');
		$barang_nama = $this->input->post('barang_nama');
		$barang_jumlah = $this->input->post('barang_jumlah');
		$barang_diterima = $this->input->post('barang_diterima');
		$barang_harga = $this->input->post('barang_harga');
		$kode_cabang = $this->input->post('kode_cabang');
		$barang_lampiran = $_FILES['barang_lampiran'];
        if($barang_lampiran=''){}else{
            $config['upload_path'] = './assets/barang_lampiran';
            $config['allowed_types'] = 'jpg|png|gif|pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('barang_lampiran')){
                echo "Upload gagal"; die();   
            }else{
                $barang_lampiran=$this->upload->data('file_name');
            }
        }
		
		$updated_data = array(
			'barang_id' => $barang_id,
			'barang_nama' => $barang_nama,
			'barang_jumlah' => $barang_jumlah,
			'barang_diterima' => $barang_diterima,
			'barang_harga' => $barang_harga,
			'kode_cabang' => $kode_cabang,
			'barang_lampiran' => $barang_lampiran
			);
		$this->model_data->update_data_barang($updated_data, $this->input->post('barang_id'));
		redirect('barang/index');
	}
	public function detail($barang_id){
		$this->load->model('model_data');
		$detail = $this->model_data->detail_barang($barang_id);
		$data['detail'] = $detail;
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_barang_detail', $data);
		$this->load->view('templates/footer');
	}
	public function download($barang_id){
		$this->load->helper('download');
		$fileinfo = $this->model_data->barang_download($barang_id);
		$barang_tbl = 'assets/barang_lampiran/'.$fileinfo['barang_lampiran'];
		force_download($barang_tbl, NULL);
	}
	public function konfirmasi($barang_id){
		$barang_diterima="DITERIMA";
		$this->db->where('barang_id', $barang_id);
		$this->db->set('barang_diterima', $barang_diterima);
		$this->db->update('barang_tbl');
		redirect('barang/index');
	}
	
}
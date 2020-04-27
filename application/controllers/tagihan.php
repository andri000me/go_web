<?php

class tagihan extends CI_Controller{
	function __construct(){
        parent::__construct();      
        $this->load->model('model_data');
        $this->load->helper('url');
        $this->load->database();
        }
	public function index()
	{
		$data['datas'] = $this->model_data->tampil_tagihan()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_tagihan', $data);
		$this->load->view('templates/footer');
	}
	function tambah_aksi(){
	date_default_timezone_set('Asia/Karachi');
		$now = date('Y-m-d');

		$tagihan_id = $this->input->post('tagihan_id');
		$tagihan_nama = $this->input->post('tagihan_nama');
		$tagihan_tanggal = $this->input->post('tagihan_tanggal', $now);
		$kode_cabang = $this->input->post('kode_cabang');
		$tagihan_pra = $this->input->post('tagihan_pra');
		if($tagihan_pra=''){}else{
            $config['upload_path'] = './assets/tagihan_pra';
            $config['allowed_types'] = 'jpg|png|gif|pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('tagihan_pra')){
                echo "Upload gagal"; die();   
            }else{
                $tagihan_pra=$this->upload->data('file_name');
            }
        }
		$tagihan_pasca = $this->input->post('tagihan_pasca');
		$data = array(
			'tagihan_id' => $tagihan_id,
			'tagihan_nama' => $tagihan_nama,
			'tagihan_tanggal' => date('Y-m-d'),
			'kode_cabang' => $kode_cabang,
			'tagihan_pra' => $tagihan_pra,
			'tagihan_pasca' => $tagihan_pasca
			);
		$this->model_data->input_data_tagihan($data,'tagihan_tbl');
		redirect('index.php/tagihan');
	} 
    public function hapus($tagihan_id){
		$where = array('tagihan_id' => $tagihan_id);
		$data=$this->db->limit(1)->get_where('tagihan_tbl',array('tagihan_id'=>$tagihan_id))->row()->tagihan_pra;
		$data1=$this->db->limit(1)->get_where('tagihan_tbl',array('tagihan_id'=>$tagihan_id))->row()->tagihan_pasca;
		$this->model_data->hapus_data_tagihan($where,'tagihan_tbl');
		unlink('./assets/tagihan_pra/'.$data);
		unlink('./assets/tagihan_pasca/'.$data1); 
        redirect('tagihan/index');
    }
    public function edit($tagihan_id){
		$where = array('tagihan_id' => $tagihan_id);
		$data['tagihan_tbl']= $this->model_data->edit_data_tagihan($where,'tagihan_tbl')->result();
		//print_r($id	);
		$this->load->view('v_edit_tagihan', $data);
	}
	public function update(){
		$now = date('Y-m-d');
		$tagihan_id = $this->input->post('tagihan_id');
		$tagihan_nama = $this->input->post('tagihan_nama');
		$tagihan_tanggal = $this->input->post('tagihan_tanggal', $now);
		$kode_cabang = $this->input->post('kode_cabang');
		$tagihan_pra = $this->input->post('tagihan_pra');
		$tagihan_pasca = $this->input->post('tagihan_pasca');
		if($tagihan_pasca=''){}else{
            $config['upload_path'] = './assets/tagihan_pasca';
            $config['allowed_types'] = 'jpg|png|gif|pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('tagihan_pasca')){
                echo "Upload gagal"; die();   
            }else{
                $tagihan_pasca=$this->upload->data('file_name');
            }
        }	
 
		
		$updated_data = array(
			'tagihan_id' => $tagihan_id,
			'tagihan_nama' => $tagihan_nama,
			'tagihan_tanggal' => date('Y-m-d'),
			'kode_cabang' => $kode_cabang,
			'tagihan_pra' => $tagihan_pra,
			'tagihan_pasca' => $tagihan_pasca,
			);
		$this->model_data->update_data_tagihan($updated_data, $this->input->post('tagihan_id'));
		redirect('tagihan/index');
	}
	public function download_tagihanpra($tagihan_id){
		$this->load->helper('download');
		$fileinfo = $this->model_data->download_tagihanpra($tagihan_id);
		$tagihan_tbl = 'assets/tagihan_pra/'.$fileinfo['tagihan_pra'];
		force_download($tagihan_tbl, NULL);
	}
	public function download_tagihanpasca($tagihan_id){
		$this->load->helper('download');
		$fileinfo = $this->model_data->download_tagihanpasca($tagihan_id);
		$tagihan_tbl = 'assets/tagihan_pasca/'.$fileinfo['tagihan_pasca'];
		force_download($tagihan_tbl, NULL);
	}
}
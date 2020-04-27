<?php

class model_data extends CI_Model{

	function login($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }

    function data_login($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user')->row();
    }
    public function input_data_register($data,$table){
		$this->db->insert($table,$data);
	}

	//barang
	public function tampil_barang(){
		return $this->db->get('barang_tbl');
	}
	function input_data_barang($data,$table){
		$this->db->insert($table,$data);
	}
	public function edit_data_barang($where,$table){	
		return $this->db->get_where($table,$where);
	}
	public function update_data_barang($updated_data, $barang_id){
		$this->db->where('barang_id', $barang_id); 
		$this->db->update('barang_tbl', $updated_data);
	}
	function hapus_data_barang($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function detail_barang($barang_id = NULL){
		$query = $this->db->get_where('barang_tbl', array('barang_id' => $barang_id))->row();
		return $query;
	}
	public function barang_download($barang_id){
		$query = $this->db->get_where('barang_tbl',array('barang_id'=>$barang_id));
		return $query->row_array();
	}
	//tagihan
	public function tampil_tagihan(){
		return $this->db->get('tagihan_tbl');
	}
	function input_data_tagihan($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data_tagihan($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function edit_data_tagihan($where,$table){	
		return $this->db->get_where($table,$where);
	}
	public function update_data_tagihan($updated_data, $tagihan_id){
		$this->db->where('tagihan_id', $tagihan_id); 
		$this->db->update('tagihan_tbl', $updated_data);
	}
	public function download_tagihanpra($tagihan_id){
		$query = $this->db->get_where('tagihan_tbl',array('tagihan_id'=>$tagihan_id));
		return $query->row_array();
	}
	public function download_tagihanpasca($tagihan_id){
		$query = $this->db->get_where('tagihan_tbl',array('tagihan_id'=>$tagihan_id));
		return $query->row_array();
	}

	//cabang
	public function tampil_cabang(){
		return $this->db->get('cabang_tbl');
	}
	function input_data_cabang($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data_cabang($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function edit_data_cabang($where,$table){	
		return $this->db->get_where($table,$where);
	}
	public function update_data_cabang($updated_data, $kode_cabang){
		$this->db->where('kode_cabang', $kode_cabang); 
		$this->db->update('cabang_tbl', $updated_data);
	}
}
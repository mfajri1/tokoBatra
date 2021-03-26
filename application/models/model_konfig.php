<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_konfig extends CI_Model {

	public function tampil(){
		return $this->db->get('t_konfigurasi');	
	}

	public function detail($table, $id){
		$this->db->where($id);
		return $this->db->get($table);		
	}

	public function ubah($table, $data){
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update($table, $data);	
	}

	public function hapusUmum($table, $id){
		$this->db->where($id);
		$this->db->delete($table);	
	}

}

/* End of file model_konfig.php */
/* Location: ./application/models/model_konfig.php */
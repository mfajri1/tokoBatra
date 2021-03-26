<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {

	public function tampil_data($table){
		return $this->db->get($table);	
	}

	public function tambah($table, $data){
		$this->db->insert($table, $data);	
	}

	public function ubah($table, $data){
		$this->db->where($data);
		return $this->db->get($table);	
	}

	public function ubahDataKategori($table, $data, $id){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}

	public function hapus($table, $id){
		$this->db->delete($table, $id);	
	}

	// layout home
	public function tampilProdukHome($table, $id){
		$this->db->where($id);
		return $this->db->get($table);	
	}

}

/* End of file model_kategori.php */
/* Location: ./application/models/model_kategori.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu extends CI_Model {
	// untuk layout admin
	public function tampilMenu($table){
		return $this->db->get($table);	
	}

	public function tambahMenu($table, $data){
		$this->db->insert($table, $data);	
	}

	public function ubahMenu($table, $id_menu){
		$this->db->where($id_menu);
		return $this->db->get($table);	
	}

	public function ubahMenuAksi($table, $data, $id){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}

	public function hapus($table, $id){
		$this->db->where($id);
		$this->db->delete($table);	
	}

}

/* End of file model_menu.php */
/* Location: ./application/models/model_menu.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gambar extends CI_Model {

	public function tampil_data(){
		$this->db->select('t_gambar.*,
			t_produk.nama_produk	
			');	
		$this->db->from('t_gambar');
		$this->db->join('t_produk', 't_produk.id_produk = t_gambar.id_produk', 'left');
		return $this->db->get();		
	}

}

/* End of file model_gambar.php */
/* Location: ./application/models/model_gambar.php */
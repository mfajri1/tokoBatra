<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_header_transaksi extends CI_Model {

	public function tambahProsesCheckout($table, $data){
		$this->db->insert($table, $data);	
	}
	public function tambahTransaksi($table, $data){
		$this->db->insert($table, $data);	
	}
}

/* End of file Model_header_transaksi.php */
/* Location: ./application/models/model_pelanggan.php */
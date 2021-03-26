<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaksi extends CI_Model {

	public function tampil_transaksi($table){
		return $this->db->get($table);	
	}

	public function detail_transaksi($table, $id){
		$this->db->select('
					t_transaksi.*,
					t_header_transaksi.*,
					users.nama,
					users.username
			');	
		$this->db->from($table);
		$this->db->join('t_transaksi', 't_header_transaksi.kode_transaksi = t_transaksi.kode_transaksi', 'left');
		$this->db->join('users', 't_header_transaksi.id_user = users.id_user', 'left');
		$this->db->where($id);
		return $this->db->get();
	}

	public function hapus($table, $id){
		$this->db->where($id);
		$this->db->delete($table);	
	}

	public function hapus_foto_transaksi($table, $kode){
		$this->db->select('*');	
		$this->db->from($table);
		$this->db->where($kode);
		return $this->db->get();	
	}

	public function tambahTransaksi($table, $data){
		$this->db->insert($table, $data);	
	}

	public function riwayat_belanja($table, $id){
		$this->db->select('
				t_transaksi.*,
				users.nama,
				t_header_transaksi.*,
				SUM(t_transaksi.total_harga) AS total
			');
		$this->db->from($table);
		$this->db->join('users', 'users.id_user = t_transaksi.id_user', 'left');
		$this->db->join('t_header_transaksi', 't_header_transaksi.kode_transaksi = t_transaksi.kode_transaksi', 'left');
		$this->db->where('t_transaksi.id_user', $id);
		$this->db->where('t_header_transaksi.status_bayar', 'sukses');
		$this->db->group_by('t_transaksi.id_transaksi');
		return $this->db->get();
	}

	public function hapusRiwayat($table, $id){
		$this->db->where($id);
		$this->db->delete($table);	
	}

	public function konfirm($table, $id){
		$this->db->select('
				t_transaksi.*,
				users.nama,
				t_header_transaksi.*,
				SUM(t_transaksi.total_harga) AS totalnya
			');
		$this->db->from($table);
		$this->db->join('users', 'users.id_user = t_transaksi.id_user', 'left');
		$this->db->join('t_header_transaksi', 't_header_transaksi.kode_transaksi = t_transaksi.kode_transaksi', 'left');
		$this->db->where('t_header_transaksi.id_user', $id);
		$this->db->where('status_bayar', 'pending');
		$this->db->group_by('t_transaksi.kode_transaksi');
		return $this->db->get();	
	}

	public function konfirmasi($table, $kode){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($kode);
		return $this->db->get();	
	}

	public function ubah($table, $data, $id){
		$this->db->where($id);
		$this->db->update($table, $data);		
	}

}

/* End of file model_transaksi.php */
/* Location: ./application/models/model_transaksi.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function tampil_data($table){
		$this->db->select('
					users.*,
					role_acces.access
			');
		$this->db->from($table);
		$this->db->join('role_acces', 'users.akses_level = role_acces.id_access', 'left');
		return $this->db->get();	
	}
	// meodel untuk dashboard
	public function tampil_dashboard($table, $username){
		$this->db->select('
					users.*,
					role_acces.access
			');
		$this->db->from($table);
		$this->db->join('role_acces', 'users.akses_level = role_acces.id_access', 'left');
		$this->db->where('username', $username);
		return $this->db->get();	
	}

	public function tampil_role($table){
		return $this->db->get($table);	
	}

	public function tampil_hapus($table, $id){
		$this->db->where($id);
		return $this->db->get($table);	
	}

	public function inputDataPengguna($table, $data){
		$this->db->insert($table, $data);	
	}

	public function ubah($table, $data){
		$this->db->where($data);
		return $this->db->get($table);	
	}

	public function ubahDataPengguna($table, $data, $id){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}

	public function detailPengguna($table, $id){
		$this->db->select('
				users.*,
				role_acces.access						
			');
		$this->db->from($table);
		$this->db->join('role_acces', 'role_acces.id_access = users.id_user', 'left');
		$this->db->where($id);
		return $this->db->get();	
	}

	public function hapus_pelanggan($table, $id){
		$this->db->delete($table, $id);	
	}

	// model untuk mengambil data login
	public function login($username, $password){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', SHA1($password));	
		return $this->db->get();
	}
	// tampil detail user
	public function tampilProfile($username){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		return $this->db->get();	
	}

	// proses checkout pada layout home
	public function checkout($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('username', $id);
		return $this->db->get();	
	}


}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
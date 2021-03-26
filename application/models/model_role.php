<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_role extends CI_Model {

	public function tampil_role(){
		$this->db->select('
			role_acces.*,
			COUNT(tb_sub_menu.access_id) AS total_menu	
			');
		$this->db->from('role_acces');
        // awal JOIN table

        // join table t_produk ke table users
		$this->db->join('tb_sub_menu', 'tb_sub_menu.access_id = role_acces.id_access', 'left'); 
		$this->db->where('id_access !=',  1); 
		$this->db->group_by('role_acces.id_access');
        // akhir JOIN table
		return $this->db->get();
	}

	public function tampilInfo($table, $id){
		$this->db->where($id);
		return $this->db->get($table);	
	}

	public function infoRole($table, $id){
		$this->db->select('
						role_acces.*,
						tb_user_acces_menu.*,
						tb_sub_menu.*,
			');
		$this->db->from($table);
		$this->db->join('tb_sub_menu', 'tb_sub_menu.access_id = tb_user_acces_menu.access_id', 'left');
		$this->db->join('role_acces', 'role_acces.id_access = tb_user_acces_menu.role_id', 'left');
		$this->db->where('tb_user_acces_menu.role_id', $id);
		$this->db->order_by('tb_sub_menu.id_sub_menu', 'asc');	
		return $this->db->get();	
	}

}

/* End of file model_role.php */
/* Location: ./application/models/model_role.php */
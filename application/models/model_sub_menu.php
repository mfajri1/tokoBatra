<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sub_menu extends CI_Model {
	// untuk layout admin
	public function tampilMenu($table){
		$this->db->select('
				tb_sub_menu.*,
				role_acces.id_access,
				role_acces.access
			');	
		$this->db->from($table);
		$this->db->join('role_acces', 'role_acces.id_access = tb_sub_menu.access_id', 'left');
		return $this->db->get();	
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
	
	// model menu
	public function tampilMenuHome($table, $akses){
		// cara 1 
		$this->db->select('
						role_acces.id_access,
						role_acces.access
			');
		$this->db->from($table);
		$this->db->join('tb_user_acces_menu', 'role_acces.id_access = tb_user_acces_menu.access_id', 'left');	
		$this->db->where('role_id', $akses);
		$this->db->order_by('role_acces.id_access', 'asc');
		return $this->db->get();

		// cara 2
		// $query = " SELECT `role_acces`.`id_access`, `access`
		// 		   FROM `role_acces` JOIN `tb_user_acces_menu`
		// 		   ON `role_acces`.`id_access` = `tb_user_acces_menu`.`menu_id`
		// 		   WHERE `tb_user_acces_menu`.`role_id` = $akses
		// 		   ORDER BY `tb_user_acces_menu`.`menu_id` ASC
		// ";
		// return $this->db->query($query);
	}
	


}

/* End of file model_menu.php */
/* Location: ./application/models/model_menu.php */
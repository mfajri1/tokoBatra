<?php 
	function __construct()
	{	
		$CI = get_instance();
        // load user_model ke dalam simple_library
		$CI->load->model('user_model');
	}
	function checkLogin(){
		$CI = get_instance();
		// memeriksa sesion nya ada atau belum
		if ($CI->session->userdata('username') == "") {
			$CI->session->set_flashdata('pesan', '<div class="alert alert-success">Anda Belum Login! </div>');
			redirect('auth/login');
		}
		else{
			$akses_level	= $CI->session->userdata('akses_level');
			$menu 			= $CI->uri->segment(1);
			$menu1 			= ['access' => $menu];
			$query_login	= $CI->db->get_where('role_acces', $menu1)->row_array();
			$id_access		= $query_login['id_access'];
			$user_access	= $CI->db->get_where('tb_user_acces_menu', ['role_id' => $akses_level, 'access_id' => $id_access]);
			if ($user_access->num_rows() < 1) {
				redirect('hblock/halaman_block');
			}			
		}
	}

	function checkSelect($role_id, $access_id){
		$lib = get_instance();
		// 	$lib->db->where('role_id', $role_id); => mengambil data tapi hanya untuk perbandingan
		// $lib->db->where('role_id', $role_id);
		// $lib->db->where('menu_id', $menu_id);
		// var_dump($haha);die();
		$result = $lib->db->get_where('tb_user_acces_menu', ['role_id' => $role_id, 'access_id' => $access_id]); 

		if ($result->num_rows() > 0) {
			return "checked = 'checked'";
		}
	}
?>
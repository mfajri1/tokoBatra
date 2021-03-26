<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_access extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// mengambil function checkLogin dari library simple login, ini dibuat jika sudah membuat login, jika belum membuat llogin ini tidak perlu karna ini digunakan untuk melihat session
		// $this->simple_login->checkLogin();
		checkLogin();
	}
	public function view($base, $data){
		$data['tampil'] = $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
		$data['konfig'] 	= $this->model_konfig->tampil()->row_array();
		// var_dump($data['menu']);die();
		$this->load->view('admin/temp/header', $data, FALSE);
		$this->load->view('admin/temp/nav',$data, FALSE);
		$this->load->view('admin/temp/sidebar', FALSE);
		$this->load->view( $base, $data, FALSE);
		$this->load->view('admin/temp/footer', FALSE);
			
	}
	public function index()
	{
		$data['title']	= 'Role Access';
		$data['roleAccess']	= $this->model_role->tampil_role()->result_array();

		$this->view('admin/role_access/roleAccess', $data);
	}

	public function tambahRoleAccess(){
		$data['title']	= 'Tambah Role Access';

		$this->view('admin/role_access/tambahRoleAccess', $data);	
	}

	public function tampilMenuAccess($id_access){
		$id = ['id_access' => $id_access];
		$data['tampil_access']	= $this->model_role->tampilInfo('role_acces', $id)->row_array();
		$data['subMenu']	= $this->model_role->infoRole('tb_user_acces_menu', $id_access)->result_array();
		$data['title']	= 'Info Role Access : ' . ucfirst($data['tampil_access']['access']);

		$this->view('admin/role_access/tampil_role', $data);		
	}

	public function accessRoleChange(){
		$accessId = $this->input->post('role_id', true);
		$subMenuId = $this->input->post('subMenu_id', true);

		$data = [
			'role_id' => $accessId,
			'access_id' => $subMenuId
		];	
		$this->db->where($data);
		$result = $this->db->get('tb_user_acces_menu')->row_array();

		if ($result->num_rows() < 1) {
			$this->db->insert('tb_user_acces_menu', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah! </div>');
		}else{
			$this->db->delete('tb_user_acces_menu', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil dihapus! </div>');
		}
	}

}

/* End of file role_access.php */
/* Location: ./application/controllers/admin/role_access.php */
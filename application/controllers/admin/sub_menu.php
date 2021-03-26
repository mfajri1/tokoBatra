<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_menu extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// mengambil function checkLogin dari library simple login, ini dibuat jika sudah membuat login, jika belum membuat llogin ini tidak perlu karna ini digunakan untuk melihat session
		// $this->simple_login->checkLogin();
		checkLogin();
	}
		
	public function view($base, $data){
		$data['tampil'] 	= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
		$data['konfig'] 	= $this->model_konfig->tampil()->row_array();

		$this->load->view('admin/temp/header', $data, FALSE);
		$this->load->view('admin/temp/nav', $data, FALSE);
		$this->load->view('admin/temp/sidebar', FALSE);
		$this->load->view($base, $data, FALSE);
		$this->load->view('admin/temp/footer', FALSE);	
	}

	public function subMenu()
	{
		$data['title']	= 'Management SubMenu';
		$data['sub_menu']	= $this->model_sub_menu->tampilMenu('tb_sub_menu')->result_array();

		$this->view('admin/sub_menu/sub_menu', $data, FALSE);
	}

	public function tambahSubMenu(){
		$data['title']	= 'Tambah Management SubMenu';
		$data['role']	= $this->user_model->tampil_role('role_acces')->result_array();
		$data['tampil_menu']	= $this->model_menu->tampilMenu('tb_sub_menu')->result_array();

		$this->view('admin/sub_menu/tambah_sub_menu', $data, FALSE);	
	}

	public function tambahSubMenuAksi(){
		$this->form_validation->set_rules('title_menu', 'Nama Menu', 'trim|required');
		$this->form_validation->set_rules('link', 'Link', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->view('admin/sub_menu/tambah_sub_menu', $data, FALSE);
		} else {
			$data = [
				'access_id'	=> htmlspecialchars($this->input->post('access_id', true)),
				'title_menu'	=> htmlspecialchars($this->input->post('title_menu', true)),
				'link'		=> htmlspecialchars($this->input->post('link', true)),
				'menu_active'	=> htmlspecialchars($this->input->post('menu_active', true)) 
			];

			$this->model_sub_menu->tambahMenu('tb_sub_menu', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Menu Berhasil Di tambahkan! </div>');
			redirect('admin/sub_menu/subMenu','refresh');
		}

	}

	public function ubahSubMenu($id){
		$access_id = ['id_sub_menu'	=> $id];
		$data['title']	= 'Ubah Data SubMenu';
		$data['sub_menu']	= $this->model_sub_menu->ubahMenu('tb_sub_menu', $access_id)->row_array();
		$data['tampil_menu']	= $this->model_menu->tampilMenu('role_acces')->result_array();

		$this->view('admin/sub_menu/ubah_sub_menu', $data, FALSE);
	}

	public function ubahSubMenuAksi($id){
		$access_id = ['id_sub_menu'	=> $id];
		$this->form_validation->set_rules('title_menu', 'Nama Menu', 'trim|required');
		$this->form_validation->set_rules('link', 'Link', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->view('admin/sub_menu/tambah_sub_menu', $data, FALSE);
		} else {
			$data = [
				'access_id'	=> htmlspecialchars($this->input->post('access_id', true)),
				'title_menu'	=> htmlspecialchars($this->input->post('title_menu', true)),
				'link'		=> htmlspecialchars($this->input->post('link', true)), 
				'menu_active'	=> htmlspecialchars($this->input->post('menu_active', true))
			];

			$this->model_sub_menu->ubahMenuAksi('tb_sub_menu', $data, $access_id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Menu Berhasil Di tambahkan! </div>');
			redirect('admin/sub_menu/subMenu','refresh');
		}	
	}

	public function hapusSubMenu($id){
		$access_id = ['id_sub_menu'	=> $id];

		$this->model_sub_menu->hapus('tb_sub_menu', $access_id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Menu Berhasil Di tambahkan! </div>');
		redirect('admin/sub_menu/subMenu','refresh');	
	}

}

/* End of file menu.php */
/* Location: ./application/controllers/admin/menu.php */
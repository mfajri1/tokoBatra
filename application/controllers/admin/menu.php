<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
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

	public function menu()
	{
		$data['title']	= 'Management Menu';
		$data['menu']	= $this->model_menu->tampilMenu('tb_menu')->result_array();
		$data['role']	= $this->user_model->tampil_role('role_acces')->result_array();

		$this->view('admin/menu/menu', $data, FALSE);
	}

	public function tambahMenu(){
		$data['title']	= 'Tambah Management Menu';
		$data['role']	= $this->user_model->tampil_role('role_acces')->result_array();
		$this->view('admin/menu/tambahMenu', $data, FALSE);	
	}

	public function tambahMenuAksi(){
		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->view('admin/menu/tambahMenu', $data, FALSE);
		} else {
			$data = [
				'id_menu'	=> htmlspecialchars($this->input->post('id_menu', true)),
				'nama_menu'	=> htmlspecialchars($this->input->post('nama_menu', true)) 
			];

			$this->model_menu->tambahMenu('tb_menu', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Menu Berhasil Di tambahkan! </div>');
			redirect('admin/menu/menu','refresh');
		}

	}

	public function ubahMenu($id){
		$id_menu = ['id_menu'	=> $id];
		$data['title']	= 'Ubah Data Menu';
		$data['menu']	= $this->model_menu->ubahMenu('tb_menu', $id_menu)->row_array();
		$data['tampil_menu']	= $this->model_menu->tampilMenu('tb_menu')->result_array();

		$this->view('admin/menu/ubah_menu', $data, FALSE);
	}

	public function ubahMenuAksi($id){
		$id_menu = ['id_menu'	=> $id];
		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->view('admin/menu/tambahMenu', $data, FALSE);
		} else {
			$data = [
				'id_menu'	=> htmlspecialchars($this->input->post('id_menu', true)),
				'nama_menu'	=> htmlspecialchars($this->input->post('nama_menu', true))
			];

			$this->model_menu->ubahMenuAksi('tb_menu', $data, $id_menu);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Menu Berhasil Di tambahkan! </div>');
			redirect('admin/menu/menu','refresh');
		}	
	}

	public function hapusMenu($id){
		$id_menu = ['id_menu'	=> $id];

		$this->model_menu->hapus('tb_menu', $id_menu);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Menu Berhasil Di tambahkan! </div>');
		redirect('admin/menu/menu','refresh');	
	}

}

/* End of file menu.php */
/* Location: ./application/controllers/admin/menu.php */
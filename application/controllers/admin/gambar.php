<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// mengambil function checkLogin dari library simple login, ini dibuat jika sudah membuat login, jika belum membuat llogin ini tidak perlu karna ini digunakan untuk melihat session
		// $this->simple_login->checkLogin();
		checkLogin();
	}

	private function view($base, $data){
		$data['konfig'] 	= $this->model_konfig->tampil()->row_array();
		$data['tampil'] = $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();

		$this->load->view('admin/temp/header', $data, FALSE);
		$this->load->view('admin/temp/nav', $data, FALSE);
		$this->load->view('admin/temp/sidebar', FALSE);
		$this->load->view($base, $data, FALSE);
		$this->load->view('admin/temp/footer', FALSE);	
	}

	public function index()
	{
		$data['title'] 	= "Data Gambar Produk";
		
		$data['gambar']	= $this->model_gambar->tampil_data()->result_array();
		

		$this->view('admin/gambar/gambar', $data);
	}

	public function tambah(){
		$data['title'] 	= "Data Gambar Produk";
		$data['produk'] = $this->model_produk->tampil()->result_array();

		$this->view('admin/gambar/tambah', $data);
	}

	public function tambah_aksi(){
		$this->form_validation->set_rules('id_produk', 'id_produk', 'trim|required');	
		$this->form_validation->set_rules('judul_gambar', 'judul_gambar', 'trim|required');	
		$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');	
	}

}

/* End of file gambar.php */
/* Location: ./application/controllers/admin/gambar.php */
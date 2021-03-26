<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// mengambil function checkLogin dari library simple login, ini dibuat jika sudah membuat login, jika belum membuat llogin ini tidak perlu karna ini digunakan untuk melihat session
		// $this->simple_login->checkLogin();
		checkLogin();

	}

	// membuat function tampildata di layout 
	public function view($base, $data){
		// untuk Mengambila data untuk di tampilkan di nav sesuai dengan user login
		$data['tampil'] 	= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
		$data['konfig'] 	= $this->model_konfig->tampil()->row_array();

		$this->load->view('admin/temp/header', $data, FALSE);
		$this->load->view('admin/temp/nav', $data, FALSE);
		$this->load->view('admin/temp/sidebar', FALSE);
		$this->load->view($base, $data, FALSE);
		$this->load->view('admin/temp/footer', FALSE);
	}

	// untuk menu kategori
	public function index(){
		$data['title'] 		= "Data Kategori Produk";
		// mengambil data keseluruhan dari table t_kategori
		$data['kategori'] 	= $this->model_kategori->tampil_data('t_kategori')->result_array();

		$this->view('admin/kategoriView/kategori', $data);	
	}

	public function tambah(){
		$data['title'] 	= "Data Kategori Produk";

		$this->view('admin/kategoriView/tambah', $data);	
	}

	public function tambah_aksi(){
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required|is_unique[t_kategori.nama_kategori]', ['is_unique' => 'Nama Kategori Sudah Ada']);
		$this->form_validation->set_rules('urutan', 'Urutan', 'trim|required|is_unique[t_kategori.urutan]',['is_unique' => 'Urutan Sudah ada']);
		
		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		}else{
			// cara untuk membuat slug
			$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
			$data = [
					 'slug_kategori' 	=> $slug_kategori,
					 'nama_kategori' 	=> htmlspecialchars($this->input->post('nama_kategori', true)),
					 'urutan' 			=> htmlspecialchars($this->input->post('urutan', true)),
					 'tanggal_update' 	=> time()
			];

			$this->model_kategori->tambah('t_kategori', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kategori Berhasil Di tambahkan! </div>');
			redirect('admin/kategori','refresh');
		}	
	}

	public function ubah($id){
		$id_kategori 		= ['id_kategori' => $id];
		$data['kategori'] 	= $this->model_kategori->ubah('t_kategori',$id_kategori)->row_array();

		$data['title'] 		= 'Ubah Data kategori';

		$this->view('admin/kategoriView/ubah', $data);	
	}

	public function editAksi($id){
		$id_kategori 	= ['id_kategori' => $id];

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->ubah($id);			
		}else{
			// cara untuk membuat slug yang mana nama inputanya sama dengan nama_kategori
			$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
			$data = [
				'id_kategori' 	=> htmlspecialchars($this->input->post('id_kategori', true)),
				'slug_kategori' => $slug_kategori,
				'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
				'urutan' => htmlspecialchars($this->input->post('urutan', true)),
				'tanggal_update'=> time()
			];

			$this->model_kategori->ubahDataKategori('t_kategori', $id_kategori, $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kategori Berhasil Di ubah! </div>');
			redirect('admin/kategori','refresh');
		}		
	}

	public function hapus($id){
		$id_kategori = ['id_kategori' => $id];
		$this->model_kategori->hapus('t_kategori', $id_kategori);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data kategori Berhasil Di Hapus! </div>');
		redirect('admin/kategori');
	}	

}

/* End of file kategori.php */
/* Location: ./application/controllers/admin/kategori.php */
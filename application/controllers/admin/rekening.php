<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
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
		$data['title'] 		= "Data Rekening Pembayaran";
		// mengambil data keseluruhan dari table t_kategori
		$data['rekening'] 	= $this->model_rekening->tampil_data('t_rekening')->result_array();

		$this->view('admin/rekeningView/rekening', $data);	
	}

	public function tambah(){
		$data['title'] 	= "Tambah Data Rekening";

		$this->view('admin/rekeningView/tambah', $data);	
	}

	public function tambah_aksi(){
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required');
		$this->form_validation->set_rules('no_rekening', 'No Rekening', 'trim|required');
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		}else{
			$data = [
					 'nama_bank' 	=> htmlspecialchars($this->input->post('nama_bank', true)),
					 'no_rekening' 	=> htmlspecialchars($this->input->post('no_rekening', true)),
					 'nama_pemilik' 			=> htmlspecialchars($this->input->post('nama_pemilik', true))
			];

			$this->model_rekening->tambah('t_rekening', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kategori Berhasil Di tambahkan! </div>');
			redirect('admin/rekening','refresh');
		}	
	}

	public function ubah($id){
		$id_rekening 		= ['id_rekening' => $id];
		$data['rekening'] 	= $this->model_rekening->ubah('t_rekening',$id_rekening)->row_array();

		$data['title'] 		= 'Ubah Data rekening';

		$this->view('admin/rekeningView/ubah', $data);	
	}

	public function ubah_aksi($id){
		$id_rekening 	= ['id_rekening' => $id];

		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required');
		$this->form_validation->set_rules('no_rekening', 'No Rekening', 'trim|required');
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->ubah($id);			
		}else{
			$data = [
				'id_rekening' 	=> htmlspecialchars($this->input->post('id_rekening', true)),
				'nama_bank' 	=> htmlspecialchars($this->input->post('nama_bank', true)),
				'no_rekening' 	=> htmlspecialchars($this->input->post('no_rekening', true)),
				'nama_pemilik' 			=> htmlspecialchars($this->input->post('nama_pemilik', true))
			];

			$this->model_rekening->ubahDataRekenig('t_rekening', $data, $id_rekening);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kategori Berhasil Di ubah! </div>');
			redirect('admin/rekening','refresh');
		}		
	}

	public function hapus($id){
		$id_rekening = ['id_rekening' => $id];
		$this->model_rekening->hapus('t_rekening', $id_rekening);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data kategori Berhasil Di Hapus! </div>');
		redirect('admin/rekening');
	}	

}

/* End of file kategori.php */
/* Location: ./application/controllers/admin/kategori.php */
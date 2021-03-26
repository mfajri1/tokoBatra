<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// mengambil function checkLogin dari library simple login, ini dibuat jika sudah membuat login, jika belum membuat llogin ini tidak perlu karna ini digunakan untuk melihat session
		// $this->simple_login->checkLogin();
		checkLogin();
	}

	private function view($base, $data){
		$data['tampil'] 	= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
		$data['konfig'] 	= $this->model_konfig->tampil()->row_array();

		$this->load->view('admin/temp/header', $data, FALSE);
		$this->load->view('admin/temp/nav', $data, FALSE);
		$this->load->view('admin/temp/sidebar', FALSE);
		$this->load->view($base, $data, FALSE);
		$this->load->view('admin/temp/footer', FALSE);
	}

	public function index()
	{
		$data['title']	= 'Halaman Transaksi';
		$data['transaksi'] 	= $this->model_transaksi->tampil_transaksi('t_header_transaksi')->result_array();

		$this->view('admin/transaksi/transaksi' ,$data);
	}

	public function detail($id){
		$id_header_transaksi 	= ['id_header_transaksi' => $id];
		$data['title']			= 'Detail Data Transaksi';
		$data['transaksi']	 	= $this->model_transaksi->detail_transaksi('t_header_transaksi', $id_header_transaksi)->row_array();

		$this->view('admin/transaksi/detail' ,$data);
	}

	public function hapus($kode){
		$kode_transaksi 	= ['kode_transaksi' => $kode];
		$transaksi = $this->model_transaksi->hapus_foto_transaksi('t_header_transaksi', $kode_transaksi)->row_array();
		unlink('./assets/img/bukti_bayar/' . $transaksi['bukti_bayar']);
		$this->model_transaksi->hapus('t_header_transaksi', $kode_transaksi);
		$this->model_transaksi->hapus('t_transaksi', $kode_transaksi);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pelanggan Berhasil Di Hapus! </div>');
		redirect('admin/transaksi');	 	
	}

}

/* End of file transaksi.php */
/* Location: ./application/controllers/admin/transaksi.php */
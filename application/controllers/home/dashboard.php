<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function view($base, $data){
		$data['konfig']		=$this->model_konfig->tampil()->row_array();

		$this->load->view('dashboarPelanggan/temp/header', $data, FALSE);
		$this->load->view('dashboarPelanggan/temp/nav', $data, FALSE);
		$this->load->view('dashboardPelanggan/home', $data, FALSE);
		$this->load->view('dashboarPelanggan/temp/footer', $data, FALSE);	
	}

	public function index()
	{
		$data['title']			= 'Halaman Home';
		$data['konfig']		=$this->model_konfig->tampil()->row_array();

		$this->load->view('dashboarPelanggan/temp/header', $data);
		$this->load->view('dashboarPelanggan/temp/nav', $data);
		$this->load->view('dashboardPelanggan/home', $data);
		$this->load->view('dashboarPelanggan/temp/footer', $data);	
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard/dashboard.php */
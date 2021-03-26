<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
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
		$data['title'] = 'Dashboard';

		$this->view('admin/dashboard', $data, FALSE);
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run()) {
			
			$username = htmlspecialchars($this->input->post('username'));
			$password = $this->input->post('password');
		
			$this->simple_login->lib_login($username, $password);	
			
		}

		$data['title'] = 'Halaman Login';
		$this->load->view('auth/header', $data, FALSE);
		$this->load->view('auth/login', $data, FALSE);
		$this->load->view('auth/footer', FALSE);
	}

	public function register(){
		$data['title'] = 'Halaman Pendaftaran';
		$this->load->view('auth/header', $data, FALSE);
		$this->load->view('auth/register', FALSE);
		$this->load->view('auth/footer', FALSE);	
	}

	public function registerAksi(){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]|matches[password2]',[
				'matches' => 'Password Dont match!','min_length'=>'Password Kurang panjang'
			]);
		$this->form_validation->set_rules('password2','Password','trim|required|matches[password]');	

		if ($this->form_validation->run() == FALSE) {
			$this->register();
		} else {
			$data = [
				'nama'	=> htmlspecialchars($this->input->post('nama', true)),
				'email'	=> htmlspecialchars($this->input->post('email', true)),
				'username'	=> htmlspecialchars($this->input->post('username', true)),
				'password'	=> sha1($this->input->post('password', true)),
				'alamat'	=> 'kosong',
				'telp'	=> 'kosong',
				'akses_level'	=> 2,
				'active'	=> 1,
				'tanggal_daftar'	=> time(),
				'tanggal_update'	=> time(),
				'foto'				=> 'default.jpg'
			];

			$this->user_model->inputDataPengguna('users', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pelanggan Berhasil Di tambahkan! </div>');
			redirect('dashboard');
		}
	}

	public function logout(){
		// menjalankan library simple_login di folder library
		$this->simple_login->logout();	
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
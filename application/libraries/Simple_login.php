<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();

        // load user_model ke dalam simple_library
		$this->CI->load->model('user_model');
	}

	// membuat library untuk login
	public function lib_login($username, $password){
		// mengambil satu baris data dari database sesuai dengan username dan password
		$check = $this->CI->user_model->login($username, $password)->row_array();
		if ($check) {
			// untuk melakukan Aktivasi
			if ($check['active'] == 1) {
				// masukkan id_user, nama, akses_level ke session
				$akses_level 	= $check['akses_level'];
				$id_user 		= $check['id_user'];
				$nama 			= $check['nama'];
				$email 			= $check['email'];
				// buat session untuk login
				$this->CI->session->set_userdata('id_user', $id_user);
				$this->CI->session->set_userdata('akses_level', $akses_level);
				$this->CI->session->set_userdata('nama', $nama);
				$this->CI->session->set_userdata('username', $username);
				$this->CI->session->set_userdata('email', $email);

				// cek jika dia admin atau member
				if ($this->CI->session->userdata('akses_level') == 1) {
					redirect('member/member/home');	
				}else{
					redirect('member/member/home');
				}	
			}else {
				// jika belum activasi
				$this->CI->session->set_flashdata('pesan', '<div class="alert alert-warning" >Anda Belum Melakukan Activasi! </div>');
				redirect('auth/login');
			}
		}else {
			$this->CI->session->set_flashdata('pesan', '<div class="alert alert-warning" >Username Atau Password Salah! </div>');
			redirect('auth/login');
		}	
	}

	// public function checkLogin(){
	// 	// memeriksa sesion nya ada atau belum
	// 	if ($this->CI->session->userdata('username') == "") {
	// 		$this->CI->session->set_flashdata('pesan', '<div class="alert alert-success">Anda Belum Login! </div>');
	// 		redirect('auth/login');
	// 	}
	// }

	public function logout(){
		// untuk keluar atau menghilangkan session 
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');

		// Setelah sesion berhasil di hapus maka kembalikan ke halaman login
		$this->CI->session->set_flashdata('pesan', '<div class="alert alert-success">Anda Berhasil Logout! </div>');
		redirect('dashboard');
	}

	

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */

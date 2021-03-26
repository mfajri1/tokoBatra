<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

		$this->load->view('admin/temp/header', $data, FALSE);
		$this->load->view('admin/temp/nav',$data, FALSE);
		$this->load->view('admin/temp/sidebar',$data , FALSE);
		$this->load->view($base, $data, FALSE);
		$this->load->view('admin/temp/footer', $data, FALSE);
	}

	public function index()
	{
		$data['title'] = 'Data Pengguna';
		$data['user'] = $this->user_model->tampil_data('users')->result_array();

		$this->view('admin/user/user', $data, FALSE);
		
	}

	public function _rule(){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]|matches[password2]',[
				'matches' => 'Password Dont match!','min_length'=>'Password Kurang panjang'
			]);
		$this->form_validation->set_rules('password2','Password','trim|required|matches[password]');	
	}

	public function tambah(){
		$data['title'] = 'Tambah Pengguna';

		$this->view('admin/user/tambah', $data, FALSE);
	}

	public function tambah_aksi(){
		// mengambil function checkLogin dari library simple login, ini dibuat jika sudah membuat login, jika belum membuat llogin ini tidak perlu karna ini digunakan untuk melihat session
		$this->simple_login->checkLogin();

		$this->_rule();

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Tambah Pengguna';

			$this->view('admin/user/tambah', $data, FALSE);

		}else{
			$data = [
				'nama' 			=> htmlspecialchars($this->input->post('nama', true)),
				'email' 		=> htmlspecialchars($this->input->post('email', true)),
				'username' 		=> htmlspecialchars($this->input->post('username', true)),
				'password' 		=> SHA1($this->input->post('password')),
				'alamat' 		=> htmlspecialchars($this->input->post('alamat', true)),
				'telp' 		=> htmlspecialchars($this->input->post('telp', true)),
				'akses_level' 	=> 2,
				'active'		=> 1,
				'tanggal_daftar' => time(),
				'tanggal_update' => time(),
				'foto' => 'default.jpg'
			];
			$this->user_model->inputDataPengguna('users', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pelanggan Berhasil Di tambahkan! </div>');
			redirect('admin/user');
		}	
	}

	public function ubah($id){
		$id_user = ['id_user' => $id];
		$data['user'] 	= $this->user_model->ubah('users',$id_user)->row_array();
		$data['title'] 	= 'Ubah Data Pengguna';
		$data['role']	= $this->user_model->tampil_role('role_acces')->result_array();

		$this->view('admin/user/ubah', $data, FALSE);	
	}

	public function ubah_aksi($id){
		$id_user = ['id_user' => $id];
				
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('akses_level','Akse Level','trim|required');

		if ($this->form_validation->run()) {
			if (!empty($_FILES['foto']['name'])) {
				$config['upload_path'] = './assets/img/myprofile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] 	= TRUE; //enkripsi nama file
				$config['max_size']  = '2000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				
				$this->load->library('upload', $config);
				$error = array('error' => $this->upload->display_errors());
				if ( ! $this->upload->do_upload('foto')){
					$data['user'] 		= $this->user_model->ubah('users', $id_user)->row_array();
					$data['role']	= $this->user_model->tampil_role('role_acces')->result_array();
					$data['error'] 		= $this->upload->display_errors();
					$data['title'] 		= 'Ubah Data Pengguna';

					$this->view('admin/user/ubah', $data, FALSE);
				}
				else{
					$upload_gambar = array('upload_data' => $this->upload->data());
					// awal membuat thumbnail dari gambar
					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= './assets/img/myprofile/' . $upload_gambar['upload_data']['file_name'];
					$config['new_image'] 		= './assets/img/myprofile/thumbs/'; //bermasalah baru, gak bisa buat thumbnail
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 100;//dalm ukuran pixel
					$config['height']       	= 100;
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();
					// end thumbnail
					$data = [
						'id_user' => htmlspecialchars($this->input->post('id_user', true)),
						'nama' => htmlspecialchars($this->input->post('nama', true)),
						'email' => htmlspecialchars($this->input->post('email', true)),
						'username' => htmlspecialchars($this->input->post('username', true)),
						'password' => htmlspecialchars($this->input->post('password')),
						'alamat' => htmlspecialchars($this->input->post('alamat')),
						'telp' => htmlspecialchars($this->input->post('telp')),
						'akses_level' => htmlspecialchars($this->input->post('akses_level', true)),
						'active'		=> 1,
						'tanggal_daftar' => htmlspecialchars($this->input->post('tanggal_daftar', true)),
						'tanggal_update' => time(),
						'foto' => $upload_gambar['upload_data']['file_name']
					];
					$this->user_model->ubahDataPengguna('users', $data, $id_user);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pelanggan Berhasil Di Ubah! </div>');
					redirect('admin/user');
				}
			}else{
				$data = [
						'id_user' => htmlspecialchars($this->input->post('id_user', true)),
						'nama' => htmlspecialchars($this->input->post('nama', true)),
						'email' => htmlspecialchars($this->input->post('email', true)),
						'username' => htmlspecialchars($this->input->post('username', true)),
						'password' => htmlspecialchars($this->input->post('password')),
						'alamat' => htmlspecialchars($this->input->post('alamat')),
						'telp' => htmlspecialchars($this->input->post('telp')),
						'akses_level' => htmlspecialchars($this->input->post('akses_level', true)),
						'active'		=> 1,
						'tanggal_daftar' => htmlspecialchars($this->input->post('tanggal_daftar', true)),
						'tanggal_update' => time()
					// 'foto' => $upload_gambar['upload_data']['file_name']
				];
				$this->user_model->ubahDataPengguna('users', $data, $id_user);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pelanggan Berhasil Di Ubah! </div>');
				redirect('admin/user');
			}
		}
		
		$data['title'] = 'Ubah Data Pengguna';
		$data['user'] 		= $this->user_model->ubah('users', $id_user)->row_array();
		$data['role']	= $this->user_model->tampil_role('role_acces')->result_array();

		$this->view('admin/user/ubah', $data, FALSE);
	}

	public function hapus($id){
		$id_user = ['id_user' => $id];
		// hapus gambar dari directory
		$user = $this->user_model->tampil_hapus('users', $id_user)->row_array();
		unlink('./assets/img/myprofile/' . $user['foto']);
		// end
		$this->user_model->hapus_pelanggan('users', $id_user);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pelanggan Berhasil Di Hapus! </div>');
		redirect('admin/user');	
	}

	public function detail($id){
		$id_user	= ['id_user' => $id];
		$data['title'] = 'Detail Data Pengguna';
		$data['detail'] 		= $this->user_model->detailPengguna('users', $id_user)->row_array();

		$this->view('admin/user/detail', $data, FALSE);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {
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
	// controller halaman konfigurasi umum
	public function konfig(){
		$data['title'] 		= "Konfigurasi Umum";
		$data['konfig'] 	= $this->model_konfig->tampil()->row_array();

		$this->view('admin/konfigurasi/kUmum.php', $data, FALSE);
	}

	public function ubahUmumAksi(){
		$this->form_validation->set_rules('nama_web', 'Nama Website', 'trim|required|is_unique[t_kategori.nama_kategori]', ['is_unique' => 'Nama Kategori Sudah Ada']);
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] 		= "Konfigurasi Umum";
			$data['tampil'] 	= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();

			$this->view('admin/konfigurasi/kUmum.php', $data, FALSE);
		}else{
			$data = [
				'id_konfigurasi'	=> $this->input->post('id_konfigurasi', true),	
				'nama_web' 			=> htmlspecialchars($this->input->post('nama_web', true)),
				'tagline' 			=> htmlspecialchars($this->input->post('tagline', true)),
				'email' 			=> htmlspecialchars($this->input->post('email', true)),
				'website' 			=> htmlspecialchars($this->input->post('website', true)),
				'keywords' 			=> htmlspecialchars($this->input->post('keywords', true)),
				'metatext' 			=> htmlspecialchars($this->input->post('metatext', true)),
				'telp' 				=> htmlspecialchars($this->input->post('telp', true)),
				'alamat' 			=> htmlspecialchars($this->input->post('alamat', true)),
				'fb' 				=> htmlspecialchars($this->input->post('fb', true)),
				'instagram' 		=> htmlspecialchars($this->input->post('instagram', true)),
				'wa' 				=> htmlspecialchars($this->input->post('wa', true)),
				'deskripsi' 		=> htmlspecialchars($this->input->post('deskripsi', true)),
				'rekening_pembayaran' => htmlspecialchars($this->input->post('rekening_pembayaran', true)),
				'tanggal_update' 	=> time()
			];

			$this->model_konfig->ubah('t_konfigurasi', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kategori Berhasil Di tambahkan! </div>');
			redirect('admin/konfigurasi/konfig', 'refresh');
		}	
	}

	// halaman Konfigurasi Logo
	public function logo(){
		$data['title'] 		= "konfigurasi Logo";

		$this->view('admin/konfigurasi/kLogo.php', $data, FALSE);	
	}

	public function ubahLogoAksi(){
		$this->form_validation->set_rules('nama_web', 'Nama Web', 'trim|required');

		if ($this->form_validation->run()) {
			// proses checking gambar jika diubah atau tidak
			if (!empty($_FILES['logo']['name'])) {
				// mengedit data yang mana gambar di upload atau di ganti
				$config['upload_path'] 		= './assets/img/konfig/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['encrypt_name'] 	= TRUE; //enkripsi nama file
				$config['max_size']  		= '2400';//dalam kb
				$config['max_width']  		= '4000';
				$config['max_height']  		= '4000';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('logo')){
					$data['title']		= "Ubah Logo Konfigurasi";
					$data['users']		= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
					$data['error'] 		= $this->upload->display_errors();//untuk menampilkan error upload gambar 

					$this->view('admin/konfigurasi/logo' ,$data);	

				}else{
					$upload_gambar = array('upload_data' => $this->upload->data());
					// awal membuat thumbnail dari gambar
					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= './assets/img/konfig/' . $upload_gambar['upload_data']['file_name'];
					$config['new_image'] 		= '/assets/img/konfig/thumbs/'; //bermasalah baru, gak bisa buat thumbnail
					$config['encrypt_name'] 	= TRUE; //enkripsi nama file
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 100;//dalm ukuran pixel
					$config['height']       	= 100;
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();
					// end thumbnail

					// hapus logo di directory
					$logok = $this->model_konfig->tampil()->row_array();
					unlink('./assets/img/konfig/' . $logok['logo']);
					// end logo hapus

					$data = [
						'id_konfigurasi' 		=> htmlspecialchars($this->input->post('id_konfigurasi', true)),
						'nama_web' 	=> htmlspecialchars($this->input->post('nama_web', true)),
						'logo' 		=> $upload_gambar['upload_data']['file_name'],
						'tanggal_update'=> time(),
					];

					$this->model_konfig->ubah('t_konfigurasi', $data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Logo Konfigurasi Berhasil Di Ubah! </div>');
					redirect('admin/konfigurasi/logo');
				}
			}else{
				// edit data tapi tidak ganti gambar
				$data = [
						'id_konfigurasi' 		=> htmlspecialchars($this->input->post('id_konfigurasi', true)),
						'nama_web' 	=> htmlspecialchars($this->input->post('nama_web', true)),
						'tanggal_update'=> time(),
					];
					$this->model_konfig->ubah('t_konfigurasi', $data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Logo Konfigurasi Berhasil Di Ubah! </div>');
					redirect('admin/konfigurasi/logo');
			}
			// end checking
		}
		$data['title']		= "Ubah Logo Konfigurasi";
		$data['users']		= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();

		$this->view('admin/konfigurasi/logo' ,$data);
	}

	// halaman Konfigurasi Icon
	public function icon(){
		$data['title'] 		= "konfigurasi Icon";
		$data['konfig'] 	= $this->model_konfig->tampil()->row_array();

		$this->view('admin/konfigurasi/kIcon.php', $data, FALSE);	
	}

	public function ubahIconAksi(){
		$this->form_validation->set_rules('nama_web', 'Nama Web', 'trim|required');

		if ($this->form_validation->run()) {
			// proses checking gambar jika diubah atau tidak
			if (!empty($_FILES['icon']['name'])) {
				// mengedit data yang mana gambar di upload atau di ganti
				$config['upload_path'] 		= './assets/img/konfig/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['encrypt_name'] 	= TRUE; //enkripsi nama file
				$config['max_size']  		= '2400';//dalam kb
				$config['max_width']  		= '2024';
				$config['max_height']  		= '2024';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('icon')){
					$data['title']		= "Ubah Icon Konfigurasi";
					$data['users']		= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
					$data['error'] 		= $this->upload->display_errors();//untuk menampilkan error upload gambar 

					$this->view('admin/konfigurasi/icon' ,$data);	

				}else{
					$upload_gambar = array('upload_data' => $this->upload->data());
					// awal membuat thumbnail dari gambar
					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= './assets/img/konfig/' . $upload_gambar['upload_data']['file_name'];
					$config['new_image'] 		= '/assets/img/konfig/thumbs/'; //bermasalah baru, gak bisa buat thumbnail
					$config['encrypt_name'] 	= TRUE; //enkripsi nama file
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 100;//dalm ukuran pixel
					$config['height']       	= 100;
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();
					// end thumbnail

					// hapus logo di directory
					$logok = $this->model_konfig->tampil()->row_array();
					unlink('./assets/img/konfig/' . $logok['icon']);
					// end logo hapus

					$data = [
						'id_konfigurasi' 		=> htmlspecialchars($this->input->post('id_konfigurasi', true)),
						'nama_web' 	=> htmlspecialchars($this->input->post('nama_web', true)),
						'icon' 		=> $upload_gambar['upload_data']['file_name'],
						'tanggal_update'=> time(),
					];
					$this->model_konfig->ubah('t_konfigurasi', $data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Logo Konfigurasi Berhasil Di Ubah! </div>');
					redirect('admin/konfigurasi/icon');
				}
			}else{
				// edit data tapi tidak ganti gambar
				$data = [
						'id_konfigurasi' 		=> htmlspecialchars($this->input->post('id_konfigurasi', true)),
						'nama_web' 	=> htmlspecialchars($this->input->post('nama_web', true)),
						'tanggal_update'=> time(),
					];
					$this->model_konfig->ubah('t_konfigurasi', $data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Logo Konfigurasi Berhasil Di Ubah! </div>');
					redirect('admin/konfigurasi/icon');
			}
			// end checking
		}
		$data['title']		= "Ubah Logo Konfigurasi";
		$data['users']		= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();

		$this->view('admin/konfigurasi/icon' ,$data);
	}
	

}

/* End of file konfigurasi.php */
/* Location: ./application/controllers/admin/konfigurasi.php */
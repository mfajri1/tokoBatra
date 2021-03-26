<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// mengambil function checkLogin dari library simple login, ini dibuat jika sudah membuat login, jika belum membuat llogin ini tidak perlu karna ini digunakan untuk melihat session
		// $this->simple_login->checkLogin();
		checkLogin();
	}

	// membuat function tampildata di layout 
	private function view($base, $data){
		$data['tampil'] 	= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
		$data['konfig'] 	= $this->model_konfig->tampil()->row_array();

		$this->load->view('admin/temp/header', $data, FALSE);
		$this->load->view('admin/temp/nav', $data, FALSE);
		$this->load->view('admin/temp/sidebar', FALSE);
		$this->load->view($base, $data, FALSE);
		$this->load->view('admin/temp/footer', FALSE);
	}

	// untuk menu data Produk
	public function index()
	{
		$data['title'] 		= "Data Produk";
		$data['produk'] 	= $this->model_produk->tampil()->result_array();
		$data['kategori'] 	= $this->model_kategori->tampil_data('t_kategori')->result_array();
		
		$this->view('admin/produk/produk' ,$data);	
	}

	public function tambah(){
		$data['title'] 		= "Tambah Data Produk";
		$data['produk']		= $this->model_produk->tampil()->result_array();
		$data['kategori'] 	= $this->model_kategori->tampil_data('t_kategori')->result_array();

		// panggil function view
		$this->view('admin/produk/tambah' ,$data);
	}

	public function tambah_aksi(){
		$this->form_validation->set_rules('kode_produk', 'Kode Produk', 'trim|required');	
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required|is_unique[t_produk.nama_produk]', ['is_unique' => 'Kode Produk Sudah Ada']);

		$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk', true), 'dash', TRUE);	

		if ($this->form_validation->run()) {
			$config['upload_path'] 		= './assets/img/produk/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['encrypt_name'] 	= TRUE; //enkripsi nama file
			$config['max_size']  		= '2400';//dalam kb
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
				$data['title']		= "Tambah Data Produk";
				$data['produk'] 	= $this->model_produk->tampil()->result_array();
				$data['error'] 		= $this->upload->display_errors();//untuk menampilkan error upload gambar 

				$this->view('admin/produk/tambah' ,$data);

			}else{
				$upload_gambar = array('upload_data' => $this->upload->data());
				// awal membuat thumbnail dari gambar
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= './assets/img/produk/' . $upload_gambar['upload_data']['file_name'];
				$config['new_image'] 		= '/assets/img/produk/thumbs/'; //bermasalah baru, gak bisa buat thumbnail
				$config['encrypt_name'] 	= TRUE; //enkripsi nama file
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width']         	= 100;//dalm ukuran pixel
				$config['height']       	= 100;
				$config['thumb_marker']		= '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				// end thumbnail
				$data = [
					'id_user' 		=> $this->session->userdata('id_user'),
					'id_kategori' 	=> htmlspecialchars($this->input->post('id_kategori', true)), 
					'kode_produk' 	=> htmlspecialchars($this->input->post('kode_produk', true)), 
					'nama_produk' 	=> htmlspecialchars($this->input->post('nama_produk', true)), 
					'slug_produk' 	=> $slug_produk, 
					'keterangan' 	=> htmlspecialchars($this->input->post('keterangan', true)), 
					'keywords' 		=> htmlspecialchars($this->input->post('keywords', true)), 
					harga 			=> htmlspecialchars($this->input->post('harga', true)), 
					stok 			=> htmlspecialchars($this->input->post('stok', true)),
					'gambar' 		=> $upload_gambar['upload_data']['file_name'],
					berat 			=> htmlspecialchars($this->input->post('berat', true)),
					'ukuran' 		=> htmlspecialchars($this->input->post('ukuran', true)),
					'status_produk' => htmlspecialchars($this->input->post('status_produk', true)),
					'tanggal_post' 	=> time(),
					'tanggal_update'=> time(),
				];
				$this->model_produk->tambahData('t_produk', $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Produk Berhasil Di Ubah! </div>');
				redirect('admin/produk');
			}
		}
		$data['title']		= "Tambah Data Produk";
		$data['produk'] 	= $this->model_produk->tampil()->result_array();

		$this->view('admin/produk/tambah' ,$data);	
	}

	public function hapus($id){
		$id_produk = ['id_produk' => $id];
		// proses hapus directory gambar
		$produk = $this->model_produk->detail($id_produk)->row_array();
		unlink('./assets/img/produk/' . $produk['gambar']);
		// end ha[us]
		$this->model_produk->hapus_produk('t_produk', $id_produk);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pelanggan Berhasil Di Hapus! </div>');
		redirect('admin/produk');	
	}

	public function ubah($id){
		$id_produk 			= ['id_produk' => $id];
		$data['produk'] 	= $this->model_produk->ubah($id_produk)->row_array();
		$data['title']		= "Ubah Data Produk : " . $data['produk']['nama_produk'];
		$data['kategori'] 	= $this->model_kategori->tampil_data('t_kategori')->result_array();

		$this->view('admin/produk/ubah' ,$data);	
			
	}

	public function ubah_aksi($id){
		$id_produk = ['id_produk' => $id];
		$this->form_validation->set_rules('kode_produk', 'Kode Produk', 'trim|required');	
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
		
		$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk', true), 'dash', TRUE);

		if ($this->form_validation->run()) {
			// proses checking gambar jika diubah atau tidak
			if (!empty($_FILES['gambar']['name'])) {
				// mengedit data yang mana gambar di upload atau di ganti
				$config['upload_path'] 		= './assets/img/produk/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['encrypt_name'] 	= TRUE; //enkripsi nama file
				$config['max_size']  		= '2400';//dalam kb
				$config['max_width']  		= '2024';
				$config['max_height']  		= '2024';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar')){
					$data['title']		= "Ubah Data Produk";
					$data['produk'] 	= $this->model_produk->tampil($id_produk)->row_array();
					$data['users']		= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
					$data['kategori'] 	= $this->model_kategori->tampil_data('t_kategori')->result_array();
					$data['error'] 		= $this->upload->display_errors();//untuk menampilkan error upload gambar 

					$this->view('admin/produk/tambah' ,$data);	

				}else{
					$upload_gambar = array('upload_data' => $this->upload->data());
					// awal membuat thumbnail dari gambar
					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= './assets/img/produk/' . $upload_gambar['upload_data']['file_name'];
					$config['new_image'] 		= '/assets/img/produk/thumbs/'; //bermasalah baru, gak bisa buat thumbnail
					$config['encrypt_name'] 	= TRUE; //enkripsi nama file
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 100;//dalm ukuran pixel
					$config['height']       	= 100;
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();
				// end thumbnail
					$data = [
						'id_user' 		=> htmlspecialchars($this->input->post('id_user', true)),
						'id_kategori' 	=> htmlspecialchars($this->input->post('id_kategori', true)), 
						'kode_produk' 	=> htmlspecialchars($this->input->post('kode_produk', true)), 
						'nama_produk' 	=> htmlspecialchars($this->input->post('nama_produk', true)), 
						'slug_produk' 	=> $slug_produk, 
						'keterangan' 	=> htmlspecialchars($this->input->post('keterangan', true)), 
						'keywords' 		=> htmlspecialchars($this->input->post('keywords', true)), 
						harga 			=> htmlspecialchars($this->input->post('harga', true)), 
						stok 			=> htmlspecialchars($this->input->post('stok', true)),
						'gambar' 		=> $upload_gambar['upload_data']['file_name'],
						berat 			=> htmlspecialchars($this->input->post('berat', true)),
						'ukuran' 		=> htmlspecialchars($this->input->post('ukuran', true)),
						'status_produk' => htmlspecialchars($this->input->post('status_produk', true)),
						'tanggal_post' 	=> htmlspecialchars($this->input->post('tanggal_post', true)),
						'tanggal_update'=> time(),
					];
					$this->model_produk->ubahData('t_produk', $data, $id_produk);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Produk Berhasil Di Ubah! </div>');
					redirect('admin/produk');
				}
			}else{
				// edit data tapi tidak ganti gambar
				$data = [
					'id_user' 		=> htmlspecialchars($this->input->post('id_user', true)),
					'id_kategori' 	=> htmlspecialchars($this->input->post('id_kategori', true)), 
					'kode_produk' 	=> htmlspecialchars($this->input->post('kode_produk', true)), 
					'nama_produk' 	=> htmlspecialchars($this->input->post('nama_produk', true)), 
					'slug_produk' 	=> $slug_produk, 
					'keterangan' 	=> htmlspecialchars($this->input->post('keterangan', true)), 
					'keywords' 		=> htmlspecialchars($this->input->post('keywords', true)), 
					harga 			=> htmlspecialchars($this->input->post('harga', true)), 
					stok 			=> htmlspecialchars($this->input->post('stok', true)),
					// 'gambar' 		=> $upload_gambar['upload_data']['file_name'],
					berat 			=> htmlspecialchars($this->input->post('berat', true)),
					'ukuran' 		=> htmlspecialchars($this->input->post('ukuran', true)),
					'status_produk' => htmlspecialchars($this->input->post('status_produk', true)),
					'tanggal_post' 	=> htmlspecialchars($this->input->post('tanggal_post', true)),
					'tanggal_update'=> time(),
				];
				$this->model_produk->ubahData('t_produk', $data, $id_produk);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Produk Berhasil Di Ubah! </div>');
				redirect('admin/produk');
			}
			// end checking
		}
		$data['title']		= "Tambah Data Produk";
		$data['produk'] 	= $this->model_produk->tampil($id_produk)->row_array();
		$data['kategori'] 	= $this->model_kategori->tampil_data('t_kategori')->result_array();
		$data['users']		= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();

		$this->view('admin/produk/tambah' ,$data);

	}

	public function tampil($id){
		$id_produk 			= ['id_produk' => $id];
		$data['title']		= "Detail Data Produk";
		$data['produk'] 	= $this->model_produk->detail($id_produk)->row_array();
		$data['kategori'] 	= $this->model_kategori->tampil_data('t_kategori')->result_array();
		$data['users']		= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();

		$this->view('admin/produk/tampil' ,$data);	

	}
	// tambah Gambar
	public function addGambar($id){
		$id_produk = ['id_produk' => $id];
		
		$data['users']		= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
		$data['produk'] 	= $this->model_produk->detail($id_produk)->row_array();
		$data['title']		= "Tambah Gambar Produk : " . $data['produk']['nama_produk'];
		$data['gambar']		= $this->model_produk->tGambar('t_gambar', $id_produk)->result_array();

		$this->view('admin/produk/linkGambar' ,$data);
	}
	// aksi tambah Gambar
	public function aksiGambar($id){

		$id_produk = ['id_produk' => $id];

		$this->form_validation->set_rules('judul_gambar', 'Judul Gambar', 'trim|required');	
		
		if ($this->form_validation->run()) {
			// proses checking gambar jika diubah atau tidak
			if (!empty($_FILES['gambar']['name'])) {
				// mengedit data yang mana gambar di upload atau di ganti
				$config['upload_path'] 		= './assets/img/produk/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['encrypt_name'] 	= TRUE; //enkripsi nama file
				$config['max_size']  		= '2400';//dalam kb
				$config['max_width']  		= '2024';
				$config['max_height']  		= '2024';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar')){
					$data['users']		= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
					$data['tampil'] 	= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
					$data['produk'] 	= $this->model_produk->detail($id_produk)->row_array();
					$data['title']		= "Tambah Gambar Produk : " . $data['produk']['nama_produk'];
					$data['gambar']		= $this->model_produk->tGambar('t_gambar', $id_produk)->result_array();
					$data['error'] 		= $this->upload->display_errors();//untuk menampilkan error upload gambar 

					$this->view('admin/produk/addGambar/'. $id ,$data);	

				}else{
					$upload_gambar = array('upload_data' => $this->upload->data());
					// awal membuat thumbnail dari gambar
					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= './assets/img/produk/' . $upload_gambar['upload_data']['file_name'];
					$config['new_image'] 		= '/assets/img/produk/thumbs/'; //bermasalah baru, gak bisa buat thumbnail
					$config['encrypt_name'] 	= TRUE; //enkripsi nama file
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 100;//dalm ukuran pixel
					$config['height']       	= 100;
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();
				// end thumbnail
					$data = [
						'id_produk' 		=> $id,
						'judul_gambar' 		=> htmlspecialchars($this->input->post('judul_gambar', true)),
						'gambar' 		=> $upload_gambar['upload_data']['file_name'],
						'tanggal_update'=> time(),
					];
					$this->model_produk->tambahAddGambar('t_gambar', $data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Produk Berhasil Di Ubah! </div>');
					redirect('admin/produk/addGambar/'. $id);
				}
			}else{
				// edit data tapi tidak ganti gambar
				$data = [
						'id_produk' 		=> $id,
						'judul_gambar' 		=> htmlspecialchars($this->input->post('judul_gambar', true)),
						'tanggal_update'=> time(),
					];
					$this->model_produk->tambahAddGambar('t_gambar', $data, $id_produk);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Produk Berhasil Di Ubah! </div>');
					redirect('admin/produk/addGambar/' . $id);
			}
			// end checking
		}
		$data['users']		= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();
		$data['produk'] 	= $this->model_produk->detail($id_produk)->row_array();
		$data['title']		= "Tambah Gambar Produk : " . $data['produk']['nama_produk'];
		$data['gambar']		= $this->model_produk->tGambar('t_gambar', $id_produk)->result_array();

		$this->view('admin/produk/addGambar/' . $id ,$data);	
	}
	// hapus gambar produk
	public function hapus_gambar($idProduk, $idGambar){
		$id_gambar = ['id_gambar' => $idGambar];
		$id_produk = ['id_produk' => $idProduk];
		// proses hapus directory gambar
		$gambar= $this->model_produk->detail_gambar('t_gambar', $id_gambar)->row_array();
		unlink('./assets/img/produk/' . $gambar['gambar']);
		// end ha[us]
		$this->model_produk->hapus_gambar('t_gambar', $id_gambar);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data gambar Berhasil Di Hapus! </div>');
		redirect('admin/produk/addGambar/' . $idProduk . '/' . $idGambar);	
	}

}

/* End of file produk.php */
/* Location: ./application/controllers/admin/produk.php */
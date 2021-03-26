<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// mengambil function checkLogin dari library simple login, ini dibuat jika sudah membuat login, jika belum membuat llogin ini tidak perlu karna ini digunakan untuk melihat session
		// $this->simple_login->checkLogin();
		checkLogin();

	}

	public function view($base, $data){
		$data['konfig']		=$this->model_konfig->tampil()->row_array(); 
		$data['tampil'] 	= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();		
		$data['role']	= $this->model_sub_menu->tampilMenuHome('role_acces', $this->session->userdata('akses_level'))->result_array();
		$data['kategori']	= $this->model_produk->tampilKategoriHome()->result_array();

		$this->load->view('temp_front/header', $data, FALSE);
		$this->load->view('temp_front/nav', $data, FALSE);
		$this->load->view( $base, $data, FALSE);
		$this->load->view('temp_front/footer', $data, FALSE);	
	}

	public function home()
	{	
		$data['title']			= 'Halaman Home';
		$data['nama_sub_menu']	= 'home';
		$data['produk']			= $this->model_produk->tampil()->result_array();
		$this->view('home/home', $data, FALSE);

	}
	// profile
	public function profile(){
		$data['title']			= 'Halaman Profile';
		$data['nama_sub_menu']	= 'profile';
		$data['profile']		= $this->user_model->tampilProfile($this->session->userdata('username'))->row_array();
		
		$this->view('home/profile', $data, FALSE);
	}

	public function edit_profile(){
		$data['title']			= 'Halaman Edit Profile';
		$data['nama_sub_menu']	= 'profile';
		$data['profile']		= $this->user_model->tampilProfile($this->session->userdata('username'))->row_array();
		
		$this->view('home/editProfile', $data, FALSE);	
	}

	public function aksiEditProfile(){
		$id = $this->session->userdata('id_user');
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
					$data['title'] 		= 'Ubah Data Pengguna';
					$data['nama_sub_menu']	= 'profile';
					$data['profile']		= $this->user_model->tampilProfile($this->session->userdata('username'))->row_array();
					$data['error'] 		= $this->upload->display_errors();

					$this->view('home/editProfile', $data, FALSE);
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
					redirect('member/member/edit_profile');
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
				redirect('member/member/edit_profile');
			}
		}
		
		$data['title'] 		= 'Ubah Data Pengguna';
		$data['nama_sub_menu']	= 'profile';
		$data['profile']		= $this->user_model->tampilProfile($this->session->userdata('username'))->row_array();

		$this->view('home/editProfile', $data, FALSE);
	}
	// end profile

	public function detailProduk($id){
		$id_produk = ['id_produk' => $id];
		$data['title']	= "Detail Produk";	
		$data['nama_sub_menu']	= 'produk';

		$data['produk']			= $this->model_produk->detail($id_produk)->row_array();
		$data['gambar']			= $this->model_produk->detail_gambar('t_gambar', $id_produk)->result_array();
		$data['produk_related']	= $this->model_produk->tampilRelatedDetail('t_produk')->result_array();

		$this->view('home/detail_produk', $data, FALSE);
	}

	public function produk(){
		$data['title']	= "Menu Produk";
		$data['nama_sub_menu']	= 'produk';
		// membuat pagination
		$total_produk = $this->model_produk->totalProduk('t_produk')->row_array();
		$config['base_url'] 		= base_url() . 'member/member/produk/';
		$config['total_rows'] 		= $total_produk['total_produk']; //menghitung jumlah baris di database dengan code CI
		$config['use_page_numbers']	= true;
		$config['per_page'] 		= 9;
		$config['uri_segment'] 		= 4;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] 		= floor($choice);
		// $config['num_links']		= 5;
		// style pagination
		// untuk keseluruhan
		$config['full_tag_open']	= '<div class="pagination flex-m flex-w">';
		$config['full_tag_close'] 	= '</div>';
		// number pertama jika tab nya aktif
		$config['first_link'] 		= 'First';
		$config['cur_tag_open'] 	= '<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">';
		$config['cur_tag_close'] 	= '</a>';
		// tombol next
		$config['next_link'] 		= '<span class="btn btn-sm next">Next &raquo;</span>';
		$config['next_tag_open'] 	= '';
		$config['next_tag_close'] 	= '';
		// tombol previus
		$config['prev_link'] 		= '<span class="btn btn-sm prev">&laquo; Prev</span>';
		$config['prev_tag_open'] 	= '';
		$config['prev_tag_close'] 	= '';

		// tambahan
		$config['first_tag_open'] 	= '<span class="btn btn-sm btn-abu">sd';
		$config['first_tag_close'] 	= '</span>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<span class="btn btn-sm btn-abu">hd';
		$config['last_tag_close'] 	= '</span>';
		$config['first_url']		= base_url(). '/member/member/produk/';


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? ($this->uri->segment(4)-1) * $config['per_page'] :0;
		$data['produk']	= $this->model_produk->tampilProdukHome($config['per_page'], $data['page'])->result_array();
		$data['pagin']	= $this->pagination->create_links();
		// end pagination

		$this->view('home/produk', $data, FALSE);
	}

	public function tampil_produk($id){
		$id_kategori = ['t_produk.id_kategori' => $id];
		$data['title']	= "Menu Produk";
		$data['nama_sub_menu']	= 'produk';
		
		$data['kategori']	= $this->model_produk->tampilKategoriHome()->result_array();
		$total_produk_tampil = $this->model_produk->totalProdukTampil('t_produk', $id_kategori)->row_array();
		// print_r($data['produk']);die();
		// membuat pagination
		
		$config['base_url'] 		= base_url() . 'member/member/tampil_produk/' . $id . '/';
		$config['total_rows'] 		= $total_produk_tampil['total_produk']; //menghitung jumlah baris di database dengan code CI
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 9;
		$config['uri_segment'] 		= 5;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] 		= floor($choice);
		// $config['num_links']		= 5;

		// style pagination
		// untuk keseluruhan
		$config['full_tag_open']	= '<div class="pagination flex-m flex-w">';
		$config['full_tag_close'] 	= '</div>';
		// number pertama jika tab nya aktif
		$config['first_link'] 		= 'First';
		$config['cur_tag_open'] 	= '<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">';
		$config['cur_tag_close'] 	= '</a>';
		// tombol next
		$config['next_link'] 		= '<span class="btn btn-sm next">Next &raquo;</span>';
		$config['next_tag_open'] 	= '';
		$config['next_tag_close'] 	= '';
		// tombol previus
		$config['prev_link'] 		= '<span class="btn btn-sm prev">&laquo; Prev</span>';
		$config['prev_tag_open'] 	= '';
		$config['prev_tag_close'] 	= '';

		// tambahan
		$config['first_tag_open'] 	= '<span class="btn btn-sm btn-abu m-l-5">sd';
		$config['first_tag_close'] 	= '</span>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<span class="btn btn-sm btn-abu m-l-5">hd';
		$config['last_tag_close'] 	= '</span>';
		$config['first_url']		= base_url(). '/member/member/tampil_produk/' . $id ;


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page'] :0;
		$data['produk_filter']	= $this->model_produk->filterProdukHome($config['per_page'], $data['page'], $id_kategori)->result_array();
		$data['pagin']	= $this->pagination->create_links();
		// end pagination 
		$this->view('home/produkFilter', $data, FALSE);
	}

}

/* End of file user.php */
/* Location: ./application/controllers/member/user.php */
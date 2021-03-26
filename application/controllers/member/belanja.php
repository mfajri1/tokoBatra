<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// load helper random string dari library CI
		$this->load->helper('string');
	}

	public function view($base, $data){
		$data['konfig']		=$this->model_konfig->tampil()->row_array(); 
		$data['tampil'] 	= $this->user_model->tampil_dashboard('users', $this->session->userdata('username'))->row_array();		
		$data['role']	= $this->model_sub_menu->tampilMenuHome('role_acces', $this->session->userdata('akses_level'))->result_array();
		$data['kategori']	= $this->model_kategori->tampil_data('t_kategori')->result_array();

		$this->load->view('temp_front/header', $data, FALSE);
		$this->load->view('temp_front/nav', $data, FALSE);
		$this->load->view( $base, $data, FALSE);
		$this->load->view('temp_front/footer', $data, FALSE);	
	}

	public function add()
	{
		$data['title']			= 'Add Produk';
		$data['nama_sub_menu']	= 'produk';
		$data['produk']			= $this->model_produk->tampil()->result_array();
		$data = [
			'id'			=> $this->input->post('id', true),
			'qty'			=> $this->input->post('qty', true),
			'price'			=> $this->input->post('price', true),
			'name'			=> $this->input->post('name', true),
			'gambar'			=> $this->input->post('gambar', true)
		];
		// proses memasukkan ke keranjang belanja
		$this->cart->insert($data);

		$redirect_page = $this->input->post('redirect_page', true);
		
		redirect($redirect_page,'refresh');
	}

	public function detailBelanja(){
		$data['belanja']	= $this->cart->contents();
		$data ['title']		= 'Keranjang Belanja';
		$data['nama_sub_menu']	= 'produk';


		$this->view('home/keranjangBelanja', $data);
	}

	public function updateKeranjang($row){
		$belanja	= $this->cart->contents();
		$data['title']			= 'update Produk';
		$data['nama_sub_menu']	= 'produk';
		$data['produk']			= $this->model_produk->tampil()->result_array();
		$data = [
			'rowid'			=> $row,
			'id'			=> $this->input->post('id', true),
			'qty'			=> $this->input->post('qty', true),
			'price'			=> $this->input->post('price', true),
			'name'			=> $this->input->post('name', true),
			'gambar'		=> $this->input->post('gambar', true)
		];
		// proses memasukkan ke keranjang belanja
		$this->cart->update($data);

		$redirect_page = $this->input->post('redirect_page', true);
		
		redirect($redirect_page,'refresh');
	}


	public function hapus($row){
		$this->cart->remove($row);
		// var_dump($haha);die();
		redirect('member/belanja/detailBelanja','refresh'); 	
	}

	public function destroy(){
		$this->cart->destroy();
		redirect('member/belanja/detailBelanja','refresh'); 		
	}

	// layout checkout
	public function checkout(){

		// check session 
		// check jika pelanggan sudah login
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning" >Login Terlebih Dahulu! </div>');
			redirect('auth/login','refresh');			
		}else{
			$data['belanja']		= $this->cart->contents();
			$data ['title']			= 'Proses Checkout';
			$data['nama_sub_menu']	= 'produk';
			$data['user']			= $this->user_model->checkout('users', $this->session->userdata('username'))->row_array();


			$this->view('home/checkout', $data);	
		}
	}

	public function checkoutData(){
		$data['belanja']		= $this->cart->contents();
		$data ['title']			= 'Proses Checkout';
		$data['nama_sub_menu']	= 'produk';
		$data['profile']			= $this->user_model->checkout('users', $this->session->userdata('username'))->row_array();


		$this->view('home/prosesCheckout', $data);	
	}

	public function prosesCheckout(){
		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'trim|required');
		$this->form_validation->set_rules('email_penerima', 'Email', 'trim|required');
		$this->form_validation->set_rules('alamat_penerima', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telp_penerima', 'telp', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->checkoutData();
		}else{
			// masukkan data ke t_header_transaksi
			$data = [
					 'kode_transaksi'	=> htmlspecialchars($this->input->post('kode_transaksi', true)),
					 'id_user'			=> $this->session->userdata('id_user'),
					 'nama_penerima'	=> htmlspecialchars($this->input->post('nama_penerima', true)),
					 'email_penerima'	=> htmlspecialchars($this->input->post('email_penerima', true)),
					 'alamat_penerima'	=> htmlspecialchars($this->input->post('alamat_penerima', true)),
					 'telp_penerima'	=> htmlspecialchars($this->input->post('telp_penerima', true)),
					 'tanggal_transaksi'	=> time(),
					 'jumlah_transaksi'	=> htmlspecialchars($this->input->post('jumlah_transaksi', true)),
					 'status_bayar'	=> htmlspecialchars($this->input->post('status_bayar', true)),
					 'jumlah_bayar'	=> htmlspecialchars($this->input->post('jumlah_bayar', true)),
					 'tanggal_update'	=> time(),
			];

			$this->model_header_transaksi->tambahProsesCheckout('t_header_transaksi', $data);
			// setelah memasuukkan nya ke dalam t_header_transaksi, selanjutnya masukka ke dalam table_transaksi
			$belanja		= $this->cart->contents();

			foreach ($belanja as $items) {
				$total_harga = $items['price'] * $items['qty'];
				$data = [
						'id_user'	=> $this->session->userdata('id_user'),
						'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true)),
						'id_produk' => $items['id'],
						'harga' => $items['price'],
						'jumlah' => $items['qty'],
						'total_harga' => $total_harga,
						'tanggal_transaksi' => time(),
						'tanggal_update' => time()
				];

				$this->model_transaksi->tambahTransaksi('t_transaksi', $data);
			}
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kategori Berhasil Di tambahkan! </div>');
			$this->cart->destroy();
			redirect('member/member/home','refresh');	
		}
	}

	public function riwayatBelanja(){
		$data['belanja']		= $this->cart->contents();
		$id_user				= $this->session->userdata('id_user');
		$data['title'] 			= 'Riwayat Belanja';
		$data['nama_sub_menu']	= 'produk';	
		$data['transaksi']		= $this->model_transaksi->riwayat_belanja('t_transaksi', $id_user)->result_array();

		$this->view('home/riwayatBelanja', $data);
	}

	public function konfirm(){
		$data['belanja']		= $this->cart->contents();
		$id_user				= $this->session->userdata('id_user');
		$data['title'] 			= 'Konfirmasi Belanja';
		$data['nama_sub_menu']	= 'produk';	
		$data['transaksi']		= $this->model_transaksi->konfirm('t_transaksi', $id_user)->result_array();

		$this->view('home/pembayaran', $data);
	}

	public function konfirmasi($id){
		$id_header_transaksi = ['id_header_transaksi' => $id];
		$data['title'] 			= 'Konfirmasi Belanja';
		$data['nama_sub_menu']	= 'produk';	
		$data['transaksi']		= $this->model_transaksi->konfirmasi('t_header_transaksi', $id_header_transaksi)->row_array();
		$data['rekening']		= $this->model_rekening->tampil_data('t_rekening')->result_array();

		$this->view('home/konfirmasi', $data);
	}

	public function prosesKonfirmasi($id){
		$id_header_transaksi = ['id_header_transaksi' => $id];
		$id_user			= $this->session->userdata('id_user');

		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'trim|required');
		$this->form_validation->set_rules('email_penerima', 'Email', 'trim|required');
		$this->form_validation->set_rules('alamat_penerima', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telp_penerima', 'telp', 'trim|required');
		$this->form_validation->set_rules('rekening_pembayaran', 'Rekening Pembayaran', 'trim|required');
		$this->form_validation->set_rules('rekening_pelanggan', 'Rekening pelanggan', 'trim|required');
		
		if ($this->form_validation->run()) {
			
			// mengedit data yang mana gambar di upload atau di ganti
			$config['upload_path'] 		= './assets/img/bukti_bayar/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['encrypt_name'] 	= TRUE; //enkripsi nama file
			$config['max_size']  		= '2400';//dalam kb
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('bukti_bayar')){
				$data['title'] 			= 'Konfirmasi Belanja';
				$data['nama_sub_menu']	= 'produk';	
				// $data['transaksi']		= $this->model_transaksi->konfirm('t_header_transaksi', $id_user)->result_array();
				$data['error'] 		= $this->upload->display_errors();//untuk menampilkan error upload gambar

				$this->view('home/pembayaran', $data);	

			}else{
				$upload_gambar = array('upload_data' => $this->upload->data());
				// awal membuat thumbnail dari gambar
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= './assets/img/bukti_bayar/' . $upload_gambar['upload_data']['file_name'];
				$config['new_image'] 		= '/assets/img/bukti_bayar/thumbs/'; //bermasalah baru, gak bisa buat thumbnail
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
					'kode_transaksi' 	=> htmlspecialchars($this->input->post('kode_transaksi', true)),
					'id_user' 			=> htmlspecialchars($this->input->post('id_user', true)), 
					'nama_penerima' 	=> htmlspecialchars($this->input->post('nama_penerima', true)), 
					'email_penerima' 	=> htmlspecialchars($this->input->post('email_penerima', true)), 
					'alamat_penerima'	=> htmlspecialchars($this->input->post('alamat_penerima', true)), 
					'telp_penerima' 	=> htmlspecialchars($this->input->post('telp_penerima', true)), 
					'tanggal_transaksi' => htmlspecialchars($this->input->post('tanggal_transaksi', true)), 
					'jumlah_transaksi' 	=> htmlspecialchars($this->input->post('jumlah_transaksi', true)),
					'status_bayar' 		=> 'sukses',
					'jumlah_bayar' 		=> htmlspecialchars($this->input->post('jumlah_bayar', true)),
					'rekening_pembayaran'=> htmlspecialchars($this->input->post('rekening_pembayaran', true)),
					'rekening_pelanggan'=> htmlspecialchars($this->input->post('rekening_pelanggan', true)),
					'bukti_bayar' 		=> $upload_gambar['upload_data']['file_name'],
					'tanggal_update'	=> time(),
				];
				$this->model_transaksi->ubah('t_header_transaksi', $data, $id_header_transaksi);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Produk Berhasil Di Ubah! </div>');
				redirect('member/belanja/konfirm');
			}
			// end checking
		}	
	}

	public function hapusRiwayat($id){
		$kode_transaksi = ['kode_transaksi' => $id];
		$this->model_transaksi->hapusRiwayat('t_transaksi', $kode_transaksi);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pelanggan Berhasil Di Hapus! </div>');
		redirect('member/belanja/riwayatBelanja');	
	}
}

/* End of file belanja.php */
/* Location: ./application/controllers/member/belanja.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function view($base, $data){
		$data['konfig']		=$this->model_konfig->tampil()->row_array();
		$data['kategori']	= $this->model_produk->tampilKategoriHome()->result_array();

		$this->load->view('dashboardPelanggan/temp/header', $data, FALSE);
		$this->load->view('dashboardPelanggan/temp/nav', $data, FALSE);
		$this->load->view( $base, $data, FALSE);
		$this->load->view('dashboardPelanggan/temp/footer', $data, FALSE);	
	}

	public function index()
	{
		$data['title']			= 'Halaman Home';
		$data['nama_sub_menu']	= 'dashboard';
		$data['produk']			= $this->model_produk->tampil()->result_array();

		$this->view('dashboardPelanggan/home', $data, FALSE);
	}

	public function produk(){
		$data['title']	= "Menu Produk";
		$data['nama_sub_menu']	= 'produk';
		// membuat pagination
		$total_produk = $this->model_produk->totalProduk('t_produk')->row_array();
		$config['base_url'] 		= base_url() . 'dashboard/produk/';
		$config['total_rows'] 		= $total_produk['total_produk']; //menghitung jumlah baris di database dengan code CI
		$config['use_page_numbers']	= true;
		$config['per_page'] 		= 9;
		$config['uri_segment'] 		= 3;
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
		$config['first_url']		= base_url(). '/dashboard/produk/';


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page'] :0;
		$data['produk']	= $this->model_produk->tampilProdukHome($config['per_page'], $data['page'])->result_array();
		$data['pagin']	= $this->pagination->create_links();
		// end pagination


		$this->view('dashboardPelanggan/produk', $data, FALSE);	
	}

	public function detailProduk($id){
		$id_produk = ['id_produk' => $id];
		$data['title']	= "Detail Produk";	

		$data['produk']			= $this->model_produk->detail($id_produk)->row_array();
		$data['gambar']			= $this->model_produk->detail_gambar('t_gambar', $id_produk)->result_array();
		$data['produk_related']	= $this->model_produk->tampilRelatedDetail('t_produk')->result_array();

		$this->view('dashboardPelanggan/detail_produk', $data, FALSE);
	}

	public function tampil_produk($id){
		$id_kategori = ['t_produk.id_kategori' => $id];
		$data['title']	= "Menu Produk";
		
		$data['kategori']	= $this->model_produk->tampilKategoriHome()->result_array();
		$total_produk_tampil = $this->model_produk->totalProdukTampil('t_produk', $id_kategori)->row_array();
		// print_r($data['produk']);die();
		// membuat pagination
		
		$config['base_url'] 		= base_url() . 'dashboard/tampil_produk/' . $id . '/';
		$config['total_rows'] 		= $total_produk_tampil['total_produk']; //menghitung jumlah baris di database dengan code CI
		$config['use_page_numbers']	= TRUE;
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
		$config['first_tag_open'] 	= '<span class="btn btn-sm btn-abu m-l-5">sd';
		$config['first_tag_close'] 	= '</span>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<span class="btn btn-sm btn-abu m-l-5">hd';
		$config['last_tag_close'] 	= '</span>';
		$config['first_url']		= base_url(). '/dashboard/tampil_produk/' . $id ;


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? ($this->uri->segment(4)-1) * $config['per_page'] :0;
		$data['produk_filter']	= $this->model_produk->filterProdukHome($config['per_page'], $data['page'], $id_kategori)->result_array();
		$data['pagin']	= $this->pagination->create_links();
		// end pagination 
		$this->view('dashboardPelanggan/produkFilter', $data, FALSE);
	}

	public function destroy(){
		$this->cart->destroy();
		redirect('dashboard/detailBelanja','refresh'); 		
	}

	public function hapus($row){
		$this->cart->remove($row);
		// var_dump($haha);die();
		redirect('dashboard/detailBelanja','refresh'); 	
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

	public function detailBelanja(){
		$data['belanja']	= $this->cart->contents();
		$data ['title']		= 'Keranjang Belanja';
		$data['nama_sub_menu']	= 'produk';


		$this->view('dashboardPelanggan/keranjangBelanja', $data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

	// public function tampil($table){
	// 	return $this->db->get($table);			
	// }

	public function tampil(){

		// cara pertama melakukan join table di coldegniter 
		// $query = "SELECT `t_produk`.*, `t_kategori`.`nama_kategori`,`slug_kategori`
		// 		  FROM t_produk JOIN t_kategori 
		// 		  ON `t_produk`.`id_kategori` = `t_kategori`.`id_kategori`  
		// ";
		// return $this->db->query($query);	

        // join yang di gunakan untuk mengambil nama di table user dan mengambil nama dan slug di table t_kategori yang di join kan ke table t_produk
		
		// cara 2
  //       $query = "SELECT `t_produk`.*, `t_kategori`.`nama_kategori`,`slug_kategori`, `users`.`nama`
		// 		  FROM t_produk LEFT JOIN t_kategori  ON `t_produk`.`id_kategori` = `t_kategori`.`id_kategori`
		// 		  LEFT JOIN users ON `t_produk`.`id_user` = `users`.`id_user`
		// 		  WHERE `t_produk`.`id_user` = `users`.`id_user`
		// 		  GROUP BY	`t_produk`. `id_produk`
		// 		  ";
		// return $this->db->query($query);

		$this->db->select('t_produk.*,
			users.nama,
			t_kategori.nama_kategori,
			t_kategori.slug_kategori,
			COUNT(t_gambar.id_gambar) AS total_gambar	
			');
		$this->db->from('t_produk');
        // awal JOIN table

        // join table t_produk ke table users
		$this->db->join('users', 'users.id_user = t_produk.id_user', 'left');
        //join table t_produk ke table t_kategori
		$this->db->join('t_kategori', 't_kategori.id_kategori = t_produk.id_kategori', 'left'); 
		// join table gambar
		$this->db->join('t_gambar', 't_gambar.id_produk = t_produk.id_produk', 'left'); 
		$this->db->group_by('t_produk.id_produk');
        // akhir JOIN table
		return $this->db->get();

	}	

	public function tambahData($table, $data){
		$this->db->insert($table, $data);	
	}
	// menambahkan Gambar
	public function tGambar($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		$this->db->order_by('id_gambar', 'asc');
		return $this->db->get();	
	}

	public function tambahAddGambar($table, $data){
		$this->db->insert($table, $data);	
	}

	// menampilkan detail gambar
	public function detail_gambar($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		$this->db->order_by('id_gambar', 'asc');
		return $this->db->get();	
	}

	public function hapus_gambar($table, $id){
		// proses hapus file foto di directori
		$this->db->where($id);
		$this->db->delete($table);	
	}

	public function hapus_produk($table, $id){
		// proses hapus file foto di directori
		$this->db->where($id);
		$this->db->delete($table);	
	}

	// detail Produk
	public function detail($id){
		$this->db->select('t_produk.*,
			users.nama,
			t_kategori.nama_kategori,
			t_kategori.slug_kategori	
			');
		$this->db->from('t_produk');
		$this->db->join('users', 'users.id_user = t_produk.id_user', 'left');
		$this->db->join('t_kategori', 't_kategori.id_kategori = t_produk.id_kategori', 'left'); 
		$this->db->where($id);
		return $this->db->get();
	}

	public function ubah($data){
		$this->db->select('t_produk.*,
			users.nama,
			t_kategori.nama_kategori,
			t_kategori.slug_kategori	
			');
		$this->db->from('t_produk');
		$this->db->join('users', 'users.id_user = t_produk.id_user', 'left');
		$this->db->join('t_kategori', 't_kategori.id_kategori = t_produk.id_kategori', 'left'); 
		$this->db->where($data);
		return $this->db->get();

	}

	public function ubahData($table, $data, $id){
		$this->db->where($id);
		$this->db->update($table, $data);
	}

	// layout home
	// kategori
	public function tampilKategoriHome(){
		$this->db->select('t_produk.*,
			users.nama,
			t_kategori.nama_kategori,
			t_kategori.slug_kategori,
			COUNT(t_gambar.id_gambar) AS total_gambar	
			');
		$this->db->from('t_produk');
        $this->db->join('users', 'users.id_user = t_produk.id_user', 'left');
		$this->db->join('t_kategori', 't_kategori.id_kategori = t_produk.id_kategori', 'left'); 
		$this->db->join('t_gambar', 't_gambar.id_produk = t_produk.id_produk', 'left');
		$this->db->order_by('t_produk.id_kategori', 'asc'); 
		$this->db->group_by('t_produk.id_kategori');
		return $this->db->get();
	}

	// Produk
	public function tampilProdukHome($limit, $start){
		$this->db->select('t_produk.*,
			users.nama,
			t_kategori.nama_kategori,
			t_kategori.slug_kategori,
			COUNT(t_gambar.id_gambar) AS total_gambar	
			');
		$this->db->from('t_produk');
        $this->db->join('users', 'users.id_user = t_produk.id_user', 'left');
		$this->db->join('t_kategori', 't_kategori.id_kategori = t_produk.id_kategori', 'left'); 
		$this->db->join('t_gambar', 't_gambar.id_produk = t_produk.id_produk', 'left');
		$this->db->where('status_produk', 'publish');
		$this->db->group_by('t_produk.nama_produk');
		$this->db->order_by('t_produk.id_produk', 'asc');
		$this->db->limit($limit, $start);
		return $this->db->get();
	}

	// filter produk di layout home
	public function filterProdukHome($limit, $start, $id){
		$this->db->select('t_produk.*,
			users.nama,
			t_kategori.nama_kategori,
			t_kategori.slug_kategori,
			COUNT(t_gambar.id_gambar) AS total_gambar	
			');
		$this->db->from('t_produk');
        $this->db->join('users', 'users.id_user = t_produk.id_user', 'left');
		$this->db->join('t_kategori', 't_kategori.id_kategori = t_produk.id_kategori', 'left'); 
		$this->db->join('t_gambar', 't_gambar.id_produk = t_produk.id_produk', 'left'); 
		$this->db->where($id);
		$this->db->where('status_produk', 'publish');
		$this->db->order_by('t_produk.id_kategori', 'asc');
		$this->db->group_by('t_produk.id_produk');
		$this->db->limit($limit, $start);
		return $this->db->get();
	}

	public function totalProduk($table){
		$this->db->select('COUNT(*) AS total_produk');
		$this->db->from($table);
		$this->db->where('status_produk', 'publish');
		$this->db->order_by('t_produk.id_produk', 'desc');
		return $this->db->get();	
	}
	public function totalProdukTampil($table, $id){
		$this->db->select('COUNT(*) AS total_produk');
		$this->db->from($table);
		$this->db->where($id);
		$this->db->where('status_produk', 'publish');
		$this->db->order_by('t_produk.id_produk', 'desc');
		return $this->db->get();	
	}

	public function tampilRelatedDetail($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('id_kategori', 'desc');
		return $this->db->get();	
	}





}

/* End of file model_produk.php */
/* Location: ./application/models/model_produk.php */
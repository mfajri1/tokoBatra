<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<?= $this->session->flashdata('pesan') ;?>
			<p class="alert alert-success">
				Anda Sudah Masuk, Apakah anda Akan Melakukan Proses Checkout? JIka Iya <a href="<?= base_url('member/belanja/checkoutData') ?>" class="btn btn-primary btn-sm"><b>Klik Ini</b></a> , JIka Tidak Pilih Lihat Barang yang Lain <a href="<?= base_url('member/member/produk') ?>" class="btn btn-warning btn-sm"><b>Disini</b></a>
			</p>
		</div>
	</section>

	
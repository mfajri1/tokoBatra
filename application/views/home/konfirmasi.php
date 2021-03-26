<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url('assets/img/bg/1.jpg') ;?>);">
		<h2 class="l-text2 t-center text-hitam">
			<?= $title ;?>
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 ">
		<div class="container">
			<?= $this->session->flashdata('pesan'); ?>
			<?php 
			// mencek apakah error
			if (isset($error)) {
				echo '<p class="alert alert-warning">';
				echo $error;
				echo '</p>';
			}
			?>
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite clearfix">
					<div class="col-md-12 p-b-90">
						<form action="<?= base_url('member/belanja/prosesKonfirmasi/') . $transaksi['id_header_transaksi'] ;?>" method="post" enctype="multipart/form-data" class="form-horizontal w-size20 p-t-30 respon5">
							<!-- input hidden -->
							<input type="hidden" name="id_header_transaksi" value="<?= $transaksi['id_header_transaksi']?>">
							<input type="hidden" name="id_user" value="<?= $transaksi['id_user'] ?>">
							<!-- end input hidden -->
							<div class="box-body">
								<div class="form-group row">
									<label for="nama" class="col-sm-5 control-label">Kode Transaksi</label>
									<div class="col-sm-7">
										<input type="text" name="kode_transaksi" id="kode_transaksi" class="form-control" value="<?= $transaksi['kode_transaksi'] ;?>" readonly required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama" class="col-sm-5 control-label">Nama Penerima</label>
									<div class="col-sm-7">
										<input type="text" name="nama_penerima" id="nama" class="form-control" value="<?= $transaksi['nama_penerima'] ;?>">
										<?= form_error('nama_penerima', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
								<div class="form-group row">
									<label for="email" class="col-sm-5 control-label">Email Penerima</label>
									<div class="col-sm-7">
										<input type="email" name="email_penerima" id="email" class="form-control" value="<?= $transaksi['email_penerima'] ;?>">
										<?= form_error('email_penerima', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
								<div class="form-group row">
									<label for="alamat" class="col-sm-5 control-label">Alamat Penerima</label>
									<div class="col-sm-7">
										<input type="text" name="alamat_penerima" id="emali" class="form-control" value="<?= $transaksi['alamat_penerima'] ;?>">
										<?= form_error('alamat_penerima', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
								<div class="form-group row">
									<label for="telp" class="col-sm-5 control-label">Telphone Penerima</label>
									<div class="col-sm-7">
										<input type="text" name="telp_penerima" id="emali" class="form-control" value="<?= $transaksi['telp_penerima'] ;?>">
										<?= form_error('telp_penerima', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
								<div class="form-group row">
									<label for="tanggal_transaksi" class="col-sm-5 control-label">Tanggal Transaksi</label>
									<div class="col-sm-7">
										<input type="text" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control" value="<?= $transaksi['tanggal_transaksi'] ;?>">
										<?= form_error('tanggal_transaksi', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
								<div class="form-group row">
									<label for="jumlah_transaksi" class="col-sm-5 control-label">Jumlah Transaksi</label>
									<div class="col-sm-7">
										<input type="text" name="jumlah_transaksi" id="jumlah_transaksi" class="form-control" value="<?= $transaksi['jumlah_transaksi'] ;?>">
										<?= form_error('jumlah_transaksi', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
								<div class="form-group row">
									<label for="jumlah_bayar" class="col-sm-5 control-label">Jumlah Bayar</label>
									<div class="col-sm-7">
										<input type="text" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="<?= $transaksi['jumlah_bayar'] ;?>">
										<?= form_error('jumlah_bayar', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
								<hr>
								<hr>
								<div class="form-group row">
									<label for="telp" class="col-sm-5 control-label">Rekening Pembayaran</label>
									<div class="col-sm-7">
										<select name="rekening_pembayaran" id="rekening_pembayaran" class="form-control">
											<option value=""><-- Pilih Metode Pembayaran --></option>
											<?php foreach ($rekening as $r): ?>
												<option value="<?= $r['no_rekening'] ;?>"><?= $r['nama_bank'] ;?> ; <?= $r['no_rekening'] ;?> ; <?= $r['nama_pemilik'] ;?></option>
											<?php endforeach ?>
										</select>
										<?= form_error('rekening_pembayaran', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
								<div class="form-group row">
									<label for="rekening_pelanggan" class="col-sm-5 control-label">Rekening Pelanggan</label>
									<div class="col-sm-7">
										<input type="text" name="rekening_pelanggan" id="emali" class="form-control" placeholder="Masukkan Rekening Pelanggan">
										<?= form_error('rekening_pelanggan', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
								<div class="form-group row">
									<label for="bukti_bayar" class="col-sm-5 control-label">Bukti Bayar</label>
									<div class="col-sm-7">
										<input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
										<?= form_error('bukti_bayar', '<div class="text-danger small ml-3">','</div>') ;?>
									</div>
								</div>
							</div>
							<!-- /.box-body -->
							<div class="form-group row">
								<label for="telp" class="col-sm-5 control-label"></label>
								<div class="box-footer col-sm-7">
									<button type="submit" class="btn btn-info">Proses</button>
								</div>
							</div>
							<!-- /.box-footer -->	
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
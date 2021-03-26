<section class="content">
	<div class="row">
		<div class="col-sm-8">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th style="width:50%">Kode Transaksi</th>
						<td><?= ucfirst($transaksi['kode_transaksi']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Nama Penerima</th>
						<td><?= ucfirst($transaksi['nama_penerima']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Username</th>
						<td><?= ucfirst($transaksi['username']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Email Penerima</th>
						<td><?= ucfirst($transaksi['email_penerima']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Telephone Penerima</th>
						<td><?= ucfirst($transaksi['telp_penerima']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Tanggal Transaksi</th>
						<td><?= date('d-m-Y', $transaksi['tanggal_transaksi']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Jumlah Transaksi</th>
						<td><?= ucfirst($transaksi['jumlah_transaksi']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Status Bayar</th>
						<td><?= ucfirst($transaksi['status_bayar']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Rekening Pembayaran</th>
						<td><?= ucfirst($transaksi['rekening_pembayaran']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Rekening Pelanggan</th>
						<td><?= ucfirst($transaksi['rekening_pelanggan']) ;?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-sm-4 mt-auto">
			<img src="<?= base_url('assets/img/bukti_bayar/') . $transaksi['bukti_bayar'] ;?>" alt="" width="300" class="img-thumbnail">
		</div>
	</div>
</section>
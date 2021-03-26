<section class="content">
	<div class="row">
		<div class="col-sm-8">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th style="width:50%">Nama Pengguna</th>
						<td><?= ucfirst($produk['nama']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Nama Kategori</th>
						<td><?= ucfirst($produk['nama_kategori']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Slug Kategori</th>
						<td><?= ucfirst($produk['slug_kategori']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Kode Produk</th>
						<td><?= ucfirst($produk['kode_produk']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Nama Produk</th>
						<td><?= ucfirst($produk['nama_produk']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Slug Produk</th>
						<td><?= ucfirst($produk['slug_produk']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Keterangan</th>
						<td><?= ucfirst($produk['keterangan']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Keywords</th>
						<td><?= ucfirst($produk['keywords']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Harga</th>
						<td><?= ucfirst($produk['harga']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Stok</th>
						<td><?= ucfirst($produk['stok']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Berat</th>
						<td><?= ucfirst($produk['berat']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Ukuran</th>
						<td><?= ucfirst($produk['ukuran']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Status Produk</th>
						<td><?= ucfirst($produk['status_produk']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Tanggal Post</th>
						<td><?= date('d-M-Y, H:i:s', $produk['tanggal_post']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Tanggal Update</th>
						<td><?= date('d-M-Y, H:i:s', $produk['tanggal_update']) ;?></td>
					</tr>					
				</table>
			</div>
		</div>
		<div class="col-sm-4 mt-auto">
			<img src="<?= base_url('assets/img/produk/') . $produk['gambar'] ;?>" alt="" width="300" class="img-thumbnail">
		</div>
	</div>
</section>
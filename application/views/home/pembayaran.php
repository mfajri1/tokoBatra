<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url('assets/img/bg/1.jpg') ;?>);">
		<h2 class="l-text2 t-center text-hitam">
			<?= $title ;?>
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite clearfix">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1">Kode Transaksi</th>
							<th class="column-1">Nama Penerima</th>
							<th class="column-1">Jumlah</th>
							<th class="column-1">Total</th>
							<th class="column-1">Tanggal Transaksi</th>
							<th class="column-1">Status Bayar</th>
							<th class="column-1">Aksi</th>
						</tr>
						
						<!-- pengecekan keranjang jika ada atau tidak -->
						<?php $total = 0; ?>
						<?php $totalnya = 0; ?>
						<?php foreach ($transaksi as $tr): ?>
							<?php $total += $tr['total_harga']; ?>
							<tr class="table-row">
								<td class="column-1"><?= ucfirst($tr['kode_transaksi']) ;?></td>
								<td class="column-1"><?= ucfirst($tr['nama']) ;?></td>
								<td class="column-1"><?= $tr['jumlah'] ;?></td>
								<td class="column-1"><?= number_format($tr['jumlah_transaksi'],0,'.',',') ;?></td>
								<td class="column-1"><?= date('d-M-Y', $tr['tanggal_transaksi']) ;?></td>
								<td class="column-1"><?= ucfirst($tr['status_bayar']) ;?></td>
								<td class="column-1"><a href="<?= base_url('member/belanja/konfirmasi/') . $tr['id_header_transaksi'] ;?>" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> konfirmasi</a></td>
							</tr>
						<?php endforeach ?>
						<tr class="table-row bg-info">
							<td colspan="4" class="column-1 text-putih">Total Belanja</td>
							<?php if (!$transaksi): ?>
								<td class="column-1 text-putih">
									0
								</td>
							<?php else: ?>
								<td class="column-1 text-putih">
									<?php $totalnya += $tr['total_harga'];  ?>
									<?= number_format($totalnya,0,'.',',') ;?>
								</td>
							<?php endif ?>
							<td colspan="2"></td>
							<td></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</section>
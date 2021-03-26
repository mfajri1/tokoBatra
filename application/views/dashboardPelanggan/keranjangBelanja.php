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
					<a href="<?= base_url('dashboard');?>" class="btn btn-primary btn-sm btn-radius"><i class="fa fa-plus"> Tambah Keranjang</i></a>
					<a href="<?= base_url('dashboard/destroy');?>" class="btn btn-danger btn-sm btn-radius"  onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"> Hapus Keranjang</i></a>
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1">Gambar Produk</th>
							<th class="column-1">Produk</th>
							<th class="column-4">Harga</th>
							<th class="column-5 ">Jumlah</th>
							<th class="column-5">Subtotal</th>
							<th class="column-2" colspan="1">Aksi</th>
						</tr>
						
						<!-- pengecekan keranjang jika ada atau tidak -->
						<?php if (!empty($belanja)): ?>
							<?php $total_belanja = 0; ?>
							<!-- menampilkan data keranjang -->
							<?php foreach ($belanja as $items): ?>
								<!-- form untuk memproses belanjaan -->
								<form action="<?= base_url('dashboard/updateKeranjang/') . $items['rowid'] ;?>" method="post" enctype="multipart/form-data">
									<!-- element yang di bawa -->
									<tr class="table-row">
										<td class="column-1">
											<div class="cart-img-product b-rad-4 o-f-hidden">
												<img src="<?= base_url('assets/img/produk/') . $items['gambar'] ;?>" alt="IMG-PRODUCT">
											</div>
										</td>
										<td class="column-1"><?= ucfirst($items['name']) ;?></td>
										<td class="column-4"><?= number_format($items['price'],0,'.','.') ;?></td>
										<td class="column-4">
											<div class="flex-w bo5 of-hidden w-size17">
												<!-- fungsi menambahkan jumlah barang dengan javascript sesuai dengan nama class nya yaitu qty -->
												<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
													<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
												</button>

												<input class="size8 m-text18 t-center qty" type="number" name="qty" value="<?= $items['qty'] ?>">


												<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
													<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
												</button>
												<!-- end -->
											</div>
										</td>
										<!-- menampilkan subtotal keranjang belanja -->
										<td class="column-5">
											<?= number_format($items['subtotal'],0,'.',',') ;?>
										</td>
										<!-- element form yang di hiddenkan untuk membuat shoping cart -->
										<?php 
											echo form_hidden('id', $items['id']);
											echo form_hidden('rowid', $items['rowid']);
											echo form_hidden('price', $items['price']);
											echo form_hidden('name', $items['name']);
											echo form_hidden('gambar', $items['gambar']);

											// redirect
											echo form_hidden('redirect_page', str_replace('index.php', '', current_url()));
										?>
										<td colspan="2" class="column-4">
											<a href="<?= base_url('dashboard/hapus/') . $items['rowid'] ;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"></i> Hapus</a>
											<button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>
										</td>
									</tr>
								</form>
							<?php endforeach ?>
						<?php else: ?>
							<tr class="table-row">
								<td class="column-1">Data Tidak Ada</td>
							</tr>	
						<?php endif ?>
						<tr class="table-row bg-info">
							<td colspan="4" class="column-1 text-putih">Total Belanja</td>
							<td class="column-2 text-putih">
								<?= $this->cart->format_number($this->cart->total()); ?>
							</td>
							<td colspan="2"></td>
							<td></td>
						</tr>
					</table>
					<div class="size10 trans-0-4 m-t-20 m-b-20 pull-right m-r-10">
						<!-- Button -->
						<a href="<?= base_url('member/belanja/checkout') ;?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?= base_url('assets/img/bg/1.jpg') ;?>);">
		<h2 class="l-text2 t-center">
			<?= $title ;?>
		</h2>
		<p class="m-text13 t-center">
			<?= $konfig['nama_web']. ' | ' . $konfig['website'] ;?>
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-20 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-10">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Kategori Produk
						</h4>

						<ul class="p-b-54">
							<?php foreach ($kategori as $k): ?>
								<li class="p-t-1">
									<a href="<?= base_url('dashboard/tampil_produk/') . $k['id_kategori'] ?>" class="s-text13 active1">
										<?= $k['nama_kategori'] ;?>
									</a>
								</li>
							<?php endforeach ?>
						</ul>

						<div class="bo3 p-b-10">
							
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-10">
					<!--  -->
					<h4 class="m-text14 p-b-20">
						Produk
					</h4>
					<!-- Product -->
					<div class="row">
						<!-- ambil data produk -->
						<?php foreach ($produk_filter as $pro): ?>
							<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<form action="<?= base_url('member/belanja/add') ;?>" method="post" enctype="multipart/form-data">
										<!-- element form yang di hiddenkan untuk membuat shoping cart -->
										<?php 
										echo form_hidden('id', $pro['id_produk']);
										echo form_hidden('qty', 1);
										echo form_hidden('price', $pro['harga']);
										echo form_hidden('name', $pro['nama_produk']);
										echo form_hidden('gambar', $pro['gambar']);
									// redirect
										echo form_hidden('redirect_page', str_replace('index.php', '', current_url()));
										?>
										<!-- element yang di bawa -->
										<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
											<img src="<?= base_url('assets/img/produk/') . $pro['gambar'] ?>" alt="<?= $pro['gambar'] ;?>" height="120">

											<div class="block2-overlay trans-0-4">
												<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
													<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
													<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
												</a>

												<div class="block2-btn-addcart w-size1 trans-0-4">
													<!-- Button -->
													<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													<i class="fa fa-2x fa-shopping-cart"></i>
												</button>
												</div>
											</div>
										</div>

										<div class="block2-txt p-t-20">
											<a href="<?= base_url('member/member/detailProduk/') . $pro['id_produk'] ;?>" class="block2-name dis-block s-text3 p-b-5" style="font-weight: bold;">
												<?= ucfirst($pro['nama_produk']) ;?>
											</a>

											<span class="block2-price m-text6 p-r-5">
												<?= 'IDR ' . number_format($pro['harga'],0,'.','.') ;?>
											</span>
										</div>
									</form>
								</div>
							</div>
						<?php endforeach ?>
					</div>
					<!-- tampilan pagination -->
					<?= $pagin ;?>

					<!--  -->
					<!-- <div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Default Sorting</option>
									<option>Popularity</option>
									<option>Price: low to high</option>
									<option>Price: high to low</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Price</option>
									<option>$0.00 - $50.00</option>
									<option>$50.00 - $100.00</option>
									<option>$100.00 - $150.00</option>
									<option>$150.00 - $200.00</option>
									<option>$200.00+</option>

								</select>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
					</div> -->

					
				</div>
			</div>
		</div>
	</section>

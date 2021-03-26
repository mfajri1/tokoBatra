
	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?= base_url('member/member/home') ;?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="<?= base_url('member/member/produk') ;?>" class="s-text16">
			Produk
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?= $produk['nama_produk'] ;?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>
					<div class="slick3">
						<div class="item-slick3" data-thumb="<?= base_url('assets/img/produk/') .$produk['gambar'] ;?>">
								<div class="wrap-pic-w">
									<img src="<?= base_url('assets/img/produk/') . $produk['gambar'] ;?>" alt="IMG-PRODUCT">
								</div>
							</div>
						<?php foreach ($gambar as $g): ?>
							<div class="item-slick3" data-thumb="<?= base_url('assets/img/produk/') .$g['gambar'] ;?>">
								<div class="wrap-pic-w">
									<img src="<?= base_url('assets/img/produk/') . $g['gambar'] ;?>" alt="IMG-PRODUCT">
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h1 class="product-detail-name m-text14 p-b-13" style="font-weight: bold;">
					<?= ucfirst($produk['nama_produk']) ;?>
				</h1>
				<h2 class="m-text12" style="font-weight: bolder;">
					<?= 'IDR ' . number_format($produk['harga'],0,'.',',') ;?>
				</h2>

				<p class="s-text10 p-t-10 text-justify text-hitam">
					<?= $produk['keterangan'] ;?>
				</p>

				<!--  -->
				<!-- <div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Size
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Choose an option</option>
								<option>Size S</option>
								<option>Size M</option>
								<option>Size L</option>
								<option>Size XL</option>
							</select>
						</div>
					</div>

					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Color
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Choose an option</option>
								<option>Gray</option>
								<option>Red</option>
								<option>Black</option>
								<option>Blue</option>
							</select>
						</div>
					</div> -->
					
					<!-- function untuk menambhkan ke keranjang -->
					<form action="<?= base_url('member/belanja/add') ;?>" method="post" enctype="multipart/form-data">
						<div class="flex-r-m flex-w p-t-10">
							<div class="w-size16 flex-m flex-w">
								<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
									<?php 
										echo form_hidden('id', $produk['id_produk']);
										echo form_hidden('price', $produk['harga']);
										echo form_hidden('name', $produk['nama_produk']);
										echo form_hidden('gambar', $produk['gambar']);
										// redirect
										echo form_hidden('redirect_page', str_replace('index.php', '', current_url()));
									?>
									<!-- fungsi menambahkan jumlah barang dengan javascript sesuai dengan nama class nya yaitu qty -->
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center qty" type="number" name="qty" value="1">


									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
									<!-- end -->
								</div>

								<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
									<!-- Button -->
									<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
										Add to Cart
									</button>
								</div>
							</div>
						</div>
					</form>
					<!-- end keranjang -->
				</div>

				<!-- <div class="p-b-45">
					<span class="s-text8 m-r-35">SKU: MUG-01</span>
					<span class="s-text8">Categories: Mug, Design</span>
				</div> -->

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php foreach ($produk_related as $pr): ?>
						<div class="item-slick2 p-l-15 p-r-15">
							<form action="<?= base_url('member/belanja/add/') ;?>" method="post" enctype="multipart/form-data">
								<!-- element form yang di hiddenkan untuk membuat shoping cart -->
								<?php 
									echo form_hidden('id', $pr['id_produk']);
									echo form_hidden('qty', 1);
									echo form_hidden('price', $pr['harga']);
									echo form_hidden('name', $pr['nama_produk']);
									echo form_hidden('gambar', $pr['gambar']);
									// redirect
									echo form_hidden('redirect_page', str_replace('index.php', '', current_url()));
								?>
								<!-- element yang di bawa -->
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img src="<?= base_url('assets/img/produk/') . $pr['gambar'] ;?>" alt="<?= $pr['nama_produk'] ?>" height="150">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="<?= base_url('member/member/detailProduk/') . $pr['id_produk'] ;?>" class="block2-name dis-block s-text3 p-b-5" style="font-weight: bold;">
											<?= ucfirst($pr['nama_produk']) ;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
											<?= 'IDR ' . number_format($pr['harga'],0,'.',',') ;?>
										</span>
									</div>
								</form>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>

		</div>
	</section>
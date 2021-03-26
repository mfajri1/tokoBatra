-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2019 pada 23.26
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobatra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_acces`
--

CREATE TABLE `role_acces` (
  `id_access` int(11) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_acces`
--

INSERT INTO `role_acces` (`id_access`, `access`) VALUES
(1, 'admin'),
(2, 'member'),
(3, 'directur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub_menu`
--

CREATE TABLE `tb_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `access_id` int(11) NOT NULL,
  `title_menu` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `menu_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sub_menu`
--

INSERT INTO `tb_sub_menu` (`id_sub_menu`, `access_id`, `title_menu`, `link`, `menu_active`) VALUES
(1, 2, 'Home', 'home', 1),
(2, 2, 'Produk', 'produk', 1),
(3, 2, 'About', 'About', 1),
(4, 3, 'Contact', 'contact', 1),
(8, 2, 'Tambah Produk', 'tambah', 1),
(9, 1, 'Dashboard', 'dashboard', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_acces_menu`
--

CREATE TABLE `tb_user_acces_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_acces_menu`
--

INSERT INTO `tb_user_acces_menu` (`id`, `role_id`, `access_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(6, 2, 2),
(7, 3, 2),
(8, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_berita`
--

CREATE TABLE `t_berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text,
  `status_berita` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_gambar`
--

CREATE TABLE `t_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(200) DEFAULT NULL,
  `gambar` varchar(200) NOT NULL,
  `tanggal_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_gambar`
--

INSERT INTO `t_gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(2, 2, 'Parfume Regaza', 'default.jpg', '1573700759'),
(3, 3, 'Parfume Axe', 'default.jpg', '1573700759'),
(7, 1, 'gambar 2', 'default.jpg', '1574097556'),
(10, 5, 'rexona spray 2', 'b6143ce685ad5b944b9ebfe59c46b622.png', '1574249375'),
(12, 8, 'gambar2', 'af9c1c4b43123a027e266f8978d59e8b.jpg', '1575430392');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_header_transaksi`
--

CREATE TABLE `t_header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `email_penerima` varchar(100) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `telp_penerima` varchar(20) NOT NULL,
  `tanggal_transaksi` varchar(100) NOT NULL,
  `jumlah_transaksi` varchar(100) NOT NULL,
  `status_bayar` varchar(255) DEFAULT NULL,
  `jumlah_bayar` varchar(100) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `tanggal_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_header_transaksi`
--

INSERT INTO `t_header_transaksi` (`id_header_transaksi`, `kode_transaksi`, `id_user`, `nama_penerima`, `email_penerima`, `alamat_penerima`, `telp_penerima`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `tanggal_update`) VALUES
(1, '2322121219hKT1xCiO4dQ3DIj7', 1, 'muhamad fajri2', 'fajri@gmail.com', 'koto baru kubang putiah', '082287770991', '1576167761', '332000', 'sukses', '332000', '17099288009', '1556456465465', '458306a1ac112602e13ad6a35a9e48df.jpg', '1576167846'),
(2, '2323121219rquNOgL1Tsedm95F', 1, 'muhamad fajri2', 'fajri@gmail.com', 'koto baru kubang putiah', '082287770991', '1576167822', '98000', 'sukses', '98000', '17099288009', '1556456465465', 'ea15169bacda337cf5e57a5aaefc67c6.png', '1576167862');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(200) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kategori`
--

INSERT INTO `t_kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'parfume', 'parfume', 1, '1572702942'),
(2, 'bedak', 'bedak', 2, '1572714055'),
(3, 'shampo', 'shampo', 3, '1572724687'),
(4, 'pelembab', 'pelembab', 4, '1572724488'),
(5, 'facial-foam', 'facial foam', 5, '1573664109'),
(6, 'deodorant', 'deodorant', 6, '1574243547');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_konfigurasi`
--

CREATE TABLE `t_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_web` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telp` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `wa` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `rekening_pembayaran` varchar(100) DEFAULT NULL,
  `tanggal_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_konfigurasi`
--

INSERT INTO `t_konfigurasi` (`id_konfigurasi`, `nama_web`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telp`, `alamat`, `fb`, `instagram`, `wa`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Batra Kosmetik', 'hahah', 'fajri1@gmail.com', 'fajri.Blogspot.com', 'batra kosmetik, kosmetik', 'kosmetik', '+6282287770991', 'Jln. Koto Baru Kubang Putiah, Kec. Banuhampu, Kab. Agam, Prov. Sumatera Barat', 'https://www.facebook.com/fajri_wilsher', 'https://www.instagram.com/fajri_wilsher', 'fajri', 'Merupakan Website Penyedia Barang Kosmetik', '22e8a88154f9289877d236534f25be4b.png', 'd1937950e5f52a5565009e899c9885c7.png', '123456789', '1574608661');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(200) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `slug_produk` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(300) DEFAULT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL,
  `status_produk` varchar(100) NOT NULL,
  `tanggal_post` varchar(255) NOT NULL,
  `tanggal_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(1, 1, 1, 'par001', 'Belagio', 'belagio-par001', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea est ex minima debitis deleniti nam quasi placeat eveniet, voluptate impedit assumenda blanditiis velit qui, aspernatur dolores. Est dignissimos adipisci maxime, fuga deserunt ipsum reprehenderit. Velit necessitatibus, veritatis quae atque dignissimos quidem dolorem dolore aperiam placeat ratione ipsam adipisci quaerat ab voluptatum laudantium at, rerum, recusandae deserunt eius voluptates soluta iusto error quas. Non corporis possimus nisi eaque qui ducimus? Omnis ea sed, quae nam provident quibusdam modi porro inventore vero natus assumenda laborum similique, amet qui obcaecati illo animi aliquid blanditiis praesentium, ipsam rerum. Veniam eum, quis incidunt error accusantium!\r\n', 'parfume', 30000, 25, 'dda8355e53a3322d1ade980975d06634.jpg', 100, '100x25', 'publish', '1574071726', '1575519276'),
(2, 1, 1, 'par002', 'regaza', 'regaza-par002', 'parfume regaza', 'parfume', 32000, 10, '0b604732477bba2ab69b6b03be306dcb.jpg', 150, '100x80', 'publish', '1574230466', '1575430170'),
(3, 2, 6, 'deo001', 'axe', 'axe-deo001', 'deodorant axe', 'deodorant', 35000, 20, 'f8d803c0612ea660ccf6807c6024d710.jpg', 180, '150x90', 'publish', '1574230795', '1575430179'),
(4, 2, 6, 'deo002', 'posh', 'posh-deo002', 'deodorant axe', 'deodorant', 20000, 10, '646243005e1449299aa7f59be276c663.jpg', 120, '190x90', 'publish', '1574231945', '1575430196'),
(5, 1, 6, 'deo003', 'rexona spray', 'rexona-spray-deo003', 'deodorant rexona spray', 'deodorant spray', 30000, 30, '5aed17dc509d4bf0daa2437b4de65c12.jpg', 50, '80x10', 'publish', '1574249216', '1575430209'),
(7, 1, 5, 'fw001', 'ponds facial foam', 'ponds-facial-foam-fw001', 'sabun cuci muka ponds', 'facial foam', 15000, 10, 'c7fe8f01247b40a95ce7cf7ce6615d89.jpg', 100, '100x5', 'publish', '1574249216', '1575430250'),
(8, 1, 5, 'fas002', 'ponds facial scrub', 'ponds-facial-scrub-fas002', 'cuci muka ponds', 'facial scrub', 16000, 10, 'ed2378682642bcf05646eb00fcbe87fe.jpg', 100, '100x5', 'publish', '1575286161', '1575430240'),
(9, 1, 2, 'bed001', 'wardah white beauty', 'wardah-white-beauty-bed001', 'bedak wardah', 'bedak', 28500, 20, '47839560aa6efcce4e80980f49d4e258.jpg', 50, '100x5', 'publish', '1575299249', '1575430225'),
(10, 1, 3, 'shp0001', 'clear', 'clear-shp0001', 'Shampo clear', 'shampo', 14000, 10, '5b144cf68b39e99d395394e137ef9bf7.jpg', 100, '150x2', 'publish', '1575384440', '1575493561'),
(11, 1, 3, 'shp0002', 'clear 170', 'clear-170-shp0002', 'shampo clear', 'shampo', 21000, 10, '7b1fe81125ad1da141ed415eccd50af9.jpg', 170, '200x80', 'publish', '1575384642', '1575384642'),
(12, 1, 3, 'shp0003', 'clear menthol 170', 'clear-menthol-170-shp0003', 'shampo clear', 'shampo', 22500, 2, 'e509586a097191b086ef8a27f7cef025.jpg', 170, '150x20', 'publish', '1575384706', '1575386575'),
(13, 1, 3, 'shp0003', 'clear menthol 100', 'clear-menthol-100-shp0003', 'shampo clear', 'shampo', 14500, 10, '342ab72c66654b89db289f0f8cc80169.jpg', 100, '150x20', 'publish', '1575386511', '1575386511');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rekening`
--

CREATE TABLE `t_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(200) NOT NULL,
  `no_rekening` varchar(200) NOT NULL,
  `nama_pemilik` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_rekening`
--

INSERT INTO `t_rekening` (`id_rekening`, `nama_bank`, `no_rekening`, `nama_pemilik`) VALUES
(1, 'BRI', '17099288009', 'Muhamad Farhan'),
(2, 'BNI', '18099288002', 'Muhamad Fitra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total_harga` varchar(255) DEFAULT NULL,
  `tanggal_transaksi` varchar(100) NOT NULL,
  `tanggal_update` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `id_user`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 1, '2322121219hKT1xCiO4dQ3DIj7', 2, '32000', '6', '192000', '1576167761', '1576167761'),
(2, 1, '2322121219hKT1xCiO4dQ3DIj7', 3, '35000', '4', '140000', '1576167761', '1576167761'),
(3, 1, '2323121219rquNOgL1Tsedm95F', 10, '14000', '7', '98000', '1576167822', '1576167822');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(250) DEFAULT NULL,
  `akses_level` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `tanggal_daftar` varchar(250) NOT NULL,
  `tanggal_update` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `alamat`, `telp`, `akses_level`, `active`, `tanggal_daftar`, `tanggal_update`, `foto`) VALUES
(1, 'muhamad fajri2', 'fajri@gmail.com', 'fajri1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'koto baru kubang putiah', '082287770991', 1, 1, '1573656999', '1575866620', 'c0bcfec73773e78e8e5249484c785b14.jpg'),
(2, 'ria anggraini', 'ria@gmail.com', 'ria1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'padang', '082287770992', 3, 1, '1572656992', '1574222222', 'eec6eff3c343338447c730170847b036.jpg'),
(3, 'Fiki Ramadeni', 'fiki1@gmail.com', 'fiki1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'jambi', '082287770993', 2, 1, '1573656922', '1575865273', '7def92d98f6015b09732d3bc889e8996.jpg'),
(4, 'Khairunnisa', 'nisa1@gmail.com', 'nisa1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'koto baru kubang putiah', '085274724877', 3, 1, '1575978519', '1575978703', '36c1ef6e8bb272dee4a80c96707549d8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `role_acces`
--
ALTER TABLE `role_acces`
  ADD PRIMARY KEY (`id_access`);

--
-- Indeks untuk tabel `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indeks untuk tabel `tb_user_acces_menu`
--
ALTER TABLE `tb_user_acces_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_berita`
--
ALTER TABLE `t_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `t_gambar`
--
ALTER TABLE `t_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `t_header_transaksi`
--
ALTER TABLE `t_header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indeks untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `t_konfigurasi`
--
ALTER TABLE `t_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `t_rekening`
--
ALTER TABLE `t_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `role_acces`
--
ALTER TABLE `role_acces`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_user_acces_menu`
--
ALTER TABLE `tb_user_acces_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_berita`
--
ALTER TABLE `t_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_gambar`
--
ALTER TABLE `t_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_header_transaksi`
--
ALTER TABLE `t_header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_konfigurasi`
--
ALTER TABLE `t_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_rekening`
--
ALTER TABLE `t_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

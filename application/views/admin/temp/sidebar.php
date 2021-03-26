<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="header">MAIN NAVIGATION</li>

      <!-- Menu User -->
      <li><a href="<?= base_url('admin/dashboard') ;?>"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i> <span>Pengguna</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('admin/user') ;?>"><i class="fa fa-users"></i> Data Pengguna</a></li>
          <li><a href="<?= base_url('admin/user/tambah') ;?>"><i class="fa fa-user-plus"></i> Tambah Pengguna</a></li>
          <li><a href="<?= base_url('admin/role_access') ;?>"><i class="fa fa-user"></i> Role Access</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-text-o"></i> <span>Produk</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('admin/produk') ;?>"><i class="fa fa-list-alt"></i> Data Produk</a></li>
          <li><a href="<?= base_url('admin/kategori') ;?>"><i class="fa fa-list-ul"></i> Kategori Produk</a></li>
          <li><a href="<?= base_url('admin/gambar') ;?>"><i class="fa fa-image "></i> Data Gambar Produk</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i> <span>Konfigurasi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('admin/Konfigurasi/konfig') ;?>"><i class="fa fa-wrench"></i> Konfigurasi Umum</a></li>
          <li><a href="<?= base_url('admin/konfigurasi/logo') ;?>"><i class="fa fa-file-image-o"></i> Konfigurasi Logo</a></li>
          <li><a href="<?= base_url('admin/konfigurasi/icon') ;?>"><i class="fa fa-meh-o"></i> Konfigurasi Icon</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gear"></i> <span>Management Menu</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('admin/sub_menu/subMenu') ;?>"><i class="fa fa-folder"></i> Management Sub Menu</a></li>
          <li><a href="<?= base_url('admin/menu/mProfile') ;?>"><i class="fa fa-folder-o"></i> Manangement Menu Profile</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= base_url('admin/rekening') ;?>"><i class="fa fa-bank"></i> Rekening</a>
      </li>
      <li>
        <a href="<?= base_url('admin/Transaksi') ;?>"><i class="fa fa-dashboard text-aqua"></i> <span>Transaksi</span></a>
      </li>

      <li>
        <a href="<?= base_url('member/member/home') ;?>">
          <i class="fa fa-arrow-left"></i> <span>Kembali Ke Home</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
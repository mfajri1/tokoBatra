<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('admin/dashboard') ;?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">BTR</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>BATRA</b>KOS</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- Tasks: style can be found in dropdown.less -->

            <!-- tampilan profile  -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('assets/img/myprofile/') . $tampil['foto'] ;?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= ucfirst($tampil['nama']); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- gambar profile -->
                <li class="user-header">
                  <img src="<?= base_url('assets/img/myprofile/') . $tampil['foto'] ;?>" class="img-circle" alt="User Image">

                  <p>
                    <?= ucfirst($tampil['nama']); ?> - <?= ucfirst($tampil['access']) ;?>
                    <small>Member since <?= date('d F Y', $tampil['tanggal_update']) ;?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('auth/logout') ;?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- end profile -->
          </ul>
        </div>
      </nav>
    </header>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          <?= $title; ?>
        </h1>
      </section>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Register</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftar Untuk Menjadi Anggota Baru</p>

    <form action="<?= base_url('auth/registerAksi') ;?>" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="text" name="nama" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('nama', '<div class="text-danger small ml-3">','</div>') ;?>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email', '<div class="text-danger small ml-3">','</div>') ;?>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('username', '<div class="text-danger small ml-3">','</div>') ;?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password', '<div class="text-danger small ml-3">','</div>') ;?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password2" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <?= form_error('password2', '<div class="text-danger small ml-3">','</div>') ;?>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="login.html" class="text-center">Saya Sudah Mempunyai Akun</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

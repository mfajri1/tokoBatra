  <section class="content">
    <div class="row">
      <div class="col-sm-6">
        <div class="callout bg-gelap">
          <div class="row">
            <div class="col-sm-4">
              <img src="<?= base_url('assets/img/myprofile/') . $tampil['foto'];?>" alt="" width="150">    
            </div>
            <div class="col-sm-8 pt">
              <h3><?= ucfirst($tampil['nama']); ?> - <?= ucfirst($tampil['access']) ;?></h3>
              <p><?= $this->session->userdata('email') ;?></p>
              <small class="putih">Member Since <?= date('d F Y', $tampil['tanggal_update']) ;?></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  

  
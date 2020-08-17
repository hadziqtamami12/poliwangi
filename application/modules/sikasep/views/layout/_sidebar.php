 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-primary" id="sidenav-main">
    <div class="scrollbar-inner">
           
     <!-- Brand -->
     <div class="sidenav-header  align-items-center mb-6" >
          <img src="<?= base_url('assets/dashboard/'); ?>img/poliwangi.png"  class="navbar-brand-img logo mb-3 mt-3" alt="...">
          <h5 style="color: white"><?= $this->session->userdata('level_user'); ?></h5>
      </div> 
        
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

        <!-- Admin -->
        <!-- Divider -->
        <hr class="my-2 bg-white">

        <!-- Nav items -->
          <ul class="navbar-nav" id="myTab">
            <?php if ($this->session->userdata('id_level_user') == 2 || $this->session->userdata('id_level_user') == 3): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Dashboard"><h4>Beranda</h4></a>
                </small>
              </h2>
            </li>
            <?php endif; ?>
            
           <?php if ($this->session->userdata('id_level_user') == 5): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link active" href="#"><h4>Beranda</h4></a>
                </small>
              </h2>
            </li>
            <?php endif; ?>

           <?php if ($this->session->userdata('id_level_user') == 3): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Rekap"><h4> Kelola Data Rekapitulasi Presensi</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 0): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Rekap/kirim_laporan"><h4>Kirim Laporan ke Group Telegram</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 2): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Security"><h4>Kelola Jadwal Keamanan</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 2): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Jam_Kerja"><h4>Kelola Jam Kerja Pegawai</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 2): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Golongan"><h4>Kelola PNS/Non PNS</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 2): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Keterangan"><h4>Kelola Keterangan Kehadiran</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 2): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Status_Hari"><h4>Kelola Hari Kerja</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 4): ?>
             <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Jurusan"><h4>Beranda</h4></a>
                </small>
              </h2>
            </li>

            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Jurusan/jurusan"><h4>Kehadiran Pegawai per Hari</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

        <hr class="my-0">


              
          </ul>
          
          <!-- Navigation -->
          <ul class="navbar-nav ">
          <li class="nav-item mb-4">
              <a class="nav-link active bg-white" href="<?= base_url('auth/logout'); ?>">
              <i class="fas fa-fw fa-sign-out-alt text-primary"></i>
                <span class="nav-link-text text-primary font-weight-bold">Log Out</span>
              </a>
            </li>
          </ul>
            
        </div>
      </div>
    </div>
  </nav>
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
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Dashboard"><h4>Dashboard</h4></a>
                </small>
              </h2>
            </li>

           <?php if ($this->session->userdata('id_level_user') == 3): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Rekap"><h4>Rekap</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 3): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Rekap/kirim_laporan"><h4>Kirim Laporan</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 2): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Security"><h4>Security</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 2): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Jam_Kerja"><h4>Jam Kerja</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 2): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Golongan"><h4>Golongan PNS/Non PNS</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 2): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Keterangan"><h4>Ket. Kehadiran</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 2): ?>
            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Status_Hari"><h4>Status Hari Kerja</h4></a>
                </small>
              </h2>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('id_level_user') == 4): ?>
             <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Jurusan/ti"><h4>Kehadiran Teknik Informatika</h4></a>
                </small>
              </h2>
            </li>

            <li class="nav-item" style="padding-left: 10%;">
              <h2>
                <small class="text-muted text-light">
                  <a class="nav-link" href="<?= base_url() ?>sikasep/Jurusan/sipil"><h4>Kehadiran Teknik Sipil</h4></a>
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
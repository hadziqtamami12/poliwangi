<!-- Sidebar -->
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-primary" id="sidenav-main">
    <div class="scrollbar-inner">

     <!-- Brand -->
     <div class="sidenav-header  align-items-center " >
        <a class="navbar-brand" href="<?= base_url('user'); ?>">
          <img src="<?= base_url('assets/'); ?>dashboard/img/sirapat.png"  class="navbar-brand-img" alt="...">
        </a>
      </div>

      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

        <!-- Divider -->
        <hr class="my-2 bg-white">

        <!-- Nav items -->
          <ul class="navbar-nav">

          <li class="nav-item active">
          <li class="nav-item">
                <a class="nav-link" href="<? echo base_url('sirapat/dashboard'); ?>">
                <i class="fa fa-home text-yellow"></i>
                  <span class="nav-link-text text-white">Beranda</span>
                </a>
          </li>

          <li class="nav-item active">
          <li class="nav-item">
                <a class="nav-link" href="<? echo base_url('sirapat/dashboard'); ?>">
                <i class="far fa-list-alt text-yellow"></i>
                  <span class="nav-link-text text-white">Daftar Agenda</span>
                </a>
          </li>
          <li class="nav-item active">
          <li class="nav-item">
                <a class="nav-link" href="<? echo base_url('sirapat/dashboard'); ?>">
                <i class="fas fa-file-upload text-yellow"></i>
                  <span class="nav-link-text text-white">Unggah Agenda</span>
                </a>
          </li>
          <li class="nav-item active">
          <li class="nav-item">
                <a class="nav-link" href="<? echo base_url('sirapat/dashboard'); ?>">
                <i class="fas fa-envelope-open-text text-yellow"></i>
                  <span class="nav-link-text text-white">Undangan Rapat</span>
                </a>
          </li>
          <li class="nav-item active">
          <li class="nav-item">
                <a class="nav-link" href="<? echo base_url('sirapat/dashboard'); ?>">
                <i class="fas fa-sticky-note text-yellow"></i>
                  <span class="nav-link-text text-white">Notulen Rapat</span>
                </a>
          </li>
          <li class="nav-item active">
          <li class="nav-item">
                <a class="nav-link" href="<? echo base_url('sirapat/dashboard'); ?>">
                <i class="fas fa-users text-yellow"></i>
                  <span class="nav-link-text text-white">Absensi</span>
                </a>
          </li>
          <li class="nav-item active">
          <li class="nav-item">
                <a class="nav-link" href="<? echo base_url('sirapat/dashboard'); ?>">
                <i class="fa fa-list pull-left text-yellow"></i>
                  <span class="nav-link-text text-white">Laporan</span>
                </a>
          </li>

          

          </ul>

          <hr class="my-2 bg-white">

            <!-- Navigation -->
            <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-sign-out-alt text-primary"></i>
                  <span class="nav-link-text">Log Out</span>
                </a>
              </li>
            </ul>
              
          </div>
        </div>
      </div>
    </nav>
    
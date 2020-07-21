

<nav class="navbar navbar-top navbar-expand navbar-light bg-transparent border-bottom ">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-1 mt-2">
        <ol class="breadcrumb breadcrumb-links bg-gradient-white">
        <li class="breadcrumb-item" ><a href="#"><i class="fas fa-home"></i></a></li>
        
                <!-- <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Data</li> -->
                <?php foreach ($this->uri->segments as $segment): ?>
                  <?php 
                  $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                  $is_active =  $url == $this->uri->uri_string;
                  ?>

                  <li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
                    <?php if($is_active): ?>
                      <?php echo ucfirst($segment) ?>
                      <?php else: ?>
                        <?php echo ucfirst($segment) ?></a>
                      <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
              </ol>
        </nav>

        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>

          
            
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?= base_url('assets/admin/img/profile/') . $karyawan['foto']; ?>" >
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  text-primary font-weight-bold"><?= $karyawan['nama_karyawan'] ?></span>
                  </div>
                </div>
              </a>
                
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02 text-primary"></i>
                  <span>My profile</span>
                </a>
                  
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/pimpinan/logout'); ?>" class="dropdown-item">
                <i class="fas fa-sign-out-alt text-primary"></i>
                  <span>Logout</span>
                </a>
              </div>
                
            </li>
          </ul>
        </div>
      </div>
      </nav>
     
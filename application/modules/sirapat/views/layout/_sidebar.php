 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-primary" id="sidenav-main">
    <div class="scrollbar-inner">
           
     <!-- Brand -->
     <div class="sidenav-header  align-items-center" >
        <a class="navbar-brand" href="<?= base_url('user'); ?>">
          <img src="<?= base_url('assets/dashboard/'); ?>img/a.png"  class="navbar-brand-img" alt="...">
        </a>
      </div>
        
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

        <!-- Admin -->
        <!-- Divider -->
        <hr class="my-2 bg-white">

        <!-- Nav items -->
          <ul class="navbar-nav">


              
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
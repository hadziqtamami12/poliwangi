<nav class="navbar navbar-expand-lg">
  <button class="btn btn-primary" id="menu-toggle">
    <i class="fa fa-list" id="icon-toggle"></i>
  </button>

  <nav aria-label="breadcrumb" class="nav-breadcrumb pull-left">
    <ol class="breadcrumb alert alert-success">
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





                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h6><?php echo $this->session->userdata('nama_user'); ?></h6>
                        &nbsp;
                        <!-- <span class="fa fa-user"></span> -->
                        <div></div>
                        <!-- <img style="max-height:40px;max-width:40px; border-radius: 50%; margin: auto;" src="<?php echo base_url("assets/admin/img/").$this->session->userdata('photo'); ?>"> -->
                        <!-- <span class="badge badge-primary">9</span>  -->
                        &nbsp;
                        <span class="fa dropdown-toggle"></span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="<? echo base_url(); ?>Logout-User" class="dropdown-item">logout</a>
                      </div>
                    </li>
                  </ul>
                </div>
              </nav>

  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-blue py-9 py-lg-6 pt-lg-6" >
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Sistem Manajemen Informasi</h1>
              <p class="text-lead text-white">Politeknik Negeri Banyuwangi</p>
            </div>
          </div>
          </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-4">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            
            <div class="card-body px-lg-7 py-lg-6">
              <div class="text-center text-muted mb-4">
                <h2>LOGIN USER</h2>
                <!-- <a href="<?= base_url('auth/pimpinan/index'); ?>" class="btn btn-outline-primary btn-sm">Login Sebagai pimpinan ?</a> -->
              </div>
              <hr>

              
              <?= $this->session->flashdata('message'); ?>

              <form role="form" method="post" action="<?= base_url('auth/login'); ?>">

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" type="text" id="email" name="username" 
                    value="<?= set_value('email'); ?>">
                  </div>
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>


                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" id="password" name="password" >
                  </div>
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>

           <!--  <div class="row mt-4" >
            <div class="col-6">
              <a href="<?= base_url('login/forgotpassword'); ?>" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="<?= base_url('auth/registration'); ?>" class="text-light"><small>Create new account</small></a>
            </div>
          </div> -->
                
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary my-4" value="login">Login</button>
                </div>
                <div id="myalert" class="fixed-top">
              <?php echo $this->session->flashdata('alert', true)?>
          </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginmodalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
              <div class="text-center text-muted mb-4">
                <h2>LOGIN PIMPINAN</h2>
              </div>
              <hr>

              <form role="form" method="post" action="<?= base_url('auth/indexpimpinan'); ?>">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control input" placeholder="Username" type="text" id="username" name="username" 
                    value="<?= set_value('username'); ?>">
                  </div>
                </div>


                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control input" placeholder="Password" type="password" id="password" name="password" >
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary my-4">Login</button>
                </div>

                </form>
       
      </div>
    
    </div>
  </div>
</div>


  
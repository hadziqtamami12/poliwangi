<!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom"><img src="<? echo base_url(); ?>assets/admin/img/poliwangi.png">
      <h6><?php echo $this->session->userdata('level_user'); ?></h6>
      </div>
      <div class="list-group list-group-flush" id="myTab">
              

              <a class="list-group-item list-group-item-action" href="<? echo base_url(); ?>sikasep/Dashboard">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="fa fa-list pull-left"></span>Beranda
              </a>



              <?php if ($this->session->userdata('id_level_user') == 3): ?>
                
              <a class="list-group-item list-group-item-action" href="<? echo base_url(); ?>sikasep/Rekap">
                <i class="ni ni-planet text-orange"></i>
                <span class="fa fa-list pull-left"></span>Rekap
              </a>
              <?php endif; ?>
              
              
              <?php if ($this->session->userdata('id_level_user') == 2): ?>
              <a class="list-group-item list-group-item-action" href="<? echo base_url(); ?>sikasep/Security">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="fa fa-list pull-left"></span>Shift Security
              </a>

              <?php endif; ?>
              
              <?php if ($this->session->userdata('id_level_user') == 2): ?>
            
              <a class="list-group-item list-group-item-action" href="<? echo base_url(); ?>sikasep/Jam_Kerja">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="fa fa-list pull-left"></span>Jam Kerja Pegawai
              </a>
            
              <?php endif; ?>
              
              <?php if ($this->session->userdata('id_level_user') == 2): ?>
            
              <a class="list-group-item list-group-item-action" href="<? echo base_url(); ?>sikasep/Golongan">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="fa fa-list pull-left"></span>Golongan Pegawai
              </a>
            
              <?php endif; ?>
              
              <?php if ($this->session->userdata('id_level_user') == 2):  ?> 
            
              <a class="list-group-item list-group-item-action" href="<? echo base_url(); ?>sikasep/Status_Hari">
                <i class="ni ni-key-25 text-info"></i>
                <span class="fa fa-list pull-left"></span>Status Hari Kerja
              </a>
            
              <?php endif; ?>
              
              <?php if ($this->session->userdata('id_level_user') == 2): ?>
            
              <a class="list-group-item list-group-item-action" href="<? echo base_url(); ?>sikasep/Keterangan">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="fa fa-list pull-left"></span>Kehadiran
              </a>
              <?php endif; ?>

              <?php if ($this->session->userdata('id_level_user') == 4): ?>

             <!--  <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-list pull-left"></span>Laporan Presensi Prodi
                </div>
            </a>
            <div id='submenu2' class="collapse sidebar-submenu">
                <a href="<? echo base_url(); ?>sikasep/Laporan/ . $" class="list-group-item list-group-item-action text-white">
                    <span class="menu-collapsed">TI</span>
                </a>
                <a href="<? echo base_url(); ?>sikasep/Laporan/sipil" class="list-group-item list-group-item-action text-white">
                    <span class="menu-collapsed">Sipil</span>
                </a>
            </div>  -->
              
              <?php endif; ?>

            
              
              <!-- <a class="list-group-item list-group-item-action" href="<? echo base_url(); ?>sikasep/Keterangan">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="fa fa-list pull-left"></span>Laporan
              </a> -->
            
      </div>

      <div class="line">&nbsp;</div>

      <div class="btn-logout">
      <div class="line">&nbsp;</div>

        <div class="logout pb-0">
          <a href="<? echo base_url(); ?>Logout-User" class="list-group-item list-group-item-action"> <span class="fa fa-list pull-left"></span> logout</a>
        </div>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
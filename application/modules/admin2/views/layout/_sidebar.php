<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="text-center image">
				<img src="<?php echo base_url('assets/upload/images/foto_profil/'.$this->session->userdata('photo')); ?>" class="img-circle">
			</div>
      <div class="text-center info">
        <p><?php echo $this->session->userdata('last_name'); ?></p>
        <!-- Status -->
        <!-- <a href="<?= base_url(); ?>sikasep/"><i class="fa fa-circle text-success"></i> Online</a> -->
      </div>
    </div>


    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- <?php foreach ($variable as $key ) {
        
      ?>
      <li class="header text-center"><?= $key->nama_jabatan; ?></li>
      <?php } ?> -->
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="<?= base_url(); ?>sikasep"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
      <li class=""><a href="<?= base_url(); ?>sikasep/Rekap"><i class="fa fa-link"></i> <span>Rekap</span></a></li>
      <li class=""><a href="<?= base_url(); ?>sikasep/Security"><i class="fa fa-link"></i> <span>Shift Security</span></a></li>
      <li class=""><a href="<?= base_url(); ?>sikasep/Jam_Kerja"><i class="fa fa-link"></i> <span>Jam Kerja Pegawai</span></a></li>
      <li class=""><a href="<?= base_url(); ?>sikasep/Golongan"><i class="fa fa-link"></i> <span>Golongan Pegawai</span></a></li>
      <li class=""><a href="<?= base_url(); ?>sikasep/Status_Hari"><i class="fa fa-link"></i> <span>Status Hari Kerja</span></a></li>
      <li class=""><a href="<?= base_url(); ?>sikasep/Keterangan"><i class="fa fa-link"></i> <span>Keterangan Kehadiran</span></a></li>
      <!-- <li><a href="<?= base_url(); ?>sikasep/"><i class="fa fa-link"></i> <span>Another Link</span></a></li> -->
      <!-- <li class="treeview">
        <a href="<?= base_url(); ?>sikasep/"><i class="fa fa-link"></i> <span>Multilevel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url(); ?>sikasep/">Link in level 2</a></li>
          <li><a href="<?= base_url(); ?>sikasep/">Link in level 2</a></li>
        </ul>
      </li> -->
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

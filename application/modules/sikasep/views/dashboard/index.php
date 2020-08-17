<!-- <script type="text/javascript">


  setInterval(myTimer, 60000);

  var d = 'tes';
  var a = new Date();
  detik = a.getSeconds();
  menit = a.getMinutes();
  jam = a.getHours();
  var date = jam + ':' + menit + ':' + detik;
  var datanya = '';
  // var x = parseInt((detik).toString());

  function myTimer() {


    if (parseInt(jam.toString()) > 7 && parseInt(jam.toString()) < 16) {

      window.location.href = "<?php echo base_url('sikasep/Dashboard/tes_insert');?>";

      
    }
  }
</script> -->


<!-- <p id="demo"></p> -->
<div class="container-fluid justify-content-center mt-3 row">

  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 m-3 text-center card shadow">
    <div class="card-body">      
      <h4>Pegawai Tidak Masuk</h4>
      <h1>
        <?php 
        $x = 0;
        foreach($tidakmasuk as $q):
          if (isset($q->jum_masuk)) {
            $x = $q->jum_masuk;
          }
        endforeach;

        echo $x;
        ?>
      </h1>
    </div>
  </div>




  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 m-3 text-center card  shadow">
    <div class="card-body"> 
      <h4>Pegawai  Masuk</h4>
      <h1>
        <?php 
        $x = 0;
        foreach($masuk as $q):
          if (isset($q->jum_masuk)) {
            $x = $q->jum_masuk;
          }
        endforeach;

        echo $x;
        ?>
      </h1>
    </div>
  </div>


  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 m-3 text-center card  shadow">
    <div class="card-body"> 
      <h4>Pegawai ijin</h4>
      <h1>
        <?php 
        foreach($ijin as $q):
          echo $q->jum_masuk;
        endforeach;
        ?>
      </h1>
    </div>
  </div>


</div> 


<div class="container-fluid mt-2">

<div class="container-fluid mt-2">

  <?php if ($this->session->userdata('id_level_user') == 2): ?>
    <a class="btn mb-3 btn-success" href="<?php echo base_url(); ?>sikasep/Dashboard/export_data"> <i class="fa fa-download"></i> Download </a>
  <?php endif; ?>
  <?php if ($this->session->userdata('id_level_user') == 2): 
    $bg = 'btn mb-3 btn-danger';
    $pesan = 'Belum Divalidasi';
    
	if(date('d')==date('t')):
	foreach ($validasi as $p):
      if ($p->status == 'tervalidasi'):
        $bg = 'btn mb-3 btn-info';
        $pesan = 'Sudah Tervalidasi';
      endif;
    endforeach;
    ?>
    <a class="<?php echo $bg ?>"  href="<?php echo base_url(); ?>sikasep/Dashboard/validasi" title="<?php echo $pesan; ?>"> <i class="fa fa-check"></i> <?= $pesan ?> </a>
    <?php  
  endif;  
endif;

  ?>
  <?php if ($this->session->userdata('id_level_user') == 3):
    foreach ($validasi as $p):
      if ($p->status == 'tervalidasi' and $p->tanggal == date('Y-m-d')):
       ?>
       <a class="btn mb-3 btn-success" href="<?php echo base_url(); ?>sikasep/Dashboard/export_data"> <i class="fa fa-download"></i> Download </a>
       <?php 
     endif; 
   endforeach; 
 endif; 
 ?>

 <div class="card">
  <div class="card-body"> 	

    <table class=" table table-responsive table-striped table-bordered" id="myTable">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Jam Masuk</th>
          <th>Jam Pulang</th>
          <th>Telat</th>
          <th>PSW</th>
          <th>Ijin</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($dashboard as $p){

          ?>
          <tr>
            <td class="no"><?php echo $no++; ?></td>
            <td><?php echo $p->nama_pegawai; ?></td>
            <td><?php echo $p->jabatan; ?></td>
            <td class="text-center"><?php 
            echo $p->jam_masuk;
            

            ?></td> 
            <td class="text-center"><?php 
            echo $p->jam_pulang;


            ?></td> 
            <td><?php echo $p->telat;   ?></td> 
            <td><?php echo $p->psw;   ?></td> 
            <td><?php echo $p->ijin;   ?></td> 
            <td>
              <?php 

            
          
          		echo $p->status;
              ?>
            </td>


          </tr>

        <?php } ?>

      </tbody>
    </table>

  </div>
</div></div>








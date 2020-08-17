<div class="container-fluid mt-3">

<!--     <?php if ($this->session->userdata('id_level_user') == 3):
      foreach ($validasi as $p):
        if ($p->status == 'tervalidasi' and $p->tanggal == date('Y-m-d')):
           ?>
           <a class="btn btn-success" href="<?php echo base_url(); ?>sikasep/Rekap/export_data_rekap"> <i class="fa fa-download"></i> Download </a>
           <?php 
       endif; 
   endforeach; 
endif; 
?> -->

<!-- table -->

<div class="mb-3">
    <a class="btn btn-info" href="<?= base_url('sikasep/Rekap') ?>">
        <i class="fa fa-arrow-left"></i>
    </a>
</div>

<div class="card mt-5">
    <div class="card-body">

        <?php 
        $no = 1;
        foreach($dPegawai as $p):
            ?>
            
            <div class="row mb-5">
                <div class="col-2 text-right shadow-lg">
                    <img class="" width="100px" height="150px" src="<?= base_url('assets/dashboard/img/').$p->nama_pegawai.'.jpg'; ?>">
                </div>
                <div class="col-10">
                    <table cellpadding="10">
                        <tr>
                            <td>Nama Pegawai</td>
                            <td>:</td>
                            <td><?php echo $p->nama_pegawai; ?></td>
                        </tr>
                        <tr>
                            <td>NIP Pegawai</td>
                            <td>:</td>
                            <td><?php echo $p->id_pegawai; ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan Pegawai</td>
                            <td>:</td>
                            <td><?php echo $p->jabatan; ?></td>
                        </tr>
                    </table>
                </div>   
            </div>

        <?php endforeach; ?>

        
	

    <table  class=" table table-responsive  table-striped table-bordered" id="myTable" style="width:100%">
      <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Telat</th>
                    <th>PSW</th>
                    <th>Ijin</th>
                    <th>Status</th>
                    <!-- <th>Keterangan</th> -->
                </tr>
            </thead>
            <tbody>
                <?php 

                $no = 1;
                foreach($detail as $p):
                    ?>

                    <tr>
                        <td class="no"><?php echo $no++; ?></td>
                        
                        <td><?php echo $p->tanggal_sekarang;?></td> 
                        <td><?php echo $p->jam_masuk;?></td> 
                        <td><?php echo $p->jam_pulang;?></td> 
                        <td><?php echo $p->telat;   ?></td> 
                        <td><?php echo $p->psw;   ?></td> 
                        <td><?php echo $p->ijin;   ?></td> 
            <td>
              <?php 

            
          
          		echo $p->status;
              ?>
            </td>



              </tr>
          <?php endforeach; ?>

      </tbody>
  </table>


</div>


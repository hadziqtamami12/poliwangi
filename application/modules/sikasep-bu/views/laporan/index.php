
      <div class="card-info p-4">

            <div class="card-info-item">
                <span class="fal fa-signal-alt-3 fa-4x"></span>
                <div class="info-data">
                  <h6>Pegawai Tidak Masuk</h6>
                  <h3>
                    <?php 
                    $x = 0;
                      foreach($tidakmasuk as $q):
                          if (isset($q->jum_masuk)) {
                            $x = $q->jum_masuk;
                          }
                        endforeach;

                        echo $x;
                    ?>
                  </h3>
              </div>
          </div>




            <div class="card-info-item">
                <span class="fal fa-signal-alt-3 fa-4x"></span>
                <div class="info-data">
                  <h6>Pegawai  Masuk</h6>
                  <h3>
                    <?php 
                    $x = 0;
                      foreach($masuk as $q):
                          if (isset($q->jum_masuk)) {
                            $x = $q->jum_masuk;
                          }
                        endforeach;

                        echo $x;
                    ?>
                  </h3>
              </div>
          </div>


            <div class="card-info-item">
                <span class="fal fa-signal-alt-3 fa-4x"></span>
                <div class="info-data">
                  <h6>Pegawai ijin</h6>
                  <h3>
                    <?php 
                      foreach($ijin as $q):
                        echo $q->jum_masuk;
                        endforeach;
                    ?>
                  </h3>
              </div>
          </div>


</div>  




<div class="container-main">

<?php if ($this->session->userdata('id_level_user') == 2): ?>
<a class="btn btn-success" href="<?php echo base_url(); ?>sikasep/Dashboard/export_data"> <i class="fa fa-download"></i> Download </a>
<?php endif; ?>
<?php if ($this->session->userdata('id_level_user') == 2): 
      $bg = 'btn btn-danger';
      $pesan = 'Belum Divalidasi';
      foreach ($validasi as $p):
        if ($p->status == 'tervalidasi'):
          $bg = 'btn btn-info';
          $pesan = 'Sudah Tervalidasi';
        endif;
      endforeach;
?>
<a class="<?php echo $bg ?>" href="<?php echo base_url(); ?>sikasep/Dashboard/validasi" title="<?php echo $pesan; ?>"> <i class="fa fa-check"></i> Validasi </a>
<?php  
  endif;
?>
<?php if ($this->session->userdata('id_level_user') == 3):
      foreach ($validasi as $p):
        if ($p->status == 'tervalidasi' and $p->tanggal == date('Y-m-d')):
 ?>
<a class="btn btn-success" href="<?php echo base_url(); ?>sikasep/Dashboard/export_data"> <i class="fa fa-download"></i> Download </a>
<?php 
    endif; 
    endforeach; 
    endif; 
?>
<!-- <a class="btn btn-success" href="<?php echo base_url(); ?>sikasep/Dashboard/telegram_bot"> <i class="fa fa-download"></i> Tele tes </a> -->

    <!-- table -->
    <table class="table table-bordered table-striped" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Jurusan</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
                <!-- <th>Keterangan</th> -->
                <th>Telat</th>
                <th>PSW</th>
                <!-- <th>Total Terima</th> -->
                <th>Ijin</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($dashboard as $p){
            // if (strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja) > 0) {
            //     $telat = strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja);
            //     $telat = $telat / 60 . ' menit';
            // }
            // if (strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja) <= 0) {
            //     $telat = '-';
            // }
            // if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) < 0) {
            //     $psw   = strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja);
            //     $psw = $psw / -60 . ' menit';
            // }
            // if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) >= 0) {
            //     $psw = '-';
            // }
            // if ($p->jam_masuk == Null || $p->jam_pulang == Null) {
            //     $telat = "Absen woy";
            //     $psw = "Absen woy";
            // }

            ?>
            <tr>
                <td class="no"><?php echo $no++; ?></td>
                <td><?php echo $p->nama_pegawai; ?></td>
                <td><?php echo $p->jabatan; ?></td>
                <td><?php echo $p->jurusan; ?></td>
                <td class="text-center"><?php 
                    if ($p->jam_masuk != Null) {
                        echo $p->jam_masuk;
                    } else{
                        echo "-";
                    }

                ?></td> 
                <td class="text-center"><?php 
                    if ($p->jam_pulang != Null) {
                        echo $p->jam_pulang;
                    } else{
                        echo "-";
                    }

                ?></td> 
                <td><?php echo $p->telat;   ?></td> 
                <td><?php echo $p->psw;   ?></td> 
                <td><?php echo $p->ijin;   ?></td> 
                <td>
                  <?php 
                    
                    if (isset($p->jam_masuk)) {
                      echo "Masuk";
                    }
                    elseif($p->ijin == 'ada') {
                        echo "Ijin";
                    }
                    else{
                      echo "Tidak Masuk";
                    }
                    //kondisi hari kerja
                    // if ($p->jam_masuk == Null) {
                    //     if ($p->id_status_hari == Null && $p->ijin == 'tidak ada') {
                    //         if ($namahari == 'Saturday' || $namahari == 'Sunday') {
                    //             echo "Sabtu/Minggu";
                    //         }
                    //         else{
                    //             echo "Tidak Masuk";
                    //         }
                    //     }
                    //     elseif ($p->id_status_hari != Null || $p->ijin == 'ada'){
                    //         echo "Masuk";
                    //     }
                    //     else{
                    //         echo 'Tidak Masuk';
                    //     }
                    // }
                    // else {
                    //     echo "Masuk";
                    // }
                  ?>
                  
                </td>


            </tr>

        <?php } ?>

    </tbody>
</table>

</div>






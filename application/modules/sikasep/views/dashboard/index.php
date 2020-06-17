<!--  <div class="row">
          <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
            <div id="pie-chart"></div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
            <div id="pie-chart2"></div>
          </div>
      </div> -->
      <div class="card-info p-4">

            <div class="card-info-item">
                <span class="fal fa-signal-alt-3 fa-4x"></span>
                <div class="info-data">
                  <h6>Pegawai Tidak Masuk</h6>
                  <h3><?php 
foreach($tidakmasuk as $q){

             switch ($namahari) {
                            case 'Saturday':
                                $q->jum_masuk--;
                                break;
                            case 'Sunday':
                                $q->jum_masuk--;
                                break;
                            
                            default:
                                $q->jum_masuk = $q->jum_masuk;
                                break;
                        }  
                  if ($q->jum_masuk == 0) {
                      echo "0";
                  }else{
                     echo $q->jum_masuk;
                  } 
              }
                  ?></h3>
              </div>
          </div>




            <div class="card-info-item">
                <span class="fal fa-signal-alt-3 fa-4x"></span>
                <div class="info-data">
                  <h6>Pegawai  Masuk</h6>
                  <h3><?php 
foreach($masuk as $q){

             switch ($namahari) {
                            case 'Saturday':
                                $q->jum_masuk++;
                                break;
                            case 'Sunday':
                                $q->jum_masuk++;
                                break;
                            
                            default:
                                $q->jum_masuk = $q->jum_masuk;
                                break;
                        }  
                  if ($q->jum_masuk == 0) {
                      echo "0";
                  }else{
                     echo $q->jum_masuk;
                  } 
              }
                  ?></h3>
              </div>
          </div>


            <div class="card-info-item">
                <span class="fal fa-signal-alt-3 fa-4x"></span>
                <div class="info-data">
                  <h6>Pegawai ijin</h6>
                  <h3><?php 
foreach($ijin as $q){
  
                  if ($q->jum_masuk == 0) {
                      echo "";
                  }else{
                     echo $q->jum_masuk;
                  } 
              }
                  ?></h3>
              </div>
          </div>


</div>  









<div class="container-main">


    <!-- table -->
    <table class="table table-bordered table-striped" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
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
            if (strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja) > 0) {
                $telat = strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja);
                $telat = $telat / 60 . ' menit';
            }
            if (strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja) <= 0) {
                $telat = '-';
            }
            if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) < 0) {
                $psw   = strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja);
                $psw = $psw / -60 . ' menit';
            }
            if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) >= 0) {
                $psw = '-';
            }
            if ($p->jam_masuk == Null || $p->jam_pulang == Null) {
                $telat = "Absen woy";
                $psw = "Absen woy";
            }

            ?>
            <tr>
                <td class="no"><?php echo $no++; ?></td>
                <td><?php echo $p->nama_pegawai; ?></td>
                <td><?php echo $p->jabatan; ?></td>
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
                <td><?php echo $telat;   ?></td> 
                <td><?php echo $psw;   ?></td> 
                <td><?php echo $p->ijin;   ?></td> 
                <td><?php 
                                    //kondisi hari kerja
                if ($p->jam_masuk == Null) {
                    if ($p->id_status_hari == Null && $p->ijin == 'tidak ada') {
                        if ($namahari == 'Friday' || $namahari == 'Sunday') {
                            echo "Sabtu/Minggu";
                        }
                        else{
                            echo "Tidak Masuk";
                        }
                    }
                    elseif ($p->id_status_hari != Null || $p->ijin == 'ada'){
                        echo "Masuk";
                    }
                    else{
                        echo 'Tidak Masuk';
                    }
                }
                else {
                    echo "Masuk";
                }
                ?></td>


            </tr>

        <?php } ?>

    </tbody>
</table>

</div>




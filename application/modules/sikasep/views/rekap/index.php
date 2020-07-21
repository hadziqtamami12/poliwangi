<div class="container-fluid mt-5">
    
<?php if ($this->session->userdata('id_level_user') == 3):
      foreach ($validasi as $p):
        if ($p->status == 'tervalidasi' and $p->tanggal == date('Y-m-d')):
 ?>
<a class="btn btn-success" href="<?php echo base_url(); ?>sikasep/Rekap/export_data_rekap"> <i class="fa fa-download"></i> Download </a>
<?php 
    endif; 
    endforeach; 
    endif; 
?>
        <!-- table -->
        <div class="card">
            <div class="card-body">

            <table class="table table-hover table-responsive" id="myTable">
    <thead class="thead">
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Hadir</th>
                            <th>Total Jam</th>
                            <th>Uang Makan/Hari</th>
                            <th>Total Uang Makan</th>
                            <th>Pajak</th>
                            <th>Total Terima</th>
                            <!-- <th>Keterangan</th> -->
                        </tr>
                    </thead>
                    <tbody>
                  <?php
                        $no = 1;
                        foreach($rekap as $p){


                            ?>
                            <tr>
                                <td class="no"><?php echo $no++; ?></td>
                                <td><?php echo $p->nama_pegawai; ?></td>
                                <td><?php echo $p->id_pegawai; ?></td>
                                <td><?php echo $p->jabatan; ?></td>
                                <td><?php echo $p->level_golongan;?></td> 
                                <td><?php
                                        echo $p->total_hadir;

                                 ?></td>
                                <td>
                                    <?php
                                    
                                        echo $p->total_jam;

                                    ?>
                                        
                                    </td>
                                <td>Rp. <?php echo $p->uang_makan ?></td>
                                <td>Rp. <?php 
                                if ($p->total_jam == 0) {
                                    $p->total_hadir = 0;
                                    $total = $p->uang_makan * $p->total_hadir;
                                }
                                else{
                                    $total = $p->uang_makan * $p->total_hadir;
                                }

                                echo $total;
                                 ?></td>
                                <td>Rp. <?php echo $p->pajak; ?></td>
                                <td colspan="2">Rp. <?php 
                                    echo $total_semua = $total - $p->pajak;
                                 ?></td>
                                <!-- <td><?php echo $p->keterangan; ?></td> -->


                            </tr>
                        <?php } ?>
                        
            </tbody>
        </table>
 

</div>



<div class="container mt-5 ">
    
<?php if ($this->session->userdata('id_level_user') == 3):
			if(date('d')!=date('t')):
				echo '<h1 class="text-center">Data hanya dapat dilihat pada akhir bulan</h1>';
			else:
			foreach ($validasi as $p):
        	if ($p->status == 'tervalidasi' and $p->tanggal == date('Y-m-d')):
 ?>
<a class="btn btn-success" href="<?php echo base_url(); ?>sikasep/Rekap/export_data_rekap"> <i class="fa fa-download"></i> Download </a>

        <!-- table -->
 <div class="container card">
  <div class="card-body"> 	

    <table class="table table-responsive table-striped table-bordered" id="myTable">
    		<thead>
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
                            <th>Aksi</th>
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

                                echo $p->total;
                                 ?></td>
                                <td>Rp. <?php echo $p->pajak; ?></td>
                                <td>Rp. <?php 
                                    echo $p->total_semua;
                                 ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('sikasep/Rekap/detail_rekap_pegawai/'.$p->id_pegawai);?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>

                            </tr>
                        <?php } ?>
                        
            </tbody>
        </table>
 
    </div>

     </div>
  <?php 
		else:
			echo "<h1 class='text-center'>Silahkan hubungi kasubbag kepegawaian untuk melakukan validasi</h1>";
      endif;      
    endforeach; 
	endif;        

    endif; 
?>


</div>




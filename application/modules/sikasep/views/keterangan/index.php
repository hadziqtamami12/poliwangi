<div class="container-fluid mt-5">
    
    <!-- <button class="btn btn-info btn-add" data-toggle="modal" data-target="#addModal"> Tambah keterangan <span class="fa fa-plus"></span> </button> -->

        <!-- table -->
 <div class="container card">
  <div class="card-body"> 	

    <table class="table table-striped table-bordered" id="myTable">
            <thead>
                        <tr scope="row">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Ijin</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                  <?php
                        $no = 1;
                        foreach($keterangan as $p){
                            ?>
                            <tr>
                                <td class="no"><?php echo $no++; ?></td>
                                <td><?php echo $p->tanggal_sekarang; ?></td>
                                <td><?php echo $p->nama_pegawai; ?></td>
                                <td><?php echo $p->ijin; ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info btn-sm btn-edit-keterangan" data-id_presensi="<?= $p->id_presensi;?>"  data-ijin="<?= $p->ijin;?>"><span class="fa fa-pencil"></span></a>
                                    <!-- <a href="<?= base_url('admin/keterangan/delete_data/'.$p->id_keterangan);?>"  class="btn btn-danger"><span class="fa fa-trash"></span></a> -->
                                </td>


                            </tr>
                        <?php } ?>
                        
            </tbody>
        </table>

</div>
</div>
</div>






<form action="<?php echo base_url(). 'sikasep/Keterangan/update_data'; ?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="editModalKeterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="KeteranganModal">Kelola Keterangan Ijin Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <input type="hidden" name="id_presensi" class="id_presensi">
 
                <!-- <div class="form-group">
                    <label>Keterangan Telat</label>
                    <select name="keterangan_telat" class="form-control keterangan_telat">
                        <option value="tidak ada">Tidak Ada</option>
                        <option value="ada" class="keterangan_telat_ada">Ada
                        </option>
                            <input type="file" name="keterangan_telat_file" class="keterangan_telat_file">
                    </select>
                </div>

                <div class="form-group">
                    <label>Keterangan PSW</label>
                    <select name="keterangan_psw" class="form-control keterangan_psw">
                        <option value="tidak ada">Tidak Ada</option>
                        <option value="ada" class="keterangan_psw_ada">Ada
                        </option>
                            <input type="file" name="keterangan_psw_file" class="keterangan_psw_file">
                    </select>
                </div> -->

                <div class="form-group">
                    <label>Ijin</label>
                    <select name="ijin" class="form-control ijin">
                        <option value="tidak ada">Tidak Ada</option>
                        <option value="ada" class="ijin_ada">Ada
                        </option>
                            <input type="file" name="lampiran" id="lampiran" class="ijin_file">
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
            </div>
        </div>
        </div>
    </form>



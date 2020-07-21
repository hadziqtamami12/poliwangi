

<div class="container-main">
    
    <!-- <button class="btn btn-info btn-add" data-toggle="modal" data-target="#addModal"> Tambah security <span class="fa fa-plus"></span> </button> -->

    </br>
        <!-- table -->
        <table class="table table-bordered table-striped" id="myTable">
    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jadwal</th>
                            <th>Aksi</th>
<!--                             <th>Hadir</th>
                            <th>Uang Makan/Hari</th>
                            <th>Total Uang Makan</th>
                            <th>Pajak</th>
                            <th>Total Terima</th> -->
                            <!-- <th>security</th> -->
                        </tr>
                    </thead>
                    <tbody>
                  <?php
                        $no = 1;
                        foreach($security as $p){
                            ?>
                            <tr>
                                <td class="no"><?php echo $no++; ?></td>
                                <td><?php echo $p->nama_pegawai; ?></td>
                                <td><?php echo $p->id_pegawai; ?></td>
                                <td><?php echo $p->keterangan_hari; ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info btn-edit-security" 
                                    data-id_pegawai="<?= $p->id_pegawai;?>" data-nama_pegawai="<?= $p->nama_pegawai;?>" data-id_jam_kerja="<?= $p->id_jam_kerja;?>">
                                      <span class="fa fa-pencil"></span></a>
                                    <!-- <a href="<?= base_url('admin/security/delete_data/'.$p->id_security);?>"  class="btn btn-danger"><span class="fa fa-trash"></span></a> -->
                                </td>


                            </tr>
                        <?php } ?>
                        
            </tbody>
        </table>

</div>




<form action="<?php echo base_url(). 'sikasep/security/update_data'; ?>" method="post">
        <div class="modal fade" id="editModalSecurity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="securityModal">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
<!--                 <div class="form-group">
                    <label>Nama</label>
                    <label class="form-control nama_pegawai" name="nama_pegawai" placeholder="" value="<?= $p->nama_pegawai;?>">
                      <?= $p->nama_pegawai;?>
                    </label>
                </div> -->

                <div class="form-group">
                    <label>Jadwal</label>
                    <select name="keterangan_hari" class="form-control keterangan_hari">
                        <?php foreach($jam_kerja as $p):?>
                        <option value="<?= $p->id_jam_kerja;?>"><?= $p->keterangan_hari;?></option>
                        <?php endforeach;?>
                    </select>
                </div>


             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_pegawai" class="id_pegawai">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>



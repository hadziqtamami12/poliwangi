

<div class="container-fluid mt-5">    

    <!-- <button class="btn btn-info btn-add-golongan" data-toggle="modal" data-target="#addModalGolongan"> Tambah Golongan <span class="fa fa-plus"></span> </button> -->


<!-- <div class="text-center golongan">
  <select name="id_level_golongan" class="btn btn-info p-10 " onchange="cari_golongan()">
  <select name="id_level_golongan" class="btn btn-info p-10 " onchange="cari_golongan()">
      <option value="all">- All -</option>
      <?php foreach ($golongan as $p): ?>
        <option value="<?php echo $p->id_level_golongan; ?>"><?php echo $p->level_golongan; ?></option>
      <?php endforeach; ?>
    </select>
</div> -->

                <div class="card">
            <div class="card-body">

            <table class="table table-hover table-responsive" id="myTable">
            <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>Level Golongan</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>

                            <!-- <th>Keterangan</th> -->
                        </tr>
                    </thead>
                    <tbody>
  <?php
  $no=1;
  foreach ($f_golongan->result() as $p): ?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $p->nama_pegawai; ?></td>
    <td><?php echo $p->jabatan; ?></td>
    <td><?php echo $p->level_golongan; ?></td>
    <td><?php echo $p->jurusan; ?></td>
    <td class="text-center">
        <a href="#" class="btn btn-info btn-edit-golongan" data-id_pegawai="<?= $p->id_pegawai;?>" data-nama_pegawai="<?= $p->nama_pegawai;?>" data-jabatan="<?= $p->jabatan;?>" data-level_golongan="<?= $p->level_golongan;?>" data-jurusan="<?= $p->jurusan;?>"><span class="fa fa-pencil"></span></a>
        <!-- <a href="<?= base_url('admin/pegawai/delete_data/'.$p->id_pegawai);?>"  class="btn btn-danger"><span class="fa fa-trash"></span></a> -->
    </td>
  </tr>
  <?php
  endforeach;
  ?>

                        
            </tbody>
        </table>
 
</div>
</div>
</div>




<form action="<?php echo base_url(). 'sikasep/golongan/update_data'; ?>" method="post">
        <div class="modal fade" id="editModalGolongan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <!-- <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control nama_pegawai" name="nama_pegawai" placeholder="" value="<?= $p->nama_pegawai;?>">
                </div> -->
                 
                <div class="form-group">
                    <label>jabatan</label>
                    <select name="jabatan" class="form-control jabatan">
                        <?php foreach($jabatan as $p):?>
                        <option value="<?= $p->id_jabatan;?>"><?= $p->jabatan;?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label>level_golongan</label>
                    <select name="level_golongan" class="form-control level_golongan">
                        <?php foreach($golongan as $p):?>
                        <option value="<?= $p->id_level_golongan;?>"><?= $p->level_golongan;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
 
                <div class="form-group">
                    <label>jurusan</label>
                    <select name="jurusan" class="form-control jurusan">
                        <?php foreach($jurusan as $p):?>
                        <option value="<?= $p->id_jurusan;?>"><?= $p->jurusan;?></option>
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






    








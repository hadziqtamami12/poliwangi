  
   <!-- Header -->
 <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
            <div class="col-lg-12 text-center">
             <h1 class="text-white"><i class="fas fa-users"></i> Data Karyawan</h1>
            </div>
            </div>
          
          </div>
            </div>
             </div>
    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
                </div>
            <?php endif ?>
              
            <?= form_error('karyawan', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>

              <a href="" class="btn btn-primary mb-5 mt-3" data-toggle="modal" data-target="#addkaryawan">Tambah Karyawan</a>
              <a href="" class="btn btn-primary mb-5 mt-3" data-toggle="modal" data-target="#addunit">Tambah Unit</a>
              <div class="col-lg-12">
              
              <div class="table-responsive">
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">NO</th>
          
          <th scope="col">UNIT</th>
          <th scope="col">NIK/NIP</th>
          <th scope="col">NAMA</th>
          <th scope="col">JABATAN</th>
          
          <th scope="col">AKSI</th>
          <!-- <th scope="col">NO HP</th>
          <th scope="col">ALAMAT</th> -->
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php foreach ($karyawan as $dk) : ?>
      

        <tr>
          <th scope="row"><?= $i ?></th>
         
          <td><?= $dk->unit ?></td>
          <td><?= $dk->nik_nip ?></td>
          <td><?= $dk->nama_karyawan ?></td>
          <td><?= $dk->jabatan ?></td>
          
          <td>
          
          <a href="<?= base_url('sirapat/superadmin/detalkaryawan') ?>" 
          data-toggle="modal" data-target="#detail<?= $i ?>" class="badge badge-info">Detail</a> 
          <a href=""  class="badge badge-success">Edit</a> 
          <a href=""  class="badge badge-danger">Delete</a> 
          
          </td>

          <!-- Modal -->
<div class="modal fade" id="detail<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="detail" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detail">Detail Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="container-fluid">
            
            <div class="row">

            <div class="col-lg-4">
            <img src="<?= base_url('assets/dashboard/img/profile/') . $dk->foto ?>" class="img-thumbnail"><br>
            </div>
            

            <div class="col-lg-8">
            <div class="row">
            <div class="col-sm-3">
                <h5>UNIT</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $dk->unit ?></span>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-3">
                <h5>NIK/NIP</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $dk->nik_nip ?></span>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-3">
                <h5>NAMA KARYAWAN</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $dk->nama_karyawan ?></span>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-3">
                <h5>TEMPAT, TGL LAHIR</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $dk->ttl ?></span>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-3">
                <h5>JABATAN</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $dk->jabatan ?></span>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-3">
                <h5>EMAIL</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $dk->email ?></span>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-3">
                <h5>NO HP</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $dk->no_hp ?></span>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-3">
                <h5>ALAMAT</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $dk->alamat ?></span>
            </div>
            </div>
            
            </div>
            <!-- row -->
            </div>
            

            
            
            </div>

      </div>
      <div class="modal-footer">
      <div class="float-left">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>


        </tr>

      <?php $i++; ?>
      <?php endforeach; ?>
        
      </tbody>
      </table>  
      </div>
      </div>

          </div>
          </div>
          </div>
          </div>
          </div>


<!-- Modal -->
<div class="modal fade" id="addkaryawan" tabindex="-1" role="dialog" aria-labelledby="addkaryawan" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addkaryawan">Tambah Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="container-fluid">
      <form acttion="<?= base_url('superadmin/data_karyawan'); ?>" method="post">
            <div class="row">

            <div class="col-lg-6">
            <div class="form-group">
              <label for="formGroupExampleInput2">NIK/NIP</label>
              <input type="text" class="form-control" 
              id="nik_nip" placeholder="NIK/NIP" name="nik_nip" value="<?= set_value('nik_nip'); ?>">
              <span class="help-block"><?= form_error('nik_nip', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="form-group">
            <label for="formGroupExampleInput2">UNIT</label>

                        <select name="unit" id="unit" class="form-control" value="<?= set_value('unit'); ?>">
                        <option value="">Pilih Unit</option>
                        <?php foreach ($unit as $p) : ?>
                        <option value="<?= $p['id']; ?>"><?= $p['unit']; ?></option>
                        <?php endforeach; ?>
                        </select>
                        <?= form_error('unit', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            </div>    
            
            <div class="col-lg-12">
            <div class="form-group">
              <label for="formGroupExampleInput2">Nama Karyawan</label>
              <input type="text" class="form-control" 
              id="nama_karyawan" placeholder="Nama karyawan" name="nama_karyawan" value="<?= set_value('nama_karyawan'); ?>">
              <span class="help-block"><?= form_error('nama_karyawan', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="form-group">
              <label for="formGroupExampleInput2">TEMPAT, TGL LAHIR</label>
              <input type="text" class="form-control" 
              id="ttl" placeholder="Tempat, tanggal lahir" name="ttl" value="<?= set_value('ttl'); ?>">
              <span class="help-block"><?= form_error('ttl', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

                          

            <div class="col-lg-6">
            <div class="form-group">
              <label for="formGroupExampleInput2">JABATAN</label>
              <input type="text" class="form-control" 
              id="jabatan" placeholder="Jabatan" name="jabatan" value="<?= set_value('jabatan'); ?>">
              <span class="help-block"><?= form_error('jabatan', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="form-group">
              <label for="formGroupExampleInput2">EMAIL</label>
              <input type="text" class="form-control" 
              id="email" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
              <span class="help-block"><?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="form-group">
              <label for="formGroupExampleInput2">NO HANDPHONE</label>
              <input type="text" class="form-control" 
              id="no_hp" placeholder="No Handphone" name="no_hp" value="<?= set_value('no_hp'); ?>">
              <span class="help-block"><?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-12">
            <div class="form-group">
            <label for="formGroupExampleInput2">FOTO</label>
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="foto" name="foto" disabled>
            <label class="custom-file-label" for="foto">Choose file</label>
            </div>          
            <span class="help-block"><?= form_error('foto', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-12">
            <div class="form-group">
              <label for="formGroupExampleInput2">ALAMAT</label>
              <input type="text" class="form-control" 
              id="alamat" placeholder="Alamat" name="alamat" value="<?= set_value('alamat'); ?>">
              <span class="help-block"><?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addunit" tabindex="-1" role="dialog" aria-labelledby="addunit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addunit">Tambah Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="container-fluid">
      <form action="<?= base_url('sirapat/superadmin/data_karyawan/addunit'); ?>" method="post">

            <div class="form-group">
              <label for="formGroupExampleInput2">NAMA UNIT</label>
              <input type="text" class="form-control" 
              id="unit" placeholder="Nama Unit" name="unit" value="<?= set_value('unit'); ?>">
              <span class="help-block"><?= form_error('unit', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>

            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
      
      

  
   <!-- Header -->
   <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
         <?php $gruprapat = $this->db->get_where('grup_tipe', ['id' => $this->uri->segment(5)])->row();?>

            <div class="col-lg-12 text-center">
             <h1 class="text-white"><i class="fas fa-users"></i> <?= $gruprapat->nama_grup ?></h1>
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

              <a href="" class="btn btn-primary mb-5 mt-3" data-toggle="modal" data-target="#addanggota">Tambah Anggota</a>
              <div class="col-lg-12">
              
              <div class="table-responsive">
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">NO</th>

          <th scope="col">NAMA GRUP</th>
          <th scope="col">NAMA ANGGOTA</th>
          <th scope="col">AKSI</th>
          <!-- <th scope="col">NO HP</th>
          <th scope="col">ALAMAT</th> -->
        </tr>
      </thead>
      <tbody>

      <?php $i=1 ?>
        <?php foreach($grup as $g) { ?>

        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $g->nama_grup ?></td>
          <td><?= $g->nama_karyawan ?></td>
          <td>
          
          <a href="<?= base_url('sirapat/superadmin/detalkaryawan') ?>" 
          data-toggle="modal" data-target="#detail<?= $i ?>" class="badge badge-info">Detail</a> 

          <a href="<?= base_url('sirapat/superadmin/manajemen_grup/delanggota/').$g->id_grup.'/'.$this->uri->segment(5); ?>"  class="badge badge-danger">Delete</a> 
          
          </td>
        </tr>

        <?php $i++; ?>
        <?php } ?>
      
        
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
<div class="modal fade" id="addanggota" tabindex="-1" role="dialog" aria-labelledby="addanggota" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addanggota">Tambah Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     
      <div class="modal-body">

      <form action="<?= base_url('sirapat/superadmin/manajemen_grup/addanggota'); ?>" method="post">
        <div class="form-group">
        <label for="formGroupExampleInput2">karyawan</label>
        <input type="hidden" id="gruptipe" name="gruptipe" value="<?= $this->uri->segment(5) ?>">

                    <select name="karyawan" id="karyawan" class="form-control">
                    <option value="">Pilih Karyawan</option>
                    <?php foreach ($karyawan as $k) : ?>
                    <option value="<?= $k['idkaryawan']; ?>"><?= $k['nama_karyawan']; ?></option>
                    <?php endforeach; ?>
                    </select>
                    <?= form_error('karyawan', '<small class="text-danger pl-1">', '</small>'); ?>
        </div>

      </div>

      <div class="modal-footer">
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>

      
      

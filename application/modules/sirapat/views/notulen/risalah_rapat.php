<div class="container-fluid ">
      <div class="row">
        <div class="col-xl-12">
        <?= $this->session->flashdata('message'); ?>
          <div class="card">
          
            <div class="card-header bg-transparent">
            <h2 class="box-title mb-3">Risalah Rapat</h2>


<form action="<?= base_url('sirapat/admin/notulen/tambahrisalah'); ?>" method="post">

  <div class="row">

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Subtopik</label>
    <input type="hidden" name="idnotulen" id="idnotulen" value="<?= $this->uri->segment(5); ?>">
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Subtopik" name="subtopik" value="<?= set_value('subtopik'); ?>">
    <?= form_error('subtopik', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Catatan Kaki</label>
    <textarea  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Catatan Kaki" name="catatankaki" value="<?= set_value('catatankaki'); ?>"></textarea>
    <?= form_error('catatankaki', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  </div>

  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
  <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
 
  <?php $data = $this->db->get_where('notulen', ['idnotulen' => $this->uri->segment(5)])->row();?>
  <a href="<?= base_url('sirapat/admin/notulen/detail_notulen/'.$data->id_agenda )?>" class="btn btn-dark float-right"><i class="fa fa-undo"></i> Kembali</a>

</form>
            

</div>
</div>
            <div class="card">
            <div class="card-body">
            
            <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">SUBTOPIK</th>
                <th scope="col">CATATAN KAKI</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1 ?>
            <?php foreach ($risalah_rapat as $key => $rs) { ?>
                <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $rs->subtopik ?></td>
                <td><?= $rs->catatan_kaki ?></td>
                  <td >
                  
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?= $i ?>"><i class="fa fa-edit"></i></button>

                  <a href="<?= base_url('sirapat/admin/notulen/delpsbw/'.$rs->id_risalahrapat.'/'.$this->uri->segment(5)); ?>" 
                  class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>

                  </td>

      <!-- Modal -->
      <div class="modal fade" id="editmodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Risalah Rapat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="container-fluid">

              <form action="<?= base_url('sirapat/admin/notulen/updaterisalah/'.$this->uri->segment(5)) ?>" method="post">

              <div class="row">

              <div class="col-lg-12">
              <div class="form-group">
                <label for="formGroupExampleInput2">Subtopik</label>
                <input type="hidden" name="idnotulen" id="idnotulen" value="<?= $this->uri->segment(5); ?>">
                <input type="hidden" id="id" name="id" value="<?= $rs->id_risalahrapat ?>" >
                <input type="text" class="form-control" 
                id="formGroupExampleInput2" placeholder="Subtopik" name="subtopik" value="<?= $rs->subtopik ?>">
                <?= form_error('subtopik', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              </div>

              <div class="col-lg-12">
              <div class="form-group">
                <label for="formGroupExampleInput2">Catatan Kaki</label>
                <input  type="text" class="form-control" 
                id="formGroupExampleInput2" placeholder="Catatan Kaki" name="catatankaki" value="<?= $rs->catatan_kaki ?>">
                <?= form_error('catatankaki', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              </div>

              </div>
              <button type="submit" class="btn btn-primary">Update</button>
              </div>

            </div>
            <div class="modal-footer">
            
            </div>
            </form>
          </div>
        </div>
      </div>
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
<div class="container-fluid ">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
            <h2 class="box-title mb-3">Berita Acara Rapat</h2>

<?= $this->session->flashdata('message'); ?>

<?php  $beritaacara= $this->db->get_where('berita_acara', ['id_notulen' => $this->uri->segment(5)])->row(); 
if(empty($beritaacara)) { ?>

<form action="<?= base_url('sirapat/admin/notulen/tambahberitaacara'); ?>" method="post">

  <div class="row">

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tanggal</label>
    <input type="hidden" name="idnotulen" id="idnotulen" value="<?= $this->uri->segment(5); ?>">
    <input  type="date" class="form-control" 
    id="formGroupExampleInput2" placeholder="Tanggal" name="tanggal" value="<?= set_value('tanggal'); ?>">
    <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Hasil</label>
    <textarea  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Hasil" name="hasil" value="<?= set_value('hasil'); ?>"></textarea>
    <?= form_error('hasil', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  </div>

  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
  <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
  
  <?php $data = $this->db->get_where('notulen', ['idnotulen' => $this->uri->segment(5)])->row();?>
  <a href="<?= base_url('sirapat/admin/notulen/detail_notulen/'.$data->id_agenda )?>" class="btn btn-dark float-right"><i class="fa fa-undo"></i> Kembali</a>

</form>

<?php }else{ ?>
  
<?php } ?>


</div>
</div>
            <div class="card">
            <div class="card-body">

            <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">HASIL</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i=1;
             $beritaacara= $this->db->get_where('berita_acara', ['id_notulen' => $this->uri->segment(5)])->row(); 
            
            if(empty($beritaacara)){
            ?>
                <tr>
                <td>Data Masih Kosong</td>
                </tr>
            <?php }else{ ?>
              <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $beritaacara->tanggal ?></td>
                <td><?= $beritaacara->hasil?></td>
                  <td >
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?= $i ?>"><i class="fa fa-edit"></i></button>

                  <a href="<?= base_url('sirapat/admin/notulen/delberitaacara/'.$beritaacara->id_beritaacara.'/'.$this->uri->segment(5)); ?>" 
                  class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
                  </td>

                  <!-- Modal -->
      <div class="modal fade" id="editmodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Berita Acara</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="container-fluid">

              <form action="<?= base_url('sirapat/admin/notulen/updateberitaacara/'.$this->uri->segment(5)) ?>" method="post">

              <div class="row">

              <div class="col-lg-12">
              <div class="form-group">
                <label for="formGroupExampleInput2">Subtopik</label>
                <input type="hidden" id="id" name="id" value="<?= $beritaacara->id_beritaacara ?>" >
                <input type="date" class="form-control" 
                id="formGroupExampleInput2" placeholder="Tanggal" name="tanggal" value="<?= $beritaacara->tanggal ?>">
                <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              </div>

              <div class="col-lg-12">
              <div class="form-group">
                <label for="formGroupExampleInput2">Hasil</label>
                <input  type="text" class="form-control" 
                id="formGroupExampleInput2" placeholder="Hasil" name="hasil" value="<?= $beritaacara->hasil ?>">
                <?= form_error('hasil', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              </div>

              </div>
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-danger">Reset</button>
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
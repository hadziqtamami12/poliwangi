<div class="container-fluid ">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
            <h2 class="box-title mb-3">Permasalahan, Solusi, dan Batas Waktu</h2>

<?= $this->session->flashdata('message'); ?>

<form action="<?= base_url('sirapat/admin/notulen/tambahpsbw'); ?>" method="post">

  <div class="row">

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Topik / Bahasan</label>
    <input type="hidden" name="id_notulen" id="id_notulen" value="<?= $this->uri->segment(5)?>">
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Topik / Bahasan" name="topikbahasan" value="<?= set_value('topibahasank'); ?>">
    <?= form_error('topikbahasan', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Uraian / Permasalahan</label>
    <textarea  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Uraian / Permasalahan" name="uraian" value="<?= set_value('uraian'); ?>"></textarea>
    <?= form_error('uraian', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Solusi</label>
    <textarea  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Solusi" name="solusi" value="<?= set_value('solusi'); ?>"></textarea>
    <?= form_error('solusi', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">PIC</label>
    <input  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Pic" name="pic" value="<?= set_value('pic'); ?>">
    <?= form_error('pic', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Batas Waktu</label>
    <input  type="date" class="form-control" 
    id="formGroupExampleInput2" placeholder="Batas Waktu" name="bataswaktu" value="<?= set_value('bataswaktu'); ?>">
    <?= form_error('bataswaktu', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  </div>

  <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
  <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>

  <?php $data = $this->db->get_where('notulen', ['idnotulen' => $this->uri->segment(5)])->row();?>
  <a href="<?= base_url('sirapat/admin/notulen/detail_notulen/'.$data->id_agenda )?>" class="btn btn-dark float-right"><i class="fa fa-undo"></i> Kembali</a>

<!-- end form -->
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
                <th scope="col">TOPIK/BAHASAN</th>
                <th scope="col">URAIAN/PERMASALAHAN</th>
                <th scope="col">SOLUSI</th>
                <th scope="col">PIC</th>
                <th scope="col">BATAS WAKTU</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1 ?>
            <?php foreach ($pbsw as $key => $p) { ?>
                <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $p->topik_bahasan?></td>
                <td><?= $p->uraian?></td>
                <td><?= $p->solusi?></td>
                <td><?= $p->pic?></td>
                <td><?= $p->bataswaktu?></td>
                  <td >

                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?= $i ?>"><i class="fa fa-edit"></i></button>

                  <a href="<?= base_url('sirapat/admin/notulen/delpsbw/'.$p->idpermasalahan.'/'.$this->uri->segment(5)); ?>" 
                  class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
                  
                  </td>

                  

                  <!-- Modal -->
      <div class="modal fade" id="editmodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Permasalahan, Solusi, Batas Waktu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="container-fluid">

              <form action="<?= base_url('sirapat/admin/notulen/updatepsbw/'.$this->uri->segment(5)) ?>" method="post">

              <div class="row">

              <div class="col-lg-12">
              <div class="form-group">
                <label for="formGroupExampleInput2">Topik / Bahasan</label>
                <input type="hidden" name="idnotulen" id="idnotulen" value="<?= $this->uri->segment(5); ?>">
                <input type="hidden" id="id" name="id" value="<?= $p->idpermasalahan ?>" >
                <input type="text" class="form-control" 
                id="formGroupExampleInput2" placeholder="Topik Bahasan" name="topikbahasan" value="<?= $p->topik_bahasan ?>">
                <?= form_error('subtopik', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              </div>

              <div class="col-lg-12">
              <div class="form-group">
                <label for="formGroupExampleInput2">Uraian</label>
                <input  type="text" class="form-control" 
                id="formGroupExampleInput2" placeholder="Uraian" name="uraian" value="<?= $p->uraian ?>">
                <?= form_error('uraian', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              </div>

              <div class="col-lg-12">
              <div class="form-group">
                <label for="formGroupExampleInput2">Solusi</label>
                <input  type="text" class="form-control" 
                id="formGroupExampleInput2" placeholder="Solusi" name="solusi" value="<?= $p->solusi ?>">
                <?= form_error('uraian', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              </div>

              <div class="col-lg-12">
              <div class="form-group">
                <label for="formGroupExampleInput2">PIC</label>
                <input  type="text" class="form-control" 
                id="formGroupExampleInput2" placeholder="PIC" name="pic" value="<?= $p->pic ?>">
                <?= form_error('pic', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              </div>

              <div class="col-lg-12">
              <div class="form-group">
                <label for="formGroupExampleInput2">Batas Waktu</label>
                <input  type="date" class="form-control" 
                id="formGroupExampleInput2" placeholder="Batas Waktu" name="bataswaktu" value="<?= $p->bataswaktu ?>">
                <?= form_error('bataswaktu', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
              </div>

              </div>
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-primary">Reset</button>
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
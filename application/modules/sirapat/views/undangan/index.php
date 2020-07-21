<div class="container-fluid ">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">

<?= $this->session->flashdata('message'); ?>
<?= form_open_multipart('sirapat/admin/undangan'); ?>

  <div class="row">
  <div class="col-lg-6">
  <div class="form-group <?= form_error('nama_agenda') ? 'has-error' : null?>">
    <label for="formGroupExampleInput2">Nama Agenda</label>
    <input type="text" class="form-control" 
    id="nama_agenda" placeholder="Agenda" name="nama_agenda">
    <span class="help-block"><?= form_error('nama_agenda', '<small class="text-danger pl-1">', '</small>'); ?></span>
  </div>
  </div>

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tanggal</label>
    <input type="date" class="form-control" 
    id="tanggal" placeholder="Another input placeholder" name="tanggal">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>
  

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tempat</label>
    <input type="text" class="form-control" 
    id="tempat" placeholder="Tempat" name="tempat">
  <?= form_error('tempat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

<div class="col-lg-6">
<div class="form-group">
<label for="formGroupExampleInput2">Jenis Rapat</label>

            <select name="jenis_rapat" id="jenis_rapat" class="form-control">
            <option value="">Select Menu</option>
            <?php foreach ($jenisrapat as $m) : ?>
            <option value="<?= $m['id']; ?>"><?= $m['rapat']; ?></option>
            <?php endforeach; ?>
            </select>
            <?= form_error('jenis_rapat', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>

  </div>
 
  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Peserta Rapat</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Peserta Rapat" name="peserta_rapat">
    <?= form_error('peserta_rapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>
  

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Nomor Agenda</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Nomor Agenda" name="nomor_agenda">
    <?= form_error('nomor_agenda', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Hal</label>
    <textarea  class="form-control" 
    id="formGroupExampleInput2" placeholder="Hal" name="hal"></textarea>
    <?= form_error('hal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Lampiran</label>
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
    <label class="custom-file-label" for="lampiran">Choose file</label>
    </div>
    <?= form_error('lampiran', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-danger">Hapus</button>

<?php form_close(); ?>

</div>
</div>
</div>
</div>
</div>
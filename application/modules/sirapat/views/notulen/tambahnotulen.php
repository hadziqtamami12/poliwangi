<div class="container-fluid ">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
            <h2 class="box-title mb-3">Notulensi Rapat</h2>

<?= $this->session->flashdata('message'); ?>
<?= form_open_multipart('sirapat/admin/notulen/tambahnotulen'); ?>

  <div class="row">

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tanggal</label>
    <input type="hidden" class="form-control" 
    id="id_agenda" name="id_agenda" value="<?= $this->uri->segment(5) ?>">
    <input type="date" class="form-control" 
    id="tanggal" placeholder="Another input placeholder" name="tanggal" value="<?= set_value('tanggal'); ?>">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Ruang Rapat</label>
    <input type="text" class="form-control" 
    id="nama_agenda" placeholder="Ruang Rapat" name="ruang_rapat" value="<?= set_value('ruang_rapat'); ?>">
    <span class="help-block"><?= form_error('ruang_rapat', '<small class="text-danger pl-1">', '</small>'); ?></span>
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Waktu Mulai</label>
    <input type="time" class="form-control" 
    id="waktu" placeholder="Contoh : 12:00 Wib" name="waktumulai" value="<?= set_value('waktumulai'); ?>">
  <?= form_error('waktumulai', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Waktu Selesai</label>
    <input type="time" class="form-control" 
    id="waktu" placeholder="Contoh : 12:00 Wib" name="waktuselesai" value="<?= set_value('waktuselesai'); ?>">
  <?= form_error('waktuselesai', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Surat Undangan No.</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Surat Undangan No." name="nomor_surat" value="<?= set_value('nomor_surat'); ?>">
    <?= form_error('nomor_surat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  
  <div class="col-lg-3">
  <div class="form-group">
  <label for="formGroupExampleInput2">Jenis Rapat</label>

              <select name="jenis_rapat" id="jenis_rapat" class="form-control" value="<?= set_value('jenis_rapat'); ?>">
              <option value="">Select Menu</option>
              <?php foreach ($jenisrapat as $m) : ?>
              <option value="<?= $m['id']; ?>"><?= $m['rapat']; ?></option>
              <?php endforeach; ?>
              </select>
              <?= form_error('jenis_rapat', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Daftar Hadir</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Daftar Hadir" name="daftar_hadir" value="<?= set_value('daftar_hadir'); ?>">
    <?= form_error('daftar_hadir', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Total Hadir</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Total Hadir" name="total_hadir" value="<?= set_value('total_hadir'); ?>">
    <?= form_error('total_hadir', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
  <label for="formGroupExampleInput2">Ketua Rapat</label>

              <select name="ketua_rapat" id="pimpinan" class="form-control" value="<?= set_value('ketua_rapat'); ?>">
              <option value="">Pilih Ketua Rapat</option>
              <?php foreach ($pimpinan as $p) : ?>
              <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
              <?php endforeach; ?>
              </select>
              <?= form_error('ketua_rapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">PIC</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="PIC" name="pic" value="<?= set_value('pic'); ?>">
    <?= form_error('pic', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Foto</label>
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="foto" name="foto_rapat">
    <label class="custom-file-label" for="foto">Upload Foto</label>
    </div>
    <?= form_error('foto_rapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Ringkasan</label>
    <textarea  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Ringkasan" name="ringkasan" value="<?= set_value('ringkasan'); ?>"></textarea>
    <?= form_error('ringkasan', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  </div>

  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
  <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
  <button type="submit" class="btn btn-dark float-right"><i class="fa fa-plus"></i> Tambah Risalah Rapat</button>

<?php form_close(); ?>

</div>
</div>
</div>
</div>
</div>
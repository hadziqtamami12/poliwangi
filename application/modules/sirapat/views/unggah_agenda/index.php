<div class="container-fluid ">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
            <h2 class="box-title mb-3">Unggah Agenda Rapat</h2>

<?= $this->session->flashdata('message'); ?>
<?= form_open_multipart('sirapat/admin/TambahAgenda'); ?>

  <div class="row">

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Nomor Surat</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Nomor Surat" name="nomor_agenda" value="<?= set_value('nomor_agenda'); ?>">
    <?= form_error('nomor_agenda', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-8">
  <div class="form-group">
    <label for="formGroupExampleInput2">Kepada </label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Kepada" name="peserta_rapat" value="<?= set_value('peserta_rapat'); ?>">
    <?= form_error('peserta_rapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tanggal</label>
    <input type="text" class="form-control" 
    id="datepicker" placeholder="Masukan Tanggal" name="tanggal" autocomplete="off" value="<?= set_value('tanggal'); ?>">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Jam Mulai</label>
    <input type="time" class="form-control" 
    id="waktu" placeholder="Contoh : 12:00 Wib" name="jmmulai" value="<?= set_value('jmmulai'); ?>">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Jam Selesai</label>
    <input type="time" class="form-control" 
    id="waktu" placeholder="Contoh : 12:00 Wib" name="jmselesai"value="<?= set_value('jmselesai'); ?>">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tempat</label>
    <input type="text" class="form-control" 
    id="tempat" placeholder="Tempat" name="tempat" value="<?= set_value('tempat'); ?>">
  <?= form_error('tempat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <hr class="bg-primary">

  <div class="col-lg-8">
  <div class="form-group <?= form_error('nama_agenda') ? 'has-error' : null?>">
    <label for="formGroupExampleInput2">Nama Agenda</label>
    <input type="text" class="form-control" 
    id="nama_agenda" placeholder="Agenda" name="nama_agenda" value="<?= set_value('nama_agenda'); ?>">
    <span class="help-block"><?= form_error('nama_agenda', '<small class="text-danger pl-1">', '</small>'); ?></span>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Hal</label>
    <input type="text"  class="form-control" 
    id="formGroupExampleInput2" placeholder="Hal" name="hal" value="<?= set_value('hal'); ?>"></input>
    <?= form_error('hal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Lampiran</label>
    <input type="text"  class="form-control" 
    id="formGroupExampleInput2" placeholder="Lampiran" name="lampiran1" value="<?= set_value('lampiran1'); ?>"></input>
    <?= form_error('lampiran1', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Isi Lampiran</label>
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
    <label class="custom-file-label" for="lampiran">Choose file</label>
    </div>
    <?= form_error('lampiran', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
  <label for="formGroupExampleInput2">Grup Rapat</label>

              <select name="gruprapat" id="gruprapat" class="form-control">
              <option value="<?= set_value('gruprapat'); ?>">Select Menu</option>
              <?php 
              $grup = $this->db->get('grup_tipe')->result_array();
              foreach ($grup as $g) : ?>
              <option value="<?= $g['id']; ?>"><?= $g['nama_grup']; ?></option>
              <?php endforeach; ?>
              </select>
              <?= form_error('gruprapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>
 
  <div class="col-lg-4">
  <div class="form-group">
  <label for="formGroupExampleInput2">Unit</label>
              
              <select name="unit" id="unit" class="form-control">
              <option value="<?= set_value('unit'); ?>">Pilih Unit</option>
              <?php 
              $unit = $this->db->get('karyawan_unit')->result_array();
              foreach ($unit as $u) : ?>
              <option value="<?= $u['id']; ?>"><?= $u['unit']; ?></option>
              <?php endforeach; ?>
              </select>
              <?= form_error('unit', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
  <label for="formGroupExampleInput2">Pimpinan</label>

              <select name="pimpinan" id="pimpinan" class="form-control">
              <option value="<?= set_value('pimpinan'); ?>">Pilih Pimpinan</option>
              <?php 
              $karyawan = $this->db->get('karyawan')->result_array();
              foreach ($karyawan as $k) : ?>
              <option value="<?= $k['idkaryawan']; ?>"><?= $k['nama_karyawan']; ?></option>
              <?php endforeach; ?>
              </select>
              <?= form_error('pimpinan', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  </div>

  <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</button>
  <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i>Reset</button>

<?php form_close(); ?>

</div>
</div>
</div>
</div>
</div>



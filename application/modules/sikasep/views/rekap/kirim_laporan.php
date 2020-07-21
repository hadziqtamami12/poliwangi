<!-- <div class="container-fluid mt-5">

	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-8">
					<img src="<?= base_url('assets') ?>/dashboard/img/1.jpg" width="500px" height="300px">
				</div>
				<div class="col-4">
					<form action="<?= base_url() ?>Rekap/kirim_laporan_rekap">
					<?php foreach ($variable as $key => $value):  ?>



					<?php endforeach; ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> -->
<div class="container-fluid ">
      <div class="row">
        <div class="col-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
            <h2 class="box-title mb-3">Kirim Laporan Rekap</h2>

<?= $this->session->flashdata('message'); ?>
<?= form_open_multipart('sikasep/Rekap/kirim_laporan_rekap'); ?>

  <div class="row">
  <div class="col-8">
					<img src="<?= base_url('assets') ?>/dashboard/img/1.jpg" width="500px" height="300px">
				</div>
  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Pilih Lampiran</label>
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
    <label class="custom-file-label" for="lampiran">Choose file</label>
    </div>
    <?= form_error('lampiran', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>


 


  </div>

  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Unggah</button>
  <!-- <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i>Reset</button> -->

<?php form_close(); ?>

</div>
</div>
</div>
</div>
</div>



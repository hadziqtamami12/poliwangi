<div class="container-main">
    <br>
    <h1>Edit Jam Kerja Pegawai</h1>
     <form action="<?php echo base_url(); ?>sikasep/Jam_Kerja/edit" method="post">
  <div class="form-row">
    <div class="form-group col-12">
      <label for="inputEmail4">Hari</label>
      <select class="form-control" name="id_jam_kerja">
        <!-- <option disabled="" selected="" hidden="">Pilih</option> -->
            
<?php foreach ($jam_kerja as $p) { ?>
<option <?php if($p->id_jam_kerja == "your desired id"){ echo 'selected="selected"'; } ?> value="<?php echo $p->id_jam_kerja ?>"><?php echo $p->keterangan_hari?> </option>
<?php } ?>
           <!--  <?php
              foreach($jam_kerja as $p) { ?>
              <option value="<?php echo $p->keterangan_hari ?>">
                <?php echo $p->keterangan_hari ?>

              </option>

            <?php } ?> -->
      </select>
    </div>
    <div class="form-group col-12">
      <label for="inputEmail4">Jam Masuk</label>
      <input type="time" class="form-control" name="jam_masuk" placeholder="Jam Masuk">

    </div>
    <div class="form-group col-12">
      <label for="inputPassword4">Jam Pulang</label>
      <input type="time" class="form-control" name="jam_pulang" placeholder="Password">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Perbarui</button>
</form>

  <div class="container" id="keterangan-jamkerja">
    <table border="0" cellpadding="3">
      <tr>
        <td><h5><b>Keterangan</b></h5></td>       
      </tr>
      <?php
              foreach($jam_kerja as $p) { ?>
      <tr>
          <td><?php echo $p->keterangan_hari; ?></td>
          <td>:</td>      
          <td><?php echo $p->jam_masuk_kerja; ?></td>
          <td>-</td>
          <td><?php echo $p->jam_pulang_kerja; ?></td>
          <td>WIB</td>
      </tr>
    <?php } ?>
    </table>
  </div>
</div>


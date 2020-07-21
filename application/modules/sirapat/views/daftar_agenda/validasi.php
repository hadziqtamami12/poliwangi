       <!-- Header -->
 <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
          <?php $agenda = $this->db->get_where('agenda_rapat', ['id' => $this->uri->segment(5)])->row()?>
            <div class="col-lg-12 text-center">
             <h1 class="text-white"><i class="fas fa-book"></i> Validasi Agenda Rapat</h1>
             <span class="text-white"><?= $agenda->nama_agenda?></span><br>
             <span class="text-white"><?= $agenda->tanggal?></span>
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

        <form method="post" action="<?= base_url('sirapat/admin/agenda/sendvalidasi') ?>" >

        <div class="row">

        <div class="col-lg-6">
        <div class="form-group">
        <label for="formGroupExampleInput2">Pilih Pimpinan :</label>

                    <select name="pimpinan" id="pimpinan" class="form-control">
                    <option value="">Pilih Pimpinan</option>
                    <?php 
                    
                    foreach ($pimpinan as $p) : ?>
                   
                      <option value="<?= $p['idkaryawan']; ?>"><?= $p['nama_karyawan']; ?></option>
                    
                    <?php endforeach; ?>
                    </select>
                    <?= form_error('pimpinan', '<small class="text-danger pl-1">', '</small>'); ?>
                   
                    <button type="submit" class="btn btn-primary mt-3">Kirim ke pimpinan</button>
        </div>
        </div>

        <div class="col-lg-3">
        <div class="form-group">
          <input type="hidden" class="form-control" 
          id="id_agenda" placeholder="Agenda" name="id_agenda" value="<?= $this->uri->segment(5); ?>">
        </div>
        </div>

                
        </div>
        </form>

        </div>
        </div>

          <div class="card">
          
            <div class="card-header bg-transparent">

            <h2 class="box-title mt-3">Pimpinan</h2>

          <?= $this->session->flashdata('message') ?>        

        <section class="content">
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA DOSEN</th>
          <th scope="col">STATUS</th>
          <th scope="col">QR CODE</th>

          <th scope="col">AKSI</th>
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php foreach ($daftar as $data) : ?>
      
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $data->nama_karyawan; ?></td>
          
          <?php $validasi = $this->db->get_where('validasi_agenda', ['id_agenda' => $this->uri->segment(5)])->row();
          if($data->status == 1){
          ?>
          <td><span class="text-primary">Sudah Di Validasi</span></td>
          <?php }else{ ?>
          <td> <span class="text-danger">Belum Di Validasi</span></td>
          
          <?php } ?>

          <?php if($data->status == 1) { ?>
          <td><img src="<?= base_url('assets/file/qr-code/').$data->qrcode ?>" class="img-thumbnail"
          style="width: 50px;"></td>
          <?php }else{ ?>
          <td>-</td>
          <?php } ?>
          
          <td>
            <a href="<?= base_url('sirapat/admin/agenda/delvalidasi/'.$data->id_validasi.'/'.$this->uri->segment(5)); ?>" 
            class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></a>
          </td>
        </tr>

      <?php $i++; ?>
      <?php endforeach; ?>
        
      </tbody>
      </table> 
      
      </section>
      </div>

          </div>
          </div>
          </div>
          </div>
          </div>

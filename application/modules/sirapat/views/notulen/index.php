  <!-- Header -->
  <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
        
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-primary d-inline-block mb-0 align-center">Notulen Rapat</h6>
              
            </div>
          </div>
            
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                  
        </div>
      </div>
    </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row justify-content-center">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body">

            <div class="row">
            <div class="col-md-4">
            <h2 class="box-title">Cari Agenda</h2>
            </div>

            <div class="col-md-8">

            <div class="row">
            <div class="col">
            <div class="form-group">
            <select class="form-control form-control-sm" id="sel1">
                <option>Jenis Rapat</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            </div>
            </div>
            
            <div class="col">
            <div class="form-group">
                <input type="date" class="form-control form-control-sm" 
                id="tanggal" placeholder="Tanggal" name="tanggal">
            <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>  
            </div>
            
            <div class="col">
            <div class="form-group">
                <input type="input" class="form-control form-control-sm" 
                id="tanggal" placeholder="Cari Agenda" name="cari">
            </div> 
            </div>

            </div>
            </div>
            </div>
            </div>

          <?= $this->session->flashdata('message') ?>        

            </div>

            <div class="card mb-10">
            <div class="card-body">

            <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">NAMA AGENDA</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">TEMPAT</th>
                <th scope="col">NOMOR AGENDA</th>
                <th scope="col">HAL</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>

            <?php $i=1; ?>
            <?php foreach ($data_agenda as $key => $data) : ?>
            
                <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $data->nama_agenda ?></td>
                <td><?= $data->tanggal; ?></td>
                <td><?= $data->tempat ?></td>
                <td><?= $data->nomor_agenda; ?></td>
                <td><?= $data->hal; ?></td>
                  <td >
                  <a href="<?= base_url('sirapat/admin/notulen/viewnotulen/'.$data->id); ?>" 
                  class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Notulen"><i class="fa fa-file-signature"></i>Notulen</a>
                  
                  <a href="<?= base_url('sirapat/admin/notulen/detail_notulen/'.$data->id); ?>" 
                  class="btn btn-dark btn-sm"><i class="fa fa-forward"></i></a>
                  </td>
                </tr>

                <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>

           

            </table>
            </div>

            </div>
            </div>

          </div>
          </div>
          </div>
          </div>
          </div>


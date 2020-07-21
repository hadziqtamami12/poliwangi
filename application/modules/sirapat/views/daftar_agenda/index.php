
    <!-- Page content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">

          <?= $this->session->flashdata('message'); ?>        

              <section class="content">
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
      <?php foreach ($daftar_agenda as $da) : ?>
      
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $da->nama_agenda; ?></td>
          <td><?= $da->tanggal; ?></td>
          <td><?= $da->tempat ?></td>
          <td><?= $da->nomor_agenda; ?></td>
          <td><?= $da->hal; ?></td>


          <form action="<?= base_url('sirapat/daftar_agenda/del'); ?>" method="post">
          <input type="hidden" name="delete" value="<?= $da->id ?>">
          
          <td onclick="javascript : return confirm('Hapus Agenda?')">
          <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

          </td>
          </form>

          <td class="pl-0">
          <?= anchor('sirapat/daftar_agenda/edit/'.$da->id, 
          '<button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>')?>
          </td>

          <td class="pl-0">
          <?= anchor('sirapat/daftar_agenda/detail/'.$da->id, 
          '<button class="btn btn-success btn-sm" 
          data-toggle="modal" data-target="#detailmodal"><i class="fa fa-search-plus"></i></button>')?>
          </td>

        </tr>

      <?php $i++; ?>
      <?php endforeach; ?>
        
      </tbody>
      </table>  

      <!-- Modal -->
      <div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      </section>
      </div>

          </div>
          </div>
          </div>
          </div>
          </div>
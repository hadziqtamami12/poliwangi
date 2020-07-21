

  
    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
              
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>

              <a href="" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#addmenu">Add Menu</a>
              <div class="col-lg-12">
              
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">MENU</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php foreach ($menu as $m) : ?>
      

        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $m['menu']; ?></td>
          <td>
          
          <a href=""  class="badge badge-success">Edit</a> 
          <a href=""  class="badge badge-danger">Delete</a> 
          
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


<!-- Modal -->
<div class="modal fade" id="addmenu" tabindex="-1" role="dialog" aria-labelledby="addmenu" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addmenu">Add Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form acttion="<?= base_url('superadmin/menu'); ?>" method="post">
      <div class="modal-body">
            <div class="form-group">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
      
      

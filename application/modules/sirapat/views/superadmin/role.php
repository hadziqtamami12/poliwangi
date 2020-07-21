

  
    <!-- Page content -->
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
              
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>

              <a href="" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#addrole">Add Role</a>
              <div class="col-lg-12">
              
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">ROLE</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php foreach ($role as $r) : ?>
      

        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $r['role']; ?></td>
          <td>
          
          <a href="<?= base_url('sirapat/superadmin/role/roleaccess/') . $r['id']; ?>"  class="badge badge-primary">Access</a> 
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
<div class="modal fade" id="addrole" tabindex="-1" role="dialog" aria-labelledby="addrole" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addrole">Add Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form acttion="<?= base_url('superadmin/role'); ?>" method="post">
      <div class="modal-body">
            <div class="form-group">
            <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
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
      
      

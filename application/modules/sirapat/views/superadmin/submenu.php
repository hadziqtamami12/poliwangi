<div class="container-fluid mt-5">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
                </div>
            <?php endif ?>
              
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">Password salah!', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>

              <a href="" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#addsubmenu">Add Sub Menu</a>
              <div class="col-lg-12">
              
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">TITLE</th>
          <th scope="col">MENU</th>
          <th scope="col">URL</th>
          <th scope="col">ICON</th>
          <th scope="col">ACTIVE</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php foreach ($submenu as $sm) : ?>
      

        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $sm['title']; ?></td>
          <td><?= $sm['menu']; ?></td>
          <td><?= $sm['url']; ?></td>
          <td><?= $sm['icon']; ?></td>
          <td><?= $sm['is_active']; ?></td>
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
<div class="modal fade" id="addsubmenu" tabindex="-1" role="dialog" aria-labelledby="addsubmenu" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addsubmenu">Add Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form acttion="<?= base_url('menu/submenu'); ?>" method="post">
      <div class="modal-body">
            <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            
            <div class="form-group">
            <select name="menu_id" id="menu_id" class="form-control">
            <option value="">Select Menu</option>
            <?php foreach ($menu as $m) : ?>
            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
            <?php endforeach; ?>
            </select>
            </div>

            <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Url">
            </div>

            <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
            </div>

            <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
            <label class="form-check-label" for="is_active">
            Active ?
            </label>
            </div>
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
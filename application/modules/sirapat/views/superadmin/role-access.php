

  
    <!-- Page content -->
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
              
            
            <?= $this->session->flashdata('message'); ?>

            <h5>Role : <?= $role['role']; ?></h5>
            <div class="col-lg-12">
              
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">MENU</th>
          <th scope="col">ACCESS</th>
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php foreach ($menu as $m) : ?>
      

        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $m['menu']; ?></td>
          <td>
          
          <div class="form-check">
            <input class="form-check-input" type="checkbox" <?= 
            check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" 
            data-menu="<?= $m['id']; ?>" >
            </div>
          
        </div>
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


      

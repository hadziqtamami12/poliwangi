<div class="container-main">
    <br>
    <h1>Edit User </h1>
   <?php foreach($user as $u){ ?>
  <form action="<?php echo base_url(). 'admin/user/update_data'; ?>" method="post">

  <input type="hidden" name="id_user" value="<?php echo $u->id_user; ?>">  
    <div class="form-row">
    <div class="form-group col-12">
      <label for="inputEmail4">Nama</label>
      <input type="text" class="form-control" name="nama_user" placeholder="Nama" value="$u->nama_user">

    </div>
    <div class="form-group col-12">
      <label for="inputPassword4">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Username" value="$u->username" >
    </div>


  </div>
  <button type="submit" class="btn btn-primary">Perbarui</button>
</form>
<?php } ?>
</div>


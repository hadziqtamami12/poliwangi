

<div class="container-main">
    
    <button class="btn btn-info btn-add" data-toggle="modal" data-target="#addModal"> Tambah User <span class="fa fa-plus"></span> </button>

    </br>
        <!-- table -->
        <table class="table table-bordered table-striped" id="myTable">
    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level User</th>
                            <th>Aksi</th>
<!--                             <th>Hadir</th>
                            <th>Uang Makan/Hari</th>
                            <th>Total Uang Makan</th>
                            <th>Pajak</th>
                            <th>Total Terima</th> -->
                            <!-- <th>Keterangan</th> -->
                        </tr>
                    </thead>
                    <tbody>
                  <?php
                        $no = 1;
                        foreach($user as $p){
                            ?>
                            <tr>
                                <td class="no"><?php echo $no++; ?></td>
                                <td><?php echo $p->nama_user; ?></td>
                                <td><?php echo $p->username; ?></td>
                                <td><?php echo $p->password; ?></td>
                                <td><?php echo $p->level_user; ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info btn-edit" data-id_user="<?= $p->id_user;?>" data-nama_user="<?= $p->nama_user;?>" data-username="<?= $p->username;?>" data-password="<?= $p->password;?>" data-id_level_user="<?= $p->id_level_user;?>"><span class="fa fa-pencil"></span></a>
                                    <a href="<?= base_url('admin/User/delete_data/'.$p->id_user);?>"  class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                </td>


                            </tr>
                        <?php } ?>
                        
            </tbody>
        </table>

</div>

<form action="<?php echo base_url(). 'admin/User/add_data'; ?>" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control nama_user" name="nama_user" placeholder="" value="">
                </div>
                 
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control username" name="username" placeholder="" value="">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control password" name="password" placeholder="" value="">
                </div>
 
                <div class="form-group">
                    <label>Level User</label>
                    <select name="id_level_user" class="form-control id_level_user">
                        <?php foreach($user as $p):?>
                        <option value="<?= $p->id_level_user;?>"><?= $p->level_user;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_user" class="id_user">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>


<form action="<?php echo base_url(). 'admin/User/update_data'; ?>" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control nama_user" name="nama_user" placeholder="" value="<?= $p->nama_user;?>">
                </div>
                 
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control username" name="username" placeholder="" value="<?= $p->username;?>">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control password" name="password" placeholder="" value="<?= $p->password;?>">
                </div>
 
                <div class="form-group">
                    <label>Level User</label>
                    <select name="id_level_user" class="form-control id_level_user">
                        <?php foreach($user as $p):?>
                        <option value="<?= $p->id_level_user;?>"><?= $p->level_user;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_user" class="id_user">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>



<div class="container">
    

        <!-- table -->
        <table class="table table-bordered table-striped" id="myTable">
    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Items Code</th>
                            <th>Items Name</th>
                            <th>Foto</th>
                            <!-- <th>foto</th> -->
                            <!-- <th>Quantity</th>
                            <th>Place</th>
                            <th>Items Type</th> -->
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $no = 1;
                        foreach($graph as $p){
                            ?>
                            <tr>
                                <td class="no"><?php echo $no++; ?></td>
                                <td><?php echo $p->id_user; ?></td>
                                <td><?php echo $p->last_name; ?></td>
                                <td><img style="max-height:100px;max-width:200px;" src="<?php echo base_url('assets/admin/img/'.$p->photo); ?>"></td>
                                <td>
                                    <a href="<?php echo site_url('admin/barang/edit/'.$p->id_user); ?>" class="btn btn-warning btn-sm" title="Sunting barang">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                      <a href="<?php echo site_url('admin/barang/hapus/'.$p->id_user); ?>" class="btn btn-danger btn-sm" title="Hapus Permanen barang">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                    <!-- <a href="<?php echo site_url('admin/barang/history/'.$p->kode_barang); ?>" class="btn btn-info btn-sm" title="Histories">
                                        <span class="fa fa-eye"></span>
                                    </a> -->
                                </td>
                            </tr>

                        <?php } ?>
                        
                    </tbody>
        </table>


</div>
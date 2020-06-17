

<div class="container-main">    

<select name="id_level_golongan"  onchange="cari_golongan()">
      <option value="all">- All -</option>
      <?php foreach ($golongan as $p): ?>
        <option value="<?php echo $p->id_level_golongan; ?>"><?php echo $p->level_golongan; ?></option>
      <?php endforeach; ?>
    </select>



        <table class="table table-bordered table-striped" id="myTable">
    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Status Pegawai</th>

                            <!-- <th>Keterangan</th> -->
                        </tr>
                    </thead>
                    <tbody>
  <?php
  $no=1;
  foreach ($f_golongan->result() as $p): ?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $p->nama_pegawai; ?></td>
    <td><?php echo $p->level_golongan; ?></td>
  </tr>
  <?php
  endforeach;
  ?>

                        
            </tbody>
        </table>
 
</div>



    








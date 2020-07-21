

<div class="text-center">

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>Level Golongan</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>

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
    <td><?php echo $p->jabatan; ?></td>
    <td><?php echo $p->level_golongan; ?></td>
    <td><?php echo $p->jurusan; ?></td>
    <td class="text-center">
        <a href="#" class="btn btn-info btn-edit-golongan" data-id_pegawai="<?= $p->id_pegawai;?>" data-nama_pegawai="<?= $p->nama_pegawai;?>" data-jabatan="<?= $p->jabatan;?>" data-level_golongan="<?= $p->level_golongan;?>" data-jurusan="<?= $p->jurusan;?>"><span class="fa fa-pencil"></span></a>
        <!-- <a href="<?= base_url('admin/pegawai/delete_data/'.$p->id_pegawai);?>"  class="btn btn-danger"><span class="fa fa-trash"></span></a> -->
    </td>
  </tr>
  <?php
  endforeach;
  ?>

                        
            </tbody>
        </table>



<script type="text/javascript">
  
    $(document).ready(function () {


$('.btn-edit-golongan').on('click',function(){
              // get data from button edit
              const id_pegawai = $(this).data('id_pegawai');
              // const nama_pegawai = $(this).data('nama_pegawai');
              const jabatan = $(this).data('jabatan');
              const level_golongan = $(this).data('level_golongan');
              const jurusan = $(this).data('jurusan');
              // Set data to Form Edit
              $('.id_pegawai').val(id_pegawai);
              // $('.nama_pegawai').val(nama_pegawai);
              $('.jabatan').val(jabatan).trigger('change');
              $('.level_golongan').val(level_golongan).trigger('change');
              $('.jurusan').val(jurusan).trigger('change');
              // Call Modal Edit
              $('#editModalGolongan').modal('show');
          });

      $('.btn-add-golongan').on('click',function(){
              
              // Call Modal Edit
              $('#addModalGolongan').modal('show');
          });
    });
  
</script>



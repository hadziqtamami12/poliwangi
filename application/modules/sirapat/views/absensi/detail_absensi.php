     <!-- Header -->
     <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         <?php $agenda = $this->db->get_where('agenda_rapat', ['id' => $this->uri->segment(5)])->row()?>
            <div class="col-lg-12 text-center">
             <h1 class="text-white"><i class="fas fa-users"></i> Absensi Rapat</h1>
             <span class="text-white"><?= $agenda->nama_agenda?></span><br>
             <span class="text-white"><?= $agenda->tanggal?></span>
            </div>

            </div>
                </div>
                    </div>
                        </div>

    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">

            <div class="card-header bg-transparent">

          <div class="row mt-3 mb-3">
          <div class="col">
            <h3 class="box-title">Anggota Rapat</h3>
          </div>

          <div class="col">
            <div class="float-right">
           <a href="<?= base_url('sirapat/admin/absensi/pdf/'.$agenda->id)?>" target="_blank" class="btn btn-danger btn-sm mb-3">PDF</a> 
           <a href="<?= base_url('sirapat/admin/absensi/printabsensi/'.$agenda->id)?>" target="_blank" class="btn btn-primary btn-sm mb-3">PRINT ABSENSI</a> 
            </div>
            </div>
            </div>
          <?= $this->session->flashdata('message') ?>        

        <section class="content">
        <div class="table-responsive">
      <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA KARYAWAN</th>
          <th scope="col">AKSI</th>
        </tr>
      </thead>
      <tbody>
     
      <?php $i=1; ?>
      <?php foreach ($getanggota as $key => $data) : ?>
      
        <tr>
          <th scope="row"><?= $i ?></th>
         
          <td>
          <?= $data->nama_karyawan; ?>
          </td>

          <td>
          
          <div class="form-check">
            <input class="form-check-input" type="checkbox" <?= checkabsen($data->id, $data->idkaryawan); ?>
            data-karyawan="<?= $data->idkaryawan?>" data-agenda="<?= $data->id?>">
          </div>

          </td>
        </tr>

      <?php $i++; ?>
      <?php endforeach; ?>
      
      
      </tbody>
      </table> 
      </div>
      <!-- endtabel -->
      
      </section>
      </div>

          </div>
          </div>
          </div>
          </div>
          </div>


<script>
function deletedata($id) {

Swal.fire({
    title: 'Apakaah anda yakin',
    text: "Data Agenda Akan dihapus",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data!'

}, 
function() {
  $.ajax({
    url: "<?= base_url('sirapat/admin/agenda/del/'); ?>",
    type: "get",
    data: {id:id},
    success:function() {
      Swal.fire('Data berhasil di hapus', 'success');
    }
  });
});

  
}
</script>
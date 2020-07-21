     <!-- Header -->
 <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
            <div class="col-lg-12 text-center">
             <h1 class="text-white"><i class="fas fa-book"></i> Agenda Rapat</h1>
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
            <h2 class="box-title">Daftar Agenda Rapat</h2>
          </div>

          <div class="col">
            <div class="float-right">
            <a href="<?= base_url('sirapat/admin/UnggahAgenda'); ?>" class="btn btn-primary btn-sm">
            <i class="fa fa-plus "></i>Tambah Agenda
            </a>
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
          <th scope="col">NAMA AGENDA</th>
          <th scope="col">TANGGAL</th>
          <th scope="col">TEMPAT</th>
          <th scope="col">GRUP</th>
          <th scope="col">AKSI</th>
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php foreach ($getagenda as $key => $data) : ?>
      
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $data->nama_agenda; ?></td>
          <td><?= $data->tanggal; ?></td>
          <td><?= $data->tempat ?></td>
          <td><?= $data->nama_grup; ?></td>

          <td>
          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailmodal<?= $i ?>"><i class="fa fa-search-plus"></i></button>
          
          
          <?= anchor('sirapat/admin/agenda/edit/'.$data->id, 
          '<button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="edit"><i class="fa fa-edit"></i></button>')?>
         

         <?php $validasi = $this->db->get_where('validasi_agenda', ['id_agenda' => $data->id])->row(); 
         if(empty($validasi)){
         ?>
          <?= anchor('sirapat/admin/agenda/validasi/'.$data->id, 
          '<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Belum dikirim"><i class="fa fa-check"></i></button>')?>
         <?php }else{ ?>
          <?= anchor('sirapat/admin/agenda/validasi/'.$data->id, 
          '<button class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="bottom" title="Dikirim ke pimpinan"><i class="fa fa-check"></i></button>')?>
         <?php } ?>

         
            <a href="<?= base_url('sirapat/admin/agenda/del/' . $data->id); ?>" 
            class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" data-placement="bottom" title="hapus"><i class="fa fa-trash"></i></a>
          </td>


      <!-- Modal -->
      <div class="modal fade" id="detailmodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Agenda Rapat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <div class="container-fluid">
           

            <div class="row">

            <?php if($data->status == 1) { ?>
            <div class="col-lg-4 text-center">
            <img src="<?= base_url('assets/file/qr-code/').$data->qrcode ?>" class="img-thumbnail"><br>
            <h5><?= $data->nama_karyawan ?></h5>
            </div>
            <?php }else{ ?>

            <?php } ?>

            <div class="col-lg-8">
            <div class="row">
            <div class="col-sm-3">
              <h5>Nomor Surat</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $data->nomor_agenda ?></span>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-3">
              <h5>Lampiran</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $data->lampiran ?></span>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-3">
              <h5>Hal</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $data->hal ?></span>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-3">
              <h5>Tanggal</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $data->tanggal ?></span>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-3">
              <h5>Jam Mulai</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $data->jam_mulai ?> WIB</span>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-3">
              <h5>Jam Selesai</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $data->jam_selesai ?> WIB</span>
            </div>
            </div>


            <div class="row">
            <div class="col-sm-3">
              <h5>Tempat</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $data->tempat ?></span>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-3">
              <h5>Grup Rapat</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $data->nama_grup ?></span>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-3">
              <h5>Unit</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $data->unit ?></span>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-3">
              <h5>Peserta Rapat</h5>
            </div>
            <div class="col-sm-9">
                <span>: <?= $data->peserta_rapat ?></span>
            </div>
            </div>



            <div class="row">
            <div class="col-sm-3">
              <h5>Nama Agenda</h5>
            </div>
            <div class="col-sm-9">
                <span class="text-weight-bold">: <?= $data->nama_agenda ?></span>
            </div>
            </div>

            </div>

            </div>
            <!-- end row -->

            </div>

        
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Save</button>

          
              <a href="<?= base_url('sirapat/admin/agenda/print/'.$data->id) ?>" target="_blank" class="btn btn-primary" >

              <i class="fa fa-print">Print</i></a>
              <a href="<?= base_url('sirapat/admin/agenda/pdf/'.$data->id) ?>" target="_blank" class="btn btn-danger" >
              <i class="fa fa-file">PDF</i></a>
            </div>
          </div>
        </div>
      </div>


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
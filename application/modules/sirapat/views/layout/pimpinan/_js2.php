<script src="<?= base_url('assets/'); ?>dashboard/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?= base_url('assets/'); ?>dashboard/js/argon.js?v=1.2.0"></script>
  <!-- SweetAlert -->
  <script src="<?= base_url('assets/'); ?>dashboard/dist/sweetalert2.min.js"></script>
  
  <script src="<?= base_url('assets/'); ?>dashboard/js/myscript.js"></script>

    <!-- <script>
        $(document).ready(function() { 
          $("#prodi").select2();
          $("#pimpinan").select2();
          
        });
    </script>

    <script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    });
    </script> -->

    <script>
    $('.form-check-input').on('click', function(){
      const agendaId=$(this).data('agenda');
      const validasiId=$(this).data('validasi');

      // ajax
      $.ajax({
        url: "<?= base_url('sirapat/pimpinan/validasi/validasimanual');?>",
        type:'post',
        data: {agendaId: agendaId, validasiId: validasiId },
        // ketika berhasil
        success: function(){
          document.location.href="<?= base_url('sirapat/pimpinan/validasi/')?>" + agendaId;
        }

      });
    });
    </script>

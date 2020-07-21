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

<!-- datepicker -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/select2.js"></script>

    <!-- select 2 -->
    <script>
    $(document).ready(function() { 
    $("#pimpinan").select2();
    $("#karyawan").select2();
    $("#unit").select2();
    $("#gruprapat").select2();
    });
    </script>

    <!-- Membuat datepicker -->
    <script>
    // set minDate to 0 for today's date
    $('#datepicker').datepicker({ minDate: 0 });
    </script>


    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>         

    <!-- Membuat tooltip -->
    <script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    });
    </script>

    <script>

    $('.custom-file-input').on('change', function(){
      left fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // $('.form-check-input').on('click', function(){

    //   const menuId = $(this).data('menu');
    //   const roleId = $(this).data('role');

    //   $.ajax({
    //     url: "<?= base_url('sirapat/superadmin/role/changeaccess'); ?>",
    //     type: 'post',
    //     data: {
    //       menuId: menuId,
    //       roleId: roleId
    //     },
    //     success: function(){
    //       document.location.href = "<?= base_url('sirapat/superadmin/role/roleaccess/'); ?>" + roleId;
    //     }
    //   });

    // });
    </script>

    <script>
    $('.form-check-input').on('click', function(){

      const agendaId = $(this).data('agenda');
      const karyawanId = $(this).data('karyawan');

      // ajax
      $.ajax({

        url:"<?= base_url('sirapat/admin/absensi/addabsensi') ?>",
        type: 'post',
        data: {
          agendaId: agendaId,
          karyawanId: karyawanId
        },

        // ketika berhasil
        success: function () {
          document.location.href = "<?= base_url('sirapat/admin/absensi/detail_absensi/')?>" + agendaId;
        }

      });
    });
    </script>

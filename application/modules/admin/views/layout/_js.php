  <!-- <script src="<?php base_url(); ?>../assets/admin/vendor/jquery/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script type="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->
        <!-- <script type="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
  <script src="<?php base_url(); ?>../assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Calendar -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="<?php base_url(); ?>../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script> -->
        <!-- <script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script> -->
  <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <!-- <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script> -->
  <!-- <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script> -->


  <script type="text/javascript">
    $(document).ready(function () {


      $('#myTable').DataTable({});
  

      $('#myTab a[href~="' + location.href + '"]').addClass('active');

      $('.btn-edit').on('click',function(){
              // get data from button edit
              const id_user = $(this).data('id_user');
              const nama_user = $(this).data('nama_user');
              const username = $(this).data('username');
              const password = $(this).data('password');
              const id_level_user = $(this).data('id_level_user');
              // Set data to Form Edit
              $('.id_user').val(id_user);
              $('.nama_user').val(nama_user);
              $('.username').val(username);
              $('.password').val(password);
              $('.id_level_user').val(id_level_user).trigger('change');
              // Call Modal Edit
              $('#editModal').modal('show');
          });

      $('.btn-add').on('click',function(){
              
              // Call Modal Edit
              $('#addModal').modal('show');
          });


    });




  </script>

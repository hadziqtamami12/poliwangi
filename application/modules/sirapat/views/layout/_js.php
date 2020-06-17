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
  <script>

  $('.custom-file-input').on('change', function(){
    left fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
  $('.form-check-input').on('click', function(){

    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
      url: "<?= base_url('admin/changeaccess'); ?>",
      type: 'post',
      data: {
        menuId: menuId,
        roleId: roleId
      },
      success: function(){
        document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
      }
    });

  });
  </script>
</body>

</html>
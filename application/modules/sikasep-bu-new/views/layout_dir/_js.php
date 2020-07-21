  <!-- <script src="<?php base_url(); ?>../assets/admin/vendor/jquery/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script type="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->
        <!-- <script type="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
  <script src="<?php base_url(); ?>../assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php base_url(); ?>../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Calendar -->
        <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
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

     $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });

      $('#myTable').DataTable({});
      $('#myTableGolongan').DataTable({});
  

      $('#myTab a[href~="' + location.href + '"]').addClass('active');



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

      // $('.btn-add-golongan').on('click',function(){
              
      //         // Call Modal Edit
      //         $('#addModalGolongan').modal('show');
      //     });
$('.btn-edit-security').on('click',function(){
              // get data from button edit
              const id_pegawai = $(this).data('id_pegawai');
              const nama_pegawai = $(this).data('nama_pegawai');
              // const nama_pegawai = $(this).data('nama_pegawai');
              const keterangan_hari = $(this).data('keterangan_hari');
              // Set data to Form Edit
              $('.id_pegawai').val(id_pegawai);
              $('.nama_pegawai').val(nama_pegawai);
              $('.keterangan_hari').val(keterangan_hari).trigger('change');
              // Call Modal Edit
              $('#editModalSecurity').modal('show');
          });


$('.btn-edit-keterangan').on('click',function(){



            //  $('.keterangan_telat').change(function() {
            //     const x = $(this).val();
            //     for (const i = 1; i <= x; i++) {
            //         $(".keterangan_telat_file").show(); 
            //     }
            // });

            // $('.keterangan_telat').change(function() {
            //     if($(this).val()==="ada"){ 
            //         // console.log('empty'); 
            //          $(".keterangan_telat_file").show();   
            //     } else {
            //           $('.keterangan_telat_file').hide();
            //     }
            // });

            // $('.keterangan_psw').change(function() {
            //     if($(this).val()==="ada"){ 
            //         // console.log('empty'); 
            //          $(".keterangan_psw_file").show();   
            //     } else {
            //           $('.keterangan_psw_file').hide();
            //     }
            // });

            // $('.ijin').change(function() {
            //     if($(this).val()==="ada"){ 
            //         // console.log('empty'); 
            //          $(".ijin_file").show();   
            //     } else {
            //           $('.ijin_file').hide();
            //     }
            // });

              // get data from button edit
              const id_presensi = $(this).data('id_presensi');
              const keterangan_telat = $(this).data('keterangan_telat');
              const keterangan_psw = $(this).data('keterangan_psw');
              const ijin = $(this).data('ijin');
              // Set data to Form Edit
              $('.id_presensi').val(id_presensi);
              $('.keterangan_telat').val(keterangan_telat).trigger('change');
              $('.keterangan_psw').val(keterangan_psw).trigger('change');
              $('.ijin').val(ijin).trigger('change');


              // $(".ijin").on('change' ,function(){
                
              // });
              // Call Modal Edit
              $('#editModalKeterangan').modal('show');

              

          });


    });

// function golongan()
// {
//   let golongan = $('[name="id_level_golongan"]').val();
//   $.ajax({
//     url : "<?php echo base_url('sikasep/Golongan/tampil_golongan');?>",
//     data: "cari="+1+"&id_level_golongan="+golongan,
//     success: function(data){
           

//       }
//   })
// }

function cari_golongan()
      {
        golongan = $('[name="id_level_golongan"]');
        $.ajax({
          type : 'POST',
          data: "cari="+1+"&id_level_golongan="+golongan.val(),
          url  : "<?php echo base_url('sikasep/Golongan/tampil_golongan');?>",
          cache: false,
          // beforeSend: function() {
          //   sel_kota.attr('disabled', true);
          // },
          success: function(data){
            $('#myTableGolongan').html(data);


          }

        });
       return false;
      }

  </script>

<script type="text/javascript">
        var get_data        = '<?php echo $get_data; ?>';
        var backend_url     = '<?php echo base_url(); ?>sikasep/Status_Hari';

        $(document).ready(function() {
            // $('.date-picker').datetimepicker();
            $('#color').colorpicker();
            $('#calendarIO').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                titleFormat : { year: 'numeric'},
                defaultDate: moment().format('YYYY-MM-DD'),
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                    $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                    $('#create_modal').modal('show');
                    save();
                    $('#calendarIO').fullCalendar('unselect');
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element)
                {
                    deteil(event);
                    editData(event);
                    deleteData(event);
                },
                events: JSON.parse(get_data)
            });
        });

        $(document).on('click', '.add_calendar', function(){
            $('#create_modal input[name=id]').val(0);
            $('#create_modal').modal('show');  
        })

        $(document).on('submit', '#form_create', function(){

            var element = $(this);
            var eventData;
            $.ajax({
                url     : '<?php echo base_url(); ?>sikasep/Status_Hari/save',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        eventData = {
                            id          : data.id,
                            title       : $('#create_modal input[name=title]').val(),
                            description : $('#create_modal textarea[name=description]').val(),
                            start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            color       : $('#create_modal select[name=color]').val()
                        };
                        $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }         
            });
            return false;
        })

        function editDropResize(event)
        {
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end)
            {
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }
            else
            {
                end = start;
            }
         
            $.ajax({
                url     : '<?php echo base_url(); ?>sikasep/Status_Hari/save',
                type    : 'POST',
                data    : 'id='+event.id+'&title='+event.title+'&start_date='+start+'&end_date='+end,
                dataType: 'JSON',
                beforeSend: function()
                {
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html('Data success update');
                    }
                    else
                    {
                        $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Data cant update');
                    }
             
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Wrong server, please save again');
                }         
            });
        }

        function save()
        {
            $('#form_create').submit(function(){
                var element = $(this);
                var eventData;
                $.ajax({
                    url     : '<?php echo base_url(); ?>sikasep/Status_Hari/save',
                    type    : element.attr('method'),
                    data    : element.serialize(),
                    dataType: 'JSON',
                    beforeSend: function()
                    {
                        element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                    },
                    success: function(data)
                    {
                        if(data.status)
                        {   
                            eventData = {
                                id          : data.id,
                                title       : $('#create_modal input[name=title]').val(),
                                description : $('#create_modal textarea[name=description]').val(),
                                start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                                end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                                color       : $('#create_modal select[name=color]').val()
                            };
                            $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                            $('#create_modal').modal('hide');
                            element[0].reset();
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            element.find('.alert').css('display', 'block');
                            element.find('.alert').html(data.notif);
                        }
                        element.find('button[type=submit]').html('Submit');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        element.find('button[type=submit]').html('Submit');
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html('Wrong server, please save again');
                    }         
                });
                return false;
            })
        }

        function deteil(event)
        {
            $('#create_modal input[name=id]').val(event.id);
            $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
            $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
            $('#create_modal input[name=title]').val(event.title);
            $('#create_modal input[name=description]').val(event.description);
            $('#create_modal select[name=color]').val(event.color);
            $('#create_modal .delete_calendar').show();
            $('#create_modal').modal('show');
        }

        function editData(event)
        {
            $('#form_create').submit(function(){
                var element = $(this);
                var eventData;
                $.ajax({
                    url     : '<?php echo base_url(); ?>sikasep/Status_Hari/save',
                    type    : element.attr('method'),
                    data    : element.serialize(),
                    dataType: 'JSON',
                    beforeSend: function()
                    {
                        element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                    },
                    success: function(data)
                    {
                        if(data.status)
                        {   
                            event.id = event.id;
                            event.title         = $('#create_modal input[name=title]').val();
                            event.description   = $('#create_modal textarea[name=description]').val();
                            event.start         = moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                            event.end           = moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                            event.color         = $('#create_modal select[name=color]').val();
                            $('#calendarIO').fullCalendar('updateEvent', event);

                            $('#create_modal').modal('hide');
                            element[0].reset();
                            $('#create_modal input[name=id]').val(0)
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            element.find('.alert').css('display', 'block');
                            element.find('.alert').html(data.notif);
                        }
                        element.find('button[type=submit]').html('Submit');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        element.find('button[type=submit]').html('Submit');
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html('Wrong server, please save again');
                    }         
                });
                return false;
            })
        }

        function deleteData(event)
        {
            $('#create_modal .delete_calendar').click(function(){
                $.ajax({
                    url     : '<?php echo base_url(); ?>sikasep/Status_Hari/delete_dataf',
                    type    : 'POST',
                    data    : 'id='+event.id,
                    dataType: 'JSON',
                    beforeSend: function()
                    {
                    },
                    success: function(data)
                    {
                        if(data.status)
                        {   
                            $('#calendarIO').fullCalendar('removeEvents',event._id);
                            $('#create_modal').modal('hide');
                            $('#form_create')[0].reset();
                            $('#create_modal input[name=id]').val(0)
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            $('#form_create').find('.alert').css('display', 'block');
                            $('#form_create').find('.alert').html(data.notif);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        $('#form_create').find('.alert').css('display', 'block');
                        $('#form_create').find('.alert').html('Wrong server, please save again');
                    }         
                });
            })
        }



    </script>







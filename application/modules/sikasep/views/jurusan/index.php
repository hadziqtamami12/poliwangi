<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>



<div class="container-fluid mt-5">

<?php if ($this->session->userdata('id_level_user') == 2): ?>
<a class="btn btn-success" href="<?php echo base_url(); ?>sikasep/Dashboard/export_data"> <i class="fa fa-download"></i> Download </a>
<?php endif; ?>
<?php if ($this->session->userdata('id_level_user') == 2): 
      $bg = 'btn btn-danger';
      $pesan = 'Belum Divalidasi';
      foreach ($validasi as $p):
        if ($p->status == 'tervalidasi'):
          $bg = 'btn btn-info';
          $pesan = 'Sudah Tervalidasi';
        endif;
      endforeach;
?>
<a class="<?php echo $bg ?>" href="<?php echo base_url(); ?>sikasep/Dashboard/validasi" title="<?php echo $pesan; ?>"> <i class="fa fa-check"></i> Validasi </a>
<?php  
  endif;
?>
<?php if ($this->session->userdata('id_level_user') == 3):
      foreach ($validasi as $p):
        if ($p->status == 'tervalidasi' and $p->tanggal == date('Y-m-d')):
 ?>
<a class="btn btn-success" href="<?php echo base_url(); ?>sikasep/Dashboard/export_data"> <i class="fa fa-download"></i> Download </a>
<?php 
    endif; 
    endforeach; 
    endif; 
?>
<!-- <a class="btn btn-success" href="<?php echo base_url(); ?>sikasep/Dashboard/telegram_bot"> <i class="fa fa-download"></i> Tele tes </a> -->


<div id="grafik" style="width:100%; height:400px;"></div>


<?php
    //Inisialisasi nilai variabel awal
    $tanggal= "";
    $jumlah=null;
    $title = "Grafik Presensi Pegawai Bulan " .date('M-Y') ;
    foreach ($bulan as $item)
    { 
        $tanggal_sekarang=$item->tanggal_sekarang;
        $tanggal .= "'$tanggal_sekarang'". ", ";
        $jum=$item->total;
        $jumlah .= "$jum". ", ";
  } 
    ?>

<?php
    $nama_jurusan= "";
    $jumlah2=null;
    $title2 = "Grafik Presensi Pegawai per Hari " .date('M-Y') ;
    foreach ($jurusan as $item)
    {
        $jurusannya=$item->jurusan;
        $nama_jurusan .= "'$jurusannya'". ", ";
        $jum2=$item->totaljur;
        $jumlah2 .= "$jum2". ", ";
  } 
    ?> 

  <script type="text/javascript">
    Highcharts.chart('grafik', {
      title: {
        text: '<?php echo $title; ?>'
      },
      xAxis: {
        categories: [<?php echo $tanggal; ?>]
       },
      yAxis: {
        title: {
          text: 'Total Pegawai Masuk'
        }
      },
      labels: {
        items: [{
          html: '<?php echo date('M-Y') ?>',
          style: {
            left: '50px',
            top: '18px',
                color: ( // theme
                  Highcharts.defaultOptions.title.style &&
                  Highcharts.defaultOptions.title.style.color
                  ) || 'black'
            }
        }]
    },
    credits: {
      enabled: false
    },
    series: [
      // {
      //   type: 'column',
      //   name: [<?php echo $tanggal;?>],
      //   data: [<?php echo $jumlah;?>],
      // },

    {
        type: 'spline',

        name: 'Grafik Pegawai',
        data: [<?php echo $jumlah; ?>],
        marker: {
            lineWidth: 1,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    },

    ]

});

</script>

</div>
</div>






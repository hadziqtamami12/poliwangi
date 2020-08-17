<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>

	<div id="grafik" class="pt-5" style="width:100%; height:400px;"></div>
	<?php
    //Inisialisasi nilai variabel awal
	$nama_jurusan= "";
	$jumlah=null;
	$title = "Grafik Presensi per Tanggal " .date('d-M-Y') ;
	foreach ($jurusan as $item)
	{
		$jurusannya=$item->jurusan;
		$nama_jurusan .= "'$jurusannya'". ", ";
		$jum=$item->totaljur;
		$jumlah .= "$jum". ", ";
	} 
	?>

	<script type="text/javascript">
		Highcharts.chart('grafik', {
			title: {
				text: '<?php echo $title; ?>'
			},
			xAxis: {
				categories: [<?php echo $nama_jurusan ?>]
			},
			labels: {
				items: [{
					html: '<?php echo date('d-M-Y') ?>',
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
    series: [{
	    type: 'pie',
	    name: '<?php echo date('M-Y') ?>',
	    data: [
	    <?php 
	    $i=3;

	    foreach ($jurusan as $x ): 
			
	    	?>
	    	{
	    		name: '<?php 
							if($x->jurusan=='TENAGA KEPENDIDIKAN PENDUKUNG'):
							echo 'Satpam';
							else:
							echo $x->jurusan;
							endif;
              			?>',
	    		y: <?php echo $x->totaljur?>,
	    		color: Highcharts.getOptions().colors[<?php echo $i;?>]

	    	},
	    	<?php
	    	$i++;
	    endforeach; 
	    ?>
    	],

    }]

});

</script>
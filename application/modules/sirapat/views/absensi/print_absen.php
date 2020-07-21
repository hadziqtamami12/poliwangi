<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

<title>Cetak Absensi</title>
<style type="text/css">

.style1 {font-size: large}
.style2 {font-size: medium}

</style>
</head>

    <body>
    <form>
	<table width="910" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
  
  <!-- heading -->
    <tr> 
      <td width="15%"><div align="left">
        <h2 align="center"><img src="<?= base_url('assets/dashboard/img/logo.png') ?>" width="133" height="124"></h2>
      </div></td>
      <td width="85%"><div align="center" class="style1"><strong>KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI<br>
	  POLITEKNIK NEGERI BANYUWANGI </strong><br>
      <span class="style2">Jl. Raya Jember - Banyuwangi KM 13, Rogojampi, Labanasem, Banyuwangi, Jawa Timur 68461</span><br>
      <span class="style2">Website : http://www.poliwangi.ac.id E-Mail : politeknik@poliwangi.ac.id</span></div></td>
    </tr>

    <tr> 
      <td colspan="2"></td>
    </tr>
    <tr>
      <td colspan="2"><hr noshade=""></td>
    </tr>

    <?php $agenda = $this->db->get_where('agenda_rapat', ['id' => $this->uri->segment(5)])->row()?>

    <tr>
      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
          <td colspan="2"><div align="center" class="style1"><strong>ABSENSI RAPAT</strong></div></td><br>
        </tr>
       
        <tr>
          <td colspan="2"><div align="center" class="style1"></div></td>
        </tr>
       
        <tr>
          <td width="19%">TANGGAL</td>
          <td width="81%">: <?= $agenda->tanggal ?> </td>
       </tr>
       
        <tr>
          <td><div align="left">ACARA</div></td>
          <td>: <?= $agenda->nama_agenda ?></td>
        </tr>

        <tr>
          <td>PUKUL</td>
          <td>: <?= $agenda->jam_mulai ?> - <?= $agenda->jam_selesai ?> WIB</td>
        </tr>
		        
          </tbody>
          </table>
          </td>
          </tr>

          </tbody>
          </table>
          </form>

            <table width="910" border="1" align="center" cellpadding="10" cellspacing="0">
            <thead>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>JABATAN</th>
                <th>STATUS</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
            <?php foreach ($getabsensi as $key => $data) : ?>
            <tr>
                <td align="center"><?= $i ?></td>
                <td><?= $data->nama_karyawan; ?></td>
                <td><?= $data->jabatan; ?></td>
                <td align="center"><?= $data->status; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>

            </table>

            

          </body>
          </html>
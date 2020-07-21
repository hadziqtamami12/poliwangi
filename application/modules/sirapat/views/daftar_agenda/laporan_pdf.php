<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Agenda Rapat</h2>

<table>
  <tr>
    <th>Nomor Agenda</th>
    <th>Nama Agenda</th>
    <th>Tanggal</th>
    <th>Tempat</th>
    <th>Jenis Rapat</th>
    <th>Peserta Rapat</th>
    <th>Lampiran</th>
    <th>Hal</th>
    <th>Date Created</th>
  </tr>
  <tr>
 

    <td><?= $row->nomor_agenda ?></td>
    <td><?= $row->nama_agenda ?></td>
    <td><?= $row->tanggal ?></td>
    <td><?= $row->tempat ?></td>
    <td><?= $row->idjenis_rapat ?></td>
    <td><?= $row->peserta_rapat ?></td>
    <td><?= $row->lampiran ?></td>
    <td><?= $row->hal ?></td>
    <td><?= $row->date_created ?></td>
   

  
  </tr>
</table>

</body>
</html>

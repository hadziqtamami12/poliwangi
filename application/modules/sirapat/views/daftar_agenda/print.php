<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Rapat</title>
</head>
<body>
    
        

        <table align="center" width="100%">
        
        <tr>
        <td colspan="3">
        <div align="center" style="padding-left: 8%;">
        <img src="<?= base_url('assets/dashboard/img/logo.png') ?>" 
        style="position: absolute; margin-left: -9%;" width="120px" height="auto">
        <span style="line-height: 1,1; font-weight: bold; font-family: 'Time News Roman', Times, serif">
        KEMENTRIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI<br>
        POLITEKNIK NEGERI BANYUWANGI<br>
        <a style="line-height: 1,1; font-size: 11px">Jl. Raya Jember KM 13 Labanasem, Kabat, Banyuwangi, 68462</a>
        <br>
        <a style="line-height: 1,1; font-size: 11px">Telepon / Fax : (0333) 636780</a>
        <br>
        <a style="line-height: 1,1; font-size: 11px">E-mail : poliwangi@poliwangi.ac.id</a>
        <br>
        <a style="line-height: 1,1; font-size: 11px">Jl. Raya Jember KM 13 Labanasem, Kabat, Banyuwangi, 68462</a>
        <br>
        </span> 

        </div>
        <hr />
        <hr border="5">  
        </td>
        </tr>
        

        <tr>     
        <td colspan="2">
        <table border="0" cellpadding="1" style="width: 400px;">
        <tbody>
        <tr>         
        <td width="93">
        <span style="font-size: 12;">Nomor</span>
        </td>         
        <td width="8">
        <span style="font-size: 12;">:</span>
        </td>         
        <td width="200">
        <span style="font-size: 12l;"><?= $row->nomor_agenda ?></span>
        </td>       
        </tr>

        <tr>         
        <td>
        <span style="font-size: 12;">Lampiran</span>
        </td>         
        <td>
        <span style="font-size: 12;">:</span>
        </td>         
        <td>
        <span style="font-size: 12;"><?= $row->lampiran ?></span>
        </td>       
        </tr>

        <tr>         
        <td>
        <span style="font-size:12;">Hal</span>
        </td>         
        <td>
        <span style="font-size: 12;">:</span>
        </td>         
        <td>
        <span style="font-size: 12;"><?= $row->hal ?></span>
        </td>       
        </tr>
        </tbody>
        </table>
        <br>   
        <br>   
        
        </td>  
         
        
        <td valign="top">
        <div align="right">
        <span style="font-size: 12;">Banyuwangi, <?= $row->tanggal ?></span>
        </div>
        </td>   
        </tr>

        <tr>     
        <td width="302"></td>     
        <td width="343"></td>     
        <td width="339"></td>   
        </tr>

        <tr>     
        <td>

        <table border="0" style="width: 600px;">
        <tbody>

        <tr>         
        <td width="150">
        <span style="font-size: 12;">Yth. Bapak/Ibu </span><br>
        <span class="colspan-2" style="font-size: 12;">Yang tergabung pada W A G Grup Pimpinan </span>
        <span style="font-size: 12;">di Lingkungan Politeknik Negeri Banyuwangi</span>
        </td>         
        <td width="5">
        
        </td>         
        <td width="140"></td>    
           
        </tr>
        
        </tbody>
        </table>
        <br>
       

        

        <table border="0" style="width: 400px;">
        <tbody>

        <tr>     
        <td width="650">
        <span style="font-size: 12;">Mengundang Ibu/bapak dosen untuk hadir dalam rapat yang dilaksanakan pada :</span>
        </td>
        </tr>
        <tr> 
               
        <td width="80">
        <span style="font-size: 12;">Hari/tanggal</span>
        </td>           
        <td width="10">
        <span style="font-size: 12;">:</span>
        </td>           
        <td width="248">
        <span style="font-size: 12;"><?= $row->tanggal ?></span>
        </td>  
             
        </tr>
        <br>
        <tr>           
        <td>
        <span style="font-size: 12;">Pukul</span>
        </td>           
        <td><span style="font-size: 12;">:</span>
        </td>           
        <td>
        <span style="font-size: 12;">08.00 - selesai</span>
        </td>         
        </tr>

        <tr>           
        <td>
        <span style="font-size: 12;">Tempat</span>
        </td>           
        <td>
        <span style="font-size: 12;">:</span>
        </td>           
        <td>
        <span style="font-size: 12;"><?= $row->tempat ?></span>
        </td>        
         </tr>
        <tr>           
        <td>
        <span style="font-size: 12;">Agenda</span>
        </td>           
        <td>
        <span style="font-size: 12;">:</span>
        </td>           
        <td>
        <span style="font-size: 12;"><?= $row->nama_agenda ?></span>
        </td>        
         </tr>
        </tbody>
        </table>

        <div align="right">
        <span style="font-size: 12;">
        Demikian surat ini kami sampaikan, kami harap ibu/bapa dapat menghadiri rapat ini. sekian dan terima kasih.</span> 
        </div>
        </div>
        <br>
        </tr>

        <div align="right">
        <span style="font-size: 12;">-</span>
        </div>
        </td>     
        <td>
        </td>     
        <td valign="top">
        <div align="right">
        <span style="font-size: 12;">Kajur Teknik Informatika</span>
        </div>
        <div align="right">
        </div>
        <div align="right">
        <span style="font-size: 12;">-</span></div>
        </td>   
        </tr>
        </tbody>
        </table>
        </body>
        </table>
            


</body>
</html>
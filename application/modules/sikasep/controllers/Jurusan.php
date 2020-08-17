<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/PhpOffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Jurusan extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
        // $this->load->library('api_poliwangi');
		$this->load->library('session');
		date_default_timezone_set("Asia/Jakarta");

		
		// $this->load->library('API_Poliwangi');
		
	}




	

	public function index(){

    // $bulan_ini = $this->input->post($bulan);
		$hari_ini = date('Y-m-d');
		$bulan_ini = date('-1 month', strtotime($hari_ini));
		$data = array(
			'title' => 'Grafik Laporan Kehadiran Pegawai Poliwangi',
      'bulan' => $this->m_dashboard->bulan(),
      // 'jurusan' => $this->m_dashboard->jurusan($hari_ini, $bulan_ini),
			'jurusan' => $this->m_dashboard->jurusan($bulan_ini),

		);




		if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'jurusan/index', $data);
        }
        else{
			redirect('Login-User');
        }



	}

  public function filter_grafik(){
    
      $data = array(
        'title' => 'Grafik Laporan Kehadiran Pegawai Poliwangi',
        'bulan' => $this->m_dashboard->filter_bulan($this->input->post('bulan')),
      );

       if ($this->session->userdata['logged_in']==true) {
           $this->template->load('layout/template', 'jurusan/index', $data);
        }
        else{
          redirect('Login-User');
        }

      
  }

  public function jurusan(){

    $hari_ini = date('Y-m-d');
    $bulan_ini = date('-1 month', strtotime($hari_ini));
    $data = array(
      'title' => 'Grafik Laporan Kehadiran Pegawai Poliwangi',
      'bulan' => $this->m_dashboard->bulan(),
      //'bulan' => $this->m_dashboard->bulan($hari_ini, $bulan_ini),
      // 'jurusan' => $this->m_dashboard->jurusan($hari_ini, $bulan_ini),
      'jurusan' => $this->m_dashboard->jurusan($hari_ini),

    );


    if ($this->session->userdata['logged_in']==true) {
           $this->template->load('layout/template', 'jurusan/jurusan', $data);
        }
        else{
      redirect('Login-User');
        }



  }

	

	


	public function export_data()
     {

     	  $tanggal_sekarang = date('Y-m-d');
          $download = $this->m_dashboard->hari_ini($tanggal_sekarang);


          $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Nama Pegawai')
                      ->setCellValue('C1', 'Jabatan')
                      ->setCellValue('D1', 'Masuk')
                      ->setCellValue('E1', 'Pulang')
                      ->setCellValue('F1', 'Telat')
                      ->setCellValue('G1', 'Pulang Sebelum Waktunya')
                      ->setCellValue('H1', 'Ijin');

          $kolom = 2;
          $nomor = 1;
          foreach($download as $p) {

            if (strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja) > 0) {
                $p->telat = strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja);
                $p->telat = $p->telat / 60 . ' menit';
            }
            if (strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja) <= 0) {
                $p->telat = '-';
            }
            if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) < 0) {
                $p->psw   = strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja);
                $p->psw = $p->psw / -60 . ' menit';
            }
            if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) >= 0) {
                $p->psw = '-';
            }
            if ($p->jam_masuk == Null || $p->jam_pulang == Null) {
                $p->telat = "Absen woy";
                $p->psw = "Absen woy";
                $p->jam_masuk = '-';
                $p->jam_pulang = '-';
            }




               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $p->nama_pegawai)
                           ->setCellValue('C' . $kolom, $p->jabatan)
                           ->setCellValue('D' . $kolom, $p->jam_masuk)
                           ->setCellValue('E' . $kolom, $p->jam_pulang)
                           ->setCellValue('F' . $kolom, $p->telat)
                           ->setCellValue('G' . $kolom, $p->psw)
                           ->setCellValue('H' . $kolom, $p->ijin);

               $kolom++;
               $nomor++;

          }

      // $writer = new Xlsx($spreadsheet);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');


      header('Content-Type: application/vnd.ms-excel');
	  header('Content-Disposition: attachment;filename="RekapPresensi.xlsx"');
	  header('Cache-Control: max-age=0');

	  //$writer->save('php://output');
	  echo "<meta http-equiv='refresh'/>";
     }

	

}

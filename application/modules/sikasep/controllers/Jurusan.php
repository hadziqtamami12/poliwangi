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




	

	public function ti(){
		$hari_ini = date('Y-m-d');
		$data = array(

			'title' => 'Laporan kehadiran TI',
			'ti' => $this->m_dashboard->ti($hari_ini),


		);

		foreach($data['ti'] as $p){

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
			}

		}

		if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'laporan/ti', $data);
        }
        else{
			redirect('Login-User');
        }



	}

	public function sipil(){
		$hari_ini = date('Y-m-d');

		$data = array(
			
			'title' => 'Laporan kehadiran Sipil',
			'sipil' => $this->m_dashboard->sipil($hari_ini),


		);

		foreach($data['sipil'] as $p){

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
			}

		}

		if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'laporan/sipil', $data);
        }
        else{
			redirect('Login-User');
        }

	}

	

	public function total_jam(){

		$pegawai_data = $this->m_dashboard->hari_ini($tanggal_sekarang);
		$jumlah = count($pegawai_data['id_presensi']);
		$jumlah_pegawai;
		foreach ($jumlah as $p) {
			if ($pegawai_data['jabatan'] == 'dosen') {
			
				if (date("D")!="Sat" || date("D")!="Sun") {
					if (isset($pegawai_data['jam_masuk'])) {
						$jumlah_pegawai=+1;
					}
					else{
						$jumlah_pegawai = $jumlah_pegawai;
					}
				}
				else{
					if (isset($pegawai_data['jam_masuk'])) {
						$jumlah_pegawai=+1;
					}
					else{
						if ($pegawai_data['ijin'] == 'ada') {
							$jumlah_pegawai=+1;
						}
						else{$jumlah_pegawai = $jumlah_pegawai;}
					}
				}

			}
			elseif ($pegawai_data['jabatan'] == 'satpam'){
				if ($pegawai_data['jam_masuk'] >= $pegawai_data['jam_masuk_kerja'] && $pegawai_data['jam_pulang'] >= $pegawai_data['jam_pulang_kerja']) {
						
					$jumlah_pegawai=+1;

				}
				else{
					
					$jumlah_pegawai = $jumlah_pegawai;
				}
			}
			else{
				if (date("D")!="Sat" || date("D")!="Sun") {
					if ($pegawai_data['jam_masuk'] >= $pegawai_data['jam_masuk_kerja'] && $pegawai_data['jam_pulang'] >= $pegawai_data['jam_pulang_kerja']) {
							
						$jumlah_pegawai=+1;

					}
					else{

					}
				}
			}
		}
		
	}

	function tanggalMerah($hari_ini) {
	$array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);

	//check tanggal merah berdasarkan libur nasional
	if(isset($array[$hari_ini])):		
		$status_hari = $array[$hari_ini]["deskripsi"];

	//check tanggal merah berdasarkan hari minggu
	elseif(date("D",strtotime($hari_ini))==="Sat"):
		$status_hari = 'Sabtu';
	
	elseif(date("D",strtotime($hari_ini))==="Sun"):
		$status_hari = 'Minggu';
		//bukan tanggal merah
		else:
			$status_hari = 'Hari Kerja';
		endif;

		// $this->input->post($status_hari);
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
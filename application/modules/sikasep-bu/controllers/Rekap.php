<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends MY_Controller {

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
		$this->load->model('m_rekap');
		$this->load->library('session');
		
	} 

	public function index()
	{	

		$tanggal_sekarang = date('Y-m-d');
		$data = array(
			'title' =>   'Rekap',
			'rekap' => $this->m_rekap->rekap_list(),
			 // 'absen' => $this->m_rekap->absen(),
			    // 't' => $this->total_jam()
		);


		foreach ($data['rekap'] as $p) {
			if ($p->jam_masuk == Null and date("D")!="Sat" || date("D")!="Sun"){
						
					$p->total_hadir = $p->total_hadir - 1;

				}
				else{
					$p->total_hadir = $p->total_hadir;
				}

			if ($p->jabatan == 'Dosen') {

				if (!isset($p->jam_masuk) && date("D")=="Sat" || date("D")=="Sun") {
						$p->total_jam = $p->total_hadir;
					}
				$p->total_jam = $p->total_hadir * 5;

			}
			elseif ($p->jabatan == 'Satpam'){
				if ($p->jam_masuk <= $p->jam_masuk_kerja && $p->jam_pulang >= $p->jam_pulang_kerja) {

					$p->hadir = $p->total_hadir;

				}
				elseif($p->jam_masuk > $p->jam_masuk_kerja || $p->jam_pulang < $p->jam_pulang_kerja){
						$p->hadir = $p->total_hadir - 1;
				}
				elseif ($p->total_hadir == 0) {
					$p->hadir = 0;
				}

				$p->total_jam = $p->hadir * 8;

			}
			else{
				if (date("D")!="Sat" || date("D")!="Sun") {
					if ($p->jam_masuk <= $p->jam_masuk_kerja && $p->jam_pulang >= $p->jam_pulang_kerja) {

						$p->hadir = $p->total_hadir + 1;

					}
					elseif($p->jam_masuk > $p->jam_masuk_kerja || $p->jam_pulang < $p->jam_pulang_kerja){
							$p->hadir = $p->total_hadir;
					}
					elseif ($p->total_hadir == 0) {
						$p->hadir = 0;
					}
				}
				else{
					if ($p->jam_masuk <= $p->jam_masuk_kerja && $p->jam_pulang >= $p->jam_pulang_kerja) {

						$p->hadir = $p->total_hadir + 1;
					}
					elseif($p->jam_masuk > $p->jam_masuk_kerja || $p->jam_pulang < $p->jam_pulang_kerja){
							$p->hadir = $p->total_hadir;
					}
					elseif ($p->total_hadir == 0) {
						$p->hadir = 0;
					}	
				}
				$p->total_jam = $p->hadir * 8;

			}

				


		
			}


		if ($this->session->userdata['logged_in']==true) {
			$this->template->load('layout/template', 'rekap/index', $data);
		}
		else{
			redirect('Login-User');
		}
	}

	// public function export_data()
	// {

	// 	// $tanggal_sekarang = date('Y-m-d');
	// 	$download = $this->m_rekap->rekap_list();


	// 	$spreadsheet = new Spreadsheet;

	// 	$spreadsheet->setActiveSheetIndex(0)
	// 	->setCellValue('A1', 'No')
	// 	->setCellValue('B1', 'Nama Pegawai')
	// 	->setCellValue('C1', 'NIP')
	// 	->setCellValue('D1', 'Jabatan')
	// 	->setCellValue('E1', 'Golongan')
	// 	->setCellValue('F1', 'Hadir')
	// 	->setCellValue('G1', 'Total Jam')
	// 	->setCellValue('H1', 'Uang Makan per Hari');
	// 	->setCellValue('H1', 'Total Uang Makan');
	// 	->setCellValue('H1', 'Pajak');

	// 	$kolom = 2;
	// 	$nomor = 1;
	// 	foreach($download as $p) {

	// 		if (strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja) > 0) {
	// 			$p->telat = strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja);
	// 			$p->telat = $p->telat / 60 . ' menit';
	// 		}
	// 		if (strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja) <= 0) {
	// 			$p->telat = '-';
	// 		}
	// 		if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) < 0) {
	// 			$p->psw   = strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja);
	// 			$p->psw = $p->psw / -60 . ' menit';
	// 		}
	// 		if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) >= 0) {
	// 			$p->psw = '-';
	// 		}
	// 		if ($p->jam_masuk == Null || $p->jam_pulang == Null) {
	// 			$p->telat = "Absen woy";
	// 			$p->psw = "Absen woy";
	// 			$p->jam_masuk = '-';
	// 			$p->jam_pulang = '-';
	// 		}




	// 		$spreadsheet->setActiveSheetIndex(0)
	// 		->setCellValue('A' . $kolom, $nomor)
	// 		->setCellValue('B' . $kolom, $p->nama_pegawai)
	// 		->setCellValue('C' . $kolom, $p->jabatan)
	// 		->setCellValue('D' . $kolom, $p->jam_masuk)
	// 		->setCellValue('E' . $kolom, $p->jam_pulang)
	// 		->setCellValue('F' . $kolom, $p->telat)
	// 		->setCellValue('G' . $kolom, $p->psw)
	// 		->setCellValue('H' . $kolom, $p->ijin);

	// 		$kolom++;
	// 		$nomor++;

	// 	}

 //      // $writer = new Xlsx($spreadsheet);
	// 	$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');


	// 	header('Content-Type: application/vnd.ms-excel');
	// 	header('Content-Disposition: attachment;filename="RekapPresensi.xlsx"');
	// 	header('Cache-Control: max-age=0');

	//   //$writer->save('php://output');
	// 	echo "<meta http-equiv='refresh'/>";
	// }

	// public function total_jam(){
	// 	// $data_rekap = $this->m_rekap->all_list();
	// 	$id_pegawai = 1;
	// 	$pegawai_data = $this->m_rekap->total_jam($id_pegawai);
	// 	$p->total_jam = 0;
	// 	foreach ($pegawai_data as $p) {
	// 		if ($p->jabatan == 'dosen') {

	// 			if (date("D")!="Sat" || date("D")!="Sun") {
	// 				if (isset($p->jam_masuk)) {
	// 					$p->total_jam=+1;
	// 				}
	// 				else{
	// 					$p->total_jam = $p->total_jam;
	// 				}
	// 			}
	// 			else{
	// 				if (isset($p->jam_masuk)) {
	// 					$p->total_jam=+1;
	// 				}
	// 				else{
	// 					if ($pegawai_data['ijin'] == 'ada') {
	// 						$p->total_jam=+1;
	// 					}
	// 					else{$p->total_jam = $p->total_jam;}
	// 				}
	// 			}

	// 		}
	// 		elseif ($p->jabatan == 'satpam'){
	// 			if ($p->jam_masuk >= $p->jam_masuk_kerja && $p->jam_pulang >= $p->jam_pulang_kerja) {

	// 				$p->total_jam=+1;

	// 			}
	// 			else{

	// 				$p->total_jam = $p->total_jam;
	// 			}
	// 		}
	// 		else{
	// 			if (date("D")!="Sat" || date("D")!="Sun") {
	// 				if ($p->jam_masuk >= $p->jam_masuk_kerja && $p->jam_pulang >= $p->jam_pulang_kerja) {

	// 					$p->total_jam=+1;

	// 				}
	// 				else{

	// 				}
	// 			}
	// 		}
	// 	}

	// }



}

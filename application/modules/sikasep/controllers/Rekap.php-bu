<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/PhpOffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
		$this->load->library('Telegram/Telegram_lib');
		
	} 

	public function index()
	{	

		$tanggal_sekarang = date('Y-m-d');
		$data = array(
			'title' =>   'Rekap',
			'rekap' => $this->m_rekap->rekap_list(),
			 // 'absen' => $this->m_rekap->absen(),
          	'validasi' => $this->m_dashboard->validasi($tanggal_sekarang),
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


	public function kirim_laporan(){

		$data = array(
			'title' => 'Kirim Laporan Rekap',
		);
		if ($this->session->userdata['logged_in']==true) {
			$this->template->load('layout/template', 'rekap/kirim_laporan', $data);
		}
		else{
			redirect('Login-User');
		}
	}

	public function kirim_laporan_rekap(){

	$bulanini = date('M');

			$lampiran = $_FILES['lampiran']['name'];
       		// $extension  = ".".pathinfo($lampiran, PATHINFO_EXTENSION);

			if($lampiran){
				$config['allowed_types'] = 'doc|xls|pdf';
				$config['max_size'] = '51200';
				$config['upload_path'] = './assets/dashboard/file-sikasep/';
				// $config['file_name'] = 'Laporan_Rekap_Presensi '.$bulanini.$extension;
				$this->load->library('upload', $config);

				if($this->upload->do_upload('lampiran')){

					
					// $new_lampiran = $this->upload->data($config['file_name']);
					// $this->db->set('lampiran', $new_lampiran);

					try {
					// $this->telegram_lib->senddoc($nama_dokumen);
					$this->telegram_lib->senddoc($config['upload_path'].$lampiran, 'Laporan Rekap Presensi Bulan '.$bulanini);


					if ($this->telegram_lib->senddoc($config['upload_path'].$config['file_name'], 'no caption')) {
						$this->session->set_flashdata('message', 
						'<div class="alert alert-success" role="alert">Laporan rekap telah dikirim</div>');
						$this->telegram_lib->sendmsg('Alhamdulillah Kekirim');
					}


					redirect('sikasep/Rekap/kirim_laporan');
						
					} catch (Exception $e) {
						$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert">Laporan rekap gagal dikirim</div>');
					}
					
				}else {
					//jika tidak upload maka error
					echo $this->upload->display_errors();

				}

				

			}


	
}

 public function tele($nama_dokumen){

 	$bulanini = date('M');
	try {
					$this->telegram_lib->senddoc($nama_dokumen);


					if ($this->telegram_lib->senddoc($config['upload_path'].$config['file_name'], "no caption")) {
						$this->session->set_flashdata('message', 
						'<div class="alert alert-success" role="alert">Laporan rekap telah dikirim</div>');
					}


					redirect('sikasep/Rekap/kirim_laporan');
						
					} catch (Exception $e) {
						$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert">Laporan rekap gagal dikirim</div>');
					}
 }
  


	

	

public function export_data_rekap()
{

		// $tanggal_sekarang = date('Y-m-d');
	$download = $this->m_rekap->rekap_list();


	$spreadsheet = new Spreadsheet;

	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A1', 'No')
	->setCellValue('B1', 'Nama Pegawai')
	->setCellValue('C1', 'NIP')
	->setCellValue('D1', 'Jabatan')
	->setCellValue('E1', 'Golongan')
	->setCellValue('F1', 'Hadir')
	->setCellValue('G1', 'Total Jam')
	->setCellValue('H1', 'Uang Makan per Hari')
	->setCellValue('I1', 'Total Uang Makan')
	->setCellValue('J1', 'Pajak')
	->setCellValue('K1', 'Total Terima');

	$kolom = 2;
	$nomor = 1;
	foreach($download as $p) {

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
			
		

		if ($p->total_jam == 0) {
			$p->total_hadir = 0;
			$p->total = $p->uang_makan * $p->total_hadir;
		}
		else{
			$p->total = $p->uang_makan * $p->total_hadir;
		}

		$p->total_semua = $p->total - $p->pajak;




		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A' . $kolom, $nomor)
		->setCellValue('B' . $kolom, $p->nama_pegawai)
		->setCellValue('C' . $kolom, $p->id_pegawai)
		->setCellValue('D' . $kolom, $p->jabatan)
		->setCellValue('E' . $kolom, $p->level_golongan)
		->setCellValue('F' . $kolom, $p->total_hadir)
		->setCellValue('G' . $kolom, $p->total_jam)
		->setCellValue('H' . $kolom, $p->uang_makan)
		->setCellValue('I' . $kolom, $p->total)
		->setCellValue('J' . $kolom, $p->pajak)
		->setCellValue('K' . $kolom, $p->total_semua);

		$kolom++;
		$nomor++;

	}

     $writer = new Xlsx($spreadsheet);
	//$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');


	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="LaporanRekapPresensi.xlsx"');
	header('Cache-Control: max-age=0');

	$writer->save('php://output');
	redirect('sikasep/Rekap');
		// echo "<meta http-equiv='refresh'/>";
}





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

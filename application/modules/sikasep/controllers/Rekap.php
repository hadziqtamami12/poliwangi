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



		foreach ($data['rekap'] as $p):

			
			$p->hadir = 0;
			$p->total = 0;
			$p->total_semua = 0;
			$p->total_jam = 0;

			$p->total_hadir = count( (array) $p->id_presensi);

			if (isset($p->jam_masuk)):
				$p->total_jam = date_diff(new DateTime($p->jam_masuk), new DateTime($p->jam_pulang))->h;

				
				if ($p->jabatan == 'Dosen'):
						if ($p->total_jam < 5):
							$p->total_hadir = $p->total_hadir - 1;
						else:
							$p->total_hadir = $p->total_hadir;
						endif;
						// $p->total_jam = $p->hadir * 5;
						// $p->total = $p->uang_makan * $p->total_hadir;
						// $p->total_semua = $p->total - $p->pajak;
				else:
						$p->jam_masuk = date('H:i:s', strtotime($p->jam_masuk));
						$p->jam_pulang = date('H:i:s', strtotime($p->jam_pulang));
					

					if ($p->jam_masuk < $p->jam_masuk_kerja && $p->jam_pulang > $p->jam_pulang_kerja):
						if ($p->jabatan == 'Satpam'):
							if ($p->total_jam < 8):
								$p->total_hadir = $p->total_hadir - 1;
							else:
								$p->total_hadir = $p->total_hadir;
							endif;
						else:
							// if (date("D")!="Sat" and date("D")!="Sun"):
								if ($p->total_jam < 8):
									$p->total_hadir = $p->total_hadir - 1;
								else:
									$p->total_hadir = $p->total_hadir;
								endif;

							// endif;
						endif;
					else:
						$p->total_hadir = $p->total_hadir - 1;
					endif;
				endif;	
			else:
				if ($p->total_hadir > 0):
					$p->total_hadir = $p->total_hadir - 1;
				else:
					$p->total_hadir = 0;
				endif;

			endif;
				$p->total = $p->uang_makan * $p->total_hadir;
				$p->total_semua = $p->total - $p->pajak;
		endforeach;


		if ($this->session->userdata['logged_in']==true):
			$this->template->load('layout/template', 'rekap/index', $data);

		else:
			redirect('Login-User');
		endif;
	}

	public function detaiil_rekap_pegawai($id_pegawai)
	{	
		// $id_pegawai = $this->input->post('id_pegawai');
		$data = array(
			'title' => 'Laporan Rekap Pegawai',
			'detail' => $this->m_rekap->detail_rekap_pegawai($id_pegawai),
		);

		$data['dPegawai'] = $this->m_rekap->detail_pegawai($id_pegawai);


		foreach($data['detail'] as $p){

			$p->jam_masuk = date('H:i:s', strtotime($p->jam_masuk));
			$p->jam_pulang = date('H:i:s', strtotime($p->jam_pulang));

			if (strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja) > 0) {
				$p->telat = strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja);
				$p->telat = $p->telat / 60 . ' menit';
			}
			if (strtotime($p->jam_masuk) - strtotime($p->jam_masuk_kerja) <= 0) {
				$p->telat = '-';
			}
			if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) < 0) {
				$p->psw   = strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja);
				$p->psw = $p->psw / 60 . ' menit';
			}
			if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) >= 0) {
				$p->psw = '-';
			}
			if ($p->jam_masuk == '00:00:00' || $p->jam_pulang == '00:00:00') {
				$p->telat = "Absen woy";
				$p->psw = "Absen woy";
			}

		}

		if ($this->session->userdata['logged_in']==true):
			$this->template->load('layout/template', 'rekap/detail', $data);

		else:
			redirect('Login-User');
		endif;
	}


	public function kirim_laporan()
	{

		$data = array(
			'title' => 'Kirim Laporan Rekap',
		);
		if ($this->session->userdata['logged_in']==true):
			$this->template->load('layout/template', 'rekap/kirim_laporan', $data);

		else:
			redirect('Login-User');
		endif;
	}

	public function kirim_laporan_rekap(){

		$bulanini = date('M');

		$lampiran = $_FILES['lampiran']['name'];
       		// $extension  = ".".pathinfo($lampiran, PATHINFO_EXTENSION);

		if($lampiran):
			$config['allowed_types'] = 'doc|xls|pdf';
			$config['max_size'] = '51200';
			$config['upload_path'] = './assets/dashboard/file-sikasep/';
				// $config['file_name'] = 'Laporan_Rekap_Presensi '.$bulanini.$extension;
			$this->load->library('upload', $config);

			if($this->upload->do_upload('lampiran')):


					// $new_lampiran = $this->upload->data($config['file_name']);
					// $this->db->set('lampiran', $new_lampiran);

				try {
					// $this->telegram_lib->senddoc($nama_dokumen);
					$this->telegram_lib->senddoc($config['upload_path'].$lampiran, 'Laporan Rekap Presensi Bulan '.$bulanini);


					if ($this->telegram_lib->senddoc($config['upload_path'].$config['file_name'], 'no caption')):
						$this->session->set_flashdata('message', 
							'<div class="alert alert-success" role="alert">Laporan rekap telah dikirim</div>');
						$this->telegram_lib->sendmsg('Alhamdulillah Kekirim');
					endif;


					redirect('sikasep/Rekap/kirim_laporan');

				} catch (Exception $e) {
					$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert">Laporan rekap gagal dikirim</div>');
				}

			else: 
					//jika tidak upload maka error
				echo $this->upload->display_errors();

			endif;



		endif;



	}

	public function tele($nama_dokumen){

		$bulanini = date('M');
		try {
			$this->telegram_lib->senddoc($nama_dokumen);


			if ($this->telegram_lib->senddoc($config['upload_path'].$config['file_name'], "no caption")):
				$this->session->set_flashdata('message', 
					'<div class="alert alert-success" role="alert">Laporan rekap telah dikirim</div>');
			endif;


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
		foreach($download as $p):


			if ($p->jabatan == 'Satpam'):
				if (isset($p->jam_masuk)):
					if ($p->jam_masuk <= $p->jam_masuk_kerja && $p->jam_pulang >= $p->jam_pulang_kerja):

						$p->hadir = $p->total_hadir;
						$p->total_jam = $p->hadir * 8;
					endif;				
				endif;				
			else:				
				if(isset($p->jam_masuk)):
					$p->hadir = $p->total_hadir;
					if ($p->jabatan == 'Dosen'):
						$p->total_jam = $p->hadir * 5;
					else:
						if ($p->jam_masuk <= $p->jam_masuk_kerja && $p->jam_pulang >= $p->jam_pulang_kerja):
							$p->total_jam = $p->hadir * 8;
						endif;
					endif;	
				endif;
			endif;
			
			


			if ($p->total_jam == 0):
				$p->total_hadir = 0;
				$p->total = $p->uang_makan * $p->total_hadir;
			else:
				$p->total = $p->uang_makan * $p->total_hadir;
			endif;

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

		endforeach;

		$writer = new Xlsx($spreadsheet);
	//$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');


		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="LaporanRekapPresensi.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
		redirect('sikasep/Rekap');
		// echo "<meta http-equiv='refresh'/>";
	}







}

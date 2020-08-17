<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/PhpOffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Dashboard extends MY_Controller {

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

	}



	public function index()
	{	
		//$this->update_presensi_pegawai();
		$tanggal_sekarang = date('Y-m-d');
      	//$tanggal_sekarang = date('2020-08-14');
		$data = array(
			'title' =>   'Dashboard',
			'tidakmasuk' => $this->m_dashboard->jum_peg_tidakmasuk($tanggal_sekarang),
			'masuk' => $this->m_dashboard->jum_peg_masuk($tanggal_sekarang),
			'ijin' => $this->m_dashboard->jum_peg_ijin($tanggal_sekarang),
			'dashboard' => $this->m_dashboard->hari_ini($tanggal_sekarang),    
			'validasi' => $this->m_dashboard->validasi($tanggal_sekarang),    
			'namaharilibur' => $this->m_dashboard->status_hari($tanggal_sekarang),

		);

		foreach($data['dashboard'] as $p){

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
				$p->psw = $p->psw / -60 . ' menit';
			}
			if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) >= 0) {
				$p->psw = '-';
			}
			if ($p->jam_masuk == '00:00:00' || $p->jam_pulang == '00:00:00') {
				$p->telat = "-";
				$p->psw = "-";
			}
			
			if ($p->jam_masuk != '00:00:00'){
				$p->status = "Masuk";
			}
			if($p->jam_masuk == '00:00:00'){
				
				if ($p->id_status_hari != 0){
					$p->status = "Libur ".$data['namaharilibur']['title'];
				}		
				elseif ($p->ijin == 'ada'){
					$p->status = "Ijin";
				}
				elseif (date('D')=='Sun'){
					$p->status = "Sabtu/Minggu";
				}
				else{                 
					$p->status = "Tidak Masuk";
				}
				
			}
			
			

		}


		if ($this->session->userdata['logged_in']==true) {
			$this->template->load('layout/template', 'dashboard/index', $data);
		}
		else{
			redirect('Login-User');
		}



	}

	public function add_validasi(){
		$tanggal_sekarang = date('Y-m-d');
		$data = array(

			'tanggal' => $tanggal_sekarang,
		);

		$this->m_dashboard->validasi_add($data);
		redirect('sikasep/Dashboard');
	}

	public function validasi(){
		$tanggal_sekarang = date('Y-m-d');
      	$where = array(
          'tanggal' => $tanggal_sekarang,
		   'status' => 'belum tervalidasi'
          );
		$data = array(

			'tanggal' => $tanggal_sekarang,
			'status' => 'tervalidasi'
		);

		$this->m_dashboard->validasi_update($where,$data,'tb_validasi_rekap');
		redirect('sikasep/Dashboard');
	}  	







	public function get_presensi_pegawai(){
		$server = "10.252.100.17";
		$username="hadziq";
		$password="PoliwangiApi!@#876";

		$tanggal_sekarang = date('Y-m-d');		
      	//$tanggal_sekarang = date('2020-08-10');

		$api_token= $this->api_poliwangi->RestApiInit($server, $username, $password);



		if($api_token!=null){
			$ambil = array(
				//"fungsi" => "apiList",				
              	//"fungsi" => "getAbsenDataServer",
				"fungsi" => "getAllPegawaiAktifAbsen",
				"params" => array(
				),
			);

			$ambil2 = array(
				//"fungsi" => "apiList",				
				"fungsi" => "getAbsenDataServer",
				//"fungsi" => "getAllPegawaiAktifAbsen",
				"params" => array(
					'tanggal' => $tanggal_sekarang
				),
			);



			$databasePresensi = $this->m_dashboard->hari_ini($tanggal_sekarang);

			$data2= $this->api_poliwangi->getData($server,"mahasiswa", $ambil , $api_token);			
			$data3= $this->api_poliwangi->getData($server,"mahasiswa", $ambil2 , $api_token);

			if($data2!=null && $data3!=null){		

				$datapegawai = array();
				$datapegawai = json_decode(json_encode($data2),true);
				$dataabsen = array();
				$dataabsen = json_decode(json_encode($data3),true);

				$i = 0;              	
				$j = 0;


				foreach($datapegawai['data'] as $o => $p) { 
                  	
                  	
					$pegawai[] = array(
						'nomor' => $p['nomor'],                    	
						'nip' => $p['nip'],
						'nama'	=> $p['nama'],
						'noid'	=> $p['noid'],
						'jam_masuk' => '',                      	
						'jam_pulang' => ''

					);
                  
                	
                  

					foreach($dataabsen['data'] as $x => $y) {              

						$absen[] = array(
							'jam' => $y['TransactionTime']['date'],                    	
							'noid'	=> $y['noid']
						);

						if(intval($absen[$j]['noid']) == $pegawai[$i]['noid']){
							if(date('H:i:s', strtotime($absen[$j]['jam'])) <= date('H:i:s', strtotime('12:00:00'))){
								$pegawai[$i]['jam_masuk'] = $absen[$j]['jam'];

							}
							if(date('H:i:s', strtotime($absen[$j]['jam'])) >= date('H:i:s', strtotime('12:00:00'))){
								$pegawai[$i]['jam_pulang'] = $absen[$j]['jam'];
							}
							else{

							}
						}

						$j++;                
					}

                  					$i++;
                  
                 
				
				}
				
              	 
				
				
				foreach($dataabsen['data'] as $x => $p) {              

					$absen2[] = array(
						'tanggal' => $p['TransactionTime']['date'],                    	
						'noid'	=> $p['noid']
					);

				}


				foreach($pegawai as $o => $p) {


					$databasePegawai = $this->m_dashboard->data_pegawai($p['nip']);
					$databaseStatushari = $this->m_dashboard->status_hari(date('Y-m-d 00:00:00'));
                  	//$databaseStatushari = $this->m_dashboard->status_hari(date('2020-07-31 00:00:00'));

					$pegawaiabsen = array(

						'id_pegawai' => $p['nip'],
						'jam_masuk' => $p['jam_masuk'],                        
						'jam_pulang' => $p['jam_pulang'],
						'tanggal_sekarang' => $tanggal_sekarang,
						'id_status_hari' => ''
					);





					foreach($databasePegawai as $h){
						$databasePeg = array(
							'id_jam_kerja'=> $h->id_jam_kerja
						);
						$pegawaiabsen['id_jam_kerja'] = $databasePeg['id_jam_kerja'];
					}
					
					foreach($databaseStatushari as $h){
						$databaseSta = array(
							'id_status_hari'=> $h->id_status_hari,
						);
                      	if(isset($databaseSta['id_status_hari'])){
							$pegawaiabsen['id_status_hari'] = $databaseSta['id_status_hari'];
                        }
                      	else{
                          $pegawaiabsen['id_status_hari'] = '';
                        }
					}

					foreach($databasePresensi as $h){
						$databasePres = array(
							'jam_masuk'=> $h->jam_masuk,
							'jam_pulang'=> $h->jam_pulang,
							'tanggal_sekarang' => $h->tanggal_sekarang
						);

					}

					$this->m_dashboard->add_data_pegawai($pegawaiabsen);
				}
                

			}else echo "\n Gak ada data masuk \n";


		}else{
			if(isset($_SESSION['api_token'])){
			 	//session_destroy();
			}
			echo "Gagal";
		}


	}
  
  		public function update_presensi_pegawai(){
		$server = "10.252.100.17";
		$username="hadziq";
		$password="PoliwangiApi!@#876";

		$tanggal_sekarang = date('Y-m-d');		
      	//$tanggal_sekarang = date('2020-08-10');

		$api_token= $this->api_poliwangi->RestApiInit($server, $username, $password);



		if($api_token!=null){
			$ambil = array(
				//"fungsi" => "apiList",				
              	//"fungsi" => "getAbsenDataServer",
				"fungsi" => "getAllPegawaiAktifAbsen",
				"params" => array(
				),
			);

			$ambil2 = array(
				//"fungsi" => "apiList",				
				"fungsi" => "getAbsenDataServer",
				//"fungsi" => "getAllPegawaiAktifAbsen",
				"params" => array(
					'tanggal' => $tanggal_sekarang
				),
			);
          
          	$ambil3 = array(
				//"fungsi" => "apiList",				
				//"fungsi" => "getAbsenDataServer",
				//"fungsi" => "getAllPegawaiAktifAbsen",
              	"fungsi" => "getAbsenDataServerPresensi",
              	//"fungsi" => "getAbsenDataServerAbsensi",
				"params" => array(
                  'tanggal' => $tanggal_sekarang
				),
			);
          
          	$ambil4 = array(
				//"fungsi" => "apiList",				
				//"fungsi" => "getAbsenDataServer",
				//"fungsi" => "getAllPegawaiAktifAbsen",
              	//"fungsi" => "getAbsenDataServerPresensi",
              	"fungsi" => "getAbsenDataServerAbsensi",
				"params" => array(
                  'tanggal' => $tanggal_sekarang
				),
			);



			$databasePresensi = $this->m_dashboard->hari_ini($tanggal_sekarang);

			$data2= $this->api_poliwangi->getData($server,"mahasiswa", $ambil , $api_token);			
			$data3= $this->api_poliwangi->getData($server,"mahasiswa", $ambil2 , $api_token);
			$data4= $this->api_poliwangi->getData($server,"mahasiswa", $ambil3 , $api_token);
          	$data5= $this->api_poliwangi->getData($server,"mahasiswa", $ambil4 , $api_token);
          
          
			if($data2!=null && $data3!=null){		

				$datapegawai = array();
				$datapegawai = json_decode(json_encode($data2),true);
				$dataabsen = array();
				$dataabsen = json_decode(json_encode($data3),true);
              	$datapresensiweb = array();
				$datapresensiweb = json_decode(json_encode($data4),true);
              	$dataabsensiweb = array();
				$dataabsensiweb = json_decode(json_encode($data5),true);
              
              

				$i = 0;              	
				$j = 0;				
              	$k = 0;
              	$l = 0;



				foreach($datapegawai['data'] as $o => $p) {              

					$pegawai[] = array(
						'nomor' => $p['nomor'],                    	
						'nip' => $p['nip'],
						'nama'	=> $p['nama'],
						'noid'	=> $p['noid'],
						'jam_masuk' => '',                      	
						'jam_pulang' => '',
						'status_masuk' => '0',
						'status_pulang' => '0',



					);

					foreach($dataabsen['data'] as $x => $y) {              

						$absen[] = array(
							'jam' => $y['TransactionTime']['date'],                    	
							'noid'	=> $y['noid']
						);


						if(intval($absen[$j]['noid']) == $pegawai[$i]['noid']){
							if(date('H:i:s', strtotime($absen[$j]['jam'])) <= date('H:i:s', strtotime('12:00:00'))){
								$pegawai[$i]['jam_masuk'] = $absen[$j]['jam'];

							}
							if(date('H:i:s', strtotime($absen[$j]['jam'])) >= date('H:i:s', strtotime('12:00:00'))){
								$pegawai[$i]['jam_pulang'] = $absen[$j]['jam'];
							}
							else{

							}
						}

						$j++;                
					}
                  	
                  	foreach($datapresensiweb['data'] as $x => $y) {              

						$presensiweb[] = array(
							'jam_masuk' => $y['masuk'], 
                          	'jam_pulang' => $y['pulang'], 
							'noid'	=> $y['noid']
						);


						if(intval($presensiweb[$k]['noid']) == $pegawai[$i]['noid']){
							$pegawai[$i]['jam_masuk'] = $tanggal_sekarang.' '.$presensiweb[$k]['jam_masuk'];
                          	$pegawai[$i]['jam_pulang'] = $tanggal_sekarang.' '.$presensiweb[$k]['jam_pulang'];
						}

						$k++;                
					}
                  
                  
                  	foreach($dataabsensiweb['data'] as $x => $y) {              

						$absensiweb[] = array(
							'jam_masuk' => $y['masuk'], 
                          	'jam_pulang' => $y['pulang'], 
							'noid'	=> $y['noid']
						);


						if(intval($absensiweb[$l]['noid']) == $pegawai[$i]['noid']){
							$pegawai[$i]['jam_masuk'] = $tanggal_sekarang.' '.$absensiweb[$l]['jam_masuk'];
                          	$pegawai[$i]['jam_pulang'] = $tanggal_sekarang.' '.$absensiweb[$l]['jam_pulang'];
						}

						$l++;                
					}
                  
                  

					$i++;
				}


				foreach($dataabsen['data'] as $x => $p) {              

					$absen2[] = array(
						'tanggal' => $p['TransactionTime']['date'],                    	
						'noid'	=> $p['noid']
					);

				}
              
              	
              
              	


				foreach($pegawai as $o => $p) {


					$databasePegawai = $this->m_dashboard->data_pegawai($p['nip']);
					$databaseStatushari = $this->m_dashboard->status_hari(date('Y-m-d 00:00:00'));

					$pegawaiabsen = array(

						'id_pegawai' => $p['nip'],
						'jam_masuk' => $p['jam_masuk'],                        
						'jam_pulang' => $p['jam_pulang'],
						'tanggal_sekarang' => $tanggal_sekarang,
                      	'id_status_hari' => ''

					);


					foreach($databasePegawai as $h){
						$databasePeg = array(
							'id_jam_kerja'=> $h->id_jam_kerja
						);
						$pegawaiabsen['id_jam_kerja'] = $databasePeg['id_jam_kerja'];
					}
					
					foreach($databaseStatushari as $h){
						$databaseSta = array(
							'id_status_hari'=> $h->id_status_hari,
						);
                      	if(isset($databaseSta['id_status_hari'])){
							$pegawaiabsen['id_status_hari'] = $databaseSta['id_status_hari'];
                        }
                      	else{
                          $pegawaiabsen['id_status_hari'] = '';
                        }
					}

					foreach($databasePresensi as $h){
						$databasePres = array(
							'jam_masuk'=> $h->jam_masuk,
							'jam_pulang'=> $h->jam_pulang,
							'tanggal_sekarang' => $h->tanggal_sekarang
						);

					}


						$where1 = array(

                                    'id_pegawai' => $p['nip'], 
                                    'tanggal_sekarang' => $tanggal_sekarang,

                                );	

						$where2 = array(

                                    'id_pegawai' => $p['nip'], 
                                    'tanggal_sekarang' => $tanggal_sekarang,

                                );


						if($p['jam_masuk'] != ''){


							if($databasePres['jam_masuk'] == '0000-00-00 00:00:00'){
                              
                              	$pegawaiabsen['jam_masuk'] = $p['jam_masuk'];
                              	
                              	
                              
								$this->m_dashboard->update_data_pegawai($where1, $pegawaiabsen,'tb_presensi');
							}

						}
						elseif($p['jam_pulang'] != ''){
                             //$pegawaiabsen['jam_pulang'] = $p['jam_pulang'];


							if($databasePres['jam_masuk'] == '0000-00-00 00:00:00'){
                              
                              	$pegawaiabsen['jam_pulang'] = $p['jam_pulang'];
                              
                              	

								$this->m_dashboard->update_data_pegawai($where2, $pegawaiabsen,'tb_presensi');
							}
						}
                  
                  		
                  		
					echo "<pre>";
                  	                  	//print_r($dataabsensiweb);
//print_r($datapresensiweb);
                  	//print_r($pegawai);
                  	echo "<pre>";
 

                  
                  
                  
				}


			}else echo "\n Gak ada data masuk \n";


		}else{
			if(isset($_SESSION['api_token'])){
			 	//session_destroy();
			}
			echo "Gagal";
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
				$p->psw = $p->psw / -60 . ' menit';
			}
			if (strtotime($p->jam_pulang) - strtotime($p->jam_pulang_kerja) >= 0) {
				$p->psw = '-';
			}
			if ($p->jam_masuk == '00:00:00' || $p->jam_pulang == '00:00:00') {
				$p->telat = "-";
				$p->psw = "-";
			}
			
			if ($p->jam_masuk != '00:00:00'){
				$p->status = "Masuk";
			}
			if($p->jam_masuk == '00:00:00'){
				
				if ($p->id_status_hari != 0){
					$p->status = "Libur ".$data['namaharilibur']['title'];
				}		
				elseif ($p->ijin == 'ada'){
					$p->status = "Ijin";
				}
				elseif (date('D')=='Sun'){
					$p->status = "Sabtu/Minggu";
				}
				else{                 
					$p->status = "Tidak Masuk";
				}
				
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
		// $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');


		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-Rekap-Presensi-Pegawai';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
		// echo "<meta http-equiv='refresh'/>";
		redirect('sikasep/Dashboard');
	}

	

	

}

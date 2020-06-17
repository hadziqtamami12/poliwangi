<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		$this->load->library('session');
		
	}

	public function index()
	{	
		$tanggal_sekarang = date('Y-m-d');

		$data = array(
        	    'title' =>   'Dashboard',
			    'tidakmasuk' => $this->m_dashboard->jum_peg_tidakmasuk($tanggal_sekarang),
			    'masuk' => $this->m_dashboard->jum_peg_masuk($tanggal_sekarang),
			    'ijin' => $this->m_dashboard->jum_peg_ijin($tanggal_sekarang),
			    'dashboard' => $this->m_dashboard->hari_ini($tanggal_sekarang),
			    // 'namahari' => date("l", strtotime('tb_presensi.tanggal_sekarang'))
			    'namahari' => date("l")

        );



        if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'dashboard/index', $data);
        }
        else{
			redirect('Login-User');
        }

      

	}

	// function tanggalMerah($hari_ini) {
	// $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);

	// //check tanggal merah berdasarkan libur nasional
	// if(isset($array[$hari_ini])):		
	// 	$status_hari = $array[$hari_ini]["deskripsi"];

	// //check tanggal merah berdasarkan hari minggu
	// elseif(date("D",strtotime($hari_ini))==="Sat"):
	// 	$status_hari = 'Sabtu';
	
	// elseif(date("D",strtotime($hari_ini))==="Sun"):
	// 	$status_hari = 'Minggu';
	// 	//bukan tanggal merah
	// 	else:
	// 		$status_hari = 'Hari Kerja';
	// 	endif;

	// 	// $this->input->post($status_hari);
	// }





}

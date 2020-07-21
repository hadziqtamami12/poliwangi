<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keterangan extends MY_Controller {

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
	 * @see https://codeigniter.com/keterangan_guide/general/urls.html
	 */
	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_keterangan');
		$this->load->library('session');
		
	}

	public function index()
	{	

		// $tanggal_sekarang = date('Y-m-d');
		

		$data = array(
        	    'title' =>   'Keterangan ijin',
			    // 'tidakmasuk' => $this->m_dashboard->jum_peg_tidakmasuk($tanggal_sekarang),
			    // 'masuk' => $this->m_dashboard->jum_peg_masuk($tanggal_sekarang),
			    // 'ijin' => $this->m_dashboard->jum_peg_ijin($tanggal_sekarang),
			    'keterangan' => $this->m_keterangan->keterangan_list(),
			    // 'namahari' => date("l", strtotime('tb_presensi.tanggal_sekarang'))
			    // 'namahari' => date("l")

        );



        if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'keterangan/index', $data);
        }
        else{
			redirect('Login-User');
        }

      

	}

	// public function add_data(){

	//   	$ = $this->input->post('');
	// 	$ = $this->input->post('');
	// 	$id_keterangan = $this->input->post('id_keterangan');


	// 	$data = array(
	// 		'' => $,
	// 		'' => $,
	// 		'' => $,
	// 		'id_level_keterangan' => $id_level_keterangan
	// 	);
	 
	// 	$this->m_keterangan->add_data($data);
	// 	redirect('sikasep/keterangan');
			
	// }




	public function update_data(){

	  	$keterangan_telat = $this->input->post('keterangan_telat');
	  	$keterangan_psw = $this->input->post('keterangan_psw');
	  	$ijin = $this->input->post('ijin');
		$id_presensi = $this->input->post('id_presensi');

		$where = array('id_presensi' => $id_presensi);
		$data = array(
			'keterangan_telat' => $keterangan_telat,
			'keterangan_psw' => $keterangan_psw,
			'ijin' => $ijin,
		);
	 
		$this->m_keterangan->update_data($where,$data,'tb_presensi');
		redirect('sikasep/keterangan');
			
	}

	

	// public function delete_data($id_keterangan){

	// 	$where = array('id_keterangan' => $id_keterangan);
	 
	// 	$this->m_keterangan->delete_data($where,'');
	// 	redirect('sikasep/keterangan');
			
	// }

}

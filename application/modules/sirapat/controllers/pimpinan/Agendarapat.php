<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agendarapat extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->helper('pimpinan');
		$this->load->model('pimpinan_m');
	}

	public function index()
	{ 
	
		$data['title'] = 'Agenda Rapat';
		$data['karyawan'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_dosen')])->row_array();
		$data['getallagenda'] = $this->pimpinan_m->getallagenda()->result();
		// var_dump($this->session->userdata('unit_dosen')); die;

        $this->template->load('layout/pimpinan/template', 'pimpinan/agenda', $data);

	}


}

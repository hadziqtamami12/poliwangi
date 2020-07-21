<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->helper('pimpinan');
		$this->load->model('Pimpinan_m');
	}

	public function index()
	{ 
	
		$this->load->model('pimpinan_m');
		$data['title'] = 'Validasi Agenda';
		$data['karyawan'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_dosen')])->row_array();
		$data['row']= $this->pimpinan_m->get();

		$data['validasi']= $this->pimpinan_m->getvalidasi()->result();
        $this->template->load('layout/pimpinan/template', 'pimpinan/validasi', $data);

	}

	public function qrcode($id){

		$this->load->model('pimpinan_m');
	
		$data['title'] = 'QR Code';
		$data['karyawan'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_dosen')])->row_array();

		$data['row']= $this->pimpinan_m->get()->row();
		$data['validasi']= $this->pimpinan_m->getvalidasi()->result();
		$data['detailagenda']= $this->pimpinan_m->detailagenda()->result();
		// var_dump($data['detailagenda']); die;

		$this->template->load('layout/pimpinan/template', 'pimpinan/qrcode', $data);

	}

	public function coba_qrcode(){

		$qrCode = new Endroid\QrCode\QrCode('Velanda Aden Pradipta');

		header('Content-Type: '.$qrCode->getContentType());
		echo $qrCode->writeString();

	}

	public function validasi_agenda(){

		$id_validasi = $this->input->post('id_validasi');
		$qrcode = $this->input->post('qrcode');

		$data= [
			'id_validasi' => $id_validasi,
			'id_pimpinan' => $this->session->userdata('id_dosen'),
			'qrcode' => $qrcode,
			'status' => 1,
			'date_validasi' => time(),
		];

		$where= [
			'id_validasi' => $id_validasi,
		];
		

		$this->Pimpinan_m->update_data($data,$where, 'validasi_agenda');

		$this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Agenda telah divalidasi</div>');

		redirect('sirapat/pimpinan/validasi');
	}

	public function validasimanual(){

		$validasi_id = $this->input->post('validasiId');
		$agenda_id = $this->input->post('agendaId');

		$where = ['id_agenda' => $agenda_id, 'id_validasi' =>$validasi_id];
 
		$data = [

			'id_validasi' => $validasi_id,
			'id_agenda' => $agenda_id,
			'id_pimpinan' => $this->session->userdata('id_dosen'),
			'qrcode' => 'ttdmanual.jpg',
			'status' => 1,
			'date_validasi' => date('Y-m-d h:i:s'),

		];

		
		// $data2 = [

		// 	'id_validasi' => $validasi_id,
		// 	'id_pimpinan' => $this->session->userdata('id_dosen'),
		// 	'qrcode' => null,
		// 	'status' => 0,
		// ];
 
		$result = $this->db->get_where('validasi_agenda', $where);
 
		if($result->status == 0 ){
			$this->db->update('validasi_agenda', $data);
		}

		 $this->session->set_flashdata('message', 
		 '<div class="alert alert-success" role="alert">Agenda telah Divalidasi</div>');
	 
	}
 
	

}

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
		// $id_presensi = 1;
		// $datapeg = array('pegawai' => $this->m_keterangan->keterangan_list_pegawai($id_presensi));
		// $nama_pegawai = $datapeg['id_pegawai'];

		// echo "<pre>";
		// echo $datapeg['pegawai'];
		// echo "<pre>";


		$data = array(
			'title' =>   'Keterangan ijin',
			'keterangan' => $this->m_keterangan->keterangan_list(),
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
		$tanggal_sekarang = date('Y-m-d');
		// $datapeg = $this->m_keterangan->keterangan_list_pegawai($id_presensi);
		// $nama_pegawai = $datapeg['id_pegawai'];

		$where = array('id_presensi' => $id_presensi);
		$data = array(
			'keterangan_telat' => $keterangan_telat,
			'keterangan_psw' => $keterangan_psw,
			'ijin' => $ijin,
		);

		
		$lampiran = $_FILES['lampiran']['name'];
       	$extension  = ".".pathinfo($lampiran, PATHINFO_EXTENSION);

		if($lampiran):
			$config['allowed_types'] = 'doc|xls|pdf';
			$config['max_size'] = '51200';
			$config['upload_path'] = './assets/dashboard/file-sikasep/';
			$config['file_name'] = $nama_pegawai.'Ijin '.$tanggal_sekarang.$extension;
			$this->load->library('upload', $config);

			if($this->upload->do_upload('lampiran')):
			endif;
		endif;
			$this->m_keterangan->update_data($where,$data,'tb_presensi');
		redirect('sikasep/keterangan');

	}

	// private function _upload()
	// {
	// 	$set_name   = 'coba'."-".RAND(00000,99999);
	// 	$path       = $_FILES['ijin_file']['name'];
	// 	$extension  = ".".pathinfo($path, PATHINFO_EXTENSION);

	// 	$config['upload_path']          = 'assets/upload/ijin/';
	// 	$config['allowed_types']        = 'gif|jpg|jpeg|png|doc|xls|pdf';
	// 	$config['max_size']             = 9024;
	// 	$config['file_name']            = "$set_name".$extension;
	// 	$config['encrypt_name'] 		= TRUE;

	// 	$this->load->library('upload', $config);

	// 	$upload = $this->upload->do_upload('ijin_file');

	// 	if ($upload == FALSE) {
	// 		$this->upload->display_errors();
	// 	}


	// 	$upload = $this->upload->data();
	// 	// return $upload['file_name'];

	// }

	

	// public function delete_data($id_keterangan){

	// 	$where = array('id_keterangan' => $id_keterangan);

	// 	$this->m_keterangan->delete_data($where,'');
	// 	redirect('sikasep/keterangan');

	// }

}

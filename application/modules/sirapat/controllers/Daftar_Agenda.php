<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_Agenda extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->model('m_unggah_agenda');
		
	}

	public function index()
	{ 
        
		$data = array(
			'title' =>   'Daftar Agenda',
			'daftar_agenda' => $this->m_unggah_agenda->tampil_data()->result(),
		);

		$this->load->model('m_jenisrapat', 'jenisrapat');
		$data['agenda'] = $this->jenisrapat->getjenisrapat();
		$data['jenisrapat'] = $this->db->get('jenis_rapat')->result_array();
		// var_dump($data); die;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
        $this->template->load('layout/template', 'daftar_agenda/index', $data);

	}
	
	public function del(){

		$id = $this->input->post('delete');
		$this->m_unggah_agenda->hapus_data($id);
		// $where = array ('id' => $id);

		// $this->m_unggah_agenda->hapus_data($where, 'agenda_rapat');
		$this->session->set_flashdata('message', 
		'<div class="alert alert-danger" role="alert">Agenda Telah Di Hapus</div>');
		 redirect('sirapat/admin/agenda');
	}

	public function edit($id)
	{
		$where = array(
			
			'id' => $id,
		);

		$data = [
			'title' => 'Edit Data',
			'daftar_agenda' =>  $this->m_unggah_agenda->edit_data($where, 'agenda_rapat')->result(),
		];

		$this->load->model('m_jenisrapat', 'jenisrapat');
		$data['agenda'] = $this->jenisrapat->getjenisrapat();
		$data['jenisrapat'] = $this->db->get('jenis_rapat')->result_array();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->template->load('layout/template', 'edit_agenda/index', $data);
	}

	public function update(){


		$id = $this->input->post('id');
		$nama_agenda = $this->input->post('nama_agenda');
		$tanggal = $this->input->post('tanggal');
		$tempat = $this->input->post('tempat');
		$jenis_rapat = $this->input->post('jenis_rapat');
		$peserta_rapat = $this->input->post('peserta_rapat');
		$nomor_agenda = $this->input->post('nomor_agenda');
		$hal = $this->input->post('hal');
		$lampiran = $_FILES['lampiran']['name'];

			if($lampiran){
				$config['allowed_types'] = 'doc|xls|pdf';
				$config['max_size'] = '2048';
				$config['upload_path'] = 'assets/dashboard/file/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('lampiran')){

					//Penghapusan file yang sama
					$old_lampiran = $data['user']['agenda'];
					if($old_lampiran != 'default.doc'){
						unlink(FCPATH . 'assets/dashboard/file/' . $old_lampiran);
					}

					//insert data file ke database
					$new_lampiran = $this->upload->data('file_name');
					$this->db->set('lampiran', $new_lampiran);
				}else {
					//jika tidak upload maka error
					echo $this->upload->display_errors();
				}
			}

		$file = 'default.doc';
		$date_created = time();
		$date_update = time();

		$data = [

			'id' => $id,
			'nama_agenda' => $nama_agenda,
			'tanggal' => $tanggal,
			'tempat' => $tempat,
			'idjenis_rapat' => $jenis_rapat,
			'peserta_rapat' => $peserta_rapat,
			'nomor_agenda' => $nomor_agenda,
			'hal' => $hal,
			'lampiran' => $lampiran,
			'file' => $file,
			'date_created' => $date_created,
			'date_update' => $date_update
		];

		$where = [
			'id' => $id
		];
		$this->m_unggah_agenda->update_data($where,$data, 'agenda_rapat');
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Agenda Telah Di Update</div>');
		redirect('sirapat/admin/Agenda');
	}

	public function detail($id){

		//untuk menampilkan format date
		// <?= date('D F Y', $user['date_created']) 
		$data = [
			'title' => 'Detail Data',
			'daftar_agenda' => $this->m_unggah_agenda->detail_data($id)
		];

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->template->load('layout/template', 'daftar_agenda/index', $data);
		// redirect('sirapat/admin/Agenda');
	}
}
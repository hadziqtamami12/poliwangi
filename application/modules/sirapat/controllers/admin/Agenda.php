<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
        $this->load->model('agenda_m');
        $this->load->model('m_unggah_agenda');
        $this->load->library('pdf_generator');
    }

    public function index(){

        $data['title'] = 'Agenda Rapat';
       
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 
		$data['getagenda'] = $this->agenda_m->getagenda()->result();
		$data['detailagenda'] = $this->agenda_m->detailagenda()->result();

        $this->template->load('layout/template','daftar_agenda/agenda', $data);

    }

    public function edit($id)
	{
		$where = array('id' => $id);

		$data = [
			'title' => 'Edit Data',
			'daftar_agenda' =>  $this->m_unggah_agenda->edit_data($where, 'agenda_rapat')->result(),
		];

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->template->load('layout/template', 'edit_agenda/index', $data);
	}

    public function update(){

			$nama_agenda = $this->input->post('nama_agenda');
			$tanggal = $this->input->post('tanggal');
			$tempat = $this->input->post('tempat');
			$jammulai = $this->input->post('jmmulai');
			$jamselesai = $this->input->post('jmselesai');
			$unit = $this->input->post('unit');
			$gruprapat = $this->input->post('gruprapat');
			$peserta_rapat = $this->input->post('peserta_rapat');
			$nomor_agenda = $this->input->post('nomor_agenda');
			$hal = $this->input->post('hal');
			$pimpinan = $this->input->post('pimpinan');
			$lampiran1 = $this->input->post('lampiran1');
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
			$date_created = date('Y-m-d h:i:s');

			$data = [
				'nama_agenda' => $nama_agenda,
				'tanggal' => $tanggal,
				'tempat' => $tempat,
				'jam_mulai' => $jammulai,
				'jam_selesai' => $jamselesai,
				'id_unit' => $unit,
				'id_tipegrup' => $gruprapat,
				'peserta_rapat' => $peserta_rapat,
				'nomor_agenda' => $nomor_agenda,
				'hal' => $hal,
				'id_pimpinan' => $pimpinan,
				'lampiran' => $lampiran1,
				'lampiran_file' => $lampiran,
				'file' => $file,
				'id_user' => $this->session->userdata('iduser'),
				'date_created' => $date_created,
			];

		$where = [
			'id' => $this->uri->segment(5),
		];
		
		$this->m_unggah_agenda->update_data($where,$data, 'agenda_rapat');
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Agenda Telah Di Update</div>');
		redirect('sirapat/admin/agenda');
	}

    public function del($id){

        $this->agenda_m->del($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">Agenda Telah Dihapus</div>');
            redirect('sirapat/admin/agenda');
        }else{
            redirect('sirapat/admin/agenda');
        }
    }

    public function pdf($id){

        // $this->load->library('pdf_generator');

        // $data['agenda'] = $this->db->get_where('agenda_rapat', ['id' => $id])->row();

        $data['row'] = $this->agenda_m->get($id)->row();
        $html = $this->load->view('daftar_agenda/laporan_pdf', $data, true);

        $this->pdf_generator->generate($html, 'Agenda-'.$data['row']->nama_agenda,'A4', 'landscape');

    }

    // public function print($id){

    //     $data['row'] = $this->agenda_m->get($id)->row();
    //     $this->load->view('daftar_agenda/laporan_pdf', $data);
    // }

    public function print(){

        $data['row'] = $this->agenda_m->get()->row();
        $this->load->view('daftar_agenda/print', $data);
	}
	
	public function validasi(){
 
		$data['title'] = 'Validasi';
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['daftar'] = $this->agenda_m->daftar_validasi()->result();

		$data['pimpinan'] = $this->agenda_m->getpimpinan()->result_array();
		// var_dump($data['pimpinan']);
        // $data['row']= $this->agenda_m->get();

        $this->template->load('layout/template','daftar_agenda/validasi', $data);

	}

	public function sendvalidasi(){

		$id_agenda = $this->input->post('id_agenda');
		$id_pimpinan = $this->input->post('pimpinan');
		$id_user = $this->session->userdata('iduser');

		$data = [
			'id_agenda' => $id_agenda,
			'id_pimpinan' => $id_pimpinan,
			'id_user' => $id_user,
			'status' => 0,
			'date_created' => time(),
		];

		$this->db->insert('validasi_agenda', $data);

		$this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Agenda telah dikirim ke pimpinan</div>');
		redirect('sirapat/admin/agenda');

	}

	public function delvalidasi($id,$id_agenda){

		$this->agenda_m->delval($id);
		
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">Validasi telah dibatalkan</div>');
            redirect('sirapat/admin/agenda/validasi/'.$id_agenda);
        }else{
            redirect('sirapat/admin/agenda/validasi/'.$id_agenda);
        }
    }

	
}
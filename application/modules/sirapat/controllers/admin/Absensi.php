<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
        $this->load->model('agenda_m');
        $this->load->model('absensi_m');
        $this->load->library('pdf_generator');
    }

    public function index(){

        $data['title'] = 'Absensi Karyawan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['getagenda'] = $this->agenda_m->getagenda()->result();
        $this->template->load('layout/template','absensi/index', $data);

    }

    public function detail_absensi(){

        $data['getanggota'] = $this->absensi_m->getanggota()->result();
        $data['title'] = 'Detail Absensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->template->load('layout/template', 'absensi/detail_absensi', $data);

    }

    public function addabsensi(){

       $agenda_id = $this->input->post('agendaId');
       $karyawan_id = $this->input->post('karyawanId');

       $where = ['id_agenda' => $agenda_id, 'id_karyawan' =>$karyawan_id];

       $data = [
           'id_agenda' => $agenda_id,
           'id_karyawan' => $karyawan_id,
           'id_user' => $this->session->userdata('iduser'),
           'status' => 'hadir',
           'date_created' => date('Y-m-d h:i:s'),
       ];

       $result = $this->db->get_where('absensi', $where);

       if($result->num_rows() < 1 ){
           $this->db->insert('absensi', $data);
       }else{
           $this->db->delete('absensi',$where);
       }
        $this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Absensi berhasil</div>');
    }

    public function printabsensi(){

        $data['getabsensi'] = $this->absensi_m->getabsensi()->result();
        $this->load->view('absensi/print_absen', $data);

    }

    public function pdf(){

        $data['getabsensi'] = $this->absensi_m->getabsensi()->result();
        // $html = $this->load->view('daftar_agenda/laporan_pdf', $data, true);

        $html = $this->load->view('absensi/print_absen', $data, true);

        $this->pdf_generator->generate($html, 'Absensi','A4', 'potrait');
    }
}
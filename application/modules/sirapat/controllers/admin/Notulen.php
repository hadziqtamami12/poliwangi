<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notulen extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		is_logged_in();
        $this->load->model('notulen_m');
        $this->load->library('pdf_generator');
    }
 
    public function index(){

        $data['title'] = 'Notulen';
        
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['data_agenda']= $this->notulen_m->getagenda()->result();
    // var_dump($data['user']); die;

        $this->template->load('layout/template', 'notulen/index', $data);

    }

    public function viewnotulen(){

        $data['title'] = 'View Notulen';
        
        $this->load->model('m_jenisrapat', 'jenisrapat');
        $data['agenda'] = $this->jenisrapat->getjenisrapat();
        $data['jenisrapat'] = $this->db->get('jenis_rapat')->result_array();

        $data['pimpinan'] = $this->db->get('dosen')->result_array();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['data_agenda']= $this->notulen_m->getdata()->result();
        $this->template->load('layout/template', 'notulen/tambahnotulen', $data);

    }



    public function tambahnotulen(){

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('ruang_rapat', 'Ruang Rapat', 'required');
		$this->form_validation->set_rules('waktumulai', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('waktuselesai', 'Waktu Selesai', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('jenis_rapat', 'Jenis Rapat', 'required');
		$this->form_validation->set_rules('daftar_hadir', 'Daftar Hadir', 'required');
		$this->form_validation->set_rules('total_hadir', 'Total Hadir', 'required');
		$this->form_validation->set_rules('ketua_rapat', 'Ketua Rapat', 'required');
		$this->form_validation->set_rules('pic', 'Pic', 'required');
        $this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');
        
        if($this->form_validation->run() == false){

            $data['title'] = 'Tambah Notulen';

            $this->load->model('m_jenisrapat', 'jenisrapat');
            $data['agenda'] = $this->jenisrapat->getjenisrapat();
            $data['jenisrapat'] = $this->db->get('jenis_rapat')->result_array();

            $data['pimpinan'] = $this->db->get('dosen')->result_array();
            
            $data['data_agenda']= $this->notulen_m->getdata()->result();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // redirect('admin/notulen/viewnotulen', $data);
            $this->template->load('layout/template', 'notulen/tambahnotulen', $data);

        }else{

        $id_agenda = $this->input->post('id_agenda');
        $tanggal = $this->input->post('tanggal');
        $ruangrapat = $this->input->post('ruang_rapat');
        $waktumulai = $this->input->post('waktumulai');
        $waktuselesai = $this->input->post('waktuselesai');
        $suratundangan = $this->input->post('nomor_surat');
        $jenisrapat = $this->input->post('jenis_rapat');
        $daftarhadir = $this->input->post('daftar_hadir');
        $totalhadir = $this->input->post('total_hadir');
        $ketuarapat = $this->input->post('ketua_rapat');
        $pic = $this->input->post('pic');
        $ringkasan = $this->input->post('ringkasan');
        $foto_rapat = $_FILES['foto_rapat']['name'];
        $date_created = time();

            $data = [
                'id_agenda' => $id_agenda,
				'tanggal' => $tanggal,
				'ruang_rapat' => $ruangrapat,
				'waktu_mulai' => $waktumulai,
				'waktu_selesai' => $waktuselesai,
				'nomor_surat' => $suratundangan,
				'jenis_rapat' => $jenisrapat,
				'daftar_hadir' => $daftarhadir,
				'total_hadir' => $totalhadir,
				'ringkasan' => $ringkasan,
				'ketua_rapat' => $ketuarapat,
                'notulen' => $this->session->userdata('nama'),
                'pic' => $pic,
				'date_created' => $date_created,
			];

            // var_dump($this->session->userdata('nama')); die;
            $this->notulen_m->input_data($data, 'notulen');
	
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert">Notulen Telah Ditambahkan</div>');
			redirect('sirapat/admin/notulen');

        }

    }

    public function risalahrapat(){
        
        $data['title'] = 'Risalah Rapat';
        
        $data['data_agenda']= $this->notulen_m->getdata()->result();
        $data['getnotulen'] = $this->notulen_m->getnotulen();
        $data['risalah_rapat']= $this->notulen_m->getrisalah()->result();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
        $this->template->load('layout/template', 'notulen/risalah_rapat', $data);

    }

    public function tambahrisalah(){

        $idnotulen = $this->input->post('idnotulen');
        $subtopik = $this->input->post('subtopik');
        $catatankaki = $this->input->post('catatankaki');

        $data = [
            'id_notulen' =>$idnotulen,
            'subtopik' =>$subtopik,
            'catatan_kaki' =>$catatankaki,
            'date_created' => time(),
        ];

        $this->db->insert('risalah_rapat', $data);
        $this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Risalah Rapat Telah Ditambahkan</div>');
		redirect('sirapat/admin/notulen/risalahrapat/'.$idnotulen);

    }

    public function updaterisalah($idnotulen){

        $id = $this->input->post('id');
        $subtopik = $this->input->post('subtopik');
        $catatankaki = $this->input->post('catatankaki');

        $data = [

            'subtopik' =>$subtopik,
            'catatan_kaki' =>$catatankaki,
    
        ];

        $where = ['id_risalahrapat'=>$id];

        $this->db->where($where);
        $this->db->update('risalah_rapat', $data);

        $this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Risalah Rapat Telah di Update</div>');
		redirect('sirapat/admin/notulen/risalahrapat/'.$idnotulen);

    }

    public function delrisalah($id, $idnotulen){

        $this->notulen_m->delrisalah($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">Risalah Telah Dihapus</div>');
            redirect('sirapat/admin/notulen/risalahrapat');
        }else{
            redirect('sirapat/admin/notulen/risalahrapat/'.$idnotulen);
        }

    }

    public function psbw(){
        
        $data['title'] = 'Permasalahan, Solusi, Dan Batas Waktu';
        
        $data['pbsw']= $this->notulen_m->getpbsw()->result();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
        $this->template->load('layout/template', 'notulen/psbw', $data);

    }

    public function tambahpsbw(){

        $id = $this->input->post('id_notulen');
        $topikbahasan = $this->input->post('topikbahasan');
        $uraian = $this->input->post('uraian');
        $solusi = $this->input->post('solusi');
        $pic = $this->input->post('pic');
        $bataswaktu = $this->input->post('bataswaktu');

        $data = [
            'id_notulen' => $id,
            'topik_bahasan' => $topikbahasan,
            'uraian' => $uraian,
            'solusi' => $solusi,
            'pic' => $pic,
            'bataswaktu' => $bataswaktu,
            'date_created' => time()
        ];

        $this->db->insert('permasalahan', $data);
        $this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Data Telah Ditambahkan</div>');
		redirect('sirapat/admin/notulen/psbw/'.$id);

    }

    public function updatepsbw($idnotulen){

        // $idnotulen = $this->input->post('idnotulen');
        $id = $this->input->post('id');
        $topikbahasan = $this->input->post('topikbahasan');
        $uraian = $this->input->post('uraian');
        $solusi = $this->input->post('solusi');
        $pic = $this->input->post('pic');
        $bataswaktu = $this->input->post('bataswaktu');

        $data = [

            'topik_bahasan' => $topikbahasan,
            'uraian' => $uraian,
            'solusi' => $solusi,
            'pic' => $pic,
            'bataswaktu' => $bataswaktu,
            'date_updated' => time()
    
        ];

        $where = ['idpermasalahan'=>$id];

        $this->db->where($where);
        $this->db->update('permasalahan', $data);

        $this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Risalah Rapat Telah di Update</div>');
		redirect('sirapat/admin/notulen/psbw/'.$idnotulen);
    }

    public function delpsbw($id, $idnotulen){

        $this->db->where('idpermasalahan', $id);
        $this->db->delete('permasalahan');

        $this->session->set_flashdata('message', 
		'<div class="alert alert-danger" role="alert">Data Telah di Hapus</div>');
		redirect('sirapat/admin/notulen/psbw/'.$idnotulen);

    }

    public function beritaacara(){
        
        $data['title'] = 'Berita Acara';
        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
        $this->template->load('layout/template', 'notulen/berita_acara', $data);

    }


    public function tambahberitaacara(){
        
        $id = $this->input->post('idnotulen');
        $tanggal = $this->input->post('tanggal');
        $hasil = $this->input->post('hasil');

        $data = [
            'id_notulen' => $id,
            'tanggal' => $tanggal,
            'hasil' => $hasil,
            'date_created' => time(),
        ];

        $this->db->insert('berita_acara', $data);
        $this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Data Telah di Ditambahkan</div>');
		redirect('sirapat/admin/notulen/beritaacara/'.$id);
       
    }

    public function delberitaacara($id, $idnotulen)
    {
        $this->db->where('id_beritaacara', $id);
        $this->db->delete('berita_acara');

        $this->session->set_flashdata('message', 
		'<div class="alert alert-danger" role="alert">Data Telah di Dihapus</div>');
		redirect('sirapat/admin/notulen/beritaacara/'.$idnotulen);

    }

    public function updateberitaacara($idnotulen){
        
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $hasil = $this->input->post('hasil');

        $data = [

            'tanggal' => $tanggal,
            'hasil' => $hasil,
            'date_created' => time(),
        ];

        $where=['id_beritaacara' => $id];

        $this->db->where($where);
        $this->db->update('berita_acara', $data);

        $this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Data Telah di Di Update</div>');
		redirect('sirapat/admin/notulen/beritaacara/'.$idnotulen);
       
    }



    public function detail_notulen($id){

        $where = array('id' => $id);

		$data = [
			'agenda' =>  $this->notulen_m->detail_data($where, 'agenda_rapat')->result(),
		];

        $data['title'] = 'Detail Notulen';
        
        // $data['data_agenda']= $this->notulen_m->getdata()->result();
       
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
        $this->template->load('layout/template', 'notulen/detail_notulen', $data);

    }

}
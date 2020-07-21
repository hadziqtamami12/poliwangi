<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_karyawan extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_logged_in();
        $this->load->helper('sirapat');
        $this->load->model('superadmin_m');
    }

    public function index(){


        $data['title'] = 'Data Karyawan';
    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['karyawan'] = $this->superadmin_m->getkaryawan()->result();
        $data['unit'] = $this->db->get('karyawan_unit')->result_array();


        // form validasi

        
        $this->form_validation->set_rules('nik_nip', 'Nik/Nip', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required');
        $this->form_validation->set_rules('ttl', 'TTL', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');
        // $this->form_validation->set_rules('foto', 'Foto', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false){
    
            $this->template->load('layout/template', 'superadmin/data_karyawan', $data);

        }else{

            $nik_nip = $this->input->post('nik_nip');
            $unit = $this->input->post('unit');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $ttl = $this->input->post('ttl');
            $jabatan = $this->input->post('jabatan');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $foto = $this->input->post('foto');
            $alamat = $this->input->post('alamat');

            $data = [

                'role_id' => 2,
                'unit_id' => $unit,
                'nik_nip' => $nik_nip,
                'nama_karyawan' => $nama_karyawan,
                'ttl' => $ttl,
                'jabatan' => $jabatan,
                'email' => $email,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'foto' => 'default.jpg',
                'password' => MD5(123),
                'date_created' => date('Y-m-d h:i:s'),
                

            ];

            $this->db->insert('karyawan', $data);

            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">Karyawan Telah Ditambahkan</div>');
    
            redirect('sirapat/superadmin/data_karyawan');

        }
        
    }

    public function tambahkaryawan(){

        $this->form_validation->set_rules('nik_nip', 'Nik/Nip', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required');
        $this->form_validation->set_rules('ttl', 'TTL', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|validemail');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('foto', 'Foto', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false){

            $data['title'] = 'Data Karyawan';
    
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
            $data['karyawan'] = $this->db->get('karyawan')->result_array();

            $this->session->set_flashdata('message', 
            '<div class="alert alert-danger" role="alert">Data Belum Terisi Lengkap</div>');
    
            $this->template->load('layout/template', 'superadmin/data_karyawan', $data);

        }else{

            $nik_nip = $this->input->post('nik_nip');
            $unit = $this->input->post('unit');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $ttl = $this->input->post('ttl');
            $jabatan = $this->input->post('jabatan');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $foto = $this->input->post('foto');
            $alamat = $this->input->post('alamat');

            $data = [

                'role_id' => 2,
                'unit_id' => $unit,
                'nik_nip' => $nik_nip,
                'nama_karyawan' => $nama_karyawan,
                'ttl' => $ttl,
                'jabatan' => $jabatan,
                'email' => $email,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'foto' => 'default.jpg',
                'password' => MD5(123),
                'date_created' => time(),

            ];

            $this->db->insert('karyawan', $data);

            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">Karyawan Telah Ditambahkan</div>');
    
            redirect('sirapat/superadmin/data_karyawan');

        }


    }

    public function detailkaryawan($id){

        $data['karyawan'] = $this->superadmin_m->detail($id)->row();

    }

    public function addunit(){

        $this->form_validation->set_rules('unit', 'Unit', 'required');

        if ($this->form_validation->run() == false){

            $data['title'] = 'Data Karyawan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['karyawan'] = $this->db->get('karyawan')->result_array();
            $this->session->set_flashdata('message', 
            '<div class="alert alert-danger" role="alert">Data Belum Terisi Lengkap</div>');
            $this->template->load('layout/template', 'superadmin/data_karyawan', $data);
        }else {
            
            $unit = $this->input->post('unit');

            $data = [
                'unit' => $unit,
            ];

            $this->db->insert('karyawan_unit', $data);
            $this->session->set_flashdata('message', 
            
            '<div class="alert alert-success" role="alert">Unit Ditambahkan</div>');
    
            redirect('sirapat/superadmin/data_karyawan');

        }


    }
}
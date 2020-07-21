<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undangan extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		is_logged_in();
        $this->load->model('agenda_m');
		
    }

    public function index(){

        $data['title'] = 'Undangan';
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['row']= $this->agenda_m->get();
        $this->template->load('layout/template', 'undangan/index', $data);

    }
}
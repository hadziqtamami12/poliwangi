<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	public function __construct()
	{
        parent::__construct();
        is_logged_in();
		$this->load->helper('sirapat');
		$this->load->model('m_dashboard');
		
		
	}

	public function index()
	{ 

		$data['title'] = 'Super Admin Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
        $this->template->load('layout/template', 'superadmin/dashboard', $data);

	}


}

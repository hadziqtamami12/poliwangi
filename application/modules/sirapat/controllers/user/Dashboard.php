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

		//$sess_data = $this->m_dashboard->ambil_data($this->session->userdata['email']);
		$data['title'] = 'User Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data = array(

		// 		'title' =>   'Dashboard',
				
			   
		// );
		
        $this->template->load('layout/template', 'user/dashboard', $data);

	}


}

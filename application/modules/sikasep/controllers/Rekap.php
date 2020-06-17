<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends MY_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('m_dashboard');
		$this->load->model('m_rekap');
		$this->load->library('session');
		
	} 

	public function index()
	{	
		$data = array(
        	    'title' =>   'Rekap',
			    'rekap' => $this->m_rekap->rekap_list(),
			    'namahari' => date("l")
			    

        );


        if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'rekap/index', $data);
        }
        else{
			redirect('Login-User');
        }

      

	}



}

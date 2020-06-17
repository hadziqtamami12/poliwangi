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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
		$this->load->library('session');
		
	}

	public function index()
	{	
		$data = array(
        	    'title' =>   'Keterangan Kehadiran Pegawai',
			    'graph' => $this->m_dashboard->user_list(),
        );


        if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'keterangan/index', $data);
        }
        else{
			redirect('Login-User');
        }

      

	}

	function data_user(){
        $data=$this->m_dashboard->user_list();
        echo json_encode($data);
    }


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends MY_Controller {

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
		$this->load->model('m_golongan');
		$this->load->library('session');
		
	}

	public function index()
	{	
		$data = array(
        	    'title' =>   'Golongan Pegawai',
			    'golongan' => $this->m_golongan->golongan(),
			    'f_golongan' => $this->m_golongan->all(),

        );


        if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'golongan/index', $data);

        }
        else{
			redirect('Login-User');
        }
      

	}


	public function tampil_golongan()
	{

		if (isset($_POST['cari'])) {
			$data['f_golongan']	 = $this->m_golongan->view_data($this->input->post('id_level_golongan'));
			if ($this->input->post('id_level_golongan') == 'all') {
				$data['f_golongan']	 = $this->m_golongan->all();
			}
			// redirect('Login-User');
	       	 // $this->template->load('layout/template', 'golongan/index', $data);
	       	 // $this->template->load('layout/template', 'golongan/tabel_data', $data);
			$this->load->view('golongan/tabel_data', $data);
		}else {
			// $data['f_golongan']	 = $this->m_golongan->all();
			// $this->load->view('golongan/index', $data);

			
		}
	}



}

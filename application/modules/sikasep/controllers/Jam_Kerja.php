<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jam_Kerja extends MY_Controller {

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
		$this->load->model('m_jam_kerja');
		$this->load->library('session');
    	date_default_timezone_set('ASIA/JAKARTA');

		
	}

	public function index()
	{	

		$data = array(
        	    'title' =>   'Jam Kerja Pegawai',
			    'jam_kerja' => $this->m_jam_kerja->jam_kerja_list(),

        );

        if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'jam_kerja/index', $data);
        }
        else{
			redirect('Login-User');
        }

      

	}

    public function edit(){
	  	$id_jam_kerja = $this->input->post('id_jam_kerja');
		$jam_masuk = $this->input->post('jam_masuk');
		$jam_pulang = $this->input->post('jam_pulang');

		$where = array('id_jam_kerja' => $id_jam_kerja);
		$data = array(
			'id_jam_kerja' => $id_jam_kerja,
			'jam_masuk_kerja' => $jam_masuk,
			'jam_pulang_kerja' => $jam_pulang
		);
	 
		$this->m_jam_kerja->update_data($where,$data,'tb_jam_kerja');
		redirect('sikasep/Jam_Kerja');
		// $this->m_jam_kerja->edit_data($where, 'tb_jam_kerja')->result();
		// $data = $this->m_jam_kerja->update_data($data, $id_pegawai);
		// redirect('Jam_Kerja');		
	}

	


}

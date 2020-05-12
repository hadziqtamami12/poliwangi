<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends MY_Controller {

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
		$this->load->model('m_security');
	}

	public function index()
	{
		$data = array(
        	    'title'     =>   'Shift Security',
			    'graph' => $this->m_security->graph(),
			    'total' => $this->db->get_where('tb_user', ['active'=>'1']),
        );
        $this->template->load('layout/template', 'security/index', $data);

	}

	public function edit($id){
		$where = array('id_user' => $id);
			$data['user'] = $this->m_security->edit_data($where,'tb_user')->result();
	        $this->template->load('layout/template', 'security/index', $data);
	}

}

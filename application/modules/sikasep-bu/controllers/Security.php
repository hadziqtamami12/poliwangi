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
			    'security' => $this->m_security->all_list(),
			    'jam_kerja' => $this->m_security->jam_kerja(),
			    // 'total' => $this->db->get_where('tb_user', ['active'=>'1']),
        );
        $this->template->load('layout/template', 'security/index', $data);

	}

	public function update_data(){

	  	$keterangan_hari = $this->input->post('keterangan_hari');
		$id_pegawai = $this->input->post('id_pegawai');

		$where = array('id_pegawai' => $id_pegawai);
		$data = array(
			'id_jam_kerja' => $keterangan_hari,
		);
	 
		$this->m_security->update_data($where,$data,'tb_pegawai');
		redirect('sikasep/security');
			
	}

}

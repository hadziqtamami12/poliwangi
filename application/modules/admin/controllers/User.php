<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

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
		$this->load->model('m_user');
		$this->load->library('session');
		
	}

	public function index()
	{	

		$data = array(
        	    'title' =>   'Admin',
			    // 'tidakmasuk' => $this->m_dashboard->jum_peg_tidakmasuk($tanggal_sekarang),
			    // 'masuk' => $this->m_dashboard->jum_peg_masuk($tanggal_sekarang),
			    // 'ijin' => $this->m_dashboard->jum_peg_ijin($tanggal_sekarang),
			    'user' => $this->m_user->user_list(),
			    'level_user' => $this->m_user->level_user_list(),
			    // 'namahari' => date("l", strtotime('tb_presensi.tanggal_sekarang'))
			    // 'namahari' => date("l")

        );



        if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'user/index', $data);
        }
        else{
			redirect('Login-User');
        }

      

	}

	public function add_data(){

	  	$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_level_user = $this->input->post('id_level_user');


		$data = array(
			'nama_user' => $nama_user,
			'username' => $username,
			'password' => $password,
			'id_level_user' => $id_level_user
		);
	 
		$this->m_user->add_data($data);
		redirect('admin/user');
			
	}


	// public function edit($id_user)
	// {	
	//   	$id_user = $this->input->post('id_user');

	// 	$where = array('id_user' => $id_user);
	// 	$data['user'] = $this->m_user->edit_data($where,'tb_user');

	//        	 $this->template->load('layout/template', 'user/edit', $data);
 //        if ($this->session->userdata['logged_in']==true) {
	// 		// $this->load->view('user/edit',$data);
 //        }
 //        else{
	// 		redirect('Login-User');
 //        }

      

	// }


	public function update_data(){

	  	$id_user = $this->input->post('id_user');
	  	$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_level_user = $this->input->post('id_level_user');

		$where = array('id_user' => $id_user);
		$data = array(
			'nama_user' => $nama_user,
			'username' => $username,
			'password' => $password,
			'id_level_user' => $id_level_user
		);
	 
		$this->m_user->update_data($where,$data,'tb_user');
		redirect('admin/user');
			
	}

	

	public function delete_data($id_user){

		$where = array('id_user' => $id_user);
	 
		$this->m_user->delete_data($where,'tb_user');
		redirect('admin/user');
			
	}

}

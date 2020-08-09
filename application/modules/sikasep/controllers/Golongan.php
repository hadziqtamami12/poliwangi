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
			    'jabatan' => $this->m_golongan->jabatan(),
			    'jurusan' => $this->m_golongan->jurusan(),
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

			$id = $this->input->post('id_level_golongan');
			$data['f_golongan']	 = $this->m_golongan->view_data($id);
			$data['title'] = 'Golongan Pegawai';
			if ($this->input->post('id_level_golongan') == 'all') {
				$data['f_golongan']	 = $this->m_golongan->all();
			}
		 	
		    $this->load->view('golongan/tabel_data', $data);


			
	}

	public function add_data(){

	  	$id_pegawai = $this->input->post('id_pegawai');
	  	// $nama_pegawai = $this->input->post('nama_pegawai');
		$jabatan = $this->input->post('jabatan');
		$level_golongan = $this->input->post('level_golongan');
		$jurusan = $this->input->post('jurusan');

		// $where = array('id_pegawai' => $id_pegawai);
		$data = array(
			// 'nama_pegawai' => $nama_pegawai,
			'id_jabatan' => $jabatan,
			'id_level_golongan' => $level_golongan,
			'id_jurusan' => $jurusan
			// 'id_level_user' => $id_level_user
		);
	 
		$this->m_golongan->add_data($data);
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

	  	$id_pegawai = $this->input->post('id_pegawai');
	  	// $nama_pegawai = $this->input->post('nama_pegawai');
		$jabatan = $this->input->post('jabatan');
		$level_golongan = $this->input->post('level_golongan');
		$jurusan = $this->input->post('jurusan');

		$where = array('id_pegawai' => $id_pegawai);
		$data = array(
			// 'nama_pegawai' => $nama_pegawai,
			'id_jabatan' => $jabatan,
			'id_level_golongan' => $level_golongan,
			'id_jurusan' => $jurusan
			// 'id_level_user' => $id_level_user
		);
	 
		$this->m_golongan->update_data($where,$data,'tb_pegawai');
		redirect('sikasep/golongan');
			
	}



	

	// public function delete_data($id_user){

	// 	$where = array('id_user' => $id_user);
	 
	// 	$this->m_user->delete_data($where,'tb_user');
	// 	redirect('admin/user');
			
	// }


	



}

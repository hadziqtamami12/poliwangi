<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

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


	function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Login_model');
    }


	public function index()
	{
		$data = array(
			'title'     =>   'Login User'
			    // 'content'   =>   'This is the content',
			    // 'posts'     =>   array('Post 1', 'Post 2', 'Post 3')
		);
		$this->template->load('layout/template', 'login/index', $data);

	}


	public function login()
	{
        //proses login dan validasi nya
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]|max_length[50]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');

			if ($this->form_validation->run()) {
				$data = $this->Login_model->login($this->input->post('username'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
				if ($data['id_role'] == '1') {
					redirect('admin/index');
				}
				elseif ($data['id_role']  == '2') {
					redirect('sikasep/dashboard');
				}
				elseif ($data['id_role']  == '4') {
					redirect('tes/index');
				}
			} else {
				$this->template->load('layout/template', 'login/index', $data);
			}
		} else {
			$this->template->load('layout/template', 'login/index', $data);
			
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user/login');
	}




}

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
        $this->load->database('db_poliwangi');
        $this->load->library('session');

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


    public function check_account()
    {
        //validasi login
        $username      = $this->input->post('username');
        $password   = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->Login_model->check_account($username, $password);
        // $data = $this->Login_model->login($username, $password);

        if ($query === 1) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>username yang Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-info">
              <div class="info-box-icon">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Akun yang Anda masukkan tidak aktif, silakan hubungi Administrator.</div>
              </div>
              </p>'
            );
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.</div>
        			</div>
        			</p>
              ');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
              // 'active'    => 1,
            //   'id'          => $query->id,
              'id_user' =>  $query->id_user,
              'password'    => $query->password,
              'id_level_user'     => $query->id_level_user,
              'username'    => $query->username,
              // 'firstname'  => $query->firstname,
              'nama_user'   => $query->nama_user,
              // // 'username'       => $query->username,
              // 'phone'       => $query->phone,
              'level_user'       => $query->level_user,
              // 'created_on'  => $query->created_on,
              // 'last_login'  => $query->last_login
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }


	public function login()
	{
		$data = array(
			'title'     =>   'Login User'
			    // 'content'   =>   'This is the content',
			    // 'posts'     =>   array('Post 1', 'Post 2', 'Post 3')
		);
        //proses login dan validasi nya
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]|max_length[50]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');

			$error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->Login_model->check_account($this->input->post('username'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
				if ($data->id_level_user == '1') {
          $data_sesi = array(
                        'user_login' => $user_login,
                        'username' => $username,
                        'logged_in' => true,
                    );

                    $this->session->set_userdata($data_sesi); 
					redirect('admin/user');
				}
				elseif ($data->id_level_user  == '2') {
          $data_sesi = array(
                        'user_login' => $user_login,
                        'username' => $username,
                        'logged_in' => true,
                    );

                    $this->session->set_userdata($data_sesi); 
					redirect('sikasep/Dashboard');
				}
        elseif ($data->id_level_user  == '3') {
          $data_sesi = array(
                        'user_login' => $user_login,
                        'username' => $username,
                        'logged_in' => true,
                    );

                    $this->session->set_userdata($data_sesi); 
          redirect('sikasep/Dashboard');
        }
        elseif ($data->id_level_user  == '4') {
          $data_sesi = array(
                        'user_login' => $user_login,
                        'username' => $username,
                        'logged_in' => true,
                    );

                    $this->session->set_userdata($data_sesi); 
          redirect('sikasep/Dashboard');
        }
				// elseif ($data->id_level_user  == '4') {
				// 	redirect('tes/index');
				// }
			 else {
				// $this->template->load('layout/template', 'login/index', $data);
        redirect('Login-User');
			}
		} else {
			// $this->template->load('layout/template', 'login/index', $data);
        redirect('Login-User');
      
			
		}
	}
    }
	public function logout()
	{
      $this->session->set_userdata('logged_in', FALSE);
			redirect('Login-User');
	}




}

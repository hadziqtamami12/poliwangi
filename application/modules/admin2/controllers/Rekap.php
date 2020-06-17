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
	public function index()
	{
		$data = array(
        	    'title'     =>   'Rekapitulasi Presensi Pegawai'
			    // 'content'   =>   'This is the content',
			    // 'posts'     =>   array('Post 1', 'Post 2', 'Post 3')
        );
        $this->template->load('layout/template', 'rekap/index', $data);

	}


}

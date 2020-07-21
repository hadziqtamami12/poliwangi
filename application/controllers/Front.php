<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends MY_Controller {

	

	public function index() {

        // $data = konfigurasi('Profile');
        // $data[''] = array('' =>  );
        $data = array(
        	    'title'     =>   'Tampilan utama!'
			    // 'content'   =>   'This is the content',
			    // 'posts'     =>   array('Post 1', 'Post 2', 'Post 3')
		);
		
        $this->template->load('layout/template', 'front/index', $data);
    }
}

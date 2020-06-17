<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notulen_Rapat extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{ 
		$data = array(

        	    'title' =>   'Unggah Agenda'
			   
		);
		
        $this->template->load('layout/template', 'notulen_rapat/index', $data);

	}


}

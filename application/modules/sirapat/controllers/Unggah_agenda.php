<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unggah_agenda extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{ 
		$data = array(

        	    'title' =>   'Unggah Agenda'
			   
		);
		
        $this->template->load('layout/template', 'unggah_agenda/index', $data);

	}


}

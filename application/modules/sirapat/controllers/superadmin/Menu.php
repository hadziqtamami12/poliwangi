<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_logged_in();
        $this->load->helper('sirapat');
    }

    public function index(){
        
        $data['title'] = 'Menu';
    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false){

            $this->template->load('layout/template', 'superadmin/menu', $data);

        }else {
            
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">Menu Added</div>');
    
            redirect('sirapat/superadmin/menu');

        }
		
     
    }

    public function submenu(){

        $data['title']= 'Sub Menu Manajemen';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('m_menu', 'menu');

        $data ['submenu'] = $this->menu->getsubmenu();
        $data ['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        

        if ($this->form_validation->run() == false){

            
            $this->template->load('layout/template', 'superadmin/submenu', $data);

        }else{

            $data =[

                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">Sub Menu Added</div>');
    
            redirect('sirapat/superadmin/menu/submenu');


        }

    }
}
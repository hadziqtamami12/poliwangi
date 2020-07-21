<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller {


	public function __construct()
	{
        parent::__construct();

        is_logged_in();
		$this->load->helper('sirapat');
		$this->load->model('m_dashboard');
		
		
	}

	public function index()
	{ 

		$data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array(); 
		
        $this->template->load('layout/template', 'superadmin/role', $data);

    }
    
	public function roleaccess($role_id)
	{ 

		$data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array(); 

        $this->db->where('id !=',  3);
        $data['menu'] = $this->db->get('user_menu')->result_array();
		
        $this->template->load('layout/template', 'superadmin/role-access', $data);

    }
    
    public function changeaccess(){

        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data=[
            
            'menu_id' => $menu_id,
            'role_id' => $role_id

        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if($result->num_rows() < 1 ){
            $this->db->insert('user_access_menu', $data);
        }else{
            $this->db->delete('user_access_menu', $data);

        }
        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">Access Change!</div>');
    }


}

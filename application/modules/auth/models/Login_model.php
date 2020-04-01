<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Login_model extends CI_Model{
   
   public function login($username, $password)
    {
        $query = $this->db->get_where('tb_user', array('username'=>$username, 'password'=>$password));
        return $query->row_array();
    }
 
}
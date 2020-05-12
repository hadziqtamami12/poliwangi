<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Login_model extends CI_Model{

    public $table       = 'tb_user';
   
   public function login($username, $password)
    {
        $query = $this->db->get_where('tb_user', array('username'=>$username, 'password'=>$password));
        return $query->row_array();
    }

    public function check_account($username)
    {
        //cari username lalu lakukan validasi
        $this->db->where('username', $username);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->active == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if ($this->input->post('password') > $query->password) {
            return 3;
        }

        return $query;
    }
 
}
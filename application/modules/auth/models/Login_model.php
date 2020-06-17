<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Login_model extends CI_Model{

    public $table       = 'tb_user';
   
   public function login($username, $password)
    {
        // $query = $this->db->get_where('tb_user', array('username'=>$username, 'password'=>$password));
        // return $query->row_array();

        $query=$this->db->select('
            tb_user.*, tb_level_user.id_level_user AS id_level_user, tb_level_user.level_user AS level_user
            ');
        $this->db->join('tb_level_user', 'tb_user.id_level_user = tb_level_user.id_level_user');
        $this->db->from('tb_user');
        $this->db->order_by('id_user','asc');
        $this->db->get_where('tb_user', array('username'=>$username, 'password'=>$password));
        // $this->db->like('id_user',$cari);
        // $data = $this->db->get();
        return $query->row_array();
        //         $this->db->where(array('username'=>$username, 'password'=>$password));
        // $data = $this->db->get();
    }

    public function check_account($username, $password)
    {

        $this->db->select('*');
        $this->db->from('tb_user a'); 
        $this->db->join('tb_level_user b', 'b.id_level_user=a.id_level_user', 'left');
        // $this->db->join('Soundtrack c', 'c.album_id=a.album_id', 'left');
        $this->db->where('a.username',$username);
        $this->db->where('a.password',$password);
        // $this->db->order_by('c.track_title','asc');         
        $query = $this->db->get()->row(); 
        


        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        // if ($query->active == 0) {
        //     return 2;
        // }
        //jika bernilai 3 maka password salah
        if ($this->input->post('password') > $query->password) {
            return 3;
        }

        return $query;
    }
 
}
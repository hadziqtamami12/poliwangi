<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_status_hari extends CI_Model {

public function __construct()
	{
		$this->load->database('db_poliwangi');
		date_default_timezone_set("Asia/Jakarta");
		

	}

public function get_list($table, $where = FALSE )
    {
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get($table)->result();
    }   

    public function insert($table, $param)
    {
        $this->db->insert($table, $param);
        return $this->db->insert_id();
    }

    public function update($table, $set, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $set);
        return $this->db->affected_rows();
    }

    public function delete($table, $where)
    { 
        $this->db->where($where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }





}
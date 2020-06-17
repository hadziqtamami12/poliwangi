<?php
// Penduduk.php
class m_security extends CI_Model {
	public function __construct()
	{
		$this->load->database('sirapat');
	}
 
	public function graph()
	{
		$data = $this->db->get('user');
		return $data->result();
	}

	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}
 
}
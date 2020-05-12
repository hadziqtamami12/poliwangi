<?php
// Penduduk.php
class m_rekap extends CI_Model {
	public function __construct()
	{
		$this->load->database('db_poliwangi');
	}
 
	public function user_list()
	{
		$data = $this->db->get('tb_user');
		return $data->result();
	}
 
}
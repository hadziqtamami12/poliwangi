<?php
// Penduduk.php
class m_dashboard extends CI_Model {
	public function __construct()
	{
		$this->load->database('db_poliwangi');
	}
 
	public function graph()
	{
		$data = $this->db->get('tb_user');
		return $data->result();
	}
 
}
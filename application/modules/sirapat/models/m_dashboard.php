<?php
// Penduduk.php
class m_dashboard extends CI_Model {
	public function __construct()
	{
		$this->load->database('sirapat');
	}
 
	public function graph()
	{
		$data = $this->db->get('user');
		return $data->result();
	}
 
}
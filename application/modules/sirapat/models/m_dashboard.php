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

	public function ambil_data($id){
		$this->db->where('email', $id);
		return $this->db->get('user');
	}
 
}
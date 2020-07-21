<?php
// Penduduk.php
class m_jam_kerja extends CI_Model {
	public function __construct()
	{
		$this->load->database('db_poliwangi');
	}
 
	public function jam_kerja_list()
	{
		$data = $this->db->get('tb_jam_kerja');
		return $data->result();
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function get_subkategori($id_jam_kerja){

		$this->db->select('*');
        $this->db->from('tb_jam_kerja');
        $this->db->where('id_jam_kerja', $id_jam_kerja);
        $data = $this->db->get();
		return $data->result();
    }



 
}
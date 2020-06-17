<?php
// Penduduk.php
class m_golongan extends CI_Model {
	public function __construct()
	{
		$this->load->database('db_poliwangi');
	}


	public function golongan()
	{
		$this->db->select('*');
        // $this->db->join('tb_level_golongan', 'tb_pegawai.id_level_golongan = tb_level_golongan.id_level_golongan');
        $this->db->from('tb_level_golongan');
        $this->db->order_by('id_level_golongan','asc');
        $data = $this->db->get();
		return $data->result();
	}

	public function view_data($id){
            $this->db->join('tb_level_golongan', "tb_level_golongan.id_level_golongan = tb_pegawai.id_level_golongan");
        $this->db->group_by('id_pegawai','asc');
        $this->db->order_by('id_pegawai','asc');
     return $this->db->get_where('tb_pegawai', "tb_pegawai.id_level_golongan='$id'");
   }

   public function all()
	{
		$this->db->select('*');
        $this->db->join('tb_level_golongan', 'tb_pegawai.id_level_golongan = tb_level_golongan.id_level_golongan');
        $this->db->from('tb_pegawai');
        $this->db->group_by('id_pegawai','asc');
        $this->db->order_by('id_pegawai','asc');
        $data = $this->db->get();
		return $data;
	}

	

 
}



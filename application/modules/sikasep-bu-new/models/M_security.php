<?php
// Penduduk.php
class m_security extends CI_Model {
	public function __construct()
	{
		$this->load->database('db_poliwangi');
	}
 
	public function all_list()
	{
        
        $this->db->select('*');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_pegawai.id_jabatan');
        $this->db->join('tb_level_golongan', 'tb_pegawai.id_level_golongan = tb_level_golongan.id_level_golongan');
        $this->db->join('tb_jam_kerja', 'tb_pegawai.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        $this->db->where('tb_pegawai.id_jabatan', '2');
        $this->db->group_by('id_pegawai');
        $this->db->order_by('id_pegawai','asc');
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}

	public function jam_kerja()
	{
        
        $this->db->select('*');
        $this->db->from('tb_jam_kerja');
        $this->db->where('id_jam_kerja !=', '1');
        $this->db->where('id_jam_kerja !=', '2');
        $this->db->order_by('id_jam_kerja','asc');
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}


        public function update_data($where,$data,$table){
                $this->db->where($where);
                $this->db->update($table,$data);
        }
 
}
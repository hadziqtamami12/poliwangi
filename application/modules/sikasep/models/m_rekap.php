<?php

class m_rekap extends CI_Model {
	public function __construct()
	{
		$this->load->database('db_poliwangi');

	}


	public function rekap_list()
	{
        
        $this->db->select('*, count(tb_presensi.id_presensi) as total_hadir');
        $this->db->from('tb_rekap');
        $this->db->join('tb_pegawai', 'tb_rekap.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_rekap.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_level_golongan', 'tb_rekap.id_level_golongan = tb_level_golongan.id_level_golongan');
        $this->db->join('tb_presensi', 'tb_rekap.id_presensi = tb_presensi.id_presensi');
        $this->db->group_by('tb_rekap.id_pegawai');
        $this->db->order_by('id_rekap','asc');
        // $this->db->where('id_card',$cari);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}

    





 
}



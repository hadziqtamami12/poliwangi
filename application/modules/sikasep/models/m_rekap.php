<?php

class m_rekap extends CI_Model {
	public function __construct()
	{
		$this->load->database('db_poliwangi');

	}



	public function rekap_list()
	{
        $this->db->select('*');
        $this->db->from('tb_presensi');
        $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_level_golongan', 'tb_pegawai.id_level_golongan = tb_level_golongan.id_level_golongan');
        $this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        // $this->db->join('tb_presensi', 'tb_presensi.id_presensi = id_presensi');
        $this->db->group_by('tb_presensi.id_pegawai');
        $this->db->order_by('tb_presensi.id_pegawai','asc');
      	$this->db->where('MONTH(tb_presensi.tanggal_sekarang)', date('m'));
        //$this->db->where(date('m') ,$bulan_sekarang);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
	return $data->result();
	}
  
  	public function total_hadir($id_pegawai, $bulan)
	{
        $this->db->select('*');
        $this->db->from('tb_presensi');
        $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_level_golongan', 'tb_pegawai.id_level_golongan = tb_level_golongan.id_level_golongan');
        $this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        // $this->db->join('tb_presensi', 'tb_presensi.id_presensi = id_presensi');
        //$this->db->order_by('tb_presensi.id_pegawai','asc');
      	//$this->db->group_by('tanggal_sekarang');
        $this->db->where('tb_presensi.id_pegawai' ,$id_pegawai);        
      	$this->db->where('MONTH(tb_presensi.tanggal_sekarang)', date('m'));

        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
	return $data->result();
	}

        public function detail_rekap_pegawai($id_pegawai)
        {
        $this->db->select('*');
        $this->db->from('tb_presensi');
        $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_level_golongan', 'tb_pegawai.id_level_golongan = tb_level_golongan.id_level_golongan');
        $this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        // $this->db->join('tb_presensi', 'tb_presensi.id_presensi = id_presensi');
        $this->db->where('tb_presensi.id_pegawai', $id_pegawai);
        $this->db->where('MONTH(tb_presensi.tanggal_sekarang)', date('m'));
        // $this->db->where('id_card',$cari);
        $this->db->order_by('tb_presensi.id_presensi','desc');
         
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
        return $data->result();
        }

        public function detail_pegawai($id_pegawai)
        {
        
        $this->db->select('*');
        $this->db->from('tb_presensi');
        $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        //$this->db->from('tb_pegawai');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_level_golongan', 'tb_pegawai.id_level_golongan = tb_level_golongan.id_level_golongan');
        $this->db->where('tb_pegawai.id_pegawai', $id_pegawai);
        $this->db->where('MONTH(tb_presensi.tanggal_sekarang)', date('m'));
        $this->db->group_by('tb_pegawai.id_pegawai');
        $data = $this->db->get();
        return $data->result();
        }

        // public function data_uang_makan()
        // {
        
        // $this->db->select('*, count(id_presensi) as total_jam');
        // $this->db->from('tb_presensi');
        // $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        // $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        // $this->db->join('tb_level_golongan', 'tb_pegawai.id_level_golongan = tb_level_golongan.id_level_golongan');
        // $this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        // // $this->db->join('tb_presensi', 'tb_presensi.id_presensi = id_presensi');
        // $this->db->group_by('tb_presensi.id_pegawai');
        // $this->db->order_by('tb_presensi.id_pegawai','asc');
        // $this->db->where('tb_presensi.jam_masuk !=', Null);
        // // $this->db->where('tb_presensi.jam_pulang >=', 'tb_jam_kerja.jam_pulang_kerja');
        // // $this->db->like('id_rekap',$cari);
        // $data = $this->db->get();
        //         return $data->result();
        // }

        

        // public function total_jam($id_pegawai)
        // {
        
        // $this->db->select('*');
        // $this->db->from('tb_presensi');
        // $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        // $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        // $this->db->join('tb_level_golongan', 'tb_pegawai.id_level_golongan = tb_level_golongan.id_level_golongan');
        // $this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        // $this->db->group_by('tb_presensi.tanggal_sekarang');
        // $this->db->order_by('tb_presensi.id_pegawai','asc');
        // $this->db->where('tb_presensi.id_pegawai',$id_pegawai);
        // // $this->db->like('id_rekap',$cari);
        // $data = $this->db->get();
        //         return $data->result();
        // }

        





 
}



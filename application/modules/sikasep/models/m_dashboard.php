<?php
class m_dashboard extends CI_Model {


	public function __construct()
	{
		$this->load->database('db_poliwangi');
		// $this->load->library('TanggalMerah');
		date_default_timezone_set("Asia/Jakarta");
	}

	// private $tanggal_sekarang = '2020-05-01';

 
	

	public function jum_peg_tidakmasuk($tanggal_sekarang)
	{
		// $data = $this->db->get('tb_user');
		// return $data->result();

		// $hari_ini = date('l');
		// $hari_ini = date('l', strtotime('tb_presensi.tanggal_sekarang'));
		$this->db->select('*, count(tb_presensi.id_presensi) as jum_masuk');
        $this->db->from('tb_rekap');
        $this->db->join('tb_presensi', 'tb_rekap.id_presensi = tb_presensi.id_presensi');
        $this->db->group_by('tb_presensi.tanggal_sekarang');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tb_presensi.tanggal_sekarang');
        // $this->db->order_by('tb_presensi.tanggal_sekarang','asc');
        // $this->db->where('tb_presensi.jam_masuk', Null);
        $this->db->where('tb_presensi.jam_masuk', Null);
        $this->db->where('tb_presensi.ijin', 'tidak ada');
        $this->db->where('tb_presensi.id_status_hari', Null);
        $this->db->where('tb_presensi.tanggal_sekarang', $tanggal_sekarang);
        // $this->db->where($hari_ini.'!= Friday');
        // $this->db->where($hari_ini .' !=', 'Sunday');
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}

	public function jum_peg_masuk($tanggal_sekarang)
	{
		// $data = $this->db->get('tb_user');
		// return $data->result();

		// $hari_ini = date('l', strtotime($tanggal_sekarang));


		$this->db->select('*, count(tb_presensi.id_presensi) as jum_masuk');
        $this->db->from('tb_rekap');
        $this->db->join('tb_presensi', 'tb_rekap.id_presensi = tb_presensi.id_presensi');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tb_presensi.tanggal_sekarang');
        $this->db->order_by('id_rekap','asc');
        // $this->db->where('tb_presensi.jam_masuk != null OR tb_presensi.ijin = ada OR tb_presensi.id_status_hari = null');
        $this->db->where("(tb_presensi.jam_masuk != '' OR tb_presensi.ijin = 'ada' OR tb_presensi.id_status_hari != '')", NULL, FALSE);
        $this->db->group_by('tb_presensi.tanggal_sekarang');
        $this->db->where('tb_presensi.tanggal_sekarang', $tanggal_sekarang);
        // $this->db->where('tb_presensi.jam_masuk !=', NULL)
        // ->or_where('tb_presensi.ijin', 'ada')
        // ->or_where('tb_presensi.id_status_hari !=', NULL);
        // ->or_where($this->TanggalMerah->is_sunday());
        // $this->db->where('tb_presensi.id_status_hari !=', Null);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}

	public function jum_peg_ijin($tanggal_sekarang)
	{
		// $data = $this->db->get('tb_user');
		// return $data->result();
		$this->db->select('*, count(tb_presensi.id_presensi) as jum_masuk');
        $this->db->from('tb_rekap');
        $this->db->join('tb_presensi', 'tb_rekap.id_presensi = tb_presensi.id_presensi');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tb_rekap.id_pegawai');
        $this->db->order_by('id_rekap','asc');
        $this->db->where('tb_presensi.ijin', 'ada');
        $this->db->where('tb_presensi.tanggal_sekarang', $tanggal_sekarang);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}

	public function hari_ini($tanggal_sekarang)
	{
		$this->db->select('*');
        $this->db->from('tb_rekap');
        $this->db->join('tb_pegawai', 'tb_rekap.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_rekap.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_presensi', 'tb_rekap.id_presensi = tb_presensi.id_presensi');
        $this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tb_rekap.id_pegawai');
        $this->db->order_by('tb_presensi.tanggal_sekarang','desc');
        $this->db->order_by('tb_presensi.id_presensi','asc');
        $this->db->where('tb_presensi.tanggal_sekarang', $tanggal_sekarang);
        // $this->db->where('id_card',$cari);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}


	public function tanggalMerah($hari_ini) {
	$array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);

	// //check tanggal merah berdasarkan libur nasional
	// if(isset($array[$hari_ini])):		
	// 	$status_hari = $array[$hari_ini]["deskripsi"];

	// //check tanggal merah berdasarkan hari minggu
	// elseif(date("D",strtotime($hari_ini))==="Sat"):
	// 	$status_hari = 'Sabtu';
	
	// elseif(date("D",strtotime($hari_ini))==="Sun"):
	// 	$status_hari = 'Minggu';
	// 	//bukan tanggal merah
	// 	else:
	// 		$status_hari = 'Hari Kerja';
	// 	endif;

	// 	$this->input->post($status_hari);
	}

	//testing

 
}



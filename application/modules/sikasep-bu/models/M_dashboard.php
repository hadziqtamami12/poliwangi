<?php
class m_dashboard extends CI_Model {


	public function __construct()
	{
		$this->load->database('db_poliwangi');
		// $this->load->library('TanggalMerah');
		date_default_timezone_set("Asia/Jakarta");


	}

	

	public function jum_peg_tidakmasuk($tanggal_sekarang)
	{
		// $data = $this->db->get('tb_user');
		// return $data->result();

		// $hari_ini = date('l');
		// $hari_ini = date('l', strtotime('tanggal_sekarang'));
		$this->db->select('*, count(id_presensi) as jum_masuk');
        $this->db->from('tb_presensi');
        // $this->db->join('tb_presensi', 'id_presensi = id_presensi');
        $this->db->group_by('tanggal_sekarang');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tanggal_sekarang');
        // $this->db->order_by('tanggal_sekarang','asc');
        // $this->db->where('jam_masuk', Null);
        $this->db->where('jam_masuk', Null);
        // $this->db->where('id_status_hari', Null);
        $this->db->where('tanggal_sekarang', $tanggal_sekarang);
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


		$this->db->select('*, count(id_presensi) as jum_masuk');
        $this->db->from('tb_presensi');
        // $this->db->join('tb_presensi', 'tb_rekap.id_presensi = id_presensi');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tanggal_sekarang');
        $this->db->order_by('id_presensi','asc');
        // $this->db->where('jam_masuk != null OR ijin = ada OR id_status_hari = null');
        // $this->db->where("(jam_masuk != '' OR ijin = 'ada' OR id_status_hari != '')", NULL, FALSE);
        $this->db->group_by('tanggal_sekarang');
        $this->db->where('tanggal_sekarang', $tanggal_sekarang);
        $this->db->where('jam_masuk !=', NULL);
        // ->or_where('ijin', 'ada')
        // ->or_where('id_status_hari !=', NULL);
        // ->or_where($this->TanggalMerah->is_sunday());
        // $this->db->where('id_status_hari !=', Null);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}

	public function jum_peg_ijin($tanggal_sekarang)
	{
		// $data = $this->db->get('tb_user');
		// return $data->result();
		$this->db->select('*, count(id_presensi) as jum_masuk');
        $this->db->from('tb_presensi');
        // $this->db->join('tb_presensi', 'tb_rekap.id_presensi = id_presensi');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tb_rekap.id_pegawai');
        $this->db->order_by('id_presensi','asc');
        $this->db->where('ijin', 'ada');
        $this->db->where('tanggal_sekarang', $tanggal_sekarang);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}

	public function hari_ini($tanggal_sekarang)
	{
		$this->db->select('*');
        $this->db->from('tb_presensi');
        $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        $this->db->join('tb_jurusan', 'tb_pegawai.id_jurusan = tb_jurusan.id_jurusan');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tb_rekap.id_pegawai');
        $this->db->order_by('tanggal_sekarang','desc');
        $this->db->order_by('id_presensi','asc');
        $this->db->where('tanggal_sekarang', $tanggal_sekarang);
        // $this->db->where('id_card',$cari);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}

	public function validasi($tanggal_sekarang)
	{
		$this->db->select('*');
        $this->db->from('tb_validasi_rekap');
        $this->db->order_by('id_validasi','desc');

        $data = $this->db->get();
		return $data->result();
	}
  
  	public function add_data($data)
    {
        $data = $this->db->insert('tb_presensi2', $data);
		return $data;
    }

    public function validasi_add($data)
    {
        $data = $this->db->insert('tb_validasi_rekap', $data);
		return $data;
    }



	public function jam_kerja()
	{
		$this->db->select('*');
        $this->db->from('tb_jam_kerja');

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



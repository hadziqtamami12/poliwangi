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
        $this->db->where('jam_masuk', '0000-00-00 00:00:00');
        $this->db->where('ijin', 'tidak ada');
      	$this->db->where('id_jam_kerja !=', '0');
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



		$this->db->select('*, count(id_presensi) as jum_masuk');
        $this->db->from('tb_presensi');
        // $this->db->join('tb_presensi', 'tb_rekap.id_presensi = id_presensi');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tanggal_sekarang');
      	//$this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        $this->db->order_by('id_presensi','asc');
        // $this->db->where('jam_masuk != null OR ijin = ada OR id_status_hari = null');
        // $this->db->where("(jam_masuk != '' OR ijin = 'ada' OR id_status_hari != '')", NULL, FALSE);
      	$this->db->group_by('tanggal_sekarang');
        $this->db->where('tanggal_sekarang', $tanggal_sekarang);
        $this->db->where('jam_masuk !=', '0000-00-00 00:00:00');
      	//$this->db->where('tb_presensi.jam_masuk <=', $masuk);
      	//$this->db->where('tb_presensi.jam_pulang >=', $tanggal_sekarang.' '.'tb_jam_kerja.jam_pulang_kerja');
      	$this->db->where('id_jam_kerja !=', '0');
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
        //$this->db->join('tb_status_hari', 'tb_presensi.id_status_hari = tb_status_hari.id_status_hari');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tb_rekap.id_pegawai');
        $this->db->order_by('tanggal_sekarang','desc');     
		$this->db->order_by('jam_masuk','desc');
      	$this->db->order_by('tb_jabatan.id_jabatan','asc');
        $this->db->where('tanggal_sekarang', $tanggal_sekarang);
        // $this->db->where('id_card',$cari);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}
  
  	public function status_hari($tanggal_sekarang)
	{
		$this->db->select('*');
        $this->db->from('tb_status_hari');
        $this->db->order_by('start_date','asc');     
        $this->db->where('start_date', $tanggal_sekarang);
        $data = $this->db->get();
		return $data->result();
	}

    public function bulan()
    {   
        $this->db->select('*, count(id_presensi) as total');
        $this->db->from('tb_presensi');
        $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        $this->db->join('tb_jurusan', 'tb_pegawai.id_jurusan = tb_jurusan.id_jurusan');
        $this->db->order_by('jam_masuk','asc');
        //$this->db->where('tanggal_sekarang <=', $hari_ini);
        //$this->db->where('tanggal_sekarang >=', $minggu_lalu);
      	$this->db->where('MONTH(tb_presensi.tanggal_sekarang)', date('m'));
        $this->db->where('jam_masuk !=', '0000:00:00 00:00:00');
        $this->db->group_by('tanggal_sekarang');
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
        return $data->result();
    }

    public function filter_bulan($bulan)
    {   
        $this->db->select('*, count(id_presensi) as total');
        $this->db->from('tb_presensi');
        $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        $this->db->join('tb_jurusan', 'tb_pegawai.id_jurusan = tb_jurusan.id_jurusan');
        $this->db->order_by('jam_masuk','asc');
        $this->db->where('MONTH(tb_presensi.tanggal_sekarang)', $bulan);
        $this->db->where('jam_masuk !=', '0000:00:00 00:00:00');
        $this->db->group_by('tanggal_sekarang');
        $data = $this->db->get();
        return $data->result();
    }

    // public function jurusan($hari_ini, $minggu_lalu)
    public function jurusan($hari_ini)
    {   
        $this->db->select('*, count(id_presensi) as totaljur ');
        $this->db->from('tb_presensi');
        $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_jam_kerja', 'tb_presensi.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        $this->db->join('tb_jurusan', 'tb_pegawai.id_jurusan = tb_jurusan.id_jurusan');
        // $this->db->order_by('jam_masuk','asc');
        // $this->db->where('tanggal_sekarang <=', $hari_ini);
        // $this->db->where('tanggal_sekarang >=', $minggu_lalu);
        $this->db->where('MONTH(tb_presensi.tanggal_sekarang)', $hari_ini);
        $this->db->where('jam_masuk !=', '0000:00:00 00:00:00');
        // $this->db->where('tb_jurusan.jurusan', "Teknik Informatika")
        // ->or_where('tb_jurusan.jurusan', "Teknik Sipil")
        // ->or_where('tb_jurusan.jurusan', "Teknologi Pengolahan Hasil Ternak")
        // ->or_where('tb_jurusan.jurusan', "Teknik Mesin")
        // ->or_where('tb_jurusan.jurusan', "Teknik Manufaktur Kapal")
        // ->or_where('tb_jurusan.jurusan', "Agribisnis")
        // ->or_where('tb_jurusan.jurusan', "Manajemen Bisnis Pariwisata");
        // $this->db->group_by('tanggal_sekarang');
        $this->db->group_by('tb_jurusan.jurusan');

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
  
  	public function data_pegawai($id)
	{
		$this->db->select('*');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->join('tb_jam_kerja', 'tb_pegawai.id_jam_kerja = tb_jam_kerja.id_jam_kerja');
        $this->db->join('tb_jurusan', 'tb_pegawai.id_jurusan = tb_jurusan.id_jurusan');
        // $this->db->join('tb_shift_security', 'tb_rekap.id_pegawai = tb_shift_security.id_pegawai');
        // $this->db->group_by('tb_rekap.id_pegawai');
        //$this->db->order_by('tanggal_sekarang','desc');
        $this->db->order_by('id_pegawai','asc');
        $this->db->where('id_pegawai', $id);
        // $this->db->where('id_card',$cari);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
		return $data->result();
	}
  
  	public function add_data_pegawai($data)
    {
        $data = $this->db->insert('tb_presensi', $data);
		return $data;
    }


    function update_data_pegawai($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}


    public function validasi_add($data)
    {
        $data = $this->db->insert('tb_validasi_rekap', $data);
		return $data;
    }

  	function validasi_update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
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



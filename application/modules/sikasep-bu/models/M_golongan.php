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
        $this->db->from('tb_level_golongan');
        $this->db->order_by('id_level_golongan','asc');
        $data = $this->db->get();
		return $data->result();
	}

	public function jabatan()
	{
		$this->db->select('*');
        $this->db->from('tb_jabatan');
        $this->db->order_by('id_jabatan','asc');
        $data = $this->db->get();
		return $data->result();
	}

	public function jurusan()
	{
		$this->db->select('*');
        $this->db->from('tb_jurusan');
        $this->db->order_by('id_jurusan','asc');
        $data = $this->db->get();
		return $data->result();
	}


	public function view_data($id){
            $this->db->join('tb_level_golongan', "tb_level_golongan.id_level_golongan = tb_pegawai.id_level_golongan");
        $this->db->join('tb_jurusan', 'tb_pegawai.id_jurusan = tb_jurusan.id_jurusan');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->group_by('id_pegawai','asc');
        $this->db->order_by('id_pegawai','asc');
     return $this->db->get_where('tb_pegawai', "tb_pegawai.id_level_golongan='$id'");
   }

   public function all()
	{
		$this->db->select('*');
        $this->db->join('tb_level_golongan', 'tb_pegawai.id_level_golongan = tb_level_golongan.id_level_golongan');
        $this->db->join('tb_jurusan', 'tb_pegawai.id_jurusan = tb_jurusan.id_jurusan');
        $this->db->join('tb_jabatan', 'tb_pegawai.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->from('tb_pegawai');
        $this->db->group_by('id_pegawai','asc');
        $this->db->order_by('id_pegawai','asc');
        $data = $this->db->get();
		return $data;
	}

	 public function add_data($data)
        {
        $this->db->insert('tb_user', $data);
        return $this->db->insert_id();
        }

        function delete_data($where,$table){
                $this->db->where($where);
                $this->db->delete($table);
        }

        public function update_data($where,$data,$table){
                $this->db->where($where);
                $this->db->update($table,$data);
        }

	

 
}



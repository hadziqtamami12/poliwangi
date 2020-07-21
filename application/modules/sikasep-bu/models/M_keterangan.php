<?php
class m_keterangan extends CI_Model {


        public function __construct()
        {
                $this->load->database('db_poliwangi');
                // $this->load->library('TanggalMerah');
                date_default_timezone_set("Asia/Jakarta");
        }



        public function keterangan_list()
        {
        $this->db->select('*');
        $this->db->from('tb_presensi');
        $this->db->join('tb_pegawai', 'tb_presensi.id_pegawai = tb_pegawai.id_pegawai');
        // $this->db->where('tb_presensi.tanggal_sekarang', $tanggal_sekarang);
        $this->db->order_by('tb_presensi.tanggal_sekarang','desc');
        $this->db->order_by('tb_presensi.id_presensi','asc');
        

        $data = $this->db->get();
                return $data->result();
        }


        public function update_data($where,$data,$table){
                $this->db->where($where);
                $this->db->update($table,$data);
        }



 
}



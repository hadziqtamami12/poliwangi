<?php
class m_user extends CI_Model {


        public function __construct()
        {
                $this->load->database('db_poliwangi');
                // $this->load->library('TanggalMerah');
                date_default_timezone_set("Asia/Jakarta");
        }



        public function user_list()
        {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_level_user', 'tb_user.id_level_user = tb_level_user.id_level_user');
        
        $this->db->order_by('tb_user.id_user','asc');
        // $this->db->where('tb_presensi.tanggal_sekarang', $tanggal_sekarang);
        // $this->db->where('id_card',$cari);
        // $this->db->like('id_rekap',$cari);
        $data = $this->db->get();
                return $data->result();
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



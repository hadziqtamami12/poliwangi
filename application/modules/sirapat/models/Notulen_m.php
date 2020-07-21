<?php

class Notulen_m extends CI_Model {

    public function input_data($data,$table){
        // $this->db->insert('agenda_rapat', $data);
         $this->db->insert($table, $data);
    }
    
    public function getdata($id = null){

        return $this->db->get_where('agenda_rapat', ['id_user' => $this->session->userdata('id')]);
    }

    public function getagenda(){

    $this->db->select('*');
    $this->db->from('agenda_rapat');
    $this->db->join('validasi_agenda', 'agenda_rapat.id = validasi_agenda.id_agenda ');
    $this->db->where(['validasi_agenda.id_user' => $this->session->userdata('iduser')], 
    ['validasi_agenda.status' => 1]);
    $query = $this->db->get();
    return $query;

    }

    public function detail_data($where,$table){
		return $this->db->get_where($table, $where);
    }
    
    public function getnotulen(){

        return $this->db->get_where('notulen', ['id_agenda' => $this->uri->segment(5)])->result();
    
    }

    public function getrisalah(){

    $this->db->select('*');
    $this->db->from('risalah_rapat');
    $this->db->join('notulen', 'risalah_rapat.id_notulen = notulen.idnotulen');
    $this->db->where(['risalah_rapat.id_notulen' => $this->uri->segment(5)]);
    $query = $this->db->get();
    return $query;
    
    }

    public function getpbsw(){

    $this->db->select('*');
    $this->db->from('permasalahan');
    $this->db->join('notulen', 'permasalahan.id_notulen = notulen.idnotulen');
    $this->db->where(['permasalahan.id_notulen' => $this->uri->segment(5)]);
    $query = $this->db->get();
    return $query;
    
    }

    public function delrisalah($id){
        $this->db->where('id_risalahrapat', $id);
        $this->db->delete('risalah_rapat');
    }
}
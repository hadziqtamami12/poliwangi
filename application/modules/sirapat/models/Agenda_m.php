<?php

class Agenda_m extends CI_Model {

    public function get($id = null){

        // $this->db->from('agenda_rapat');
        return $this->db->get_where('agenda_rapat', ['id_user' => $this->session->userdata('iduser')]);
        // if($id != null){
        //     $this->db->where('id', $id);
        // }

        // $query = $this->db->get();
        // return $query;
    }

    public function getagenda(){

        $this->db->select ('agenda_rapat.*, grup_tipe.nama_grup, karyawan_unit.unit');
        $this->db->from('agenda_rapat');
       
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->join('karyawan_unit', 'agenda_rapat.id_unit = karyawan_unit.id ');
        $this->db->where(['agenda_rapat.id_user' => $this->session->userdata('iduser')] );
        $query = $this->db->get();
        return $query;

    }

    public function detailagenda(){

    $this->db->select('*');
    $this->db->from('validasi_agenda');
    $this->db->join('agenda_rapat', 'validasi_agenda.id_agenda = agenda_rapat.id ');
    $this->db->join('karyawan', 'validasi_agenda.id_pimpinan = karyawan.idkaryawan ');
    $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
    $this->db->join('karyawan_unit', 'agenda_rapat.id_unit = karyawan_unit.id ');
    $this->db->where(['agenda_rapat.id_user' => $this->session->userdata('iduser')] );
    $query = $this->db->get();
    return $query;

    }

    public function update_data($where,$data,$table){
		$this->db->where($where);
        $this->db->update($table, $data);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('agenda_rapat');
    }

    public function getAllAgenda($id){
        return $this->db->get('agenda_rapat')->result_array();
    }

    public function countAllAgenda(){
        return $this->db->get('agenda_rapat')->num_rows();
    }

    public function daftar_dosen(){
	
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->join('prodi', 'prodi.id = dosen.prodi');
    $query = $this->db->get();
	return $query;
    }

    public function daftar_validasi(){
       
        $this->db->select('*');
        $this->db->from('validasi_agenda');
        $this->db->join('karyawan', 'validasi_agenda.id_pimpinan = karyawan.idkaryawan ');
        $this->db->where(['id_agenda' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;
        }
    
    public function delval($id){
        
        $this->db->where('id_validasi', $id);
        $this->db->delete('validasi_agenda');
        
        }

        public function getpimpinan(){

            $this->db->select('*');
            $this->db->from('agenda_rapat');
            $this->db->join('grup_rapat', 'grup_rapat.id_tipe = agenda_rapat.id_tipegrup');
            $this->db->join('karyawan', 'grup_rapat.id_karyawan = karyawan.idkaryawan');
            $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
            $query = $this->db->get();
            return $query;
            }


}

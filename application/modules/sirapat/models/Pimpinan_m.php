<?php

class Pimpinan_m extends CI_Model {

    public function get($id = null){
        // $this->db->from('validasi_agenda');
        // $this->db->where('id', $id);
        return $this->db->get_where('validasi_agenda', $id);
    }

    public function getvalidasi(){

        $this->db->select ('*');
        $this->db->from('validasi_agenda');
        $this->db->join('agenda_rapat', 'validasi_agenda.id_agenda = agenda_rapat.id ');
        $this->db->join('karyawan_unit', 'karyawan_unit.id = agenda_rapat.id_unit');
        $this->db->join('karyawan', 'karyawan.idkaryawan = validasi_agenda.id_pimpinan');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->where(['validasi_agenda.id_pimpinan' => $this->session->userdata('id_dosen')]);
        $this->db->order_by('validasi_agenda.id_agenda', 'ASC');
        $query = $this->db->get();
        return $query;

    }

    public function detailagenda(){

        $this->db->select ('*');
        $this->db->from('validasi_agenda');
        $this->db->join('agenda_rapat', 'validasi_agenda.id_agenda = agenda_rapat.id ');
        $this->db->join('karyawan_unit', 'karyawan_unit.id = agenda_rapat.id_unit');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        $this->db->where(['validasi_agenda.id_validasi' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;

    }

    public function getagenda(){
    
    $this->db->select('*');
    $this->db->from('agenda_rapat');
    $this->db->join('jenis_rapat', 'agenda_rapat.idjenis_rapat = jenis_rapat.id ');
    $this->db->where(['validasi_agenda.id_pimpinan' => $this->session->userdata('id_dosen')]);
    $query = $this->db->get();
    return $query;
    }

    public function getallagenda(){
    
    $this->db->select('*');
    $this->db->from('validasi_agenda');
    $this->db->join('agenda_rapat', 'validasi_agenda.id_agenda = agenda_rapat.id ');
    $this->db->join('karyawan', 'validasi_agenda.id_pimpinan = karyawan.idkaryawan ');
    $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
    $this->db->join('karyawan_unit', 'agenda_rapat.id_unit = karyawan_unit.id ');
    $this->db->where(['validasi_agenda.status' => 1]);
    $this->db->where(['agenda_rapat.id_unit' => $this->session->userdata('unit_dosen')]);
    $query = $this->db->get();
    return $query;
    }
    
    public function update_data($data,$where,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
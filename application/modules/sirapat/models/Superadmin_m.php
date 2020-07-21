<?php

class Superadmin_m extends CI_Model {

    public function getkaryawan(){

        $this->db->select ('*');
        $this->db->from('karyawan');
        $this->db->join('karyawan_unit', 'karyawan.unit_id = karyawan_unit.id ');
        $query = $this->db->get();
        return $query;

    }

    public function joingrup(){

        $this->db->select ('*');
        $this->db->from('grup_rapat');
        $this->db->join('grup_tipe', 'grup_rapat.id_tipe = grup_tipe.id ');
        $this->db->join('karyawan', 'grup_rapat.id_karyawan = karyawan.idkaryawan ');
        $this->db->where(['grup_rapat.id_tipe' => $this->uri->segment(5)] );
        $query = $this->db->get();
        return $query;

    }

    public function getgruprapat(){

        $this->db->select ('*');
        $this->db->from('grup_rapat');
        $this->db->join('grup_tipe', 'grup_rapat.id_tipe = grup_tipe.id ');
        $this->db->where(['grup_rapat.id_tipe' => $this->uri->segment(5)] );
        $query = $this->db->get();
        return $query;

    }

}
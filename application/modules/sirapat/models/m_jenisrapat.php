<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_jenisrapat extends CI_Model {

    public function getjenisrapat(){

        $query ="SELECT `agenda_rapat`.*, `grup_tipe`.`nama_grup`
                FROM `agenda_rapat` JOIN `grup_tipe`
                ON `agenda_rapat`.`id_tipegrup` = `grup_tipe`.`id`
                ";

        return $this->db->query($query)->result_array();
    }

    public function tampil_data(){
        return $this->db->get('jenis_rapat');
    }

    public function getprodi(){

        $query ="SELECT `agenda_rapat`.*, `prodi`.`prodi`
                FROM `agenda_rapat` JOIN `prodi`
                ON `agenda_rapat`.`id_prodi` = `prodi`.`id`
                ";

        return $this->db->query($query)->result_array();    
    }
}
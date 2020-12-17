<?php
class m_mekanik extends CI_Model{    
    function carimekanik($kode){
        $this->db->where("id_mekanik",$kode);
        return $this->db->get("mekanik");
    }

    function semua(){
        return $this->db->get("mekanik");
    }

    function jumlah_data(){
        return $this->db->get('mekanik')->num_rows();
    }

    function data($number,$offset){
        return $query = $this->db->get('mekanik',$number,$offset)->result();       
    }

    function hapus($kode){
        $this->db->where("id_mekanik",$kode);
        $this->db->delete("mekanik");
    }

    function update($id,$info){
        $this->db->where("id_mekanik",$id);
        $this->db->update("mekanik",$info);
    }

    function cekId($kode){
        $this->db->where("id_mekanik",$kode);
        return $this->db->get("mekanik");
    }

    function simpanmekanik($info){
        $this->db->insert("mekanik",$info);
    }
    
}
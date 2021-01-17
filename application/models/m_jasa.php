<?php
class M_jasa extends CI_Model{
    private $table="transaksi";
    
    
    function cariJasa($kode){
        $this->db->where("id_jasa",$kode);
        return $this->db->get("jasa");
    }
    
    function simpanTmp($info){
        $this->db->insert("tmp_j",$info);
    }
    
    function tampilTmp(){
        return $this->db->get("tmp_j");
    }
    
    function cekTmp($kode){
        $this->db->where("id_jasa",$kode);
        return $this->db->get("tmp_j");
    }
    
    function jumlahJasa(){
        return $this->db->count_all("tmp_j");
    }

    function jumlahbiaya(){
        $this->db->select_sum('biaya');
        $query = $this->db->get('tmp_j');

        if ($query->num_rows() > 0) {
            return $query->row()->biaya;
        }
    }
    
    function hapusTmp($kode){
        $this->db->where("id_jasa",$kode);
        $this->db->delete("tmp_j");
    }

    function pencarianjasa($cari){
        $this->db->like("nama_jasa",$cari);
        return $this->db->get("jasa");
    }

    function getAllMekanik(){
        return $this->db->get("mekanik")->result();
    }

    function semua(){
        return $this->db->get("jasa");
    }

    function jumlah_data(){
        return $this->db->get('jasa')->num_rows();
    }

    function data($number,$offset){
        return $query = $this->db->get('jasa',$number,$offset)->result();       
    }

    function hapus($kode){
        $this->db->where("id_jasa",$kode);
        $this->db->delete("jasa");
    }

    function update($id,$info){
        $this->db->where("id_jasa",$id);
        $this->db->update("jasa",$info);
    }

    function cekId($kode){
        $this->db->where("id_jasa",$kode);
        return $this->db->get("jasa");
    }

    function simpanjasa($info){
        $this->db->insert("jasa",$info);
    }

    public function GetPie(){
         $query=$this->db->query("select jasa.nama_jasa, COUNT(detail_transaksi.id_jasa) as 'penggunaan' from transaksi, detail_transaksi, jasa where transaksi.id_transaksi = detail_transaksi.id_transaksi and jasa.id_jasa = detail_transaksi.id_jasa group by detail_transaksi.id_jasa");
        return $query;
    }
    
}
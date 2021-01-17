<?php
class M_transaksi extends CI_Model{   
    
    function getLast(){
        $last = $this->db->order_by('id_transaksi',"desc")
        ->limit(1)
        ->get('transaksi')
        ->row();
        return $last;
    }

    function getData($sql){
        $query = $this->db->query($sql);

        return $query->result();
    }

    function getJumlahData($sql){
        $query = $this->db->query($sql);

        return $query->num_rows();
    }

    function getQuery($old, $limit, $offset){
        return $old." limit ".$limit." offset ".$offset.";";
    }


    function jumlah_data(){
        return $this->db->get('transaksi')->num_rows();
    }

    function simpan($info){
        $this->db->insert("detail_transaksi",$info);
    }

    function simpanTrans($info){
        $this->db->insert("transaksi",$info);
    }

    public function GetPie2(){
        $query=$this->db->query("select mekanik.nama_mekanik, COUNT(detail_transaksi.id_mekanik) as 'jumlah_dipakai' from transaksi, detail_transaksi, mekanik where transaksi.id_transaksi = detail_transaksi.id_transaksi and mekanik.id_mekanik = detail_transaksi.id_mekanik group by detail_transaksi.id_mekanik;");
        return $query;
    }

    public function GetPie3(){
        $query=$this->db->query("select merek, COUNT(id_transaksi) as 'jumlah_merek' from transaksi group by merek");
        return $query;
    }

    public function GetPie4(){
        $query=$this->db->query("select COUNT(id_transaksi), DATE(date) as 'DateOnly' FROM transaksi GROUP BY date;");
        return $query;
    }
}
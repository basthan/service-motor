<?php
class M_barang extends CI_Model{    
    function cariBarang($kode){
        $this->db->where("id_barang",$kode);
        return $this->db->get("barang");
    }

    function semua(){
        return $this->db->get("barang");
    }

    function jumlah_data(){
        return $this->db->get('barang')->num_rows();
    }

    function data($number,$offset){
        return $query = $this->db->get('barang',$number,$offset)->result();       
    }

    function hapus($kode){
        $this->db->where("id_barang",$kode);
        $this->db->delete("barang");
    }

    function update($id,$info){
        $this->db->where("id_barang",$id);
        $this->db->update("barang",$info);
    }

    function cekId($kode){
        $this->db->where("id_barang",$kode);
        return $this->db->get("barang");
    }

    function simpanBarang($info){
        $this->db->insert("barang",$info);
    }

    function updateStok($jumlah, $kode){
        $this->db->set("stok", "stok-".$jumlah, FALSE);
        $this->db->where('id_barang', $kode);
        $this->db->update('barang');
    }
    
    function simpanTmp($info){
        $this->db->insert("tmp_b",$info);
    }
    
    function tampilTmp(){
        return $this->db->get("tmp_b");
    }
    
    function cekTmp($kode){
        $this->db->where("id_barang",$kode);
        return $this->db->get("tmp_b");
    }
    
    function jumlahTmp(){
        return $this->db->count_all("tmp_b");
    }

    function jumlahharga(){
        $this->db->select_sum('totalHarga');
        $query = $this->db->get('tmp_b');

        if ($query->num_rows() > 0) {
            return $query->row()->totalHarga;
        }
    }

    function jumlahBarangTmp(){
        $this->db->select_sum('jumlah_barang');
        $query = $this->db->get('tmp_b');

        if ($query->num_rows() > 0) {
            return $query->row()->jumlah_barang;
        }
    }
    
    function hapusTmp($kode){
        $this->db->where("id_barang",$kode);
        $this->db->delete("tmp_b");
    }
    
    function getLast(){
        $last = $this->db->order_by('id_transaksi',"desc")
        ->limit(1)
        ->get('transaksi')
        ->row();
        return $last;
    }

    function simpan($info){
        $this->db->insert("detail_transaksi",$info);
    }

    function simpanTrans($info){
        $this->db->insert("transaksi",$info);
    }
    
    function pencarianbarang($cari){
        $this->db->like("nama_barang",$cari);
        $this->db->where("stok >=1");
        return $this->db->get("barang");
    }

    public function GetPie(){
        $query=$this->db->query("select * from barang;");
        return $query;
    }

    public function GetPie2(){
        $query=$this->db->query("select barang.nama_barang, SUM(detail_transaksi.jumlah) as 'terjual' from transaksi, detail_transaksi, barang where transaksi.id_transaksi = detail_transaksi.id_transaksi and barang.id_barang = detail_transaksi.id_barang group by detail_transaksi.id_barang;");
        return $query;
    }



     function get_data_stok(){
        $query = $this->db->query("select nama_barang, SUM(harga * stok) AS harga  FROM barang GROUP BY nama_barang");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    
}
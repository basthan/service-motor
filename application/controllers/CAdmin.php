<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAdmin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','template'));
        $this->load->model('m_transaksi');
    }

	function index(){
        $data['title']="Home";
        $this->template->displayAdmin('admin/dashboard',$data);
    }

    function report(){
        $data['title']="Home";
        $sql = "select barang.nama_barang, SUM(detail_transaksi.jumlah) as 'jumlah' from transaksi, detail_transaksi, barang where transaksi.id_transaksi = detail_transaksi.id_transaksi and barang.id_barang = detail_transaksi.id_barang group by detail_transaksi.id_barang order by jumlah desc limit 5 offset 0;";
        $data['barangLaris'] = $this->m_transaksi->getData($sql);

        $sql = "select mekanik.nama_mekanik, COUNT(detail_transaksi.id_mekanik) as 'jumlah_dipakai' from transaksi, detail_transaksi, mekanik where transaksi.id_transaksi = detail_transaksi.id_transaksi and mekanik.id_mekanik = detail_transaksi.id_mekanik group by detail_transaksi.id_mekanik order by jumlah_dipakai desc limit 5 offset 0;";
        $data['mekanikLaris'] = $this->m_transaksi->getData($sql);

        $sql = "select DATE(transaksi.date) as 'tanggal', SUM(transaksi.jumlah_barang) as 'jumlah_barang', SUM(transaksi.jumlah_jasa) as 'jumlah_jasa', SUM(transaksi.total_biaya) as 'total_biaya' from transaksi group by tanggal order by tanggal desc limit 5 offset 0;";
        $data['bTanggal'] = $this->m_transaksi->getData($sql);

        $sql = "select DAYNAME(transaksi.date) as 'hari', SUM(transaksi.jumlah_barang) as 'jumlah_barang', SUM(transaksi.jumlah_jasa) as 'jumlah_jasa', SUM(transaksi.total_biaya) as 'total_biaya' from transaksi group by hari order by hari desc limit 5 offset 0;";
        $data['bHari'] = $this->m_transaksi->getData($sql);

        $sql = "select MONTHNAME(transaksi.date) as 'bulan', SUM(transaksi.jumlah_barang) as 'jumlah_barang', SUM(transaksi.jumlah_jasa) as 'jumlah_jasa', SUM(transaksi.total_biaya) as 'total_biaya' from transaksi group by bulan order by bulan desc limit 5 offset 0;";
        $data['bBulan'] = $this->m_transaksi->getData($sql);

        $sql = "select YEAR(transaksi.date) as 'tahunan', SUM(transaksi.jumlah_barang) as 'jumlah_barang', SUM(transaksi.jumlah_jasa) as 'jumlah_jasa', SUM(transaksi.total_biaya) as 'total_biaya' from transaksi group by tahunan order by tahunan desc limit 5 offset 0;";
        $data['bTahun'] = $this->m_transaksi->getData($sql);

        $this->template->displayAdmin('admin/report',$data);
    }
}

<?php
class transaksi extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','template', 'pagination'));
        $this->load->model('m_transaksi', 'm_transaksi');
        $this->load->model('m_barang', 'm_barang');
        $this->load->model('m_jasa', 'm_jasa');
        date_default_timezone_set('Asia/Jakarta');
    }
    
    function index(){
        $this->template->display('transaksi/index',$data);
    }
    
    function tampil($type){
        

        if($type == 1){
            $data['tmp']=$this->m_barang->tampilTmp()->result();
            $data['jumlahTmp']=$this->m_barang->jumlahTmp();
            $this->load->view('transaksi/tampil',$data);
        }else if($type == 2){
            $data['tmp']=$this->m_jasa->tampilTmp()->result();
            $data['jumlahJasa']=$this->m_jasa->jumlahJasa();
            $this->load->view('transaksi/tampiljasa',$data);
        }else if($type == 3){
            $data['total']=$this->m_barang->jumlahharga() + $this->m_jasa->jumlahbiaya();
            $this->load->view('transaksi/totalBayar',$data);
        }
    }
    
    function sukses(){
        $jB = $this->m_barang->jumlahBarangTmp();
        $jumlahJasa = $this->m_jasa->jumlahJasa();
        $totalBiaya = $this->m_barang->jumlahharga() + $this->m_jasa->jumlahbiaya();
        $trans=array(
                'id_transaksi'=> '',
                'stnk'=>$this->input->post('stnk'),
                'no_plat'=>$this->input->post('no_plat'),
                'nama'=>$this->input->post('nama'),
                'merek'=>$this->input->post('merek'),
                'tahun'=>$this->input->post('tahun'),
                'date'=>date("Y-m-d H:i:sa"),
                'jumlah_barang'=>$jB,
                'jumlah_jasa'=>$jumlahJasa,
                'total_biaya'=>$totalBiaya
            );
        $this->m_transaksi->simpanTrans($trans);

        $id = $this->m_transaksi->getLast();
        
        $tmp=$this->m_barang->tampilTmp()->result();
        foreach($tmp as $row){
            $info=array(
                'id_detail_transaksi'=>'',
                'id_transaksi'=> $id->id_transaksi,
                'id_barang'=>$row->id_barang,
                'jumlah'=>$row->jumlah_barang
            );
            //update stok
            $this->m_barang->updateStok($row->jumlah_barang, $row->id_barang);



            $this->m_transaksi->simpan($info);
            
            //hapus data di temp
            $this->m_barang->hapusTmp($row->id_barang);
        }

        $tmp=$this->m_jasa->tampilTmp()->result();
        foreach($tmp as $row){
            $info=array(
                'id_detail_transaksi'=>'',
                'id_transaksi'=> $id->id_transaksi,
                'id_barang'=>'0',
                'id_jasa'=>$row->id_jasa,
                'id_mekanik'=>$this->input->post('mekanik')
            );
            
            $this->m_transaksi->simpan($info);
            
            //hapus data di temp
            $this->m_jasa->hapusTmp($row->id_jasa);
        }
    }
    
    function tambah(){
        $id_barang=$this->input->post('id_barang');
        $cek=$this->m_barang->cekTmp($id_barang);
        if($cek->num_rows()<1){
            $total = $this->input->post('harga') * $this->input->post('jumlah_barang');
            $info=array(
                'id_barang'=>$this->input->post('id_barang'),
                'nama_barang'=>$this->input->post('nama_barang'),
                'harga'=>$this->input->post('harga'),
                'jumlah_barang'=>$this->input->post('jumlah_barang'),
                'totalHarga'=>$total
            );
            $this->m_barang->simpanTmp($info);
        }
    }

    function tambahjasa(){
        $id_jasa=$this->input->post('id_jasa');
        $cek=$this->m_jasa->cekTmp($id_jasa);
        if($cek->num_rows()<1){
            $info=array(
                'id_jasa'=>$this->input->post('id_jasa'),
                'nama_jasa'=>$this->input->post('nama_jasa'),
                'biaya'=>$this->input->post('biaya')
            );
            $this->m_jasa->simpanTmp($info);
        }
    }
    
    function hapus(){
        $id_barang=$this->input->post('id_barang');
        $this->m_barang->hapusTmp($id_barang);
    }

    function hapusjasa(){
        $id_jasa=$this->input->post('id_jasa');
        $this->m_jasa->hapusTmp($id_jasa);
    }
    
    function pencarianbarang(){
        $cari=$this->input->post('caribarang');
        $data['barang']=$this->m_barang->pencarianbarang($cari)->result();
        $this->load->view('transaksi/pencarianbarang',$data);
    }

    function pencarianjasa(){
        $cari=$this->input->post('carijasa');
        $data['jasa']=$this->m_jasa->pencarianjasa($cari)->result();
        $this->load->view('transaksi/pencarianjasa',$data);
    }

    public function Riwayat(){           

            $data['title']="Riwayat Transaksi";
            
            $all = "select transaksi.id_transaksi, transaksi.nama, transaksi.stnk, transaksi.date, transaksi.jumlah_barang, transaksi.jumlah_jasa, transaksi.total_biaya from transaksi, detail_transaksi where transaksi.id_transaksi = detail_transaksi.id_transaksi group by detail_transaksi.id_transaksi order by date desc;";

            $data['historyAll'] = $this->m_transaksi->getData($all);
            $data['message']='';
            $this->template->display('laporan/index',$data);  
                 
    }

    function detail($id){
        $data['title']="Detail Data Transaksi";
        $sql = "select * from transaksi where id_transaksi = ".$id.";";
        $data['biodata'] = $this->m_transaksi->getData($sql);

        $sql = "select barang.id_barang, barang.nama_barang, detail_transaksi.jumlah, barang.harga, (detail_transaksi.jumlah * barang.harga) as 'jbarang' from barang, detail_transaksi, transaksi where detail_transaksi.id_transaksi = ".$id." and barang.id_barang = detail_transaksi.id_barang and transaksi.id_transaksi = detail_transaksi.id_transaksi;";
        $data['dBarang'] = $this->m_transaksi->getData($sql);

        $sql = "select mekanik.nama_mekanik, jasa.id_jasa, jasa.nama_jasa, jasa.biaya from jasa, detail_transaksi, transaksi, mekanik where detail_transaksi.id_transaksi = ".$id." and jasa.id_jasa = detail_transaksi.id_jasa and transaksi.id_transaksi = detail_transaksi.id_transaksi and mekanik.id_mekanik = detail_transaksi.id_mekanik;";
        $data['dJasa'] = $this->m_transaksi->getData($sql);

        $data['message']="";
        $this->template->display('laporan/detail',$data);
    }

    public function grafik(){
         $data['pie_data']=$this->m_barang->GetPie();
         $data['pie_data4']=$this->m_jasa->GetPie();
          $data['pie_data2']=$this->m_barang->GetPie2();
           $data['pie_data3']=$this->m_transaksi->GetPie2();
            $data['pie_data5']=$this->m_transaksi->GetPie3();
            $data['pie_data6']=$this->m_transaksi->GetPie4();
        $this->template->displayAdmin('admin/grafik/index', $data );
    }
}
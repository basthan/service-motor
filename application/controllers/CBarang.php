<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CBarang extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->library(array('form_validation','template','pagination'));
    }
    
    function barang(){
        $data['title']="Data barang";
        $jumlah_data = $this->m_barang->jumlah_data();
        $config['base_url'] = base_url().'index.php/CBarang/barang/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $data['barang'] = $this->m_barang->data($config['per_page'],$from);
        $data['from'] = $from;

        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
        $this->template->displayAdmin('admin/stok/barang',$data);
    }
    
    function tambahbarang(){
        $data['title']="Tambah barang";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $info=array(
                    'nama_barang'=>$this->input->post('nama_barang'),
                    'harga'=>$this->input->post('harga'),
                    'stok'=>$this->input->post('stok')
                );
                $this->m_barang->simpanBarang($info);
                redirect('CBarang/barang/add_success');
        }else{
            $data['message']="";
            $this->template->displayAdmin('admin/stok/tambahbarang',$data);
        }
    }
    
    function edit($id){
        $data['title']="Update data barang";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id=$this->input->post('id');
            $info=array(
                'nama_barang'=>$this->input->post('nama_barang'),
                'harga'=>$this->input->post('harga'),
                'stok'=>$this->input->post('stok')
            );
            $this->m_barang->update($id,$info);
            $data['barang']=$this->m_barang->cekId($id)->row_array();
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $this->template->displayAdmin('admin/stok/editbarang',$data);
        }else{
            $data['message']="";
            $data['barang']=$this->m_barang->cekId($id)->row_array();
            $this->template->displayAdmin('admin/stok/editbarang',$data);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $this->m_barang->hapus($kode);
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('nama_barang','nama_barang','required|trim');
        $this->form_validation->set_rules('harga','harga','required|trim');
        $this->form_validation->set_rules('stok','stok','required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
    
    function logout(){
        $this->session->unset_userdata('username');
        redirect('web');
    }
}
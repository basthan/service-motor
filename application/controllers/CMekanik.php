<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMekanik extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_mekanik');
        $this->load->library(array('form_validation','template','pagination'));
    }
    
    function mekanik(){
        $data['title']="Data mekanik";
        $jumlah_data = $this->m_mekanik->jumlah_data();
        $config['base_url'] = base_url().'index.php/CMekanik/mekanik/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $data['mekanik'] = $this->m_mekanik->data($config['per_page'],$from);

        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
        $this->template->displayAdmin('admin/mekanik/mekanik',$data);
    }
    
    function tambahmekanik(){
        $data['title']="Tambah mekanik";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $info=array(
                    'nama_mekanik'=>$this->input->post('nama_mekanik'),
                    'no_telepon_mekanik'=>$this->input->post('no_telepon_mekanik'),
                    'alamat_mekanik'=>$this->input->post('alamat_mekanik')
                );
                $this->m_mekanik->simpanmekanik($info);
                redirect('CMekanik/mekanik/add_success');
        }else{
            $data['message']="";
            $this->template->displayAdmin('admin/mekanik/tambahmekanik',$data);
        }
    }
    
    function edit($id){
        $data['title']="Update data mekanik";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id=$this->input->post('id');
            $info=array(
                'nama_mekanik'=>$this->input->post('nama_mekanik'),
                'no_telepon_mekanik'=>$this->input->post('no_telepon_mekanik'),
                'alamat_mekanik'=>$this->input->post('alamat_mekanik')
            );
            $this->m_mekanik->update($id,$info);
            $data['mekanik']=$this->m_mekanik->cekId($id)->row_array();
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $this->template->displayAdmin('admin/mekanik/editmekanik',$data);
        }else{
            $data['message']="";
            $data['mekanik']=$this->m_mekanik->cekId($id)->row_array();
            $this->template->displayAdmin('admin/mekanik/editmekanik',$data);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $this->m_mekanik->hapus($kode);
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('nama_mekanik','nama_mekanik','required|trim');
        $this->form_validation->set_rules('no_telepon_mekanik','no_telepon_mekanik','required|trim');
        $this->form_validation->set_rules('alamat_mekanik','alamat_mekanik','required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
    
    function logout(){
        $this->session->unset_userdata('username');
        redirect('web');
    }
}
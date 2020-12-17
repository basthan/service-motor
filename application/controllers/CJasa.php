<?php
class Cjasa extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_jasa');
        $this->load->library(array('form_validation','template','pagination'));
    }
    
    function jasa(){
        $data['title']="Data jasa";
        $jumlah_data = $this->m_jasa->jumlah_data();
        $config['base_url'] = base_url().'index.php/Cjasa/jasa/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $data['jasa'] = $this->m_jasa->data($config['per_page'],$from);

        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
        $this->template->displayAdmin('admin/jasa/jasa',$data);
    }
    
    function tambahjasa(){
        $data['title']="Tambah jasa";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $info=array(
                    'nama_jasa'=>$this->input->post('nama_jasa'),
                    'biaya'=>(int)$this->input->post('biaya')
                );
                $this->m_jasa->simpanjasa($info);
                redirect('Cjasa/jasa/add_success');
        }else{
            $data['message']="";
            $this->template->displayAdmin('admin/jasa/tambahjasa',$data);
        }
    }
    
    function edit($id){
        $data['title']="Update data jasa";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id=$this->input->post('id');
            $info=array(
                'nama_jasa'=>$this->input->post('nama_jasa'),
                'biaya'=>$this->input->post('biaya'),
            );
            $this->m_jasa->update($id,$info);
            $data['jasa']=$this->m_jasa->cekId($id)->row_array();
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $this->template->displayAdmin('admin/jasa/editjasa',$data);
        }else{
            $data['message']="";
            $data['jasa']=$this->m_jasa->cekId($id)->row_array();
            $this->template->displayAdmin('admin/jasa/editjasa',$data);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $this->m_jasa->hapus($kode);
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('nama_jasa','nama_jasa','required|trim');
        $this->form_validation->set_rules('biaya','biaya','required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
    
    function logout(){
        $this->session->unset_userdata('username');
        redirect('web');
    }
}
<?php
class Dashboard extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','template'));
        $this->load->model('m_jasa');
    }
    
    function index(){
        $data['title']="Home";
        $data['mekanik'] = $this->m_jasa->getAllMekanik();
        $this->template->display('transaksi/index',$data);
    }
}
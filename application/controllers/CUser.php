<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CUser extends CI_Controller {

	public function index()
	{
		parent::__construct();
		$this->load->view('login');
		
	}

	public function cek()
	{
		$this->load->model('m_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$test = $this->m_user->cekUser($username, $password);

		if($test->num_rows()>0){
			if($test->row()->role == 'kasir'){
				redirect('dashboard');
			}else if($test->row()->role == 'manager'){
				redirect('CAdmin');
			}
		}
	}
}

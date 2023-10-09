<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_model');
	$this->load->helper('my_helper');
    // if($this->session->userdata('loged_in')!=true){
    //     redirect(base_url().'login');
    // }
}

	public function index()
	{
		$data['siswa'] = $this->m_model->get_data('siswa')->num_rows();
		$data['kelas'] = $this->m_model->get_data('kelas')->num_rows();
		$data['guru'] = $this->m_model->get_data('guru')->num_rows();
         $this->load->view('admin/dashboard', $data);
	}
	public function admin()
	{
		$data['admin'] = $this->m_model->get_data('admin')->result();
		$this->load->view('admin/admin', $data);
	}	
}
?>
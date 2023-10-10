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
	// if ( $this->session->userdata( 'loged_in' ) != true || $this->session->userdata( 'roll' ) != 'admin' ) {
	// 	redirect( base_url().'auth' );
	// }
}

	public function index()
	{
		$data['siswa'] = $this->m_model->get_data('siswa')->num_rows();
		$data['kelas'] = $this->m_model->get_data('kelas')->num_rows();
		$data['guru'] = $this->m_model->get_data('guru')->num_rows();
         $this->load->view('admin/index', $data);
	}
	public function admin()
	{
		$this->load->view('admin/admin');
	}
}
?>
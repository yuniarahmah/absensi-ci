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
	if ( $this->session->userdata( 'loged_in' ) != true || $this->session->userdata( 'role' ) != 'admin' ) {
		redirect( base_url().'auth' );
	}
}

	public function dashboard()
	{
         $this->load->view('admin/dashboard');
	}
	public function admin()
	{
		$this->load->view('admin');
	}


}
?>
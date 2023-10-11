<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Karyawan extends CI_Controller {

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
        public function karyawan()
        {
		$this->load->view('karyawan/history');
        }
        public function menu_absen()
        {
		$this->load->view('karyawan/manu_absen');
        }
        public function menu_izin()
        {
		$this->load->view('karyawan/menu_izin');
        }
        public function history()
        {
		$this->load->view('karyawan/history');
        }
        
    }
?>
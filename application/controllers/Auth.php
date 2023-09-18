<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	
	}
	public function login()
	 {
	 	$this->load->view('auth/login');
	 }
	
	 public function fungsi_login()
	 {
		$nama_pengguna = $this->input->post('nama_pengguna',true);
	 	$email = $this->input->post('email', true);
	 	$password = $this->input->post('password', true);
	 	$data =  ['email' => $email ];
	 	$query = $this->m_model->getwhere('admin', $data);
	 	$result = $query->row_array();
		
	 	if(!empty($result) && md5($password) === $result['password']) {
	 		$data = [
	 			'loged_in'         => TRUE,
	 			'id'               => $result['id'],
	 			'nama_pengguna'    => $result['nama_pengguna'],
	 			'username'         => $result['username'],
	 			'email'            => $result['email'],
	 			'role'             => $result['role'],
	 		];
	 		$this->session->set_userdata($data);
	 		if($this->session->userdata('role') == 'admin'){
	 			redirect(base_url(). "admin");
	 		}
			else {
	 				redirect (base_url(). "auth/register");
	 		}
	 	}
	 			else{
	 				redirect(base_url(). "auth/register");
	 			}
	 		}
			 public function index()
			 {
				  $this->load->view('auth/tampilan');
			 }
	}

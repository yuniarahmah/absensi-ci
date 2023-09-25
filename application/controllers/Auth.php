<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model( 'm_model' );

    }
    public function index()
    {
        $this->load->view( 'auth/tampilan' );
    }
    public function login()
    {
        $this->load->view( 'auth/login' );
    }
    
	public function fungsi_login()
	{
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$data =  ['email' => $email ];
		$query = $this->m_model->getwhere('admin', $data);
		$result = $query->row_array();	
		// didalam if terdapat validasi jika empty kosong dan passwor
		// dnya mengguna md5 maka result berisi password yang sudah berubah menjadi md5 atau 
		// password tidak dapat dilihat seperti ketika mengetikan password yang pertama
		if(!empty($result) && md5($password) === $result['password']) {
			$data = [
				'loged_in' => TRUE,
				'email'    => $result['email'],
				'nama_pengguna' => $result['nama_pengguna'],
				'role'     => $result['role'],
				'id'       => $result['id'],
			];
			$this->session->set_userdata($data);
			if($this->session->userdata('role') == 'admin'){
				redirect(base_url(). "admin");
			}
			else {
					redirect (base_url(). "auth");
			}
		}
				else{
					redirect(base_url(). "auth");
				}
			}

			function logout(){
				$this->session->sess_destroy();
				redirect(base_url('auth'));
			}
}

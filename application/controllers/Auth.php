<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Auth extends CI_Controller {

    function __construct()
 {
        parent::__construct();
        $this->load->model( 'm_model' );
        $this->load->library( 'form_validation' );
    }

    public function index()
 {
        $this->load->view( 'home' );
    }

    public function login()
 {
        $this->load->view( 'auth/login' );
    }

    public function fungsi_login()
 {

        $email = $this->input->post( 'email', true );
        $password = $this->input->post( 'password', true );
        $data = [ 'email' => $email, ];
        $query = $this->m_model->getwhere( 'user', $data );
        $result = $query->row_array();

        if ( !empty( $result ) && md5( $password ) === $result[ 'password' ] ) {
            $data = [
                'loged_in' => TRUE,
                'email'    => $result[ 'email' ],
                'username' => $result[ 'username' ],
                'role'     => $result[ 'role' ],
                'id'       => $result[ 'id' ],
            ];
            $this->session->set_userdata( $data );
            if ( $this->session->userdata( 'role' ) == 'admin' ) {
                redirect( base_url() . 'admin/dashboard' );
            }if ( $this->session->userdata( 'role' ) == 'karyawan' ) {
                redirect( base_url() . 'karyawan/history' );
            } else {
                redirect( base_url() . 'auth' );
            }
        } else {
            redirect( base_url() . 'auth' );
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect( base_url( 'auth' ) );
    }

    public function register()
 {
        $this->load->view( 'auth/register' );
    }

    public function aksi_register()
 {
        $this->form_validation->set_rules( 'username', 'username', 'trim|required|min_length[1]|max_length[100]|is_unique[user.username]' );
        $this->form_validation->set_rules( 'password', 'password', 'trim|required|min_length[1]|max_length[7]' );
        $this->form_validation->set_rules( 'email', 'email', 'trim|required|min_length[1]|max_length[20]' );
        $password = $this->input->post( 'password' );
        $this->form_validation->set_rules( 'password', 'password', 'trim|required|min_length[1]|max_length[7]' );

        if ( $this->form_validation->run() == true )
            {
            $username = $this->input->post( 'username' );
            $password = $this->input->post( 'password' );
            $email = $this->input->post( 'email' );
            $this->auth->register( $username, $password, $nama );
            $this->session->set_flashdata( 'success_register', 'Proses Pendaftaran User Berhasil' );
            redirect( 'auth/login' );
        } else {
            $this->session->set_flashdata( 'error', validation_errors() );
            redirect( 'auth/login' );
        }
    }

    public function register_k()
    {
           $this->load->view( 'auth/register_k' );
       }
   
       public function aksi_register_k()
    {
           $this->form_validation->set_rules( 'username', 'username', 'trim|required|min_length[1]|max_length[100]|is_unique[user.username]' );
           $this->form_validation->set_rules( 'password', 'password', 'trim|required|min_length[1]|max_length[7]' );
           $this->form_validation->set_rules( 'email', 'email', 'trim|required|min_length[1]|max_length[20]' );
           $password = $this->input->post( 'password' );
        //    $this->form_validation->set_rules( 'password', 'password', 'trim|required|min_length[1]|max_length[7]' );
   
           if ( $this->form_validation->run() === true )
               {
               $username = $this->input->post( 'username' );
               $password = $this->input->post( 'password' );
               $email = $this->input->post( 'email' );
               $this->auth->register( $username, $password, $email );
               $this->session->set_flashdata( 'success_register', 'Proses Pendaftaran User Berhasil' );
               redirect( 'auth/login' );
           } else {
               $this->session->set_flashdata( 'error', validation_errors() );
               redirect( 'auth/register_k' );
           }
       }  

 }
?>

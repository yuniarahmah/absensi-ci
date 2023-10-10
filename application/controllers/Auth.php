<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Auth extends CI_Controller {

    function __construct()
 {
        parent::__construct();
        $this->load->model( 'm_model' );
        $this->load->library('form_validation');
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
        $data =  [ 'email' => $email ];
        $query = $this->m_model->getwhere( 'user', $data );
        $result = $query->row_array();

        // didalam if terdapat validasi jika empty kosong dan passwor
        // dnya mengguna md5 maka result berisi password yang sudah berubah menjadi md5 atau
        // password tidak dapat dilihat seperti ketika mengetikan password yang pertama
        if ( !empty( $result ) && md5( $password ) === $result[ 'password' ] ) {
            $data = [
                'loged_in'       => TRUE,
                'username'       => $username,
                'email'          => $email,
                'nama_depan'     => $nama_depan,
                'nama_belakang'  => $nama_belakang,
                'password'       => $kode_pass,
                'role'           => $role,
            ];

            $this->m_model->register( $data );
            redirect( 'admin/index' );
        } else {
            redirect( base_url(). 'auth' );
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
        $id = $this->input->post( 'id' );
        $username = $this->input->post( 'username' );
        $email = $this->input->post( 'email' );
        $nama_depan = $this->input->post( 'nama_depan' );
        $nama_belakang = $this->input->post( 'nama_belakang' );
        $password = $this->input->post( 'password' );
        $role = $this->input->post( 'role' );

        // $uppercase = preg_match( '@[A-Z]@', $password );
        // $lowercase = preg_match( '@[a-z]@', $password );
        $number    = preg_match( '@[0-9]@', $password );

        if ( !$number || strlen( $password ) < 8 ) {
            $this->session->set_flashdata( 'eror', 'gagal register' );
            redirect( 'register' );
        } else {
            $kode_pass = md5( $password );
            $data = array (
                'id'             => $id,
                'username'       => $username,
                'email'          => $email,
                'nama_depan'     => $nama_depan,
                'nama_belakang'  => $nama_belakang,
                'password'       => $kode_pass,
                'role'           => $role,
            );
            $this->m_model->register( $data );
            redirect( 'auth/login' );
        }
        ;
    }

    public function register_k()
 {
        $this->load->view( 'auth/register_k' );
    }
    public function aksi_register_k()
 {
        $id = $this->input->post( 'id' );
        $username = $this->input->post( 'username' );
        $email = $this->input->post( 'email' );
        $nama_depan = $this->input->post( 'nama_depan' );
        $nama_belakang = $this->input->post( 'nama_belakang' );
        $password = $this->input->post( 'password' );
        $role = $this->input->post( 'role' );

        // $uppercase = preg_match( '@[A-Z]@', $password );
        // $lowercase = preg_match( '@[a-z]@', $password );
        $number    = preg_match( '@[0-9]@', $password );

        if ( !$number || strlen( $password ) < 8 ) {
            $this->session->set_flashdata( 'eror', 'gagal register' );
            redirect( 'register_k' );
        } else {
            $kode_pass = md5( $password );
            $data = array (
                'id'             => $id,
                'username'       => $username,
                'email'          => $email,
                'nama_depan'     => $nama_depan,
                'nama_belakang'  => $nama_belakang,
                'password'       => $kode_pass,
                'role'           => $role,
            );
            $this->m_model->register( $data );
            redirect( 'auth/login' );
        }
        ;
    }

}
?>

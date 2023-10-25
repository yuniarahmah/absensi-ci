<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Auth extends CI_Controller {

    function __construct()
 {
        parent::__construct();
        $this->load->model( 'm_model' );
        $this->load->library( 'form_validation' );
    }

//     public function index()
//  {
//         $this->load->view( 'home' );
//     }

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

        if ( !empty( $result ) && md5( $password ) === $result[ 'password' ] ) {//jika password sudah menjadi md5 maka data akan dijalankan
            $data = [
                'loged_in' => TRUE,
                'email'    => $result[ 'email' ],
                'username' => $result[ 'username' ],
                'role'     => $result[ 'role' ],
                'id'       => $result[ 'id' ],
            ];
            $this->session->set_userdata( $data );
            if ( $this->session->userdata( 'role' ) == 'admin' ) {// jika role admin maka yang akan ditampilkan setelah lohin adalah dashboard admin
                redirect( base_url() . 'admin/dashboard' );
            }
            if ( $this->session->userdata( 'role' ) == 'karyawan' ) {//jika rolenya adalah karyawan maka yang akan ditampilkan setelah login adalah history karyawan
                redirect( base_url() . 'karyawan/dashboard' );
            } else {
                redirect( base_url() . ' auth/login' );
            }
        } else {
            redirect( base_url() . 'auth/login' );
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect( base_url( 'auth/login' ) );
    }

    public function register()
 {
        $this->load->view( 'auth/register' );
    }

    public function aksi_register()
    {  $email = $this->input->post('email', true);
        $data = ['email' => $email];
        $username = $this->input->post('username');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        // $result = $query->row_array();
        if (empty($result)) {
            if (strlen($password) < 8) {//jika password kurang dari 8 angka maka tidak bisa menjalankan register
                $this->session->set_flashdata('error_password' , 'gagal...');
                redirect(base_url('auth/register'));
            } else {
                $data = [
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'role' => $role,
                    'image' => '',
                    'password' => md5($this->input->post('password')),
                ];
                $this->m_model->register($data);
                $this->session->set_flashdata('succsess' , 'berhasil...');
                redirect(base_url('auth/login'));
            }
        } else {
            $this->session->set_flashdata('error_email' , 'gagal...');
            redirect(base_url('auth/register'));
        }
    }
    
    public function register_k()
 {
        $this->load->view( 'auth/register_k' );
    }

    public function aksi_register_k()
    {
        $email = $this->input->post('email', true);
        $data = ['email' => $email];
        $username = $this->input->post('username');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $password = $this->input->post('password');
        // $result = $query->row_array();
        if (empty($result)) {
            if (strlen($password) < 8) {//jika password kurang dari 8 angka maka tidak bisa menjalankan register
                $this->session->set_flashdata('error_password' , 'gagal...');
                redirect(base_url('auth/register_k'));
            } else {
                $data = [
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'role' => 'karyawan',
                    'image' => '',
                    'password' => md5($this->input->post('password')),
                ];
                $this->m_model->register($data);
                $this->session->set_flashdata('succsess' , 'berhasil...');
                redirect(base_url('auth/login'));
            }
        } else {
            $this->session->set_flashdata('error_email' , 'gagal...');
            redirect(base_url('auth/register_k'));
        }
    }
}
?>

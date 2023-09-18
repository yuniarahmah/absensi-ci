<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('my_helper');
        $this->load->library('form_validation');

        $this->load->model('m_model');
    }

    public function index()
    {
        $this->load->view('auth/register');
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_pengguna', 'trim|required|alpha');
        $this->form_validation->set_rules('email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
        if($this->form_validation->run() == FALSE)
        {
            // failed
            $this->index();
        }
        else
        {
            $data = array(
                'nama_pengguna' => $this->input->post('nama_pengguna'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $register_user = new UserModel;
            $checking = $register_user->registerUser($data);
            if($checking)
            {
                $this->session->set_flashdata('status','Registered Successfully.! Go to Login');
                redirect(base_url('register'));
            }
            else
            {
                $this->session->set_flashdata('status','Something Went Wrong.!');
                redirect(base_url('register'));
            }
        }
    }
}

?>
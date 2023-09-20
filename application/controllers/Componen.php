<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Componen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
    }

    public function index()
    {
        $this->load->view('componen/navbar');
    }
    public function sidebar()
    {
        $this->load->view('componen/sidebar');
    }

}

?>
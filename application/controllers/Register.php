<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Register extends CI_Controller
 {
    public function __construct()
 {
        parent::__construct();
        // $this->load->helper( 'my_helper' );
        // $this->load->library( 'form_validation' );

        $this->load->model( 'm_model' );
    }

    
}

?>
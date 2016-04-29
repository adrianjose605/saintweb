<?php

class Saa_libs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Saa_lib_model');
    }
    
    public function ver(){
    	$ret = array();
    	foreach ($this->Saa_lib_model->get_all() as $row) {
            $ret[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($ret);
    }

    public function index() {

       $this->load->view('templates/header');
       $this->load->view('navbars/admin');
        $this->load->view('Admin/Facturas');     
        $this->load->view('templates/footer');
    }
    
}

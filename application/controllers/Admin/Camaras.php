<?php

class Camaras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Noticias_model');    $this->load->model('Camaras_model');
    }    
    
    /**
     * Creacion  de un nuevo pais
     */

    public function configurar(){
        $data['title'] = 'SecUneg';
 $data['nombre'] = $this->session->userdata('nombre');
//if (!$this->session->userdata('logueado')) {

  //              redirect('usuarios/personas');
    //    }else{

           

      //      $this->load->model('Usuarios_model');
        //    $p=$this->Usuarios_model->comprobar_permisos($this->session->userdata('permiso'));
    //     if($p->camaras==1){  
           
       $this->load->view('templates/header', $data);
        $this->load->view('navbars/admin', $data);
        $this->load->view('Admin/Config_cam', $data);     
        $this->load->view('templates/footer', $data); 
      //  }else{
        //    redirect('Admin/noticias');

          //      }        


//    }
}    
    public  function insert(){
           echo json_encode($this->Camaras_model->insert_ip());  

    }

    public function index() {
        $data['nombre'] = $this->session->userdata('nombre');
        $data['title'] = 'SecUneg';
        $data ['ip1']='http://192.168.1.9:8081/';
        $data ['ip2']='http://192.168.1.9:8081/';


 if (!$this->session->userdata('logueado')) {

                redirect('usuarios/personas');
        }else{

           

            $this->load->model('Usuarios_model');
            $this->load->model('Camaras_model');

            $p=$this->Usuarios_model->comprobar_permisos($this->session->userdata('permiso'));
         if($p->camaras==1){  
          $data ['ip1']=$this->Camaras_model->get_ip('1');   
          $data ['ip2']=$this->Camaras_model->get_ip('2');  
       $this->load->view('templates/header', $data);
        $this->load->view('navbars/admin', $data);
        $this->load->view('Admin/Camaras', $data);     
        $this->load->view('templates/footer', $data); 
        }else{
            redirect('Admin/noticias');

                }        


        }






       
    }
    
}

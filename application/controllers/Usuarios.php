<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('javascript');
        $this->load->library('session');
         $this->load->model('Usuarios_model');
        $usuario_data;
    }

    public function inicio()
    {
    
        $this->load->view('templates/header');     
        $this->load->view('inicio');
        $this->load->view('templates/footer');
    }

    public function insert_usuario() {
        $this->load->model('Usuarios_model');
        echo json_encode($this->Usuarios_model->crear());
    }
    public function log() {
        $this->load->view('log');
    }
public function cerrar(){

    $usuario_data = array(
             'logueado' => FALSE
        );
         $this->session->set_userdata($usuario_data);
        
         redirect('usuarios/personas');



    }   
    public function verificacion() {
        $r='';
         $data['usuario'] = $this->input->post('usuario'); 
         $data['clave'] = $this->input->post('clave'); 
         $usuario= $this->Usuarios_model->acceso($data);
         
        if($usuario==NULL){

            redirect('usuarios/personas');

        }

         $usuario_data = array(   
               'id' => $usuario->id,            
               'nombre' => $usuario->Nombre,
               'apellido' => $usuario->Apellido,
               'empresa' => $usuario->id_Empresa,
               'usuario' => $usuario->Usuario,
               'permiso' => $usuario->id_Grupo,
               'estatus' => $usuario->Estatus,
               'logueado' => TRUE);
        
        $this->session->set_userdata($usuario_data);

         if ($usuario_data['logueado']==TRUE and $usuario_data['estatus']==1){
             redirect('Admin/Saa_Libs/Dashboard');
            }else{

             redirect('usuarios/personas');
         };
       
        $this->load->model('usuarios_model');
}

   

    public function personas() {

        $this->load->view('templates/header');     
        $this->load->view('inicio');
        $this->load->view('templates/footer');
    }

}

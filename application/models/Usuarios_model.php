<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

/////////////////////////////////////GRUPOS DE USUARIOS/////////////////////////////////////////////////////////////

public function edit_grupos() {
        $res = array();
        $arr = $this->getInputFromAngular();
        
        
        $this->db->where('id', $arr['id']);        
        unset($arr['id']);
        if ($this->db->update('sch_sistema.SIS_PERMISOS', $arr)) {
            $res['status'] = 1;
            $res['mensaje'] = 'Actualizado con Exito';
        } else {
            $res['status'] = 0;
            $res['mensaje'] = 'Ocurrio un Problema al Actualizar';
        }
        return $res;
    }

      public function insert_grupo() {
        $arr = $this->getInputFromAngular();
        $res = array();
        $this->db->select('Descripcion');
        $this->db->where('Descripcion', $arr['Descripcion']);
        $query1 = $this->db->get('sch_sistema.SIS_PERMISOS');
        if($arr['Descripcion']==""){
           $res['status'] = 0;
           $res['mensaje'] = 'Nombre de grupo invalido';
           return $res;
       }

       if ($query1->num_rows() > 0) {
        $res['status'] = 0;
        $res['mensaje'] = 'El grupo ya se encuentra registrado';
        return $res;
    }

    
    
    if ($this->db->insert('sch_sistema.SIS_PERMISOS', $arr)) {
        $res['status'] = 1;
        $res['mensaje'] = 'Registrado con Exito';
    } else {
        $res['status'] = 0;
        $res['mensaje'] = 'Error Desconocido';
    }

    return $res;
}
    public function get_Grupo($id) {
        $this->db->select('Descripcion,LibroVentaSucursal, LibroVentaConsolidado,Facturacion,Usuarios,Permisos, Estatus, Empresas, id');
        $this->db->where('id', $id);
        $query = $this->db->get('sch_sistema.SIS_PERMISOS');
        return $query->result_array();
    }

    public function generar_json_tabla_grupos($offset, $cantidad, $order, $type) {
        $arr = $this->getInputFromAngular();
        $params = preg_split('#\s+#', trim($arr['query']));
        $w = false;
        if ($arr['estatus'])
            $this->db->where('Estatus', $arr['estatus']);
        $likes = '';


        for ($i = 0; $i != count($params); $i++) {
            if ($i == 0)
                $likes.="( Descripcion LIKE '%" . $params[$i] . "%'";
            else
                $likes.="OR Descripcion LIKE '%" . $params[$i] . "%'";
            if ($i + 1 == count($params))
                $likes.=")";
        }

        if (!empty($likes))
            $this->db->where($likes);


        $this->db->select('COUNT(1) AS cantidad');


        $query1 = $this->db->get('sch_sistema.SIS_PERMISOS');
        $respuesta['cantidad'] = $query1->result_array();

        $this->db->select('Descripcion,LibroVentaSucursal, LibroVentaConsolidado,Facturacion,Usuarios,Permisos, Estatus,Empresas, id AS Opciones');
        if ($arr['estatus'])
            $this->db->where('Estatus', $arr['estatus']);
        if (!empty($likes))
            $this->db->where($likes);


        $this->db->limit($cantidad, $offset);
        $this->db->order_by($order, $type);

        $query = $this->db->get('sch_sistema.SIS_PERMISOS');
        $respuesta['resultado'] = $query->result_array();
        $respuesta['meta'] = $query->list_fields();
        

        return $respuesta;
    }


////////////////////PERMISOS/////////////////////////////////////////////////////////////////



    function permisos($idpermiso){
        $this->db->select('*');
        $this->db->from('EnterpriseTest.sch_sistema.SIS_PERMISOS');
        $this->db->where('id',$idpermiso);
        $result= $this->db->get();
        
        return $result->row();

    }

    /*function login($usuario, $clave){
        $query="call iniciar_sesion('$usuario', '$clave')";
        $result=$this->db->query($query);

        return $result->result_array();

    }*/

// EN FUNCIONAMIENTO
    function acceso($data){
        $this->db->select('*');
        $this->db->from('sch_sistema.SIS_USUARIO');
        $this->db->where('Usuario',$data['usuario']);
        $result= $this->db->get();
        $user= $result->row();
        

        if(isset($user)){
            $this->db->select('*');
            $this->db->where('Usuario',$data['usuario']);
            $this->db->where('Clave',$data['clave']);
            $result= $this->db->get('sch_sistema.SIS_USUARIO');
            return $result->row();
        }else{

            return NULL; 
        };
        
        

    }



    
    /*function verificacion() {
        $data = $this->getInputFromAngular();
        $usuario = array('nombre' => $data('nom'),
            'nombre' => $data('nom'),
            'usuario' => $data('us'),
            'ventas' => $data('p1'),
            'reportes' => $data('p2'),
            'registro' => $data('p3'),
            'clave' => $data('pass'),);
        $this->db->where('usuario', $usuario['usuario']);
        $query = $this->db->get('usuario_sistema');

        if ($query->row()) {

            if ($query->row()->clave == $usuario['clave']) {

                return 1;
            } else {

                return 2;
            }
        } else {

            return 3;
        }
    }*/

////////////////////Usuarios/////////////////////////////////////////////////////////////////
    public function crear() {
        $data = $this->getInputFromAngular();
        $usuario = [];
        $usuario = ['nombre' => $data['nom'],
        'usuario' => $data['us'],
        'ventas' => $data['p1'],
        'reportes' => $data['p2'],
        'registros' => $data['p3'],
        'clave' => md5($data['pass']),
        'telefono'=> $data['tlfn']];


        $this->db->insert('usuario_sistema', $usuario);
    }

    public function modificar() {
        $data = $this->getInputFromAngular();
        $usuario = [];
        $usuario = [
        'nombre' => $data['nom'],
        'ventas' => $data['p1'],
        'reportes' => $data['p2'],
        'registros' => $data['p3'],
        'pass' => md5($data['pass']),
        'telefono'=> $data['tlfn']];
        
        $this->db->where('usuario', $usuario['usuario']);
        $this->db->update('usuario_sistema', $usuario);

        $this->db->update('usuario_sistema', $usuario);
    }

    public function modificar_usuario() {
        $data = $this->getInputFromAngular();
        $usuario = [];
        if(($data['pass'])){

        }
        if(($data['descripcion'])){
            unset($data['descripcion']);
        }
        $usuario = [
        'nombre' => $data['nombre'],
        'apellido' => $data['apellido'],
        
        ];
        
        $this->db->where('usuario.id', $data['id']);
        $this->db->update('usuarios', $usuario);

    }

    public function consultar() {
        $data = $this->getInputFromAngular();
        $usuario = [];
        $usuario = ['nombre' => $data['nom'],
        'ventas' => $data['p1'],
        'reportes' => $data['p2'],
        'registros' => $data['p3'],
        'clave' => md5($data['pass'])];


        $this->db->insert('usuario_sistema', $usuario);
    }



    public function get_usuarios($id) {
        $this->db->select('Usuario,Nombre,Apellido, fecha_registro,sch_sistema.SIS_USUARIO.Estatus, sch_sistema.SIS_PERMISOS.Descripcion, sch_sistema.SIS_USUARIO.id, sch_sistema.SIS_PERMISOS.id, sch_sistema.SIS_USUARIO.Clave');
        $this->db->where('sch_sistema.SIS_USUARIO.id', $id);
        $this->db->where(' sch_sistema.SIS_PERMISOS.id=sch_sistema.SIS_USUARIO.id_Grupo');
        $query = $this->db->get('sch_sistema.SIS_USUARIO, sch_sistema.SIS_PERMISOS');
        return $query->result_array();
    }

    
    
    /*public function get_Grupos_sel($activos=false){
        $this->db->select('ver_noticias,enviar_noticias,boton_panico,crear_usuarios,permisos,estatus,descripcion,id');
        
        if ($activos)
            $this->db->where('Estatus', $activos);
        
        $query = $this->db->get('permisos');
        return $query->result_array();
    }*/


    public function get_Usuarios_sel($activos=false){
        $this->db->select('usuario  AS id,nombre AS Nombre, apellido as Apellido, fecha_registro as Fecha de registro');
        
        if ($activos)
            $this->db->where('Estatus', $activos);
        
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }
 
    public function generar_json_tabla_principal($offset, $cantidad, $order, $type) {
        $arr = $this->getInputFromAngular();
        $params = preg_split('#\s+#', trim($arr['query']));
        $w = false;
        if ($arr['estatus'])
            $this->db->where('Estatus', $arr['estatus']);
        $likes = '';


        for ($i = 0; $i != count($params); $i++) {
            if ($i == 0)
                $likes.="(Usuario LIKE '%".$params[$i]."%' OR Nombre LIKE '%" . $params[$i] . "%'";
            else
                $likes.=" OR Usuario LIKE '%".$params[$i]."%' OR Nombre LIKE '%" . $params[$i] . "%'";
            if ($i + 1 == count($params))
                $likes.=")";
        }

        if (!empty($likes))
            $this->db->where($likes);


        $this->db->select('COUNT(1) AS cantidad');


        $query1 = $this->db->get('sch_sistema.SIS_USUARIO');
        $respuesta['cantidad'] = $query1->result_array();

        $this->db->select('Usuario,Nombre,Apellido ,Fecha_registro ,sch_sistema.SIS_PERMISOS.Descripcion as Privilegios, sch_sistema.SIS_USUARIO.Estatus, sch_sistema.SIS_USUARIO.id as Opciones');

        $this->db->where('sch_sistema.SIS_USUARIO.id_Grupo = sch_sistema.SIS_PERMISOS.id');


        if ($arr['estatus'])
            $this->db->where('sch_sistema.SIS_USUARIO.Estatus', $arr['estatus']);

        
        
        if (!empty($likes))
            $this->db->where($likes);

        $this->db->limit($cantidad, $offset);
        $this->db->order_by($order, $type);



        $query = $this->db->get('sch_sistema.SIS_USUARIO, sch_sistema.SIS_PERMISOS');
        $respuesta['resultado'] = $query->result_array();
        $respuesta['meta'] = $query->list_fields();
        return $respuesta;
    }



    public function edit_usuarios() {
        $res = array();
        $data = $this->getInputFromAngular();         
        $usuario =array();
        


        $this->db->select('Clave');
        $this->db->where('Usuario',$data['Usuario']);
        $result= $this->db->get('sch_sistema.SIS_USUARIO');

        $passw=$result->row();


        if(($data['Clave'])!=" "){
            $usuario = [
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'estatus' => $data['estatus'],
            'clave'=>$data['clave']           
            ];
        }else{
            $usuario = [
            'Nombre' => $data['nombre'],
            'Apellido' => $data['apellido'],
            'Estatus' => $data['estatus'],
            'Clave'=>$data['clave']               
            ];
        }
        if(($data['Descripcion'])){
            unset($data['Descripcion']);
        }
        
        
        $this->db->where('Usuario', $data['Usuario']);
        

        if ($this->db->update('sch_sistema.SIS_USUARIO', $usuario)) {
            $res['estatus'] = 1;
            $res['mensaje'] = 'Actualizado con Exito';
        } else {
            $res['estatus'] = 0;
            $res['mensaje'] = 'Ocurrio un Problema al Actualizar';
        }
        return $res;
    }
   
    public function insert_usuario() {
        $arr = $this->getInputFromAngular();
        $res = array();
        $this->db->select('usuario');
        $this->db->where('usuario', $arr['usuario']);
        $query1 = $this->db->get('sch_sistema.SIS_USUARIO');
        if ($query1->num_rows() > 0) {
            $res['status'] = 0;
            $res['mensaje'] = 'El usuario ya esta registrado';
            return $res;
        }

        $this->db->set('fecha_registro', 'NOW()', FALSE);

        if ($this->db->insert('usuarios', $arr)) {
            $res['estatus'] = 1;
            $res['mensaje'] = 'Registrado con Exito';
        } else {
            $res['estatus'] = 0;
            $res['mensaje'] = 'Error Desconocido';
        }

        return $res;
    }

  




}

?>
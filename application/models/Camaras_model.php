<?php

/**
 * Description of Pais
 *
 * @author zyos
 */
class Camaras_model extends CI_Model {

//put your code here
    public function __construct() {
        $this->load->database();
        
    }
//
//    public function get_prueba() {
//        $query = $this->db->get('par_subproductos');
//        return $query->result_array();
//    }

    public function get_ip($id) {
        $this->db->select('ip');
        $this->db->where('id', $id);
       
        $query = $this->db->get('camaras');
        return $query->row()->ip;
    }
    



    public function insert_ip() {
            $res = array();
            $ip = $this->getInputFromAngular();
           
            $data = array('ip' => $ip['ip']);

            $this->db->where('id',$ip['id'] );

            if($this->db->update('camaras', $data)){
          $res['estatus'] = 1;
            $res['mensaje'] = 'Actualizado con Exito';

            }else{
            $res['estatus'] = 0;
            $res['mensaje'] = 'Ocurrio un Problema al Actualizar';
        }


return $res;
}


}
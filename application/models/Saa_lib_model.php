<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Saa_lib_model extends CI_Model{
		
		public function __construct(){
        	$this->load->database();
		}

		public function get_all() {
		    $query = $this->db->get('saa_lib');
		    return $query->result_array();
	    }

	    //Ventas Diarias
	    public function get_ventas_diarias($mes){

	    }

	    //Total Credito por sucursal
	    public function get_credito_sucursal(){
	    	$this->db->select('TipoFac, SUM(Credito) as totalCredito');
	    	$this->db->where("TipoFac = 'B'");
	    	$this->db->group_by('TipoFac');
	    	$query = $this->db->get('saa_lib');
		    return $query->result_array();
	    }

	    //Total facturado
	    public function get_facturado_sucursal(){
	    	$this->db->select('TipoFac, SUM(Monto) as totalFacturado');
	    	$this->db->where("TipoFac = 'A'");
	    	$this->db->group_by('TipoFac');
	    	$query = $this->db->get('saa_lib');
		    return $query->result_array();
	    }

	    //Total facturas realizadas
	    public function get_facturas_sucursal(){
	    	$this->db->select('COUNT(*) as total');
	    	$this->db->where("TipoFac = 'A'");
	    	$query = $this->db->get('saa_lib');
		    return $query->result_array();
	    }
		
	}

 ?>
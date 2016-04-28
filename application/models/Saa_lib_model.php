<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Saa_lib_model extends CI_Model{
		
		public function __construct(){
        	$this->load->database();
		}

		public function get_all() {
		    $this->db->select('*');
		    $this->db->from('saa_lib');
		    $query = $this->db->get();
		    return $query->result_array();
	    }
		
	}

 ?>
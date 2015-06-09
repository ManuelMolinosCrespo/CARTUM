<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class InventoryDrones_model extends CI_Model {
	function InventoryDrones_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();

	}
	

	public function obtenerDron(){
	 //Realizamos al aconsulta de los datos 
      $this->db->select('idDron,Nombre_dron,Estado_dron,Fecha_Montaje_dron');
      $this->db->from('Drones');
      $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}

	public function obtenerTodosDrones(){
		//Realizamos la consulta de todos los datos
      $this->db->select('idDron');
      $this->db->from('Drones');
      $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}
	
}
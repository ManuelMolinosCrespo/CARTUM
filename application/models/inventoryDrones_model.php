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
		//Cambiamos el aspecto del texto
	foreach ($resultado as $item) { 
	 	if($item -> Estado_dron == '0'){
	 		$item -> Estado_dron = 'Inactivo';
	 	}else{
	 		$item -> Estado_dron = 'Activo';
	 	}
	 }
			
			return $resultado;
			}else{
				return false;
			}
	}

	
}
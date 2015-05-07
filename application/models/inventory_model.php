<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory_model extends CI_Model {
	function Inventory_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();

	}
	

	public function obtenerComponentes(){
	 //Realizamos al aconsulta de los datos 
      $this->db->select('Categoria,Nombre,Estado,idDronActual');
      $this->db->from('Componentes');
      $query= $this->db->get();
		if($query->num_rows()> 0){
			//Si no ha habia error, llamamos a la funcion que nos compara las contraseñas
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}
}
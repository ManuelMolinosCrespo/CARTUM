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
      $this->db->select('k.Nombre_categoria,c.Nombre_componente,c.Estado_componente,c.idDronActual,c.idComponente');
      $this->db->from('Componentes c');
      $this->db->join('Categorias_Componentes k', 'c.categoria = k.idCategoria');
      $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
				//Cmabiamos el aspecto del texto
			foreach ($resultado as $item) { 
	 	if($item -> Estado_componente == '0'){
	 		$item -> Estado_componente = 'Inactivo';
	 	}else{
	 		$item -> Estado_componente = 'Activo';
	 	}
	 }
			return $resultado;
			}else{
				return false;
			}
	}
}
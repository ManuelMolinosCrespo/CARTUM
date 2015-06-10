<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EditarComponente_model extends CI_Model {
	function EditarComponente_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}

	//Recibimos los datos del usuario para guardarlos en la base de datos
	function actualizarComponente($datos){

		//Actualizamos en funcion del id del componente
		$this->db->where('idComponente',$datos['idComponente']);
        $this->db->update('Componentes', $datos); 

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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EditarTarea_model extends CI_Model {
	function EditarTarea_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}

	public function obtenerUsuarios(){
			//Realizamos la consulta de todos los datos
      $this->db->select('Nombre_usuario,Apellidos_usuario,DNI_Usuario');
      $this->db->from('Usuarios');
      $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
			
			return $resultado;
		}else{
				return false;
		}
	}

	public function editarTarea($datos){
		//Actualizamos en funcion del id del componente
		$this->db->where('idTareas',$datos['idTareas']);
        $this->db->update('Tareas', $datos); 
	}

	
}
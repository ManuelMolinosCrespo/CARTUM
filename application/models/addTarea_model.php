<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddTarea_model extends CI_Model {
	function AddTarea_model(){
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

	//Recibimos los datos del componente y los insertamos en la base de datos 
	function insertarTarea($datos){
		$this->db->insert('Tareas',array('Nombre' => $datos['Nombre'], 'Descripcion'=> $datos['Descripcion'],'Fecha_Inicio'=> $datos['Fecha_Inicio'],'Fecha_Fin'=> $datos['Fecha_Fin'],'DNI_Usuario_tareas'=> $datos['DNI_Usuario_tareas'],'idDron_tareas'=> $datos['idDron_tareas']));
	}
}
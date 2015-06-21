<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FichaTarea_model extends CI_Model {
	function FichaTarea_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();

	}
	

	public function obtenerFicha($id){
	 //Realizamos la consulta de los datos 
      $this->db->select('t.Nombre,t.Descripcion,t.Fecha_Inicio,t.Fecha_Fin,t.idDron_tareas,u.Nombre_usuario,u.Apellidos_usuario,t.Resultado');
      $this->db->from('Tareas t');
      $this->db->join('Usuarios u', 't.DNI_Usuario_tareas = u.DNI_Usuario');
      $this->db->where('idTareas',$id);
      $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}

	public function eliminarTarea($id){
		$this->db->where('idTareas',$id);
		return $this->db->delete('Tareas');
	}
}
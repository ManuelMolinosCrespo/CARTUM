<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Calendar_model extends CI_Model {
	function Calendar_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();

	}
	

	public function obtenerTareas(){
	 //Realizamos al aconsulta de los datos 
      $this->db->select('t.Nombre,u.Nombre_usuario,u.Apellidos_usuario,t.Fecha_Inicio,t.idTareas');
      $this->db->from('Tareas t');
      $this->db->join('Usuarios u', 't.DNI_Usuario_tareas = u.DNI_Usuario');
        $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}
}
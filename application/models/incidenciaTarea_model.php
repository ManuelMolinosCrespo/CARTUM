<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IncidenciaTarea_model extends CI_Model {
	function IncidenciaTarea_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}


	public function editarIncidencia($datos){
		//Actualizamos en funcion del id de la incidencia 
		$this->db->where('idIncidencia',$datos['idIncidencia']);
        $this->db->update('Incidencias', $datos); 
	}

	public function insertarIncidencia($datos){
		$this->db->insert('Incidencias',array('Fecha' => $datos['Fecha'], 'Resumen'=> $datos['Resumen']));
		$this->db->where('idTareas',$datos['idTareas']);
        $this->db->update('Tareas', $datos); 
	}

	public function obtenerIncidencia($id){
		//Realizamos la consulta de todos los datos
      $this->db->select('i.idIncidencia,i.Resumen');
      $this->db->from('Incidencias i');
      $this->db->join('Tareas t', 'i.idIncidencia = t.idIncidencia_tareas');
      $this->db->where('idIncidencia',$id);
     
      $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
			
			return $resultado;
		}else{
				return false;
		}
	}
}
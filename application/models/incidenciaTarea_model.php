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
		//Sacamos el id de la incidencia
			//Realizamos la consulta de todos los datos
      $this->db->select('idIncidencia_tareas');
      $this->db->from('Tareas');
      $this->db->where('idTareas',$datos['idTareas']);
      $query= $this->db->get();	
		if($query->num_rows()> 0){
			$resultado = $query->result();
			foreach ($resultado as $item) {
				$idIncidencia = $item -> idIncidencia_tareas;
			}
		}
		//Con el id de la incidencia saco el resumen
		 $this->db->select('Resumen');
      $this->db->from('Incidencias');
      $this->db->where('idIncidencia',$idIncidencia);
 	   $query= $this->db->get();	
		if($query->num_rows()> 0){
			$resumenAntiguo = $query->result();
			foreach ($resumenAntiguo as $item) {
				$resumenAnt = $item -> Resumen;
			}
		$resumen = $resumenAnt. "  ". $datos['Resumen']; 
		//Actualizamos el nuevo resumen
		$query = $this->db->query("UPDATE Incidencias SET Resumen = '".$resumen."' WHERE idIncidencia =".$idIncidencia." "); 
	}
}

	public function insertarIncidencia($datos,$id){
		$this->db->insert('Incidencias',array('Fecha' => $datos['Fecha'], 'Resumen'=> $datos['Resumen']));
		//Actualizamos el id de incidencias de la tarea, con el id de la ultima incidencia insertada
		$query = $this->db->query("UPDATE Tareas SET idIncidencia_tareas = ".$this->db->insert_id()." WHERE idtareas =".$id." "); 
	}

	public function obtenerIncidencia($id){
		//Realizamos la consulta de todos los datos
      $this->db->select('idIncidencia_tareas');
      $this->db->from('Tareas');
      $this->db->where('idTareas',$id);
      $query= $this->db->get();	
		if($query->num_rows()> 0){
			$resultado = $query->result();
			foreach ($resultado as $item) {
				$idIncidencia = $item -> idIncidencia_tareas;
			}
	  $this->db->select('Resumen');
      $this->db->from('Incidencias');
      $this->db->where('idIncidencia',$idIncidencia);
 	   $query= $this->db->get();	
		if($query->num_rows()> 0){
			$resultado = $query->result();
			return $resultado;
		}else{
				
			return false;
		}
	}
	}
}
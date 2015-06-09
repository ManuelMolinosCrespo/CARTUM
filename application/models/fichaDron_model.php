<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FichaDron_model extends CI_Model {
	function FichaDron_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();

	}
	

	public function obtenerFicha($id){
	 //Realizamos la consulta de los datos 
      $this->db->select('idDron,Nombre_dron,Fabricante_dron,Prestaciones_dron,Peso_dron,Horas_de_vuelo_dron,Categoria_dron,Fecha_Montaje_dron,Fecha_Retirada_dron,Estado_dron,FotoURL_dron');
      $this->db->from('drones');
      $this->db->where('idDron',$id);
      $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}

	function eliminarDron($id){
		$this->db->where('idDron',$id);
		return $this->db->delete('drones');
	}

	function incrementarVuelo($id){
		$query = $this->db->query("UPDATE componentes c INNER JOIN drones d ON c.idDronActual = d.idDron  SET Numero_Vuelos_Realizados_componente = Numero_Vuelos_Realizados_componente + 1 WHERE c.idDronActual = '".$id."'"); 

	}
}
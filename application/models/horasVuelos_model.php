<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HorasVuelos_model extends CI_Model {
	function HorasVuelos_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();

	}

	function incrementarHorasVuelo($id){
		$query = $this->db->query("UPDATE componentes c INNER JOIN drones d ON c.idDronActual = d.idDron  SET Horas_Vuelo_componente = Horas_Vuelo_componente + ".$datos['horas']. "WHERE c.idDronActual = '".$datos['id']."'"); 

	}
}
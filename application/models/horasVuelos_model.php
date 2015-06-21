<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HorasVuelos_model extends CI_Model {
	function HorasVuelos_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();

	}

	function incrementarHorasVuelo($datos){
		//Incrementamos las horas de vuelo
		$query = $this->db->query("UPDATE componentes c INNER JOIN drones d ON c.idDronActual = d.idDron  SET 
			c.Horas_Vuelo_componente = c.Horas_Vuelo_componente + ".$datos['horas'].",d.Horas_de_vuelo_dron = d.Horas_de_vuelo_dron + ".$datos['horas']." WHERE c.idDronActual = '".$datos['idDron']."'"); 
		//Incrementamos los numeros de vuelos
		$query = $this->db->query("UPDATE componentes c INNER JOIN drones d ON c.idDronActual = d.idDron  SET Numero_Vuelos_Realizados_componente = Numero_Vuelos_Realizados_componente + 1 WHERE c.idDronActual = '".$datos['idDron']."'"); 
	}
}
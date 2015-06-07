<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EditarDron_model extends CI_Model {
	function EditarDron_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}

	//Recibimos los datos del usuario para guardarlos en la base de datos
	function actualizarDron($datos){

		//Actualizamos en funcion del id del componente
		$this->db->where('idDron',$datos['idDron']);
        $this->db->update('Drones', $datos); 

	}
}
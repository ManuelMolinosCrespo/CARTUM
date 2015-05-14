<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EditarComponente_model extends CI_Model {
	function EditarComponente_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}

	//Recibimos los datos del usuario para guardarlos en la base de datos
	function actualizarComponente($datos){

		//Actualizamos en funcion del id del componente
		$this->db->where('idComponente',$datos['id'];
        $this->db->update('Componentes', $datos); 

	}
}
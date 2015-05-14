<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_model extends CI_Model {
	function Profile_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}

	//Recibimos los datos del usuario para guardarlos en la base de datos
	function actualizarUsuario($datos){
		//Decimos gracias al Dni que usuario es y le actualizamos los registros
		$this->db->where('DNI_Usuario', $id);
        $this->db->update('usuarios', $data); 

	}
}
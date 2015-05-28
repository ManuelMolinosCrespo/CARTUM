<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_model extends CI_Model {
	function Register_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}

	//Recibimos los datos del usuario para guardarlos en la base de datos
	function insertarUsuario($datos){
		$this->db->insert('Usuarios',array('DNI_Usuario' => $datos['usuario'], 'Nombre_usuario'=> $datos['nombre'],'Apellidos_usuario'=> $datos['apellidos'],'Correo_Electronico'=> $datos['correo'],'Telefono_usuario'=> $datos['telefono'],'Contraseña'=> $datos['password']));
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Model {
	function Login(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}
	

	//Recibimos el dni del usuario para obtener la contraseña de ese usuario en la base de datos
	function obtenerPass($dni){
		//Ponemos la condiccion de que nos traigamos la contraseña del usuario que se ha introduccido
	  $this->db->where('DNI_Usuario', $dni); 
      //obtenemos la contraseña
      $query = $this->db->get('Contraseña');
		if($query->num_rows()> 0) return $query;
		else return false;
	}

	function compararPass($pass)(){
		//Pasamos la contraseña del usuario a SHA1
		$passIntroduccida = sha1($pass);
		if($passIntroduccida==$pass){
			return $acesso = true;
		}else{
			return $acesso = false;
		}
	}
}

?>
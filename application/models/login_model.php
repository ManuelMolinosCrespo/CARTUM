<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {
	function Login_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}
	

	//Recibimos el dni del usuario para obtener la contraseña de ese usuario en la base de datos
	function obtenerPass($datos){
		//Ponemos la condiccion de que nos traigamos la contraseña del usuario que se ha introduccido
	  
      //obtenemos la contraseña
      $this->db->select('Contraseña');
      $this->db->from('Usuarios');
      $this->db->where('DNI_Usuario', $datos['usuario']); 
      $query= $this->db->get();
		if($query->num_rows()> 0){
			//Si no ha habia error, llamamos a la funcion que nos compara las contraseñas
			$resultado = $query->row();
			$this->compararPass($datos['password'],$resultado);
		} 
		else return false;
	}

	function compararPass($passUser,$passBBDD){
		//Sacamos la contraseña del la bbdd
		$passBBDD = $passBBDD->Contraseña;
		if($passUser==$passBBDD){
			$this->load->view('profile');

			
		}else{
			$this->load->view('login');
			
		}
	}
}

?>
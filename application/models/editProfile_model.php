<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EditProfile_model extends CI_Model {
	function EditProfile_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}

	//Recibimos los datos del usuario para guardarlos en la base de datos
	function actualizarUsuario($datos){

		//Decimos gracias al Dni que usuario es y le actualizamos los registros
		$this->db->where('DNI_Usuario', $this->session->userdata('usuario'));
        $this->db->update('usuarios', $datos); 

	}

	function eliminarUsuario($id){
		$this->db->where('DNI_Usuario',$id);
		return $this->db->delete('usuarios');
	}

	function mostrarUsuario(){
		//Sacamos los datos del usuario que esta registrado
		 //Realizamos la consulta de los datos 
      $this->db->select('Nombre_usuario,Apellidos_usuario,Correo_Electronico,Telefono_usuario');
      $this->db->from('usuarios');
      $this->db->where('DNI_Usuario',$this->session->userdata('usuario'));
      $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}
	
}
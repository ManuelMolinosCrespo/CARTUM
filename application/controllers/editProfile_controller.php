<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProfile_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function EditProfile_controller(){
		
		parent::__construct();
		$this->load->model('editProfile_model');
	}

	public function index()
	{
		$this->load->view('editprofile');
	}

	public function recibirdatos() {
		//Recogemos Los datos modificados por el usuario y llamamos al modelo para actualizarlos. En el caso que la nueva contraseña se aceptada
		if($this->compararPass() == true){
		 	$passSha1 = sha1($this->input->post('password'));
			$datos = array(
				'correo_electronico' => $this->input->post('correo'),
	 			'telefono_usuario' => $this->input->post('telefono'),
	 			'contraseña' => $passSha1
	 		);
			//Llamamos al modelo 
	 		$this->editProfile_model->actualizarUsuario($datos);
			$this->mostrarDatosUser();
		}else{
		 	//Devolvemos la pantalla de error 
			$this->load->view('editProfile');
		}
	}

	public function mostrarDatosUser(){
		$data['datos'] = $this->editProfile_model->mostrarUsuario(); 
		$this->load->view('profile',$data);
	}
			
	//En esta funcion comprobamos que las dos contraseñas del usuario son iguales.
	public function compararPass(){
		$pass = $this->input->post('password');
		$passRepetida = $this->input->post('repeat_password');
		if($pass == $passRepetida){
			//Las dos contraseñas son iguales
			return true;
		}else{
			return false;
		}
	}
}

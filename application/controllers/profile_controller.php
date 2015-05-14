<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function Profile_controller(){
		
		parent::__construct();
		// $this->load->model('profile_model');
	}

	public function index()
	{
		$this->load->view('profile');
	}

	 public function recibirdatos() {
	//Recogemos Los datos modificados por el usuario y llamamos al modelo para actualizarlos. En el caso que la nueva contraseña se aceptada
	 if($this->compararPass() == true &&  $this->datosCompletos() == true){
	 	$passSha1 = sha1($this->input->post('password'));
		$datos = array(
			'correo' => $this->input->post('correo'),
	 		'telefono' => $this->input->post('telefono'),
	 		'password' => $passSha1
	 		);
		//Llamamos al modelo 
	 	$this->profile_model->actualizarUsuario($datos);
	 }else{
	 	//Devolvemos la pantalla de error 
			$this->load->view('editProfile');
	 }

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

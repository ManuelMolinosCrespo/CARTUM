<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function Login_controller(){
		
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{

}
	public function recibirdatos() {
//Recogemos el user, y la pass y la encriptamos
	$passSha1 = sha1($this->input->post('password'));
$datos = array(
			'usuario' => $this->input->post('usuario'),
			'password' => $passSha1
			);
			//Llamamos al modelo 
			$this->login_model->obtenerPass($datos);

	}
}

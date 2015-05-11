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
		$this->load->view('login');
	}
	
	public function cargar_registro()
	{
		$this->load->view('register');
	}

	public function recibirdatos() {
		//Recogemos el user, y la pass y la encriptamos
		$passSha1 = sha1($this->input->post('password'));
		$datos = array(
			'usuario' => $this->input->post('usuario'),
			'password' => $passSha1
			);
		//Llamamos al modelo, Si la autentificacion es correcta damos paso a la aplicacion y sino devolvemos al login
		if($this->login_model->obtenerPass($datos) == true){
			//Cargamos la pagina principal
			$this->load->view('profile');

		}else{
			$this->load->view('login');
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function Login_controller(){
		
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('editProfile_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	//Mostramos los datos del usuario actual
	public function mostrarDatosUser(){
		$data['datos'] = $this->editProfile_model->mostrarUsuario(); 
		$this->load->view('profile',$data);
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
			$this->session->set_userdata('usuario', $datos['usuario']);
			$this->mostrarDatosUser();
		}else{
			$this->load->view('login');
		}
	}
}

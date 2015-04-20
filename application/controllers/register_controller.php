<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {

	//Creamos el contructor para cargar el modelo
	function Register_controller(){
		
		parent::__construct();
		$this->load->model('register_model');
	}
	 

	public function index()
	{
		$this->load->view('register');
	}

	//Recibimos los datos de la interfaz y se los pasaremos al modelo que es el encargado de guardarlos en la base de datos 
	public function recibirdatos() {
		//Pasamos la contraseña a sha1
		$passSha1 = sha1($this->input->post('password'));
		$datos = array(
			'usuario' => $this->input->post('dni_usuario'),
			'nombre' => $this->input->post('nombre'),
			'apellidos' => $this->input->post('apellidos'),
			'correo' => $this->input->post('correo'),
			'password' => $passSha1,
			'telefono' => $this->input->post('telefono')
			);
			//Llamamos al modelo 
			$this->register_model->insertarUsuario($datos);
			$this->load->view('login');
	}
}
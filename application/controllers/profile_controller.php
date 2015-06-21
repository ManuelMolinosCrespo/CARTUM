<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function Profile_controller(){
		
		parent::__construct();
		$this->load->model('editProfile_model');
	}

	public function index()
	{
		if($this->session->userdata('Token')!= true){
			$this->load->view('login');
		}else{
			$this->mostrarDatosUser();
		}
		

	}
	
	public function cargar_editar()
	{
		$this->load->view('editProfile');
	}

	//Esta funcion se llama si se desea elimar un usuario 
	public function borrarUsuario(){
		//Llamamos a la variable de sesion correspondiente del usuario para poder eliminarlo
		$id = $this->session->userdata('usuario');
		$this->editProfile_model->eliminarUsuario($id);
		$this->load->view('login');
	}

	//Mostramos los datos del usuario actual
	public function mostrarDatosUser(){
		$data['datos'] = $this->editProfile_model->mostrarUsuario(); 
		$this->load->view('profile',$data);
	}
}

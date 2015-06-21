<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComponenteDron_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function ComponenteDron_controller(){
		
		parent::__construct();
		$this->load->model('componenteDron_model');	
	}

	public function index()
	{
		//Comprobamos que el user este autenticado
		if($this->session->userdata('Token')!= true){
			$this->load->view('login');
		}else{
			$this->obtenerdatos();
		}
	}

	public function obtenerdatos() {
	
	 	//Llamamos al modelo 
	 $data['datos'] = $this->componenteDron_model->obtenerComponentes($this->uri->segment(3)); 
	 $this->load->view('componenteDron',$data);
	}
}

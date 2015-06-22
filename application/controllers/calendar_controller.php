<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function Calendar_controller(){
		
		parent::__construct();
		$this->load->model('calendar_model');
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
	 $data['datos'] = $this->calendar_model->obtenerTareas(); 
	 $this->load->view('calendar',$data);
	}
}

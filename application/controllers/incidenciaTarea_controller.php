<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IncidenciaTarea_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function IncidenciaTarea_controller(){
		
		parent::__construct();
		$this->load->model('incidenciaTarea_model');

		
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

	public function recibirdatos(){

	}

	public function obtenerdatos() {
	
	 	//Llamamos al modelo 
	 $data['datos'] = $this->incidenciaTarea_model->obtenerIncidencia(); 
	 $this->load->view('incidenciaTarea',$data);
	}

}
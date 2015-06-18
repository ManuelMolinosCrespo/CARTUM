<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditTarea_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function EditTarea_controller(){
		
		parent::__construct();
		$this->load->model('addComponent_model');
		$this->load->model('editTarea_model');
		
	}

	public function index()
	{
		$this->mostrarDatos();
	}

	public function mostrarDatos(){
	 	$data['usuarios'] = $this->addTarea_model->obtenerUsuarios(); 
	 	$data['drones'] = $this->addComponent_model->obtenerTodosDrones(); 
	 	$this->load->view('addTarea',$data);
	}

	public function recibirdatos(){
 		
	}

}
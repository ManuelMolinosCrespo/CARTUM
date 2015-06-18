<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddTarea_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function AddTarea_controller(){
		
		parent::__construct();
		$this->load->model('addComponent_model');
		$this->load->model('addTarea_model');
		
	}

	public function index()
	{
		$this->load->view('addTarea');
	}

	public function mostrarDatos(){
	 	$data['usuarios'] = $this->addTarea_model->obtenerUsuarios(); 
	 	$data['drones'] = $this->addComponent_model->obtenerTodosDrones(); 
	 	$this->load->view('addTarea',$data);
	}

}
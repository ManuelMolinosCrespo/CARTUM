<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichaComponente_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function FichaComponente_controller(){
		
		parent::__construct();
		 $this->load->model('fichaComponente_model');
	}

	public function index()
	{
		$this->load->view('fichaComponente');
	}

	 public function recibirdatos() {
		//Recogemos el id y lo pasamos al modelo
	 	$id = $this->input->post('id');
		
		//Llamamos al modelo 
	 	$this->fichaComponente_model->obtenerFicha($id);
	 }
	}
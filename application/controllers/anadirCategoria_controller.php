<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnadirCategoria_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function AnadirCategoria_controller(){
		
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('añadirCategoria');
	}

	public function recibirdatos() {
	 	//Recogemos nombre de la categoria para guardarlo en la bbdd
	 	$datos  =  $this->input->post('nombre_categoria')
		//Llamamos al modelo 
	 	$this->anadirCategoria_model->insertarCategoria($datos);
	 }
}
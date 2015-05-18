<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AñadirCategoria_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function AñadirCategoria_controller(){
		
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('añadirCategoria');
	}

	 public function recibirdatos() {
	 }
}
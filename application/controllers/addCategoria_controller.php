<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCategoria_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function AddCategoria_controller(){
		
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('addCategoria');
	}

	 public function recibirdatos() {
	 }
}
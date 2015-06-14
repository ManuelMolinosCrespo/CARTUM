<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddTarea_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function AddTarea_controller(){
		
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('addTarea');
	}

}
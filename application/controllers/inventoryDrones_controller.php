<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryDrones_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function InventoryDrones_controller(){
		
		parent::__construct();
		$this->load->model('inventoryDrones_model');
		$this->obtenerdatos();
	}

	public function index()
	{
	}

	public function obtenerdatos() {
	
	 	//Llamamos al modelo 
	 $data['datos'] = $this->inventoryDrones_model->obtenerDron(); 
	 $this->load->view('inventoryDrones',$data);
	}
}

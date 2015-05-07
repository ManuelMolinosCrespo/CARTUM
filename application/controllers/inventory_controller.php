<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function Inventory_controller(){
		
		parent::__construct();
		$this->load->model('inventory_model');
		$this->obtenerdatos();
	}

	public function index()
	{
		$this->load->view('inventory');
	}

	public function obtenerdatos() {
	
	 	//Llamamos al modelo 
	 $data['datos'] = $this->inventory_model->obtenerComponentes(); 
	 $this->load->view('inventory',$data);
	 }
}

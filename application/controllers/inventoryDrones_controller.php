<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryDrones_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function InventoryDrones_controller(){
		
		parent::__construct();
		$this->load->model('inventoryDrones_model');
		
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

	public function obtenerdatos() {
	
	 	//Llamamos al modelo 
	 $data['datos'] = $this->inventoryDrones_model->obtenerDron(); 
	 $this->load->view('inventoryDrones',$data);
	}
}

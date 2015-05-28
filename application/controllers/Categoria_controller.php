<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function Categoria_controller(){
		
		parent::__construct();
		 $this->load->model('Categoria_model');
		 $this->load->model('inventory_model');	
	}

	public function index()
	{
		$this->load->view('addCategoria');
	}

	public function insertarDatos() {
		//Obtenemos el nombre de la categoria de la vista
		$nombre = $this->input->post('nombre_categoria');
		//Llamamos al modelo para insertarlo
		$this->Categoria_model->insertarCategoria($nombre);
		$this->obtenerdatos();
	}

	public function eliminarDatos() {
		//Obtenemos el nombre de la categoria de la vista
		$nombre = $this->input->post('nombre_categoria');
		//Llamamos al modelo para insertarlo
		$this->Categoria_model->eliminarCategoria($nombre);
		$this->obtenerdatos();
	}

	public function mostrarCategoria(){
	 	$data['categorias'] = $this->categoria_model->mostrarCategoria(); 
	}

	public function obtenerdatos() {	
	 	//Llamamos al modelo 
	 $data['datos'] = $this->inventory_model->obtenerComponentes(); 
	 $this->load->view('inventory',$data);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function Categoria_controller(){
		
		parent::__construct();
		 $this->load->model('Categoria_model');
		
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
	 }

	 public function eliminarDatos() {
		//Obtenemos el nombre de la categoria de la vista
		$nombre = $this->input->post('nombre_categoria');
		//Llamamos al modelo para insertarlo
		$this->Categoria_model->eliminarCategoria($nombre);
	 }
}
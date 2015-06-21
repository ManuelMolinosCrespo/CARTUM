<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function Categoria_controller(){
		
		parent::__construct();
		 $this->load->model('categoria_model');
		 $this->load->model('inventory_model');	
	}

	public function index()
	{
		//Comprobamos que el user este autenticado
		if($this->session->userdata('Token')!= true){
			$this->load->view('login');
		}else{
			$this->mostrarCategoria();
		}
	}

	public function insertarDatos() {
		//Obtenemos el nombre de la categoria de la vista
		$nombre = $this->input->post('nombre_categoria');
		//Llamamos al modelo para insertarlo
		$this->categoria_model->insertarCategoria($nombre);
		$this->obtenerdatos();
	}

	public function eliminarDatos() {
		//Obtenemos el nombre de la categoria de la vista
		$nombre = $this->input->post('categoria');
		//Llamamos al modelo para insertarlo
		$this->categoria_model->eliminarCategoria($nombre);
		$this->obtenerdatos();
	}

	public function mostrarCategoria(){
	 	$data['categorias'] = $this->categoria_model->mostrarCategoria(); 
	 	$this->load->view('addCategoria',$data);
	}

	public function obtenerdatos() {	
	 	//Llamamos al modelo 
	 $data['datos'] = $this->inventory_model->obtenerComponentes(); 
	 $this->load->view('inventory',$data);
	}
}
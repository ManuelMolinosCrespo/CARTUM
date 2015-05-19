<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddComponent_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function AddComponent_controller(){
		
		parent::__construct();
		 $this->load->model('addComponent_model');
	}

	public function index()
	{
		$this->load->view('addComponent');
	}

	 public function recibirdatos() {
		//Recogemos los datos introducccidos por el usuario en un array y posteriormente los pasamos al modelo para guardarlos en la bbdd
	 	$datos = array(
	 		'idComponente' => $this->input->post('idComponente'),
	 		'nombre' => $this->input->post('nombre'),
			'fabricante' => $this->input->post('fabricante'),
			'categoria' => $this->input->post('categoria'),
			'prestaciones' => $this->input->post('prestaciones'),
			'peso' => $this->input->post('peso'),
			'estado' => $this->input->post('estado'),
			'fechaCompra' => $this->input->post('fechaCompra'),
			'fechaRetirada' => $this->input->post('fechaRetirada')

	 		);
		//Llamamos al modelo 
	 	$this->addComponent_model->insertarComponente($datos);
	 }
}

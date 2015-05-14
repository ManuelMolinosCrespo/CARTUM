<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarComponente_controller extends CI_Controller {

	//Creamos el contructor para cargar el modelo
	function EditarComponente_controller(){
		
		parent::__construct();
		$this->load->model('editarComponente_model');
	}
	 

	public function index()
	{
		$this->load->view('editarComponente');
	}

	//Recibimos los datos de la interfaz y se los pasaremos al modelo que es el encargado de guardarlos en la base de datos 
	public function recibirdatos() {

			$datos = array(
			'id' => $this->input->post('id'),
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
	 	$this->editarComponente_model->actualizarComponente($datos);
		}
	}
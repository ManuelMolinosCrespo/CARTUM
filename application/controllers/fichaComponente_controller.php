
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichaComponente_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function FichaComponente_controller(){
		
		parent::__construct();
		 $this->load->model('fichaComponente_model');
	}

	public function index()
	{
	}

	 public function recibirdatos() {
		//Recogemos el id y lo pasamos al modelo
	 	$id = $this->input->post('id');
		
		//Llamamos al modelo 
	 	$data['datos'] = $this->fichaComponente_model->obtenerFicha($id);
		
		$this->load->view('fichaComponente',$data);
	 }

	 //Esta funcion se llama si se desea elimar un usuario 
	public function eliminarComponente(){
		$id = $this->input->post('id');
		$this->fichaComponente_model->eliminarComponente($id);
	}
	}
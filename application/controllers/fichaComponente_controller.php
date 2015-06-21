
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichaComponente_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function FichaComponente_controller(){
		
		parent::__construct();
		 $this->load->model('fichaComponente_model');
		 $this->load->model('inventory_model');
	}

	public function index()
	{
		//Comprobamos que el user este autenticado
		if($this->session->userdata('Token')!= true){
			$this->load->view('login');
		}
	}

	public function recibirdatos() {
		//Recogemos el id y lo pasamos al modelo
		$id = $this->uri->segment(3);
		
		//Llamamos al modelo 
	 	$data['datos'] = $this->fichaComponente_model->obtenerFicha($id);
		
		$this->load->view('fichaComponente',$data);
	 }

	public function obtenerdatos() {
	 	//Llamamos al modelo 
	 $data['datos'] = $this->inventory_model->obtenerComponentes(); 
	 $this->load->view('inventory',$data);
	}

	 //Esta funcion se llama si se desea elimar un usuario 
	public function eliminarComponente(){
		$id = $this->uri->segment(3);
		$this->fichaComponente_model->eliminarComponente($id);
		$this->obtenerdatos();
	}
}
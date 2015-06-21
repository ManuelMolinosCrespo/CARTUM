
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichaTarea_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function FichaTarea_controller(){
		
		parent::__construct();
		 $this->load->model('fichaTarea_model');
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
	 	$data['datos'] = $this->fichaTarea_model->obtenerFicha($id);
		
		$this->load->view('fichaTarea',$data);
	 }

	public function obtenerdatos() {
	 	//Llamamos al modelo 
	 $data['datos'] = $this->calendar_model->obtenerTareas(); 
	 $this->load->view('calendar',$data);
	}

	 //Esta funcion se llama si se desea elimar un usuario 
	public function eliminarTarea(){
		$id = $this->uri->segment(3);
		$this->fichaTarea_model->eliminarTarea($id);
		$this->obtenerdatos();
	}
}
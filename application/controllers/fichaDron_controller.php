
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichaDron_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function FichaDron_controller(){
		
		parent::__construct();
		 $this->load->model('fichaDron_model');
		 $this->load->model('inventoryDrones_model');
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
	 	$data['datos'] = $this->fichaDron_model->obtenerFicha($id);
		
		$this->load->view('fichaDron',$data);
	 }

	public function obtenerdatos() {
	 	//Llamamos al modelo 
	 $data['datos'] = $this->inventoryDrones_model->obtenerDron(); 
	 $this->load->view('inventoryDrones',$data);
	}

	 //Esta funcion se llama si se desea elimar un dron
	public function eliminarDron(){
		$id = $this->uri->segment(3);
		$this->fichaDron_model->eliminarDron($id);
		$this->obtenerdatos();
	}

//SE MODIFICA PARA QUE SE AÑADA AUTOMATICAMEN AL AÑADIR HORAS 
	//public function incrementarVuelo(){
	//	$id = $this->uri->segment(3);
	//	$this->fichaDron_model->incrementarVuelo($id);
	//	$this->obtenerdatos();
		//Llamamos a la vista
	//}
}
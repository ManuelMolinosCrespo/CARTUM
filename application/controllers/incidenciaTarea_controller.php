
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IncidenciaTarea_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function IncidenciaTarea_controller(){
		
		parent::__construct();
		$this->load->model('calendar_model');
		$this->load->model('incidenciaTarea_model');
		
	}

	public function index()
	{
		if($this->session->userdata('Token')!= true){
			$this->load->view('login');
		}else{
			$this->obtenerdatos($this->uri->segment(3));
		}
	}


public function recibirdatos(){
 
		//Recibimos los datos de la vista
	 		$datos = array(
	 		'Fecha' => $this->input->post('fechaIncidencia'),
	 		'Resumen' => $this->input->post('resumen'),
	 	);
		//Llamamos al modelo para insertarlos 
	 	$this->incidenciaTarea_model->insertarIncidencia($datos);
	 }

public function obtenerdatos($id){
	 	//Llamamos al modelo 
	 $data['datos'] = $this->incidenciaTarea_model->obtenerIncidencia($id); 
	 $this->load->view('incidenciaTarea',$data);
	}	 
}
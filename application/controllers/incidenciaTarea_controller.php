
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IncidenciaTarea_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function IncidenciaTarea_controller(){
		
		parent::__construct();
		$this->load->model('calendar_model');
		$this->load->model('incidenciaTarea_model');
		$this->load->model('fichaTarea_model');
		
	}

	public function index()
	{
		if($this->session->userdata('Token')!= true){
			$this->load->view('login');
		}else{
			$this->session->set_userdata('idTareasIncidencias', $this->uri->segment(3));
			$this->obtenerdatos($this->session->userdata('idTareasIncidencias'));
		}
	}


public function recibirdatos(){
 
		//Recibimos los datos de la vista
	 	$datos = array(
	 		'idTareas' =>$this->session->userdata('idTareasIncidencias'),
	 		'Fecha' => $this->input->post('fechaIncidencia'),
	 		'Resumen' => $this->input->post('resumen'),
	 	);
		//Llamamos al modelo para insertarlos 
	 	$this->incidenciaTarea_model->insertarIncidencia($datos,$datos['idTareas']);
		$this->volverAnterior();
	 }

	public function obtenerdatos($id){
		 	//Llamamos al modelo 
		 $data['data'] = $this->incidenciaTarea_model->obtenerIncidencia($id); 
		 $this->load->view('incidenciaTarea',$data);
	}	 
	public function volverAnterior() {
		//Recogemos el id y lo pasamos al modelo
		$id =$this->session->userdata('idTareasIncidencias');
		
		//Llamamos al modelo 
	 	$data['datos'] = $this->fichaTarea_model->obtenerFicha($id);
		
		$this->load->view('fichaTarea',$data);
	}
}
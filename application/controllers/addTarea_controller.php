<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddTarea_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function AddTarea_controller(){
		
		parent::__construct();
		$this->load->model('addComponent_model');
		$this->load->model('addTarea_model');
		$this->load->model('calendar_model');
		
	}

	public function index()
	{
		if($this->session->userdata('Token')!= true){
			$this->load->view('login');
		}else{
			$this->mostrarDatos();
		}
	}

	public function mostrarDatos(){
	 	$data['usuarios'] = $this->addTarea_model->obtenerUsuarios(); 
	 	$data['drones'] = $this->addComponent_model->obtenerTodosDrones(); 
	 	$this->load->view('addTarea',$data);
	}

	public function obtenerdatos() {
	
	 	//Llamamos al modelo 
	 $data['datos'] = $this->calendar_model->obtenerTareas(); 
	 $this->load->view('calendar',$data);
	}

	public function recibirdatos(){
 
		//Recibimos los datos de la vista
	 		$datos = array(
	 		'Nombre' => $this->input->post('nombre'),
	 		'Descripcion' => $this->input->post('descripcion'),
	 		'Fecha_Inicio' => $this->input->post('fechaInicio'),
	 		'Fecha_Fin' => $this->input->post('fechaTope'),
	 		'DNI_Usuario_tareas' => $this->input->post('idUsuario'),
	 		'idDron_tareas' => $this->input->post('idDron')
	 	);
		//Llamamos al modelo para insertarlos 
	 	$this->addTarea_model->insertarTarea($datos);
	 	//Llamamos a la vista del calendario
	 	$this->obtenerdatos();

	}
}
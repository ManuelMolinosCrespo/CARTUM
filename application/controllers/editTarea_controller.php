<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditTarea_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function EditTarea_controller(){
		
		parent::__construct();
		$this->load->model('addComponent_model');
		$this->load->model('editTarea_model');
		//Guardamos el id de la tarea que nos pasan
		$this->session->set_userdata('idTareas', $this->uri->segment(3));
		
	}

	public function index()
	{
		//Comprobamos que el user este autenticado
		if($this->session->userdata('Token')!= true){
			$this->load->view('login');
		}else{
			$this->mostrarDatos();
		}
	}

	public function recibirdatos(){

 		//Recibimos los datos de la vista
	 		$datos = array(
	 		'id' = $this->session->userdata('idTareas∫');
	 		'Nombre' => $this->input->post('nombre'),
	 		'Descripcion' => $this->input->post('descripcion'),
	 		'Fecha_Inicio' => $this->input->post('fechaInicio'),
	 		'Fecha_Fin' => $this->input->post('fechaTope'),
	 		'DNI_Usuario_tareas' => $this->input->post('idUsuario'),
	 		'idDron_tareas' => $this->input->post('idDron')
	 	);
	 	//Borramos los datos del array si estan vacios para no actualizar un blanco
	 		if($this->input->post('nombre')==""){
	 			unset($datos['Nombre']);
	 		}
	 		if($this->input->post('fechaInicio')==""){
	 			unset($datos['Fecha_Inicio']);
	 		}
	 		if($this->input->post('descripcion')==""){
	 			unset($datos['Descripcion']);
	 		}
	 		if($this->input->post('fechaTope')==""){
	 			unset($datos['Fecha_Fin']);
	 		}
	 		if($this->input->post('idUsuario')==""){
	 			unset($datos['DNI_Usuario_tareas']);
	 		}
	 		if($this->input->post('idDron')==""){
	 			unset($datos['idDron_tareas']);
	 		}
	 		//Comprobamos que el array no este vacio y tengamos datos que actualizar
			if(empty($datos)){

			}else{
		//Llamamos al modelo 
 			$this->editTarea_model->editarTarea($datos);
 			}
	 
	 	//Llamamos a la vista del calendario  indiferentemente si hemos actualizado algo o no
	 	$this->load->view('calendar');
	}

}
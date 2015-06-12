<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HorasVuelos_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function HorasVuelos_controller(){
		
		parent::__construct();
		 $this->load->model('horasVuelos_model');
		 $this->load->model('fichaDron_model');
		 $this->session->set_userdata('idDron', $this->uri->segment(3));
	}

	public function index() {
		$this->load->view('horasVuelos');
		$this->session->set_userdata('idDronHorasVuelos', $this->uri->segment(3));
	}

	public function obtenerdatos($id) {	

		//Llamamos al modelo 
	 	$data['datos'] = $this->fichaDron_model->obtenerFicha($id);
		
		$this->load->view('fichaDron',$data);
	}

	public function recibirDatos(){
		$id = $this->session->userdata('idDron');
		$datos = array(
	 		'idDron' => $id = $this->session->userdata('idDronHorasVuelos'),
	 		'horas' => $this->input->post('horas_vuelo')
	 		);
		$this->horasVuelos_model->incrementarHorasVuelo($datos);
		$this->obtenerdatos($id);
	}


}
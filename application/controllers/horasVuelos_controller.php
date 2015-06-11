<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HorasVuelos_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function HorasVuelos_controller(){
		
		parent::__construct();
		 $this->load->model('horasVuelos_model');
	}

	public function index() {
		$this->load->view('horasVuelos');
		$this->session->set_userdata('idDronHorasVuelos', $this->uri->segment(3));
	}

	public function recibirDatos(){
		$datos = array(
	 		'idDron' => $id = $this->session->userdata('idDronHorasVuelos'),
	 		'horas' => $this->input->post('horas_vuelo')
	 		);
		$this->horasVuelos_model->incrementarHorasVuelo($datos);
	}


}
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
	}

	public function recibirDatos(){
		$datos = array(
	 		'idDron' => $this->uri->segment(3),
	 		'horas' => $this->input->post('horas_vuelo')
	 		);
	}


}
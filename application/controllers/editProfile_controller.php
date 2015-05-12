<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProfile_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function EditProfile_controller(){
		
		parent::__construct();
		
		
	}

	public function index()
	{
		$this->load->view('editProfile');
	}
}
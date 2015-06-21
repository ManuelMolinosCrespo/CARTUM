<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function Login_controller(){
		
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('editProfile_model');
		//Cargamos la libreria de text
		$this->load->library('unit_test');
	}

	public function index()
	{
		$this->load->view('login');
	}

	//Mostramos los datos del usuario actual
	public function mostrarDatosUser(){
		$data['datos'] = $this->editProfile_model->mostrarUsuario(); 
		$this->load->view('profile',$data);
	}

	public function recibirdatos() {
		//Recogemos el user, y la pass y la encriptamos
		$passSha1 = sha1($this->input->post('password'));
		$datos = array(
			'usuario' => $this->input->post('usuario'),
			'password' => $passSha1
			);
		//Llamamos al modelo, Si la autentificacion es correcta damos paso a la aplicacion y sino devolvemos al login
		if($this->login_model->obtenerPass($datos) == true){
			//Cargamos la pagina principal
			$this->session->set_userdata('usuario', $datos['usuario']);
			//Llamamos a la clase que realiza los test de caja blanca
			$this->testCajaBlanca($datos);
			$this->mostrarDatosUser();
			$this->session->set_userdata('Token', true);
		}else{
			$this->load->view('login');
		}
	}

	

	public function testCajaBlanca(){
		//Nuestro test solo permite 2 caminos de ejecucion, que el usuario se encuentre registrado, por lo que la funcion de la base de datos devolvera true, o que por el contrario no lo este y entonces devolvera false
		//Test correcto
		$test_name = "Test correcto";
		//Encriptamos la contraseña
		$passSha1 = sha1("1234");
		$datos = array(
			'usuario' => "71453688",
			'password' => $passSha1
			);
		
		$resultadoEsperado = true;
		//echo $this->unit->run($this->login_model->obtenerPass($datos), $resultadoEsperado, $test_name);


		$test_name = "Test erroneo";
		//Encriptamos la contraseña
		$passSha1 = sha1("1243");
		$datos = array(
			'usuario' => "71453688",
			'password' => $passSha1
			);
		
		$resultadoEsperado = false;
		//echo $this->unit->run($this->login_model->obtenerPass($datos), $resultadoEsperado, $test_name);

	}
}

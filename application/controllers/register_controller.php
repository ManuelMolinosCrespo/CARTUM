<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {

	//Creamos el contructor para cargar el modelo
	function Register_controller(){
		
		parent::__construct();
		$this->load->model('register_model');
	}
	 

	public function index()
	{
		$this->load->view('register');
	}

	//Recibimos los datos de la interfaz y se los pasaremos al modelo que es el encargado de guardarlos en la base de datos 
	public function recibirdatos() {
		//Si las contraseñas son iguales y todos los campos estan completos pasamos a registrar el usuario, en caso contrario devolvemos la pantalla de error 
		echo "VOY A RECIBIR DATOS";
		if($this->compararPass() == true &&  $this->datosCompletos() == true){
			//Pasamos la contraseña a sha1
			$passSha1 = sha1($this->input->post('password'));
		$datos = array(
			'usuario' => $this->input->post('dni_usuario'),
			'nombre' => $this->input->post('nombre'),
			'apellidos' => $this->input->post('apellidos'),
			'correo' => $this->input->post('correo'),
			'password' => $passSha1,
			'telefono' => $this->input->post('telefono')
			);
			//Llamamos al modelo 
			$this->register_model->insertarUsuario($datos);
			$this->load->view('login');
		}else{
			//Devolvemos la pantalla de error 
			$this->load->view('register');
		}
		
	}
	//En esta funcion comprobamos que las dos contraseñas del usuario son iguales.
	public function compararPass(){
		$pass = $this->input->post('password');
		$passRepetida = $this->input->post('repeat_password');
		if($pass == $passRepetida){
			//Las dos contraseñas son iguales
			return true;
		}else{
			return false;
		}
	}

	//Comprobamos que los datos no esten vacios
	public function datosCompletos(){
		if($this->input->post('dni_usuario') == ""){
			return false;
		}else if($this->input->post('nombre') == ""){
			return false;
		}else if($this->input->post('apellidos') == ""){
			return false;
		}else if($this->input->post('correo') == ""){
			return false;
		}else if($this->input->post('telefono') == ""){
			return false;
		}else{
			return true;
		}
	}
	public function do_upload()
{
    echo "HOLIII";
    $config['upload_path'] = './galeria/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']    = '100';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';
 	
    
    // You can give video formats if you want to upload any video file.
 
// You can give video formats if you want to upload any video file.
 
    $this->load->library('upload', $config);
 
    if ( ! $this->upload->do_upload())
    {
        $error = array('error' => $this->upload->display_errors());
        // uploading failed. $error will holds the errors.
    }
    else
    {
        $data = array('upload_data' => $this->upload->data());
 			echo "Pues intentando guardar tete";
        // uploading successfull, now do your further actions
    }
 }


}
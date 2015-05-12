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

			 //Seleccionamos la carpeta donde queremos guardarla
		    $config['upload_path'] = './galeria/';
		    //Seleccionamos los formatos permitidos
		    $config['allowed_types'] = 'gif|jpg|png|jpeg';
		    //Seleccionamos el tamaño y las medidas maximas
		    $config['max_size']    = '2000';
		    $config['max_width']  = '2000';
		    $config['max_height']  = '2000';
		   	//Cambiamos el nombre original por el dni del user de esta forma nos aseguramos no guardar nunca dos imagenes iguales
		    $config['file_name'] = $this->input->post('dni_usuario');
		 
		 	//Llamamos a la libreria encargada de subir la imagen y realizamos el proceso. Si hubiera algun error se mostraria por pantalla d
		    $this->load->library('upload', $config);
		 
		    if ( ! $this->upload->do_upload())
		    {
		        $error = array('error' => $this->upload->display_errors());
		    }
		    else
		    {
		        $data = array('upload_data' => $this->upload->data());		
			}

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
		}else{
			return true;
		}
	}
	

// 	//Esta funcion es la encargada de guardar la imagen en el servidor, y cambiar el nombre de la misma por el dni del user
// 	public function subirImagen()
// {
//     //Seleccionamos la carpeta donde queremos guardarla
//     $config['upload_path'] = './galeria/';
//     //Seleccionamos los formatos permitidos
//     $config['allowed_types'] = 'gif|jpg|png|jpeg';
//     //Seleccionamos el tamaño y las medidas maximas
//     $config['max_size']    = '2000';
//     $config['max_width']  = '2000';
//     $config['max_height']  = '2000';
//    	//Cambiamos el nombre original por el dni del user de esta forma nos aseguramos no guardar nunca dos imagenes iguales
//     $config['file_name'] = $this->input->post('dni_usuario');
 
//  	//Llamamos a la libreria encargada de subir la imagen y realizamos el proceso. Si hubiera algun error se mostraria por pantalla d
//     $this->load->library('upload', $config);
 
//     if ( ! $this->upload->do_upload())
//     {
//         $error = array('error' => $this->upload->display_errors());
//     }
//     else
//     {
//         $data = array('upload_data' => $this->upload->data());
 			
//  }
// }

}
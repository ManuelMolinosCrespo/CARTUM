<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProfile_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function EditProfile_controller(){
		
		parent::__construct();
		$this->load->model('editProfile_model');
	}

	public function index()
	{
		$this->load->view('editprofile');
	}

	public function recibirdatos() {
		//Recogemos Los datos modificados por el usuario y llamamos al modelo para actualizarlos. En el caso que la nueva contraseña se aceptada
		if($this->compararPass() == true){
		 	//Pasamos la contraseña a sha1
			 //Seleccionamos la carpeta donde queremos guardar la imagen
		    $config['upload_path'] = './imguser/';
		    //Seleccionamos los formatos permitidos
		    $config['allowed_types'] = 'gif|jpg|png|jpeg';
		    //Seleccionamos el tamaño y las medidas maximas
		    $config['max_size']    = '2000';
		    $config['max_width']  = '2000';
		    $config['max_height']  = '2000';
		    //Hacemos que se sobrescriba la imagen actual
		    $config['overwrite'] = 'TRUE';
		   	//Cambiamos el nombre original por el dni del user de esta forma nos aseguramos no guardar nunca dos imagenes iguales
		    $config['file_name'] = $this->session->userdata('usuario');
		 
		 	//Llamamos a la libreria encargada de subir la imagen y realizamos el proceso. Si hubiera algun error se mostraria por pantalla d
		    $this->load->library('upload', $config);
		 
		    if ( ! $this->upload->do_upload())
		    {
		        $error = array('error' => $this->upload->display_errors());
		        
		    }
		    else
		    {
		    	
		         $data = $this->upload->data();	
			}
		 	$passSha1 = sha1($this->input->post('password'));
			
			
			$datos = array(
				'correo_electronico' => $this->input->post('correo'),
	 			'telefono_usuario' => $this->input->post('telefono'),
				//La URl de la imagen no la actualizamos poque va a ser la misma
	 			'contraseña' => $passSha1
	 		);

			//Borramos los datos del array si estan vacios para no actualizar un blanco
	 		if($this->input->post('correo')==""){
	 			unset($datos['correo_electronico']);
	 		}
	 		if($this->input->post('telefono')==""){
	 			unset($datos['telefono_usuario']);
	 		}
	 		if($this->input->post('password')==""){
	 			unset($datos['contraseña']);
	 		}
			//Comprobamos que el array no este vacio y tengamos datos que actualizar
			if(empty($datos)){

			}else{
					//Llamamos al modelo 
					$this->editProfile_model->actualizarUsuario($datos);	
			}
	 
			$this->mostrarDatosUser();
		}else{
		 	//Devolvemos la pantalla de error 
			$this->load->view('editProfile');
		}
	}

	public function mostrarDatosUser(){
		$data['datos'] = $this->editProfile_model->mostrarUsuario(); 
		$this->load->view('profile',$data);
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
}

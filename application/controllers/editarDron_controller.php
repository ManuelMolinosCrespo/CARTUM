<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarDron_controller extends CI_Controller {

	
	//Creamos el contructor para cargar el modelo
	function EditarDron_controller(){
		parent::__construct();
		$this->load->model('editarDron_model');
		$this->load->model('fichaDron_model');
	} 

	public function index()
	{
		//Comprobamos que el user este autenticado
		if($this->session->userdata('Token')!= true){
			$this->load->view('login');
		}else{
			//$data['categorias'] = $this->categoria_model->mostrarTodasCategorias(); 
			$this->load->view('editarDron');
			$this->session->set_userdata('idDron', $this->uri->segment(3));
		}
		
	}

	public function obtenerdatos($id) {	

		//Llamamos al modelo 
	 	$data['datos'] = $this->fichaDron_model->obtenerFicha($id);
		
		$this->load->view('fichaDron',$data);
	}

	//Recibimos los datos de la interfaz y se los pasaremos al modelo que es el encargado de guardarlos en la base de datos 
	public function recibirdatos() {
		$id = $this->session->userdata('idDron');
		$config['upload_path'] = './imgdrones/';
	    //Seleccionamos los formatos permitidos
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    //Seleccionamos el tamaño y las medidas maximas
	    $config['max_size']    = '2000';
	    $config['max_width']  = '2000';
	    $config['max_height']  = '2000';
	    $config['overwrite'] = 'TRUE';
	   	//Cambiamos el nombre original por el dni del user de esta forma nos aseguramos no guardar nunca dos imagenes iguales
	    $config['file_name'] = $id;
	 
	 	//Llamamos a la libreria encargada de subir la imagen y realizamos el proceso. Si hubiera algun error se mostraria por pantalla d
	    $this->load->library('upload', $config);
	 
	    if ( ! $this->upload->do_upload())
	    {
	        $error = array('error' => $this->upload->display_errors());
	         $data['file_ext'] = '';
	    }
	    else
	    {
	    	
	         $data = $this->upload->data();	
	         
		}
		
		$datos = array(
			'idDron' => $id,
	 		'Nombre_dron' => $this->input->post('nombre'),
			'Fabricante_dron' => $this->input->post('fabricante'),
			'Categoria_dron' => $this->input->post('categoria'),
			'Prestaciones_dron' => $this->input->post('prestaciones'),
			'Peso_dron' => $this->input->post('peso'),
			'Estado_dron' => $this->input->post('estado'),
			'Fecha_Montaje_dron' => $this->input->post('fechaMontaje'),
			'FotoURL_dron' => "http://localhost/CARTUM/imgdrones/".$config['file_name'].$data['file_ext'],
			'Fecha_Retirada_dron' => $this->input->post('fechaRetirada'),
			
		);

		//Borramos los datos del array si estan vacios para no actualizar un blanco
	 		if($this->input->post('nombre')==""){
	 			unset($datos['Nombre_dron']);
	 		}
	 		if($this->input->post('fabricante')==""){
	 			unset($datos['Fabricante_dron']);
	 		}
	 		if($this->input->post('Categoria')==""){
	 			unset($datos['Categoria_dron']);
	 		}
	 		if($this->input->post('prestaciones')==""){
	 			unset($datos['Prestaciones_dron']);
	 		}
	 		if($this->input->post('peso')==""){
	 			unset($datos['Peso_dron']);
	 		}
	 		if($this->input->post('estado')==""){
	 			unset($datos['Estado_dron']);
	 		}
	 		if($this->input->post('fechaMontaje')==""){
	 			unset($datos['Fecha_Montaje_dron']);
	 		}
	 		if($this->input->post('fechaRetirada')==""){
	 			unset($datos['Fecha_Retirada_dron']);
	 		}
	 		//Si la extension esta vacia significa que el user no subio ninguna imagen y por tanto no se actualiza
	 		if($data['file_ext'] == ''){
	 			unset($datos['FotoURL_dron']);
	 		}
	 		//Comprobamos que el array no este vacio y tengamos datos que actualizar
			if(empty($datos)){

			}else{
				//Llamamos al modelo 
 				$this->editarDron_model->actualizarDron($datos);
 	
 			}
 	$this->obtenerdatos($id);
	}
}
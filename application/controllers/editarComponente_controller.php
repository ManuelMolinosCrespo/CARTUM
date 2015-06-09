<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarComponente_controller extends CI_Controller {

	
	//Creamos el contructor para cargar el modelo
	function EditarComponente_controller(){
		parent::__construct();
		$this->load->model('editarComponente_model');
		$this->load->model('categoria_model');
		$this->load->model('fichaComponente_model');
	} 

	public function index()
	{
		$data['categorias'] = $this->categoria_model->mostrarTodasCategorias(); 
		$this->load->view('editarComponente',$data);
		$this->session->set_userdata('idComponente', $this->uri->segment(3));
		
	}

	public function obtenerdatos($id) {	

		//Llamamos al modelo 
	 	$data['datos'] = $this->fichaComponente_model->obtenerFicha($id);
		
		$this->load->view('fichaComponente',$data);
	}

	//Recibimos los datos de la interfaz y se los pasaremos al modelo que es el encargado de guardarlos en la base de datos 
	public function recibirdatos() {
		$id = $this->session->userdata('idComponente');
		echo $id;
		$config['upload_path'] = './imgcomponentes/';
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
	        
	    }
	    else
	    {
	    	
	         $data = $this->upload->data();	
	         
		}
		
		$datos = array(
			'idComponente' =>  $id,
			'Nombre_componente' => $this->input->post('nombre'),
			'Fabricante_componente' => $this->input->post('fabricante'),
			'Categoria' => $this->input->post('categoria'),
			'Prestaciones_componente' => $this->input->post('prestaciones'),
			'Peso_componente' => $this->input->post('peso'),
			'Estado_componente' => $this->input->post('estado'),
			'Fecha_Compra' => $this->input->post('fechaCompra'),
			'Activo_Inactivo' => $this->input->post('activo_inactivo'),
			'Fecha_Retirada' => $this->input->post('fechaRetirada'),
		);

		//Borramos los datos del array si estan vacios para no actualizar un blanco
	 		if($this->input->post('nombre')==""){
	 			unset($datos['Nombre_componente']);
	 		}
	 		if($this->input->post('fabricante')==""){
	 			unset($datos['Fabricante_componente']);
	 		}
	 		if($this->input->post('categoria')==""){
	 			unset($datos['Categoria']);
	 		}
	 		if($this->input->post('prestaciones')==""){
	 			unset($datos['Prestaciones_componente']);
	 		}
	 		if($this->input->post('peso')==""){
	 			unset($datos['Peso_componente']);
	 		}
	 		if($this->input->post('estado')==""){
	 			unset($datos['Estado_componente']);
	 		}
	 		if($this->input->post('fechaCompra')==""){
	 			unset($datos['Fecha_Compra']);
	 		}
	 		if($this->input->post('fechaRetirada')==""){
	 			unset($datos['Fecha_Retirada']);
	 		}
	 		//Comprobamos que el array no este vacio y tengamos datos que actualizar
			if(empty($datos)){

			}else{
		//Llamamos al modelo 
 			$this->editarComponente_model->actualizarComponente($datos);
 			}
 	$this->obtenerdatos($id);
	}
}
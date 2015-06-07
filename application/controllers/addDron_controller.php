<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddDron_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function AddDron_controller(){
		
		parent::__construct();
		 $this->load->model('addDron_model');

	}

	public function index()
	{
		$this->mostrarCategoria();
	}

	public function recibirdatos() {
		    $config['upload_path'] = './imgdrones/';
		    //Seleccionamos los formatos permitidos
		    $config['allowed_types'] = 'gif|jpg|png|jpeg';
		    //Seleccionamos el tamaño y las medidas maximas
		    $config['max_size']    = '2000';
		    $config['max_width']  = '2000';
		    $config['max_height']  = '2000';
		   	//Cambiamos el nombre original por el dni del user de esta forma nos aseguramos no guardar nunca dos imagenes iguales
		    $config['file_name'] = $this->input->post('idDron');
		 
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

		//Recogemos los datos introducccidos por el usuario en un array y posteriormente los pasamos al modelo para guardarlos en la bbdd
	 	$datos = array(
	 		'idDron' => $this->input->post('idDron'),
	 		'Nombre' => $this->input->post('nombre'),
			'Fabricante' => $this->input->post('Fabricante'),
			'Categoria' => $this->input->post('Categoria'),
			'Prestaciones' => $this->input->post('Prestaciones'),
			'Peso' => $this->input->post('Peso'),
			'Estado' => $this->input->post('Estado'),
			'Fecha_Montaje' => $this->input->post('fechaMontaje'),
			'Fecha_Retirada' => $this->input->post('fechaRetirada'),
			'foto' => "http://localhost/CARTUM/imgdrones/".$config['file_name'].$data['file_ext']
	 	);
		//Llamamos al modelo 
	 	$this->addDron_model->insertarDron($datos);

	}


}

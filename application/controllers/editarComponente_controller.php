<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarComponente_controller extends CI_Controller {



	//Creamos el contructor para cargar el modelo
	function EditarComponente_controller(){
		
		parent::__construct();
		$this->load->model('editarComponente_model');
	}
	 

	public function index()
	{

		$this->load->view('editarComponente');
	}

	//Recibimos los datos de la interfaz y se los pasaremos al modelo que es el encargado de guardarlos en la base de datos 
	public function recibirdatos() {
	
		 $config['upload_path'] = './imgcomponentes/';
		    //Seleccionamos los formatos permitidos
		    $config['allowed_types'] = 'gif|jpg|png|jpeg';
		    //Seleccionamos el tamaño y las medidas maximas
		    $config['max_size']    = '2000';
		    $config['max_width']  = '2000';
		    $config['max_height']  = '2000';
		   	//Cambiamos el nombre original por el dni del user de esta forma nos aseguramos no guardar nunca dos imagenes iguales
		    $config['file_name'] = $this->input->post('idComponente');
		 
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
			'idComponente' =>  $this->uri->segment(3),
			'Nombre_componente' => $this->input->post('nombre'),
			'Fabricante_componente' => $this->input->post('fabricante'),
			'Categoria' => $this->input->post('categoria'),
			'Prestaciones_componente' => $this->input->post('prestaciones'),
			'Peso_componente' => $this->input->post('peso'),
			'Estado_componente' => $this->input->post('estado'),
			'Fecha_Compra' => $this->input->post('fechaCompra'),
			'Fecha_Retirada' => $this->input->post('fechaRetirada'),
			'fotoURL_componente'=> "http://localhost/CARTUM/imgcomponentes/".$config['file_name']
			);
			//Llamamos al modelo 
	 	$this->editarComponente_model->actualizarComponente($datos);
		}
	}
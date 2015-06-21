<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddComponent_controller extends CI_Controller {


	//Creamos el contructor para cargar el modelo
	function AddComponent_controller(){
		
		parent::__construct();
		 $this->load->model('addComponent_model');
		 $this->load->model('inventory_model');
		 $this->load->model('categoria_model');
	}

	public function index()
	{
		if($this->session->userdata('Token')!= true){
			$this->load->view('login');
		}else{
			$this->mostrarCategoria();
		}
	}

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
		        $data['file_ext'] = '';
		        
		    }
		    else
		    {
		    	
		         $data = $this->upload->data();	
		         
			}

		//Recogemos los datos introducccidos por el usuario en un array y posteriormente los pasamos al modelo para guardarlos en la bbdd
	 	// Si el usuario no monta el componente en un dron, no insertamos el idDron
	 	if( $this->input->post('idDron') == ""){
	 		$datos = array(
	 		'idComponente' => $this->input->post('idComponente'),
	 		'nombre' => $this->input->post('nombre'),
			'fabricante' => $this->input->post('fabricante'),
			'categoria' => $this->input->post('categoria'),
			'prestaciones' => $this->input->post('prestaciones'),
			'peso' => $this->input->post('peso'),
			'estado' => $this->input->post('estado'),
			'activo_inactivo' => $this->input->post('estado'),
			'fechaCompra' => $this->input->post('fechaCompra'),
			'fechaRetirada' => $this->input->post('fechaRetirada'),
			'foto' => "http://localhost/CARTUM/imgcomponentes/".$config['file_name'].$data['file_ext']

	 	);
	 		echo $this->input->post('idDron');
	 			//Llamamos al modelo 
	 		$this->addComponent_model->insertarComponenteSinDron($datos);
			$this->obtenerdatos();
	 	}else{
	 		$datos = array(
	 		'idComponente' => $this->input->post('idComponente'),
	 		'nombre' => $this->input->post('nombre'),
			'fabricante' => $this->input->post('fabricante'),
			'categoria' => $this->input->post('categoria'),
			'prestaciones' => $this->input->post('prestaciones'),
			'peso' => $this->input->post('peso'),
			'estado' => $this->input->post('estado'),
			'activo_inactivo' => $this->input->post('estado'),
			'fechaCompra' => $this->input->post('fechaCompra'),
			'idDronActual' => $this->input->post('idDron'),
			'fechaRetirada' => $this->input->post('fechaRetirada'),
			'foto' => "http://localhost/CARTUM/imgcomponentes/".$config['file_name'].$data['file_ext']
	 	);
	 			//Llamamos al modelo 
	 		$this->addComponent_model->insertarComponente($datos);
			$this->obtenerdatos();
	 	}
	 	
	
	 	
	}

	public function obtenerdatos() {
	 	//Llamamos al modelo 
		$data['datos'] = $this->inventory_model->obtenerComponentes(); 
		$this->load->view('inventory',$data);
	}

	public function mostrarCategoria(){
	 	$data['categorias'] = $this->categoria_model->mostrarTodasCategorias(); 
	 	$data['drones'] = $this->addComponent_model->obtenerTodosDrones(); 
	 	$this->load->view('addComponent',$data);
	}

}

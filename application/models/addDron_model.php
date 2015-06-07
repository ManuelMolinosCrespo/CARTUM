<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddDron_model extends CI_Model {
	function AddDron_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}

	//Recibimos los datos del componente y los insertamos en la base de datos 
	function insertarDron($datos){
		$this->db->insert('Drones',array('idDron'=> $datos['idDron'],'Nombre_dron' => $datos['Nombre_dron'], 'Fabricante_dron'=> $datos['Fabricante_dron'],'Categoria_dron'=> $datos['Categoria_dron'],'Prestaciones_dron'=> $datos['Prestaciones_dron'],'Peso_dron'=> $datos['Peso_dron'],'Estado_dron'=> $datos['Estado_dron'], 'Fecha_Montaje_dron'=> $datos['Fecha_Montaje_dron'],'Fecha_Retirada_dron'=> $datos['Fecha_Retirada_dron'],'FotoURL_dron'=> $datos['FotoURL_dron'] ));
	}
}
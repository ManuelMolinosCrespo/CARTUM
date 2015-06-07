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
		$this->db->insert('Drones',array('idDron'=> $datos['idDron'],'Nombre_dron' => $datos['nombre'], 'Fabricante_dron'=> $datos['fabricante'],'Categoria'=> $datos['categoria'],'Prestaciones_dron'=> $datos['prestaciones'],'Peso_dron'=> $datos['peso'],'estado_dron'=> $datos['estado'], 'Fecha_Montaje'=> $datos['Fecha_Montaje'],'Fecha_Retirada'=> $datos['fechaRetirada'],,'FotoURL_componente'=> $datos['foto'] ));
	}
}
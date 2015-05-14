<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddComponent_model extends CI_Model {
	function AddComponent_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}

	//Recibimos los datos del componente y los insertamos en la base de datos 
	function insertarComponente($datos){
		$this->db->insert('Componentes',array('Nombre_componente' => $datos['nombre'], 'Fabricante_componente'=> $datos['fabricante'],'Categoria'=> $datos['categoria'],'Prestaciones_componente'=> $datos['prestaciones'],'Peso_componente'=> $datos['peso'],'Fecha_Compra'=> $datos['fechaCompra'],'Fecha_Retirada'=> $datos['fechaRetirada']));
	}
}
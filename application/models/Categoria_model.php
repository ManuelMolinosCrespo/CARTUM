<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categoria_model extends CI_Model {
	function Categoria_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();
	}

	//Recibimos los datos del usuario para guardarlos en la base de datos
	function insertarCategoria($nombre){
		//Añadimos la nueva categoria a la bbdd
		 $arrayNombre = array(
        'Nombre_categoria' => $nombre);
		$this->db->insert('Categorias_Componentes', $arrayNombre);
	}

	function eliminarCategoria($nombre){
		//Añadimos la nueva categoria a la bbdd
		 $arrayNombre = array(
        'Nombre_categoria' => $nombre);
		$this->db->where('Nombre_categoria',$arrayNombre);
		return $this->db->delete('Categorias_Componentes');
	}
}
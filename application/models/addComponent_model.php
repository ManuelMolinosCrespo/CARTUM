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
		$this->db->insert('Componentes',array('idComponente'=> $datos['idComponente'],'Nombre_componente' => $datos['nombre'], 'Fabricante_componente'=> $datos['fabricante'],'Categoria'=> $datos['categoria'],'Prestaciones_componente'=> $datos['prestaciones'],'Peso_componente'=> $datos['peso'],'estado_componente'=> $datos['estado'], 'Fecha_Compra'=> $datos['fechaCompra'],'Fecha_Retirada'=> $datos['fechaRetirada'], 'idDronActual' => $datos['idDronActual'],'Activo_Inactivo'=> $datos['estado'],'FotoURL_componente'=> $datos['foto'] ));
	}

	function insertarComponenteSinDron($datos){
		$this->db->insert('Componentes',array('idComponente'=> $datos['idComponente'],'Nombre_componente' => $datos['nombre'], 'Fabricante_componente'=> $datos['fabricante'],'Categoria'=> $datos['categoria'],'Prestaciones_componente'=> $datos['prestaciones'],'Peso_componente'=> $datos['peso'],'estado_componente'=> $datos['estado'], 'Fecha_Compra'=> $datos['fechaCompra'],'Fecha_Retirada'=> $datos['fechaRetirada'], 'Activo_Inactivo'=> $datos['estado'],'FotoURL_componente'=> $datos['foto'] ));
	}

	public function obtenerTodosDrones(){
		//Realizamos la consulta de todos los datos
      $this->db->select('idDron');
      $this->db->from('Drones');
      $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}
}
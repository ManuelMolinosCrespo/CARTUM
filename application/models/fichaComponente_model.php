<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FichaComponente_model extends CI_Model {
	function FichaComponente_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();

	}
	

	public function obtenerFicha($id){
	 //Realizamos la consulta de los datos 
      $this->db->select('k.Nombre,c.Nombre,c.Fabricante,c.Prestaciones,c.Peso,c.[horas de vuelo],c.Fecha_Compra,c.Fecha_Retirada,c.Numero_vuelos_Realizados,c.Estado,c.idDronActual,c.idComponente');
      $this->db->from('Componentes c');
      $this->db->join('Categorias_Componentes k', 'c.categoria = k.idCategoria');
      $query= $this->db->get();
		if($query->num_rows()> 0){
			//Si no ha habia error, llamamos a la funcion que nos compara las contraseñas
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}
}
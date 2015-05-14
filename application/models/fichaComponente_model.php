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
      $this->db->select('k.Nombre_componente,c.Nombre_categoria,c.Fabricante_componente,c.Prestaciones_componente,c.Peso_componente,c.Horas_Vuelo_componente,c.Fecha_Compra,c.Fecha_Retirada,c.Numero_vuelos_Realizados_componente,c.Estado_componente,c.idDronActual,c.idComponente');
      $this->db->from('Componentes c');
      $this->db->join('Categorias_Componentes k', 'c.categoria = k.idCategoria');
      $this->db->where('idComponente = '+$id);
      $query= $this->db->get();
		if($query->num_rows()> 0){
			//Si no ha habia error, llamamos a la funcion que nos compara las contraseñas
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}

	function eliminarComponente($id){
		$this->db->where('idComponente',$id);
		return $this->db->delete('Componentes');
	}
}
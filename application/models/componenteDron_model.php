<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ComponenteDron_model extends CI_Model {

	function ComponenteDron_model(){
		//Llamamos al contructor del padre
		parent::__construct();
		//Cargamos la base de datos
		$this->load->database();

	}
	

	public function obtenerComponentes($id){
	 //Realizamos al aconsulta de los datos 
      $this->db->select('k.Nombre_categoria,c.Nombre_componente,c.Estado_componente,c.idDronActual,c.idComponente');
      $this->db->from('Componentes c');
	  $this->db->where('idDronActual',$id);
      $this->db->join('Categorias_Componentes k', 'c.categoria = k.idCategoria');
      $query= $this->db->get();
		if($query->num_rows()> 0){
			
			$resultado = $query->result();
			
			return $resultado;
			}else{
				return false;
			}
	}
}
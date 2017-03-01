<?php 


class Perfilx extends CI_Model {

	function __construct() {
		parent::__construct();
	}	

	function getPerfil($id) 
	{

		$this->db->select('imagem');
		$this->db->from('administrador');	
		$this->db->where('cod',$id);
		$this->db->limit(1);

	  	return $this->db->get()->result_array();      	  	

	}


}

?>
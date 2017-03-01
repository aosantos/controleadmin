<?php 

class Cliente extends CI_Model {

	function __construct() {
		parent::__construct();
	}	

	function getCliente($usuario) 
	{

		$this->db->select();

		$this->db->from('administrador');
		$this->db->where(array('nome' => $usuario));
	  	
	  	return $this->db->get()->result_array();      	
      	//echo $this->db->last_query();

	}

}

?>
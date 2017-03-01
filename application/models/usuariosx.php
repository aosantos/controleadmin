<?php

class Usuariosx extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function alterar_cadastro($cod) {
        $this->db->select();
        $this->db->from('administrador');
        $this->db->where('cod', $cod );
        $data = $this->db->get()->result();
        return $data[0];
        
    }
   
    function usuarios(){
        $cod = $this->session->userdata('cod');
        $this->db->select();
        $this->db->from('administrador');
        $this->db->where('cod',$cod);
        return $this->db->get()->result_array();
        
    }
      function remover($cod) {

        $this->db->where('cod', $cod);
        $this->db->delete('administrador');
    }
}
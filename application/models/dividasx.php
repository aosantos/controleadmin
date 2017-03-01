<?php
class Dividasx extends CI_Model {

    function __construct() {
        parent::__construct();
    }
          
function list_dividas() {
        
        $this->load->library('session');
        $cod = $this->session->userdata('cod');
        $this->db->select('controle_dividas.cod,administrador_cod,data_dividas,entrada,novaentrada,saldo,observacao');
        $this->db->from('controle_dividas');
        $this->db->join(' administrador','controle_dividas.administrador_cod = administrador.cod','inner');
        $this->db->where('administrador_cod',$cod);
	$this->db->order_by("data_dividas", "DESC");
        
        return $this->db->get()->result_array();
        
    }
      public function edita($id) {
        $codigo = $this->session->userdata('cod');
        $this->db->select();
        $this->db->from('controle_dividas');
        $this->db->where('cod', $id );
        $this->db->where('administrador_cod', $codigo );
        $data = $this->db->get()->result();
       
        return $data[0];
        
    }
     function dividasremover($dividas) {

        $this->db->where('cod', $dividas);
        $this->db->delete('controle_dividas');
    }
    
     function soma_dividas() {
        
        $this->load->library('session');
        $cod = $this->session->userdata('cod');
        $this->db->select_sum('saldo');
        $this->db->from('controle_dividas');
        $this->db->where('administrador_cod',$cod);
        $this->db->order_by("cod", "ASC");

        return $this->db->get()->result_array();
    }
    
    
}

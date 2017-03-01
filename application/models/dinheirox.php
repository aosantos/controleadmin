<?php

class Dinheirox extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_dinheiro($pular=null,$produtos=null) {
        
        $this->load->library('session');
        $cod = $this->session->userdata('cod');
        $this->db->select('dinheiro.cod,administrador_cod,entrada,saida,saldo,relatorio,novasaida,ano');
        $this->db->from('dinheiro');
        $this->db->join(' administrador','dinheiro.administrador_cod = administrador.cod','inner');
        $this->db->where('administrador_cod',$cod);
	$this->db->order_by("ano", "DESC");
        
        if($pular && $produtos){
			$this->db->limit($produtos,$pular);
		}
		else{
			$this->db->limit(12);
		}
        return $this->db->get()->result_array();
        
    }
    
    function excel(){
        $cod = $this->session->userdata('cod');
        $this->db->select('dinheiro.cod,administrador_cod,entrada,saida,saldo,relatorio,novasaida,ano');
        $this->db->from('dinheiro');
        $this->db->join(' administrador','dinheiro.administrador_cod = administrador.cod','inner');
        $this->db->where('administrador_cod',$cod);
	$this->db->order_by("ano", "DESC");
        return $this->db->get()->result_array();
        
    }
    
    function soma_saldo() {
        
        $this->load->library('session');
        $cod = $this->session->userdata('cod');
        $this->db->select_sum('saldo');
        $this->db->from('dinheiro');
        $this->db->where('administrador_cod',$cod);
        $this->db->order_by("cod", "ASC");

        return $this->db->get()->result_array();
    }
    
    function removeDinheiro($dinheiro) {

        $this->db->where('cod', $dinheiro);
        $this->db->delete('dinheiro');
    }

    public function edita($id) {
        $cod = $this->session->userdata('cod');
        $this->db->select();
        $this->db->from('dinheiro');
        $this->db->where('cod', $id );
        $this->db->where('administrador_cod', $cod );
        $data = $this->db->get()->result();
        
        return $data[0];
        
    }
    
    public function contar(){
		return $this->db->count_all('dinheiro');
                
	}
        public function contartipogastos(){
            return $this->db->count_all('contas');
        }
      
        public function  contacadastrodegasto(){
        $cod = $this->session->userdata('cod');
        $this->db->select('dinheiro.cod,administrador_cod,entrada,saida,saldo,relatorio,novasaida,ano');
        $this->db->from('dinheiro');
        $this->db->join(' administrador','dinheiro.administrador_cod = administrador.cod','inner');
        $this->db->where('administrador_cod',$cod);
	$this->db->order_by("ano", "DESC");
	
            return $this->db->count_all_results();
        }
                
        function listatipogastos($pular=null,$produtos=null){
            
        $this->load->library('session');
        $datainicio = "01/" . date("01") ."/" . date("Y");
        $datafim    = "12/" . date("31") ."/" . date("Y");
        $cod = $this->session->userdata('cod');
        $this->db->select('contas.cod,administrador_cod,contas,dinheiro_ano,total,nome');
        $this->db->from('contas');
        $this->db->join(' administrador','contas.administrador_cod = administrador.cod','inner');
        $this->db->where('administrador_cod',$cod);
        $this->db->where('dinheiro_ano BETWEEN "'. date('Y-m-d', strtotime($datainicio)). '" and "'. date('Y-m-d', strtotime($datafim)).'"');
        
        if($pular && $produtos){
			$this->db->limit($produtos,$pular);
		}
		else{
			$this->db->limit(10);
		}
	return $this->db->get()->result_array();
            
        }
        
        function contagastos($contas){
            
        $this->load->library('session');
        $datainicio = "01/" . date("01") ."/" . date("Y");
        $datafim    = "12/" . date("31") ."/" . date("Y");
        
        $cod = $this->session->userdata('cod');
        $this->db->select('contas.cod,administrador_cod,contas,dinheiro_ano,total,nome');
        $this->db->select_sum('total');
        $this->db->from('contas');
        $this->db->where('contas',$contas);
        $this->db->join(' administrador','contas.administrador_cod = administrador.cod','inner');
        $this->db->where('administrador_cod',$cod);
        $this->db->where('dinheiro_ano BETWEEN "'. date('Y-m-d', strtotime($datainicio)). '" and "'. date('Y-m-d', strtotime($datafim)).'"');
        $this->db->order_by("cod", "ASC");
        $data = $this->db->get()->result_array();
        
            return $data;
            
        }
        public function alterar_cadastro($cod) {
        $this->db->select();
        $this->db->from('administrador');
        $this->db->where('cod', $cod );
        $data = $this->db->get()->result();
        return $data[0];
        }
}

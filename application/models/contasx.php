<?php

class Contasx extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function nomecontas() {
        $this->db->order_by("nome_contas", "asc");
        $consulta = $this->db->get("contas_categorias");

        return $consulta;
    }

    public function conta_contas_categorias() {
        return $this->db->count_all_results('contas_categorias');
    }

    function removetipogastos($gastos) {

        $this->db->where('cod', $gastos);
        $this->db->delete('contas');
    }

    function lista_contas($pular = null, $produtos = null) {
        $this->db->select();
        $this->db->from('contas_categorias');
        $this->db->order_by("nome_contas", "ASC");

        if ($pular && $produtos) {
            $this->db->limit($produtos, $pular);
        } else {
            $this->db->limit(12);
        }
        return $this->db->get()->result_array();
    }

    public function contar() {

        $this->db->count_all_results('contas_categorias');
        $this->db->from('contas_categorias');
        
        return $this->db->count_all_results();
    }

    public function editar_nome_contas($id) {
        $this->db->select();
        $this->db->from('contas_categorias');
        $this->db->where('cod', $id);
        $data = $this->db->get()->result();

        return $data[0];
    }

    function contasremover($contas) {

        $this->db->where('cod', $contas);
        $this->db->delete('contas_categorias');
    }

}

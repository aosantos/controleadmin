<?php

class Contas extends CI_Controller {

    public function __construct() {
        ini_set('display_errors', 1);
        ini_set('log_errors', 1);
        error_reporting(E_ALL);

        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
    }

    public function listacontas($pular = null) {
        $this->load->view('topo');
        $this->load->model('contasx');
        $this->load->library('pagination');

        $config['base_url'] = base_url("contas/listacontas");

        $config['total_rows'] = $this->contasx->contar();
        $produtos = 12;
        $config['per_page'] = $produtos;

        $this->pagination->initialize($config);
        $data['links_paginacao'] = $this->pagination->create_links();
        $data ['contas'] = $this->contasx->lista_contas($pular, $produtos);

        $this->load->view('listacontas', $data);
    }
    public function add_contas(){
        $this->load->view('topo');
        $this->load->model('contasx');
        $this->load->library('pagination');
        //$data ['contas'] = $this->contasx->lista_contas();

        $this->load->view('add_contas');
    }

    public function cadastrar_contas() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_contas', 'Nome da Conta', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->add_contas();
        } else {
            $nome = $this->input->post('nome_contas');
            $data = array(
                'nome_contas' => $nome
            );

            $this->db->insert('contas_categorias', $data);
            redirect('listacontas');
            exit;
        }
    }

    public function removertipogastos($id) {
        $this->load->library('session');
        if ($_POST) {
            $gastos = $_POST['id'];
            $this->load->model('contasx');
            $this->contasx->removetipogastos($gastos);
        }
    }

    public function editar_nome_contas($id) {
        $this->load->library('session');
        $this->load->model('dinheirox');
        $this->load->model('contasx');

        $data = $this->contasx->editar_nome_contas($id);

        $this->load->view('topo');
        $this->load->view('editarnomecontas', $data);
    }

    public function salvar_alteracao() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_contas', 'Nome da Conta', 'required');
        $this->load->model('contasx');
        $id = $this->input->post('cod');
        if ($this->form_validation->run() == FALSE) {
            $this->editar_nome_contas($id);
        } else {
            $id = $this->input->post('cod');
            $nome = $this->input->post('nome_contas');
            $data = ['nome_contas' => $nome];
            $this->db->where('cod', $id);
            $this->db->update('contas_categorias', $data);

            redirect("add_contas");
        }
    }

    public function contasremover($id) {
        $this->load->library('session');
        if ($_POST) {

            $contas = $_POST['id'];

            $this->load->model('contasx');
            $this->contasx->contasremover($contas);
        }
    }

}

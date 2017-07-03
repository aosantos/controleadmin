<?php

class Dinheiro extends CI_Controller {

    public function __construct() {
        ini_set('display_errors', 1);
        ini_set('log_errors', 1);
        error_reporting(E_ALL);

        parent::__construct();
        //$this->output->cache(1440);
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
        $this->load->helper('date');
    }

    public function index($pular = null) {
        $this->load->library('session');
        $this->load->model('dinheirox');
        $this->load->model('contasx');
        $this->load->model('dividasx');
        $this->load->model('usuariosx');
        $this->load->library('table');
        $this->load->library('pagination');
        $config['base_url'] = base_url("dinheiro/index");
        $config['total_rows'] = $this->dinheirox->contar();
        $produtos = 12;
        $config['per_page'] = $produtos;
        $this->pagination->initialize($config);
        $data['links_paginacao'] = $this->pagination->create_links();
        $data['dinheiro'] = $this->dinheirox->list_dinheiro($pular, $produtos);
        $data['soma'] = $this->dinheirox->soma_saldo();
        $data['gastos'] = $this->dinheirox->listatipogastos();
        $data['contagastos'] = $this->dinheirox->contacadastrodegasto();
        $data['conta_contas_categorias'] = $this->contasx->conta_contas_categorias();
        $data['soma_dividas'] = $this->dividasx->soma_dividas();
        $data['usuarios'] = $this->usuariosx->usuarios();

        $this->load->view('controlelista', $data);
    }

    public function add_dinheiro() {
        $this->load->library('session');
        $this->load->model('dinheirox');
        $this->load->model('contasx');
        $data['dinheiro'] = $this->dinheirox->list_dinheiro();

        $nome_contas = $this->contasx->nomecontas();
        $option = "<option value=''></option>";
        foreach ($nome_contas->result() as $linha) {
            $option .= "<option value='$linha->nome_contas'>$linha->nome_contas</option>";
        }
        $data['nome_contas'] = $option;
        $this->load->view('topo');
        $this->load->view('add_dinheiro', $data);
    }

    public function cadastrar() {
        $this->load->library('session');
        $this->load->model('dinheirox');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ano', 'Data', 'required');
        $this->form_validation->set_rules('entrada', 'Valor Mensal', 'required');
        $this->form_validation->set_rules('novasaida', 'Nova Saida', 'required');
        $this->form_validation->set_rules('contas', 'Tipo de Gasto', 'required');
        $codigo = $this->session->userdata('cod');
        $data['dinheiro'] = $this->dinheirox->list_dinheiro();
        if ($this->form_validation->run() === false) {
            $this->add_dinheiro();
        } else {

            $entrada = $this->input->post('entrada');
            $novasaida = $this->input->post('novasaida');
            $saida = $this->input->post('novasaida');
            $ano = $this->input->post('ano');
            $contas = $this->input->post('contas');
            $saldo = $entrada - $saida;

            if ($saldo <= 0) {
                $relatorio = '<font color="red"><div align="center"><i>Saldo Negativo</i></br></font>';
            } elseif ($saldo <= 100 && $saldo >= 1) {
                $relatorio = "<font color='yellow'>Tome Cuidado</font>";
            } else {
                $relatorio = '<font color="lime"><div align="center"><i>Saldo Positivo</i></br></font>';
            }
            $data = array(
                'administrador_cod' => $codigo,
                'entrada' => $entrada,
                'saida' => $saida,
                'novasaida' => $novasaida,
                'saldo' => $saldo,
                'ano' => $ano,
                'relatorio' => $relatorio
            );
            if ($saida >= $entrada) {
                $saldo = "<font color='red'>$saldo</font>";
            } else {
                $saldo = "<font color='lime'>$saldo</font>";
            }
            $conta = [ 'contas' => $contas,
                'dinheiro_ano' => $ano,
                'total' => $saida,
                'administrador_cod' => $codigo,
            ];
            $this->db->insert('contas', $conta);
            $this->db->insert('dinheiro', $data);
            redirect('dinheiro');
            exit;
        }
    }

    public function edita($id) {
        $this->load->library('session');
        $this->load->model('dinheirox');
        $this->load->model('contasx');
        $datas = $this->dinheirox->edita($id);
        $nome_contas = $this->contasx->nomecontas();
        $option = "<option value=''></option>";
        foreach ($nome_contas->result() as $linha) {
            $option .= "<option value='$linha->nome_contas'>$linha->nome_contas</option>";
        }
        $data['nome_contas'] = $option;
        $this->load->view('topo', $datas);
        $this->load->view('editardinheiro', $data);
    }

    public function salvaralteracao() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ano', 'Data', 'required');
        $this->form_validation->set_rules('entrada', 'Valor Mensal', 'required');
        $this->form_validation->set_rules('novasaida', 'Novo Gasto', 'required');
        $this->form_validation->set_rules('contas', 'Tipo de Gasto', 'required');

        $this->load->model('dinheirox');
        $id = $this->input->post('cod');
        $codigo = $this->session->userdata('cod');
        if ($this->form_validation->run() === false) {
            $this->edita($id);
        } else {

            $entrada = $this->input->post('entrada');
            $novasaida = $this->input->post('novasaida');
            $saida = $this->input->post('saida');
            $saldo = $this->input->post('saldo');
            $ano = $this->input->post('ano');
            $contas = $this->input->post('contas');
            if ($saldo <= 0) {
                $relatorio = '<font color="red"><div align="center"><i>Saldo Negativo</i></br></font>';
            } elseif ($saldo <= 100 && $saldo >= 1) {
                $relatorio = "<font color='yellow'>Tome Cuidado</font>";
            } else {
                $relatorio = '<font color="lime"><div align="center"><i>Saldo Positivo</i></br></font>';
            }
            $data = ['entrada' => $entrada,
                'novasaida' => $novasaida,
                'saida' => $saida = $saida + $novasaida,
                'saldo' => $saldo = $entrada - $saida,
                'ano' => $ano,
                'relatorio' => $relatorio
            ];

            $conta = [ 'contas' => $contas,
                'dinheiro_ano' => $ano,
                'total' => $novasaida,
                'administrador_cod' => $codigo,
            ];
            $this->db->insert('contas', $conta);

            $this->db->where('cod', $id);
            $this->db->update('dinheiro', $data);
            redirect("dinheiro");
        }
    }

    public function remover_dinheiro($id) {
        $this->load->library('session');
        if ($_POST) {
            $dinheiro = $_POST['id'];
            $this->load->model('dinheirox');
            $this->dinheirox->removeDinheiro($dinheiro);
        }
    }

    public function versao() {
        $this->load->view('topo');
        $this->load->view('versao');
    }

    public function relatorio($pular = null) {
        $this->load->library('session');
        $this->load->model('dinheirox');
        $this->load->library('table');
        $this->load->library('pagination');
        $config['base_url'] = base_url("dinheiro/relatorio");

        $config['total_rows'] = $this->dinheirox->contar();
        $produtos = 12;
        $config['per_page'] = $produtos;
        $this->pagination->initialize($config);
        $data['links_paginacao'] = $this->pagination->create_links();

        $data['dinheiro'] = $this->dinheirox->list_dinheiro($pular, $produtos);
        $data['soma'] = $this->dinheirox->soma_saldo();
        $this->load->view('topo');
        $this->load->view('relatorio', $data);
    }

    public function exporta_excel() {
        $this->load->library('session');
        $this->load->model('dinheirox');
        $data['dinheiro'] = $this->dinheirox->excel();
        $this->load->view('exporta_excel', $data);
    }
    public function pdf(){
        $this->load->model('dinheirox');
        $data['dinheiro'] = $this->dinheirox->excel();
        
         $this->load->view('pdf', $data);
    }

    public function buscar($pular = null) {
        $this->load->library('session');
        $this->load->model('dinheirox');
        $this->load->model('contasx');
        $this->load->model('dividasx');
        $data['dinheiro'] = $this->db->get('dinheiro')->result();

        $busca = $this->input->post('busca');
        $data['busca'] = $busca;
        $this->load->library('table');
        $this->load->library('pagination');
        $config['base_url'] = base_url("dinheiro/index");

        $config['total_rows'] = $this->dinheirox->contar();
        $produtos = 12;
        $config['per_page'] = $produtos;
        $this->pagination->initialize($config);
        $data['links_paginacao'] = $this->pagination->create_links();

        $this->db->like('relatorio', $busca);

        $data['dinheiro'] = $this->dinheirox->list_dinheiro($pular, $produtos);
        $data['soma'] = $this->dinheirox->soma_saldo();
        $data['gastos'] = $this->dinheirox->listatipogastos();
        $data['contagastos'] = $this->dinheirox->contacadastrodegasto();
        $data['conta_contas_categorias'] = $this->contasx->conta_contas_categorias();
        $data['soma_dividas'] = $this->dividasx->soma_dividas();

        $this->load->view('controlelista', $data);
    }

    public function tipo_gastos($pular = null) {
        $this->load->library('session');
        $this->load->view('topo');
        $this->load->model('dinheirox');
        $this->load->library('pagination');
        $config['base_url'] = base_url("dinheiro/tipo_gastos");
        $config['total_rows'] = $this->dinheirox->contartipogastos();
        $produtos = 10;
        $config['per_page'] = $produtos;
        $this->pagination->initialize($config);
        $data['links_paginacao'] = $this->pagination->create_links();

        $data['gastos'] = $this->dinheirox->listatipogastos($pular, $produtos);

        $this->load->view('tipo_gastos', $data);
    }

    public function contagastosportipo($contas) {
        $this->load->library('session');
        $this->load->model('dinheirox');
        $data['contas'] = $this->dinheirox->contagastos($contas);

        $this->load->view('topo');
        $this->load->view('contagastos', $data);
    }

}

?>
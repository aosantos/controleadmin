<?php

class Dividas extends CI_Controller {

    public function __construct() {
        ini_set('display_errors', 1);
        ini_set('log_errors', 1);
        error_reporting(E_ALL);

        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
    }
    public function index(){
        $this->load->model('dividasx');
        $this->load->view('topo');
        $data['soma']      = $this->dividasx->soma_dividas();
        $data['dividas']   = $this->dividasx->list_dividas();
        
        $this->load->view('dividas',$data);
    }
   public function add_dividas(){
        $this->load->library('session');
        $this->load->model('dividasx');
        $this->load->view('topo');

        $this->load->view('add_dividas');
   }
   public function cadastrar_dividas(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('data_dividas', 'Data', 'required');
        $this->form_validation->set_rules('entrada', 'Valor da Divida', 'required');
        $this->form_validation->set_rules('observacao', 'Observação', 'required');
      
        $this->load->library('session');
        $this->load->model('dividasx');
        $codigo = $this->session->userdata('cod');
         if ($this->form_validation->run() === false) {
                $this->add_dividas();
            }
            else{
            
                $datadividas    = $this->input->post('data_dividas');
                $entrada        = $this->input->post('entrada');
                $observacao     = $this->input->post('observacao');
                $saldodevedor   = $this->input->post('saldo');
                
                $data = array(
                    'administrador_cod'     => $codigo,
                    'data_dividas'          => $datadividas,
                    'entrada'               => $entrada,
                    'saldo'                 => $saldodevedor + $entrada,
                    'observacao'            => $observacao,
                );
                    
                $this->db->insert('controle_dividas', $data);
                    
                redirect('dividas');
                exit;
            
        }
   
   }
   public function editardivida($id){
        $this->load->library('session');
        $this->load->model('dividasx');
        
        $data = $this->dividasx->edita($id);
        
        $this->load->view('topo');
        $this->load->view('editardivida', $data);
    
   }
   public function salvardivida(){            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('data_dividas', 'Data', 'required');
            $this->form_validation->set_rules('novaentrada', 'Aumento da Divida', 'required');
            $this->form_validation->set_rules('observacao', 'Observação', 'required');
       
            $this->load->model('dividasx');
            $id = $this->input->post('cod');
            $codigo = $this->session->userdata('cod');
            if ($this->form_validation->run() === false) {
                $this->editardivida($id);
            }
            else{
            
                $datadividas    = $this->input->post('data_dividas');
                $entrada        = $this->input->post('entrada');
                $novaentrada    = $this->input->post('novaentrada');
                $observacao     = $this->input->post('observacao');
                $saldodevedor   = $this->input->post('saldo');
                
                $data = [
                    'administrador_cod'     => $codigo,
                    'data_dividas'          => $datadividas,
                    'novaentrada'           => $novaentrada,
                    'entrada'               => $entrada = $entrada + $novaentrada,
                    'observacao'            => $observacao,
                    'saldo'                 => $saldodevedor = $entrada
                    ];
                   
            
            $this->db->where('cod',$id);
            $this->db->update('controle_dividas',$data);
           
            redirect("dividas");
            }
   }
            public function dividasremover($id){
                 $this->load->library('session');
        if ($_POST) {

            $dividas = $_POST['id'];

            $this->load->model('dividasx');
            $this->dividasx->dividasremover($dividas);
        }
            }
        
        
}
?>
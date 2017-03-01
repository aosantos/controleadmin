<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller {

    function __construct() {                

        parent::__construct();  
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');  

    }

    function index() 
    {

	$this->load->view('login');

    }
     private function dinheiro($pular = null) {
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
        $data['dinheiro']   = $this->dinheirox->list_dinheiro($pular,$produtos);
   
        $data['soma']                           = $this->dinheirox->soma_saldo();
        $data['gastos']                         = $this->dinheirox->listatipogastos();
        $data['contagastos']                    = $this->dinheirox->contacadastrodegasto();
        $data['conta_contas_categorias']        = $this->contasx->conta_contas_categorias();
        $data['soma_dividas']                   = $this->dividasx->soma_dividas();
        $data['usuarios']                       = $this->usuariosx->usuarios();
        
        $this->load->view('controlelista', $data);
    }

    public function logar()
    {
    	$this->load->model("loginx");// chama o modelo login
        $this->load->model("perfilx");// chama o modelo perfilx
   
        $login = $this->input->post("login");// pega via post o login 
        $senha = $this->input->post("senha"); // pega via post a senha
        
        $usuario = $this->loginx->buscaPorLoginSenha($login,$senha); // acessa a função buscaPorEmailSenha do modelo
        
        if($usuario){
            $this->session->set_userdata($usuario);
            
                $idSessao = $this->session->userdata('session_id');
                $this->session->set_userdata(array('id_sessao' => $idSessao));

                $fotoUsuario = $this->perfilx->getPerfil($usuario['cod']);
                $this->session->set_userdata(array('fotoUsuario' => $fotoUsuario[0]['imagem']));

             $this->dinheiro('controlelista',$usuario);
              
        }else{
              $errologin = $this->session->set_flashdata('errologin', "Login ou Senha Inválidos!");
              redirect('/',base_url($errologin));
                             
    
              }
    }

    public function logout() {

        $sess_array = array(
        'login' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        session_destroy();
        redirect(base_url());
        
        }
        }
?>
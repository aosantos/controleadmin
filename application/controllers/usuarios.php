<?php
class Usuarios extends CI_Controller {
    public function __construct() {
        ini_set('display_errors', 1);
        ini_set('log_errors', 1);
        error_reporting(E_ALL);

        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');    
    }

    public function index() {
        $this->load->view('add_usuarios');
    }
    public function  cadastrar_usuarios(){
     $this->load->library('form_validation');
     $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[4]|max_length[255]');
     $this->form_validation->set_rules('login', 'Login', 'required');
     $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]', array('required' => 'Você deve preencher a %s.'));
     $this->form_validation->set_rules('confsenha', 'Confirmação de Senha', 'required|matches[senha]');
     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
     //$this->form_validation->set_rules('userfile', 'Foto', 'required');
  
     if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('add_usuarios', $erros);
     } else {
            $login          = $this->input->post('login');
            $senha          = $this->input->post('senha');
            $confsenha      = $this->input->post('confsenha');
            $nome           = $this->input->post('nome');
            $imagem         = $this->upload_foto();
            $this->db->select('email');
            $this->db->where('email', $email     = $this->input->post('email'));
            $retorno = $this->db->get('administrador')->num_rows();

                if($retorno > 0 ){
                     $erromail = $this->session->set_flashdata('erro', "O Email $email  Já existe!");
                     $this->load->view('add_usuarios', $erromail);
                } else { 
                    $sucesso = $this->session->set_flashdata('sucesso', "Cadastrado com sucesso!");
                    $data         = array(
                               'login'            => $login,
                               'senha'            => $senha,
                               'confsenha'        => $confsenha,
                               'nome'             => $nome,
                               'email'            => $email,
                               'ativo'            => 1,
                               'imagem'           =>$imagem
                            );
          $this->db->insert('administrador', $data);
          
          redirect('/',base_url($sucesso));
          exit;
    }
     }
             
  }
  function upload_foto(){
            $config['upload_path'] = './images/perfil';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1024';
            $config['max_width'] = '10000';
            $config['max_height'] = '8000';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload()){
                $error =   $this->upload->display_errors();
               print_r($error);
                exit();
            }else{
                $data = array('upload_data'=>  $this->upload->data());
                return $data['upload_data']['file_name'];
            }
        }
        public function senha(){
        $this->load->view('recuperasenha');
        
    }
    
     public function recuperar_login(){
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        if ($this->form_validation->run() == FALSE){
            $this->senha();
        }
        else{
            $email = $this->input->post('email');
            $this->db->where('email', $this->input->post('email'));
            $this->db->where('ativo',1);
            $cliente = $this->db->get('administrador')->result();
            
            if(count($cliente)==1){
                $dados = $cliente[0];    
                $mensagem = $this->load->view('emails/recuperar_senha.php',$dados,TRUE);
                $this->load->library('email');
                $this->email->from("oliveira.anderson17@gmail.com","Controle Financeiro");
                $this->email->to($dados->email);
                $this->email->subject('Controle Financeiro - Recuperação de cadastro');
                $this->email->message($mensagem);            
                if($this->email->send()){
                    
                 $senhaenviada = $this->session->set_flashdata('senhaenviada', "A sua senha foi encaminhada com sucesso.");
                 $this->load->view('recuperasenha', $senhaenviada);
                
                }
                else{
                    print_r($this->email->print_debugger());
                }
            }
            else{
               
                 $emailnaoencontrado = $this->session->set_flashdata('emailnaoencontrado', "Email: $email  não encontrado!");
                 $this->load->view('recuperasenha', $emailnaoencontrado);
                
            }
        }
    }

    public function alterar_cadastro($cod){
        $this->load->library('session');
        $this->load->model('usuariosx');
        $data               = $this->usuariosx->alterar_cadastro($cod);
        $datas['dados']     = $this->usuariosx->alterar_cadastro($cod);
        $this->load->view('topo',$datas);
        $this->load->view('altera_cadastro',$data);
    }
    
   
    public function  editarusuarios(){
            
            $cod = $this->session->userdata('cod');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[4]|max_length[255]');
            $this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]', array('required' => 'Você deve preencher a %s.'));
            $this->form_validation->set_rules('confsenha', 'Confirmação de Senha', 'required|matches[senha]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if($this->form_validation->run()==FALSE){
                $this->alterar_cadastro($cod);
            }else{
                $nome       = $this->input->post('nome');
                $login      = $this->input->post('login');
                $senha      = $this->input->post('senha');
                $confsenha  = $this->input->post('confsenha');
                
                if($_FILES['userfile']['error']==0){
                    $imagem = $this->upload_foto();
                }else{
                    $imagem = $this->input->post('imagem');
                }
                $email  = $this->input->post('email');
                
                $data = [
                    'cod'           => $cod,
                    'nome'          => $nome,
                    'login'         => $login,
                    'senha'         => $senha ,
                    'confsenha'     => $confsenha ,
                    'imagem'        => $imagem,
                    'email'         => $email,
                    ];
                
                if( $this->db->where('cod',$cod)){
            $this->db->update('administrador',$data);
            
            redirect("dinheiro");
            }
                else{
                 $erroatualizar = $this->session->set_flashdata('erroatualizar', "Não foi possível alterar o Usuário!");
                 $this->load->view('recuperasenha', $erroatualizar);
                }
            }
        }
        
         public  function usuarioremover($id) {
        $this->load->library('session');
        if ($_POST) {

            $usuarios = $_POST['id'];

            $this->load->model('usuariosx');
            $this->usuariosx->remover($usuarios);
            
        }
    }
    public function ver(){
        $this->load->model('usuariosx');
        $data['usuarios']   = $this->usuariosx->usuarios();
        $this->load->view('topo');
        
        $this->load->view('usuariover',$data);
        
    }
        
}
?>
<?php
class Loginx extends CI_Model {


    function validate() 
    {

        $this->db->where('login', $this->input->post('login')); 
        $this->db->where('senha', md5($this->input->post('senha')));
       
        $query = $this->db->get('administrador');
        
        if ($query->num_rows == 1) { 
            return true; // RETORNA VERDADEIRO
        }

    }
     public function buscaPorLoginSenha($login, $senha){
        $this->db->where("login", $login);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("administrador")->row_array();
        return $usuario;
    }

    function logged() 
    {

        $logged = $this->session->userdata('logado');

        if (!isset($logged) || $logged != true) {
            redirect('/');
        }

    }
    
}

?>
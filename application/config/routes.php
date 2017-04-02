<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']        = 'login';
$route['404_override']              = '';
$route['translate_uri_dashes']      = FALSE;
$route['dinheiro']                  = "dinheiro/index";
$route['dinheiroremover']           = "dinheiro/remover_dinheiro";
$route['cadastrar']                 = "dinheiro/cadastrar";
$route['cadastra']                  = "dinheiro/index";
$route['login']                     = "login/logar";
$route['sair']                      = "login/logout";
$route['versao']                    = "dinheiro/versao";
$route['relatorio']                 = "dinheiro/relatorio";
$route['editar/(:any)']             = "dinheiro/edita/$1";
$route['soma_saldo']                = "dinheiro/soma_saldo";
$route['excel']                     = "dinheiro/exporta_excel";
$route['add_dinheiro']              = "dinheiro/add_dinheiro";
$route['salvaralteracao']           = "dinheiro/salvaralteracao"; 
$route['add_usuarios']              = "usuarios/index"; 
$route['cadastrar_usuarios']        = "usuarios/cadastrar_usuarios"; 
$route['senha']                     = "usuarios/senha"; 
$route['recuperar_login']           = "usuarios/recuperar_login"; 
$route['editarusuarios']            = "usuarios/editarusuarios"; 
$route['alterar_cadastro/(:any)']   = "usuarios/alterar_cadastro/$1";
$route['tipo_gastos']               = "dinheiro/tipo_gastos"; 
$route['contagastosportipo/(:any)'] = "dinheiro/contagastosportipo/$1";
$route['listacontas']               = "contas/listacontas"; 
$route['add_contas']                = "contas/add_contas"; 
$route['cadastrar_contas']          = "contas/cadastrar_contas"; 
$route['dividas']                   = "dividas/index"; 
$route['add_dividas']               = "dividas/add_dividas"; 
$route['cadastrar_dividas']         = "dividas/cadastrar_dividas"; 
$route['editardivida/(:any)']       = "dividas/editardivida/$1";
$route['editardividas/(:any)']      = "dividas/editardividas/$1";
$route['salvardivida']              = "dividas/salvardivida"; 
$route['salvardividas']             = "dividas/salvardividas"; 
$route['dividasremover']            = "dividas/dividasremover"; 
$route['tipogastosremover']         = "contas/removertipogastos";
$route['editar_nome_contas/(:any)'] = "contas/editar_nome_contas/$1";
$route['salvarnomecontas']          = "contas/salvar_alteracao";
$route['contasremover']             = "contas/contasremover";
$route['usuariover']                = "usuarios/ver";
$route['usuarioremover']            = "usuarios/usuarioremover";



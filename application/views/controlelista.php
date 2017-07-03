<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>assets/css/bootstrap.css.map" rel="stylesheet" media="screen">
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
        <script src="<?php echo base_url() ?>assets/js/npm.js"></script>
        <?php 
		echo link_tag('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');
	?>
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
  
    <title>Controle Financeiro</title>

    <!-- Bootstrap Core CSS -->
     <link href="<?php echo base_url() ?>assets/css/sb-admin.css" rel="stylesheet" media="screen">
     <link href="<?php echo base_url() ?>assets/css/plugins/morris.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url() ?>assets/css/plugins/morris.css" rel="stylesheet" media="screen">
<link href="<?php echo base_url() ?>assets/css/plugins/morris.css" rel="stylesheet" media="screen">
<?php echo link_tag('assets/font-awesome/css/font-awesome.min.css');?>
      

</head>
<script>
    function confirmaSaida(event) {
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        var teste = confirm("Tem certeza de que deseja sair?");
        if (teste) {
            location.href = "<?php echo base_url() ?>sair";
        }

    }
</script> 
<script>

    $(document).ready(function () {

        remover = function (id) {
            var teste = confirm('Deseja mesmo excluir ?');
            if (teste)
                idx = id.split('_')[1];

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>/dinheiroremover',
                data: {
                    id: $('#odd_gradeX_' + idx).data('id')
                },
                success: function (result) {
                    alert('O registro foi deletado!');
                },
                error: function () {
                    alert('Erro ao deletar o registro,Tente novamente mais tarde!');
                }
            });

            $('#remover_' + idx).closest('tr').fadeOut(400, function () {
                $('#remover_' + idx).closest('tr').remove();
            });

            return false;

        };

    });

</script>


<script>

    $(document).ready(function () {

        removerusuario = function (id) {
            var teste = confirm('Deseja mesmo excluir o perfil ?');
            if (teste)
                idx = id.split('_')[1];

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>/usuarioremover',
                data: {
                    id: $('#odd_gradeX_' + idx).data('id')
                },
                success: function (result) {
                    alert('O Seu perfil foi deletado com sucesso!');
                },
                error: function () {
                    alert('Erro ao deletar o registro,Tente novamente mais tarde!')
                }
            });

            $('#removerusuario' + idx).closest('tr').fadeOut(400, function () {
                $('#removerusuario' + idx).closest('tr').remove();
            });

            return false;

        };

    });

</script>


<body>
    <style>
            .pequeno {
                width: 25%;
            }

            .medio {
                width: 100%;
            }
            .background{
                color: navy;
                
            }
        </style>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand " href="">Controle Financeiro</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">

                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><p><b><span class="hidden-xs"><?= $this->session->userdata('nome') ?></span></b>
            
            </p></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i>  
                <?php
                setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $data = strftime('%A, %d de %B de %Y', strtotime('today'));
                echo utf8_encode(ucfirst($data));
                ?></p>
                                        <p>Texto</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><p><b><span class="hidden-xs"><?= $this->session->userdata('nome') ?></span></b>
            
            </p></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i>  <?php
                setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $data = strftime('%A, %d de %B de %Y', strtotime('today'));
                echo utf8_encode(ucfirst($data));
                ?></p>
                                        <p>Texto</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Todas as Mensagens</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <!--<li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>-->
                        <li>
                            <a href="#">Msg de Alerta <span class="label label-danger">Alerta</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">Ver todas</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b><?= $this->session->userdata('nome') ?></b>
            
       <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li>
                            <a href="<?php echo base_url() ?>alterar_cadastro/<?= $this->session->userdata('cod'); ?>"><i class="fa fa-fw fa-user"></i> Alterar Perfil</a>
                        </li>
                        <li>-->
                        <div align="center">
                            
                        
                            <?php
        if ($this->session->userdata('fotoUsuario') != '') {

            $imgPerfil = $this->session->userdata('fotoUsuario');
           
            ?>
 
        <a href="<?php echo base_url() ?>alterar_cadastro/<?= $this->session->userdata('cod'); ?>"> <img src="<?php echo base_url() ?>images/perfil/<?= $imgPerfil ?>" title="Alterar Perfil"alt="" class="img-circle"<img  widht='80px' height='80px' /> 
           </a>
             <?php
        } else {
            ?>
         <a href="<?php echo base_url() ?>alterar_cadastro/<?= $this->session->userdata('cod'); ?>"> <img src="<?php echo base_url() ?>img/user-13.jpg" title="Alterar Perfil"alt="" class="img-circle"<img  widht='80px' height='80px' /> 
         </a>
            <?php
        }
        ?>
                             <?php
                    if ($max = count($usuarios)){
          

for ($i = 0; $i < $max; $i++) {

    $id      = $usuarios[$i]['cod'];
    $cod     = $usuarios[$i]['cod'];
   
}
    ?> 
 <?php
 
}
?>
               </div>             
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="#"onclick="confirmaSaida(event);"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo base_url() ?>dinheiro"><i class="fa fa-fw fa-dashboard"></i> Controle Financeiro</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>add_contas"><i class="fa fa-fw fa-plus-circle"></i> Cadastrar Contas</a>
                    </li>
                    <li>
                         <a href="<?php echo base_url() ?>relatorio"><i class="fa fa-fw fa-bar-chart-o"></i> Relatório</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>tipo_gastos"><i class="fa fa-fw fa-table"></i> Tipos de Gastos</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>excel"><i class="fa fa-fw fa-edit"></i> Relatório em Excel</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>versao"><i class="fa fa-fw fa-desktop"></i> Sobre o Sistema</a>
                    </li>
                  <li>
                        <a href="<?php echo base_url() ?>usuariover"><i class="fa fa-fw fa-remove"></i> Apagar Perfil</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid label-info">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Controle <small>Finanças Pessoais</small>
                        </h1>
                        <ol class="breadcrumb ">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Controle Financeiro
                            </li>
                             <h4>
                <?php
                setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $data = strftime('%A, %d de %B de %Y', strtotime('today'));
                echo utf8_encode(ucfirst($data));
                ?>

            </h4>
                        </ol>
                    </div>
                </div>
           
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-credit-card fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
$max = count($contagastos);

for ($i = 0; $i < $max; $i++) {

    ?> 
<?php

    }
    
    
?>
                                            <?= $contagastos;?>
 </div>
                                        <div> Cadastro de Gastos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url() ?>add_dinheiro" >
                                <div class="panel-footer">
                                    <span class="pull-left">Cadastrar Gastos</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
$max = count($conta_contas_categorias);

for ($i = 0; $i < $max; $i++) {

    ?> 
<?php

    }
    
    
?>
                                            <?= $conta_contas_categorias;?>
 </div>
                                        <div>Cadastro de Tipo </div>
                                    </div>
                                </div>
                            </div>
                             <a href="<?php echo base_url() ?>listacontas" >
                                <div class="panel-footer">
                                    <span class="pull-left">Listar tipo de Contas</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-sort fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"> <?php
$max = count($soma_dividas);

for ($i = 0; $i < $max; $i++) {

        $saldo = $soma_dividas[$i]['saldo']; 
        $relatorio='';
        $mensagem       = 'Reais';
        $msg            = "";
        
        if ($soma_dividas[$i]['saldo'] == 1 || $soma_dividas[$i]['saldo'] == -1) {
            $mensagem   = 'Real';
        } 
        elseif ($soma_dividas[$i]['saldo'] > 0 && $soma_dividas[$i]['saldo'] < 1) {
            $mensagem   = 'Centavos';
        } 
        elseif ($soma_dividas[$i]['saldo'] == '' && $soma_dividas[$i]['saldo'] < 1) {
            $mensagem   = '';
        } 
        else {
            $mensagem = 'Reais';
        }
       
        $relatorio.= $saldo . '&nbsp' . '&nbsp' . $mensagem;
}             
    ?>     
        <?php	
    if ($relatorio>1){
        echo  number_format((double)$relatorio,2,",",".")  ;
        
    }
    else{
        echo "0,00";
    
    }
    ?>
    </div>
                                        
                                        <div>Dividas</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url() ?>dividas ">
                                <div class="panel-footer">
                                    <span class="pull-left">Dividas</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-dollar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"> <?php
    $color = "beige";

    $max = count($soma);

    for ($i = 0; $i < $max; $i++) {

        $saldo      = $soma[$i]['saldo'];
        $relatorio  = '';
        $mensagem   = '&nbsp;Reais';
        $msg        = "&nbsp;Real";
        $msn        = "&nbsp;Centavos";
        $negativo   = "&nbsp;Negativo";
        
        $relatorio.= $saldo  ;
        ?>                                
        
   
                                                
                                            <?php
        if ($relatorio > 1) {
            echo number_format((double)$relatorio,2,",",".")  ;
        }
        if ($relatorio < 1 && $relatorio >0 ) {
            echo number_format((double)$relatorio,2,",",".")  ;
        }
        if ($relatorio ==1 ){
             echo number_format((double)$relatorio,2,",",".")  ;
        }
        if ($relatorio ==0 ){
            echo "<font color='red'>0,00 </font>";
        }
        if ($relatorio <0 ){
            echo number_format((double)$relatorio,2,",",".")  ;
        }
        ?>
            <?php
        }
        ?> 
                                               </h4>
                                             
</div>                               
                                        <div>Saldo</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Detalhes do Saldo</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    <div align="center">
                        
                    <?php
                    if ($max = count($dinheiro)){
 
        echo form_open(base_url() . 'dinheiro/buscar') .
        "<input type='text' class='form-control form-effect'  name='busca' id='busca' placeholder='Filtrar por Saldo'>";
        ?>
        <button class="btn btn-primary pequeno" type="submit">Filtrar</button>

    
                    </div>

<?php
     echo "<table class='table table-bordered   breadcrumb'>
        <thead >
        <th width=\"200px\"> Data</th>
        <th width=\"200px\"> Entrada</th>
        <th width=\"200px\"> Saida</th>
        <th width=\"200px\"> Saldo</th>
        <th width=\"200px\"> Relatório</th>
        <th width=\"200px\"> Ações</th>
        </thead>
        <tbody>
            <tr>";
 }
     ?>
                    
     <?php

for ($i = 0; $i < $max; $i++) {

    $id = $dinheiro[$i]['cod'];
    if ($color == 'white') {
        $color = 'lightcyan';
    } else {
        $color = 'white';
    }
    $cod        = $dinheiro[$i]['cod'];
    $saldo      = $dinheiro[$i]['saldo'];
    $entrada    = $dinheiro[$i]['entrada'];
    $saida      = $dinheiro[$i]['saida'];
    $novasaida  = $dinheiro[$i]['novasaida'];
    $ano        = $dinheiro[$i]['ano'];
    $relatorio  = $dinheiro[$i]['relatorio'];

    if ($dinheiro[$i]['saida'] >= $dinheiro[$i]['entrada']) {
        $saldo = "<font color='red'>$saldo </font>";
    } else {
        $saldo = "<font color='lime'>$saldo </font>";
    }
    ?> 
 
                <tr bgcolor='<?= $color ?>' class="<?php ?>" id="odd_gradeX_<?= ($i + 1) ?>" data-id="<?= $dinheiro[$i]['cod'] ?>">
                    <td style="width:185px;"><i><b><?= date('d/m/Y', strtotime($ano)) ?></b></i></td>
                    <td style="width:150px;"><i><b>R$&nbsp;<?= number_format((double)$entrada,2,",",".")?></b></i></td>
                    <td style="width:150px;"><i><b>R$&nbsp;<?= number_format((double)$saida,2,",",".") ?></b></i></td>
                    <td style="width:150px;"><i><b>R$&nbsp;<?= $saldo ?></b></i></td>
                    <td style="width:150px;"><i><div align="center"><b><?= $relatorio ?></b></div></i></td>
                    <td width='105px'>

                        <a href="<?php echo base_url() ?>editar/<?= strtolower($dinheiro[$i]['cod']); ?>"class="btn btn-danger btn-icon btn-circle">&nbsp;<span class="glyphicon glyphicon-pencil"></span> </a>
                        <a class="btn btn-danger btn-icon btn-circle" id="remover_<?= ($i + 1) ?>" onclick="remover(this.id);">&nbsp;<i class="glyphicon glyphicon-trash"></i></a>

                </tr>
    <?php
}
?>      

    </table>

    <div class="pager" >
        <li><?= $links_paginacao ?></li>
    </div>
</div>
                </div>
                
        <?php
        if (!isset($_SESSION['login'])) {
            header("Location:login");
        }
        ?>
</tbody>
        <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/morris/raphael.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/morris/morris-data.js"></script>
   
</body>
</html>

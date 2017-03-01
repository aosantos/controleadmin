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
                <a class="navbar-brand" href="">Controle Financeiro</a>
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
                         <li>
                            <a href="#">Msg de Alerta <span class="label label-danger">Alerta</span></a>
                        </li><li class="divider"></li>
                        <li>
                            <a href="#">Ver todas</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b><?= $this->session->userdata('nome') ?></b>
            
       <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"> <?php
        if ($this->session->userdata('fotoUsuario') != '') {

            $imgPerfil = $this->session->userdata('fotoUsuario');
            ?>
        <a href="<?php echo base_url() ?>alterar_cadastro/<?= $this->session->userdata('cod'); ?>"> <img src="<?php echo base_url() ?>images/perfil/<?= $imgPerfil ?>" title="Alterar Perfil"alt="" class="img-circle"<img  widht='80px' height='80px' /> 
           </a>
             <?php
        } else {
            ?>
         <a href="<?php echo base_url() ?>alterar_cadastro/<?= $this->session->userdata('cod'); ?>"> <img src="<?php echo base_url() ?>img/user-13.jpg/" title="Alterar Perfil"alt="" class="img-circle"<img  widht='80px' height='80px' /> 
         </a>
            <?php
        }
        ?>

        
</a>
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
                        <a href="<?php echo base_url() ?>relatorio"><i class="fa fa-fw fa-bar-chart-o"></i> Relatório</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>dividas"><i class="fa fa-fw fa-table"></i> Controle de Dividas</a>
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
                        <ol class="breadcrumb">
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
           

               
                    <div align="center">
                        
                                    </div>
                <!-- /.row -->

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

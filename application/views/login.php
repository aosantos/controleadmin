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
        <div align="center">
        
  <div class="container">
    <div class="row ">
        <div class="col-md-10 ">
            <div class="login-panel panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title"> <a href="<?php echo base_url()?>senha"style="text-decoration:none;color:black;"> Esqueceu a senha?
        Clique aqui
               
               </a> </h3>
                    
                </div>
                <?php 
         if($this->session->flashdata('sucesso')) {?>
        <div class="alert alert-success">
          <?=$this->session->flashdata('sucesso')?>
        </div>
      <?php }  ?>
                 <?php 
         if($this->session->flashdata('errologin')) {?>
        <div class="alert alert-success">
          <?=$this->session->flashdata('errologin')?>
        </div>
      <?php }  ?>
                <div class="panel-body">
                    <img src="<?php echo base_url() ?>assets/imgs/financa.jpg" alt=""<img  widht='100px' height='220px' />
                </div>
       
                	<!--Inserir formulário de login aqui -->
                        <a href="<?php echo base_url()?>add_usuarios">
               <input type="submit" value="Cadastre-se" class="btn btn-lg btn-primary btn-block"  />
               </a>
                        <br>
					<?php
                    echo form_open(base_url("login")) .
                        "<fieldset>" .
                            "<div class='form-group'>" .
                                form_input(array("name"=>"login","type"=>"text","placeholder"=>"Usuário","class"=>"form-control")) .
                            "</div>" .
                            "<div class='form-group'>" .
                                form_input(array("name"=>"senha","type"=>"password","placeholder"=>"Senha","class"=>"form-control")) .
                            "</div>" .
                            form_input(array("type"=>"submit","value"=>"Login","class"=>"btn btn-lg btn-success btn-block")) .
                        "</fieldset>".
                    form_close();
                    ?> 
                        
                </div>
            </div>
        </div>
    </div>
</div>
       </div>
            
        <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/morris/raphael.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/morris/morris-data.js"></script>
   
</body>

</html>


   

        
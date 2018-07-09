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
                     
                </div>
                <div class="panel-body">
                    <img src="<?php echo base_url() ?>assets/imgs/financa.jpg" alt=""<img  widht='100px' height='220px' />
                <div class="col-md-6 col-sm-12 col-xs-12 address-space">
                        <div id="map-canvas"></div>
                        <div class="address">
                            <h3>Contato do Desenvolvedor</h3>
                            <p><i class="glyphicon glyphicon-map-marker"></i>São Paulo SP, Brasil </p>
                            <p><i class="glyphicon glyphicon-earphone"></i>(11) 94161-7357 </p>
                            <p><i class="glyphicon glyphicon-envelope"></i>andersonoli@hotmail.com.br</p>
                        
                        <label class="control-label col-md-4 col-sm-4"></label>
                </div>
       
                        <br>
                        <?php 
         if($this->session->flashdata('erro')) {?>
        <div class="alert alert-danger">
          <?=$this->session->flashdata('erro')?>
        </div>
      <?php }  ?>
					
                        <?php 
         if (validation_errors()) {?>
        <div class="alert alert-danger">
          <?=  validation_errors()?>
        </div>
      <?php }  ?>
	
                        <?php
                echo form_open_multipart('cadastrar_usuarios');		
		?>  
                        <div class="form-group">
                            <input type="text" class="form-control form-effect"  name="nome" value="<?php echo set_value('nome'); ?>"placeholder="Nome">
                            </div>
                              <div class="form-group">                                 
                                <input type="text" class="form-control form-effect"  name="login" value="<?php echo set_value('login'); ?>"  placeholder="Login">
                            </div>
                              <div class="form-group">                                 
                                  <input type="password" class="form-control form-effect"  name="senha" value="<?php echo set_value('senha'); ?>"  placeholder="Senha">
                            </div>
                           <div class="form-group">                                 
                                  <input type="password" class="form-control form-effect"  name="confsenha" value="<?php echo set_value('confsenha'); ?>" placeholder="Confirmar Senha">
                            </div>
                            <div class="form-group">                                 
                                <input type="email" class="form-control form-effect"  name="email" id="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
                            </div>
                            <?php echo form_label("Foto","userfile");
				echo "<br/>";
				$data = array(
					"name"	=>	"userfile",
					"id"	=>	"userfile"
				);
				echo form_upload($data);
				echo "<br/>";
                                ?>
                         <div class="col-md-9 col-sm-9">
                            <button type="submit" class="btn btn-primary ">Gravar</button>
                            <a href="<?php echo base_url() ?>"<button type="button" class="btn btn-primary " >Voltar</a>
                            <?php echo form_close(); ?>
                            
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

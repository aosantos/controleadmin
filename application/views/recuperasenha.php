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
                </div>
       
                        <br>
          <?php 
         if (validation_errors()) {?>
        <div class="alert alert-danger">
          <?=  validation_errors()?>
        </div>
      <?php }  ?>
        
                             <?php 
         if($this->session->flashdata('emailnaoencontrado')) {?>
        <div class="alert alert-danger">
          <?=$this->session->flashdata('emailnaoencontrado')?>
        </div>
      <?php }  ?>
                        
                             <?php 
         if($this->session->flashdata('senhaenviada')) {?>
        <div class="alert alert-success">
          <?=$this->session->flashdata('senhaenviada')?>
        </div>
      <?php }  ?>
	
	
			 <?php
                        echo form_open(base_url('recuperar_login'),array('id'=>'form_recuperar_login')) 
		?>  
                            <div class="form-group">                                 
                                <input type="email" class="form-control form-effect"  name="email" id="email" placeholder="Email">
                             <br>
                             <button type="submit" class="btn btn-primary pequeno">Recuperar</button>
                             <a href="<?php echo base_url() ?>"<button type="button" class="btn btn-primary pequeno " >Voltar</a>
                           
                            </div>
                           <div class="col-md-9 col-sm-9">
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


   

        
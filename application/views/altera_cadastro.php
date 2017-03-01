<script>
    function confirmaSaida(event) {
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        var teste = confirm("Tem certeza de que deseja sair?");
        if (teste) {
            location.href = "<?php echo base_url()?>sair";
        }

    }
</script> 

<div id="main" class="container-fluid">
     
  <h3 class="page-header">Atualizar Usuário</h3>
  
 <div align='center'>
        <ul class="breadcrumb">
           <li>Atualizar Usuário</li>
        </ul>
 </div>
                    <div class="col-md-12 col-sm-12 col-xs-12contact-form">
                                <?php 
         if($this->session->flashdata('erroatualizar')) {?>
        <div class="alert alert-danger">
          <?=$this->session->flashdata('erroatualizar')?>
        </div>
      <?php }  ?> 
                          <?php 
         if (validation_errors()) {?>
        <div class="alert alert-danger">
          <?=  validation_errors()?>
        </div>
      <?php }  ?>
                        <?php
                echo form_open_multipart('editarusuarios');		
		?>  
                <input type='hidden' name='imagem' value='<?=$dados->imagem ?>'/>    
    
                        <div class="form-group">
                            <input type="text" class="form-control form-effect"  name="nome"id="name" value="<?=$nome?>" placeholder="Nome">
                            </div>
                              <div class="form-group">                                 
                                <input type="text" class="form-control form-effect"  name="login" id="assunto" value="<?=$login?>" placeholder="Login">
                            </div>
                              <div class="form-group">                                 
                                  <input type="password" class="form-control form-effect"  name="senha" id="assunto" value="<?=$senha?>" placeholder="Senha">
                            </div>
                            <div class="form-group">                                 
                                  <input type="password" class="form-control form-effect"  name="confsenha" id="assunto" value="<?=$senha?>" placeholder="Senha">
                            </div>
                            <div class="form-group">                                 
                                <input type="email" class="form-control form-effect"  name="email" id="email" value="<?=$email?>"placeholder="Email">
                            </div>
                        
                        <?php
                        echo " <div align='left'>  <td width='105px'>
    <td widht='20px' height='20px'/>
                    ";
                       if($dados->imagem){
                       echo anchor_popup(base_url("images/perfil/".$dados->imagem),
            
                        img2(base_url('images/perfil/'.$dados->imagem)));
    echo "</td></td></div>";
   
    echo form_label('Foto','userfile');
    $data = array('name'=>'userfile','id'=>'userfile');
    echo form_upload($data);
    
                       }
                       else{
                           echo anchor_popup(base_url("img/user-13.jpg/".$dados->imagem),
            
                        img2(base_url('img/user-13.jpg'.$dados->imagem)));
    echo "</td></td></div>";
   
    echo form_label('Foto','userfile');
    $data = array('name'=>'userfile','id'=>'userfile');
    echo form_upload($data);
    
                       }
    
    ?>
         
                        <h3 class="text-center portfolio-text">
                         <div class="col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary pequeno">Gravar</button>
                            <a href="<?php echo base_url() ?>dinheiro"<button type="button" class="btn btn-primary pequeno " >Voltar</a>
                            <?php echo form_close(); ?>
                        </h3>
                        </div>
			
                    </div>
        
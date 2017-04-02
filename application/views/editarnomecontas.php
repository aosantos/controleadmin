<div id="main" class="container-fluid">
     <br><br>
  <h3 class="page-header">Editar Contas</h3>
  
 <div align='center'>
        <ul class="breadcrumb ">
           <li>Editar Contas</li>
        </ul>
   
   <?php 
         if (validation_errors()) {?>
        <div class="alert alert-danger">
          <?=  validation_errors()?>
        </div>
      <?php }  ?> 
     <form class="form-horizontal" <?php
    $attributes = array('class' => 'form-signin', 'role' => 'form');
    echo form_open(base_url().'salvarnomecontas',$attributes);
    ?> 
         
            <input type='hidden' name='cod' value='<?=$cod ?>'/>    
            
            <fieldset>
                         
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="contas">Nome da Conta:</label>
                    <div class="col-sm-8">
                        <input  type="text" class="form-control"  name='nome_contas' id='nome_contas' value='<?=  $nome_contas?>'  
                            autofocus  placeholder=' Nome da Conta ' maxlength='255'/>
                    </div>
                </div>
                <button class="btn btn-primary pequeno" type="submit">Cadastrar</button>
                
            </fieldset>
        </form>
    </div>
 <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
 <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
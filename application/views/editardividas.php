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
     
  <h3 class="page-header">Atualizar </h3>
  
 <div align='center'>
        <ul class="breadcrumb">
           <li>Atualizar </li>
        </ul>
      <?php 
         if (validation_errors()) {?>
        <div class="alert alert-danger">
          <?=  validation_errors()?>
        </div>
      <?php }  ?>
     <form class="form-horizontal" <?php
    $attributes = array('class' => 'form-signin', 'role' => 'form');
    echo form_open(base_url().'salvardividas',$attributes);
    ?> 
         <input type='hidden' name='saldo'  value=''/>
         <input type='hidden' name='cod' value='<?=$cod ?>'/>    
    
            <fieldset>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="data_dividas">Data:</label>
                    <div class="col-sm-8">
                        <input  type="date" class="form-control"  name='data_dividas' id='data_dividas' value='<?=$data_dividas?>'  
                            autofocus  placeholder=' Preencha a Data ' maxlength='255'/>
                    </div>
                </div>
                        <input  type="hidden" class="form-control"   name='entrada' id='entrada' value='<?= $entrada ?>'  
                            autofocus  placeholder=' Preencha a Entrada  ' maxlength='255'/>
                   
                <div class="form-group">
                    <label class="control-label col-sm-2" for="entrada">Diminuir Divida:</label>
                    <div class="col-sm-8">
                        <input  type="text" class="form-control"  name='novaentrada' id='novaentrada' value='<?php echo set_value('novaentrada'); ?>'  
                            autofocus  placeholder='Diminuir sua Divida  ' maxlength='255'/>
                    </div>
                </div>
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="observacao">Observação:</label>
                    <div class="col-sm-8">
                        <input  type="text" class="form-control"  name='observacao' id='observacao' value='<?= $observacao  ?>'  
                            autofocus  placeholder=' Preencha a Observação ' maxlength='255'/>
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
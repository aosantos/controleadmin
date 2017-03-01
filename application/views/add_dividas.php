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
     
  <h3 class="page-header">Adicionar Dividas</h3>
  
 <div align='center'>
        <ul class="breadcrumb">
           <li>Adicionar Dividas</li>
        </ul>
     
      <?php 
         if (validation_errors()) {?>
        <div class="alert alert-danger">
          <?=  validation_errors()?>
        </div>
      <?php }  ?>
     <form class="form-horizontal" action='<?php base_url()?>cadastrar_dividas' method='POST' >
         <input type='hidden' name='saldo'  value=''/>
            <fieldset>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="data_dividas">Data:</label>
                    <div class="col-sm-8">
                        <input  type="date" class="form-control"  name='data_dividas' id='data_dividas' value='<?php echo set_value('data_dividas'); ?>'  
                            autofocus  placeholder=' Preencha a Data ' maxlength='255'/>
                    </div>
                </div>
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="entrada">Valor da Divida:</label>
                    <div class="col-sm-8">
                        <input  type="text"  class="form-control"  name='entrada' id='entrada' value='<?php echo set_value('entrada'); ?>'  
                            autofocus  placeholder=' Preencha a o Valor da divida  ' maxlength='255'/>
                    </div>
                </div>
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="observacao">Observação:</label>
                    <div class="col-sm-8">
                        <input  type="text" class="form-control"  name='observacao' id='observacao' value='<?php echo set_value('observacao'); ?>'  
                            autofocus  placeholder=' Preencha a Observação ' maxlength='255'/>
                    </div>
                </div>
                    
                <button class="btn btn-primary pequeno" type="submit">Cadastrar</button>
                <a href="<?php base_url()?>dividas" class="btn btn-primary pequeno">Voltar</a>
            </fieldset>
        </form>
    </div>
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>
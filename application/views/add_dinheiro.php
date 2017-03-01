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
     
  <h3 class="page-header ">Adicionar Cadastro</h3>
  
 <div align='center'>
        <ul class="breadcrumb ">
           <li>Adicionar Cadastro</li>
        </ul>
       <?php 
         if (validation_errors()) {?>
        <div class="alert alert-danger">
          <?=  validation_errors()?>
        </div>
      <?php }  ?>
     <form class="form-horizontal" action='<?php base_url()?>cadastrar' method='POST' >
            <input type='hidden' name='id' value='<?php $id ?>'/>
            
            <fieldset>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="ano">Data:</label>
                    <div class="col-sm-8">
                        <input  type="date" class="form-control"  name='ano' id='data' value='<?php echo set_value('ano'); ?>'  
                            autofocus  placeholder=' Preencha a Data ' maxlength='255'/>
                    </div>
                </div>
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="entrada">Valor Mensal:</label>
                    <div class="col-sm-8">
                        <input  type="text"    class="form-control"  name='entrada' value='<?php echo set_value('entrada'); ?>'  
                            autofocus  placeholder=' Preencha o Entrada  ' maxlength='255'/>
                    </div>
                </div>
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="novasaida">Novo Gasto:</label>
                    <div class="col-sm-8">
                        <input  type="text"  class="form-control"  name='novasaida' id='novasaida'  value='<?php echo set_value('novasaida'); ?>'  
                            autofocus  placeholder=' Preencha a Nova saida ' maxlength='255' />
                    </div>
                </div>
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="contas">Tipo de Gasto:</label>
                    <div class="col-sm-8">
                        
                        <select name="contas" class="form-control"  name='contas' id='contas' value='<?php echo set_value('contas'); ?>'  
                                <?= mb_strtoupper($nome_contas); ?>
                            autofocus  placeholder=' Tipo de Gasto ' maxlength='255'/>
                    </select>
                        
                        
                      <!-- Código que traz o select html como segunda opção
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="contas">Tipo de Gasto:</label>
                    <div class="col-sm-8">
            <?php $attributes = 'class="form-control" id="contas" name="contas"';
            echo form_dropdown('contas', mb_strtoupper($nome_contas), set_value('contas'), $attributes); ?>
            <span class="text-danger"><?php echo form_error('contas'); ?></span>
        </div>
                </div>-->
                </div>
                    <br><br>
                <button class="btn btn-primary pequeno" type="submit">Cadastrar</button>
                <a href="<?php base_url()?>dinheiro" class="btn btn-primary pequeno">Voltar</a>
            </fieldset>
        </form>
    </div>
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>
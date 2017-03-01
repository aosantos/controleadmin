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
     
  <h3 class="page-header">Editar Cadastro</h3>
  
 <div align='center'>
        <ul class="breadcrumb">
           <li>Editar Cadastro</li>
        </ul>
     <?php 
         if (validation_errors()) {?>
        <div class="alert alert-danger">
          <?=  validation_errors()?>
        </div>
      <?php }  ?>
     <form class="form-horizontal" <?php
    $attributes = array('class' => 'form-signin', 'role' => 'form');
    echo form_open(base_url().'salvaralteracao',$attributes);
    ?> 
         
            <input type='hidden' name='cod' value='<?=$cod ?>'/>    
            <input type='hidden' name='saldo' value='<?=$saldo ?>'/>    
            <fieldset>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="ano">Data:</label>
                    <div class="col-sm-8">
                        <input  type="date" class="form-control"  name='ano' id='data' value='<?=$ano?>'  
                            autofocus  placeholder=' Preencha a Data ' maxlength='255'/>
                    </div>
                </div>
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="entrada">Valor Mensal:</label>
                    <div class="col-sm-8">
                        <input  type="text"    class="form-control"  name='entrada' id='entrada' value='<?=$entrada?>'  
                            autofocus  placeholder=' Preencha o Entrada  ' maxlength='255'/>
                    </div>
                </div>
               
                        <input  type="hidden" class="form-control"  name='saida' id='saida' value='<?=$saida?>'  
                            autofocus required placeholder='  ' maxlength='255'/>
                    
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="novasaida">Novo Gasto:</label>
                    <div class="col-sm-8">
                        <input  type="text"    class="form-control"  name='novasaida' id='novasaida' value='<?php echo set_value('novasaida'); ?>'  
                            autofocus  placeholder=' Preencha a Nova saida ' maxlength='255'/>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="contas">Tipo de Gasto:</label>
                    <div class="col-sm-8">
                      <select name="contas" class="form-control"  name='contas' id='contas' value=''  
                                <?= mb_strtoupper($nome_contas); ?>
                            autofocus  placeholder=' Tipo de Gasto ' maxlength='255'/>
                    </select>
                </div>
                    <br><br><br>
                <button class="btn btn-primary pequeno" type="submit">Cadastrar</button>
            </fieldset>
        </form>
    </div>
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>
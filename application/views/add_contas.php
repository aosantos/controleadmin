      <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
      <script src="<?php echo base_url() ?>assets/js/npm.js"></script>
      <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
  
<script>

    $(document).ready(function () {

        remover = function (id) {
            var teste = confirm('Deseja mesmo excluir ?');
            if (teste)
                idx = id.split('_')[1];

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>/contasremover',
                data: {
                    id: $('#odd_gradeX_' + idx).data('id')
                },
                success: function (result) {
                    alert('O registro foi deletado!');
                },
                error: function () {
                    alert('Erro ao deletar o registro,Tente novamente mais tarde!')
                }
            });

            $('#remover_' + idx).closest('tr').fadeOut(400, function () {
                $('#remover_' + idx).closest('tr').remove();
            });

            return false;

        };

    });

</script>

<script>
    function confirmaSaida(event) {
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        var teste = confirm("Tem certeza de que deseja sair?");
        if (teste) {
            location.href = "<?php echo base_url()?>sair";
        }

    }
</script> 
<br> 
<div id="main" class="container-fluid">
     <br><br>
  <h3 class="page-header">Adicionar Contas</h3>
  
 <div align='center'>
        <ul class="breadcrumb ">
           <li>Adicionar Contas</li>
        </ul>
      <?php 
         if (validation_errors()) {?>
        <div class="alert alert-danger">
          <?=  validation_errors()?>
        </div>
      <?php }  ?>
     <form class="form-horizontal" action='<?php base_url()?>cadastrar_contas' method='POST' >
            
            <fieldset>
                         
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="contas">Nome da Conta:</label>
                    <div class="col-sm-8">
                        <input  type="text" class="form-control"  name='nome_contas' id='nome_contas' value='<?php echo set_value('nome_contas'); ?>'  
                            autofocus  placeholder=' Nome da Conta ' maxlength='255'/>
                    </div>
                </div>
                <button class="btn btn-primary pequeno" type="submit">Cadastrar</button>
            </fieldset>
        </form>
    </div>
                    </table>
</body>
</html>
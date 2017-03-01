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
                <a href="<?php base_url()?>dinheiro" class="btn btn-primary pequeno">Voltar</a>
            </fieldset>
        </form>
    </div>
                        
                    <?php
                    $color= "beige";
                    if ($max = count($contas)){
 
     echo "<table class='table table-bordered   breadcrumb'>
        <thead >
        <th width=\"1000px\"> Nome da Conta</th>
        <th width=\"200px\"> Ações</th>
        </thead>
        <tbody>
            <tr>";
 }
     ?>
                    
     <?php

for ($i = 0; $i < $max; $i++) {

    if ($color == 'white') {
        $color = 'lightcyan';
    } else {
        $color = 'white';
    }
    $id     = $contas[$i]['cod'];
    $cod     = $contas[$i]['cod'];
    $nome   = $contas[$i]['nome_contas'];
 
    ?> 
 
                <tr bgcolor='<?= $color ?>' class="<?php ?>" id="odd_gradeX_<?= ($i + 1) ?>" data-id="<?= $contas[$i]['cod'] ?>">
                    <td style="width:1000px;"><i><div align="center"><b><?= $nome ?></b></div></i></td>
                    <td width='105px'>

                        <a href="<?php echo base_url() ?>editar_nome_contas/<?= strtolower($contas[$i]['cod']); ?>"class="btn btn-danger btn-icon btn-circle">&nbsp;<span class="glyphicon glyphicon-pencil"></span> </a>
                        <a class="btn btn-danger btn-icon btn-circle" id="remover_<?= ($i + 1) ?>" onclick="remover(this.id);">&nbsp;<i class="glyphicon glyphicon-trash"></i></a>

                </tr>
    <?php
}
?>      

    </table>
</body>
</html>
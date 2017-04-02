      <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
      <script src="<?php echo base_url() ?>assets/js/npm.js"></script>
      <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script>
    function confirmaSaida(event) {
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        var teste = confirm("Tem certeza de que deseja sair?");
        if (teste) {
            location.href = "<?php echo base_url()?>sair";
        }

    }
</script> 
<script>

    $(document).ready(function () {

        remover = function (id) {
            var teste = confirm('Deseja mesmo excluir ?');
            if (teste)
                idx = id.split('_')[1];

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>/tipogastosremover',
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
<br>
<?php if ($max = count($gastos)){
    echo "<table class='table table-bordered   breadcrumb '>
            <thead >
            <th width='200px'> Codigo do Usuário</th>
            <th width='200px'> Data </th>
            <th width='200px'> Contas</th>
            <th width='200px'> Nome</th>
            <th width='200px'> Total</th>
            <th width='200px'> Ações</th>
            </thead>
            <tbody>
                <tr>";
 
}
?>
            
<?php
    $color ="";
    
    for ($i = 0; $i < $max; $i++) {

        $cod         = $gastos[$i]['cod'];
        $admcod      = $gastos[$i]['administrador_cod'];
        $contas      = $gastos[$i]['contas'];
        $ano         = $gastos[$i]['dinheiro_ano'];
        $total       = $gastos[$i]['total'];
        $nome        = $gastos[$i]['nome'];
        
        if ($color == "lightblue") {
            $color = "lightcyan";
        } else {
            $color = "lightblue";
        }  
        $msg = ' &nbsp;Reais';
        $mensagem ='&nbsp;Real';
        $msn='&nbsp;Centavos';
        
?>
    
                </h4>
 
 <tr bgcolor='<?= $color ?>' class="<?php ?>" id="odd_gradeX_<?= ($i + 1) ?>" data-id="<?= $gastos[$i]['cod'] ?>">
        <td style="width:185px;"><i><b><?= $admcod ?></b></i></td>
        <td style="width:150px;"><i><b>&nbsp;<?= date('d/m/Y', strtotime($ano)) ?></b></i></td>
        <td style="width:150px;"><i><b>&nbsp;<?= $contas ?></b></i></td>
        <td style="width:150px;"><i><b>&nbsp;<?= $nome?></b></i></td>
        <td style="width:150px;"><i><div align="center"><b><?php    if($total>1){
            echo $total.$msg;
        }elseif($total<1){
            echo $total.$msn;
        }  else {
            echo $total.$mensagem;
        }
     ?></b></div></i></td>
        <td width='105px'>

<a href="<?php echo base_url() ?>contagastosportipo/<?= strtolower($gastos[$i]['contas']=str_replace(" ","_",preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($gastos[$i]['contas']))))); ?>"class="btn btn-danger btn-icon btn-circle">Detalhes  &nbsp;<span class="glyphicon glyphicon-dashboard"></span> </a>
<a class="btn btn-danger btn-icon btn-circle" id="remover_<?= ($i + 1) ?>" onclick="remover(this.id);">&nbsp;<i class="glyphicon glyphicon-trash"></i></a>      
    </tr>
    <?php
}
?>      

</table>
<div class="pager">
    <li><?= $links_paginacao ?></li>
</div>
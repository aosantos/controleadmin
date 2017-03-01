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
                url: '<?php echo base_url() ?>/dividasremover',
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

    
    <div align="center">
        
       
            <a href="<?php echo base_url() ?>add_dividas" class="btn btn-success pequeno" > Cadastrar <i class="glyphicon glyphicon-plus icon-white"></i>
</a>

   
    <?php
$color          = "beige";
    
    ?>                                
                                         
<tr bgcolor='<?=$color?>'>
   <?php if   ($max = count($dividas)){
       echo"<table class='table table-bordered   breadcrumb'>
            <thead >
            <th width='350px'> Data</th>
            <th width='350px'> Saldo Devedor</th>
            <th width='350px'> Relatório</th>
            <th width='350px'> Ações</th>
            </thead>
            <tbody>
                <tr>";
   }
   ?>

         <?php
   
    for ($i = 0; $i < $max; $i++) {

        $id = $dividas[$i]['cod'];
        if ($color == "lightblue") {
            $color = "lightcyan";
        } else {
            $color = "lightblue";
        }
        $cod            = $dividas[$i]['cod'];
        $admcod         = $dividas[$i]['administrador_cod'];
        $data           = $dividas[$i]['data_dividas'];
        $entrada        = $dividas[$i]['entrada'];
        $novaentrada    = $dividas[$i]['novaentrada'];
        $saldo          = $dividas[$i]['saldo'];
        $observacao     = $dividas[$i]['observacao'];
        
        if ($dividas[$i]['saldo'] >= $dividas[$i]['entrada']) {
            $saldo = "<font color='red'>$saldo </font>";
        } else {
            $saldo = "<font color='lime'>$saldo </font>";
        }
        
        ?> 
    <tr bgcolor='<?= $color ?>' class="<?php ?>" id="odd_gradeX_<?= ($i + 1) ?>" data-id="<?= $dividas[$i]['cod'] ?>">
        <td style="width:185px;"><i><b><?= date('d/m/Y', strtotime($data)) ?></b></i></td>
        <td style="width:150px;"><i><b>R$&nbsp;<?= $saldo ?></b></i></td>
        <td style="width:150px;"><i><b>&nbsp;<?= $observacao ?></b></i></td>
        <td width='105px'>

            <a href="<?php echo base_url() ?>editardivida/<?= strtolower($dividas[$i]['cod']); ?>"class="btn btn-danger btn-icon btn-circle">Atualizar&nbsp;<span class="glyphicon glyphicon-pencil"></span> </a>
            <a class="btn btn-danger btn-icon btn-circle" id="remover_<?= ($i + 1) ?>" onclick="remover(this.id);">Excluir&nbsp;<i class="glyphicon glyphicon-trash"></i></a>
            
    </tr>
    <?php
}
?>      

</table>
    
<div class="pager">
    <li><?php// $links_paginacao ?></li>
</div>
    </div>
    </tbody>

    </body>
    </html>
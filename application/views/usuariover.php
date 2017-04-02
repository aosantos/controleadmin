      <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
      <script src="<?php echo base_url() ?>assets/js/npm.js"></script>
      <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script>

    $(document).ready(function () {

        remover = function (id) {
            var teste = confirm('Deseja mesmo excluir o seu Perfil ?');
            if (teste)
                idx = id.split('_')[1];

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>/usuarioremover',
                data: {
                    id: $('#odd_gradeX_' + idx).data('id')
                },
                success: function (result) {
                    alert('Sentiremos saudades!');
                    window.location="<?php echo base_url() ?>sair";
                },
                error: function () {
                    alert('Apague todos seus registros no sistema!\n\
                    Tente novamente mais tarde!');
                }
            });

            $('#remover_' + idx).closest('tr').fadeOut(400, function () {
                $('#remover_' + idx).closest('tr').remove();
            });

            return false;

        };

    });

</script>

    <?php
$color          = "beige";
    
    ?>                                
                                         
<tr bgcolor='<?=$color?>'>
   <?php if   ($max = count($usuarios)){
       echo"<table class='table table-bordered   breadcrumb'>
            <thead >
            <th width='350px'> Código</th>
            <th width='350px'> Nome </th>
            <th width='350px'> Login</th>
            <th width='350px'> Email</th>
            
            <th width='350px'> Ações</th>
            </thead>
            <tbody>
                <tr>";
   }
   ?>

         <?php
   
    for ($i = 0; $i < $max; $i++) {

        $id = $usuarios[$i]['cod'];
        if ($color == "lightblue") {
            $color = "lightcyan";
        } else {
            $color = "lightblue";
        }
        $cod             = $usuarios[$i]['cod'];
        $login           = $usuarios[$i]['login'];
        $nome            = $usuarios[$i]['nome'];
        $email           = $usuarios[$i]['email'];
        ?> 
    <tr bgcolor='<?= $color ?>' class="<?php ?>" id="odd_gradeX_<?= ($i + 1) ?>" data-id="<?= $usuarios[$i]['cod'] ?>">
        <td style="width:185px;"><i><b><?= $cod ?></b></i></td>
        <td style="width:150px;"><i><b>&nbsp;<?= $login ?></b></i></td>
        <td style="width:150px;"><i><b>&nbsp;<?= $nome ?></b></i></td>
        <td style="width:150px;"><i><b>&nbsp;<?= $email ?></b></i></td>
        
        <td width='105px'>
            
            <a class="btn btn-danger btn-icon btn-circle" id="remover_<?= ($i + 1) ?>" onclick="remover(this.id);">Excluir&nbsp;<i class="glyphicon glyphicon-trash"></i></a>
    </tr>
    <?php
}
?>      
    
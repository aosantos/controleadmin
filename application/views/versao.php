<script>
    function confirmaSaida(event) {
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        var teste = confirm("Tem certeza de que deseja sair?");
        if (teste) {
            location.href = "<?php echo base_url() ?>sair";
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
                url: '<?php echo base_url() ?>/dinheiroremover',
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

<div align="center">
     
    <table class="table-bordered">
 <tbody>
            <tr><strong>
        <p>Versão do sistema 1.0</p>
        
        <p><?php ?> todos os direitos reservados</p>
        <p>Autor:Anderson Oliveira</p>
        &COPY; &nbsp; <?=  date('Y') ?>
</strong>
        </tr>

    </table>
</div>
</tbody>
</body>
</html>
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
    <div align="center">
        </ul>
        
<?php if ($max = count($dinheiro)){
     echo "<table class='table table-bordered   breadcrumb'>
            <thead >
            <th width='800px'><div align='center'><h3>Relatório</h3></div></th>
            <th width='800px'><div align='center'><h3>Referências</h3></div></th>
            </thead>
            <tbody>
                <tr>";
}	
?>
       
     <?php
    $color          = "beige";
    
for ($i = 0; $i < $max; $i++) {

    $id = $dinheiro[$i]['cod'];
  if ($color  == "black") {
                            $color  = "#333;";
                        }
                        else {
                            $color  = "black";
                        }
                        
 
        $mensagem       = 'Reais';
        $msg            = "<font color='red'>Tome Cuidado</font>";
        
        
        if ($dinheiro[$i]['saldo'] == 1 || $dinheiro[$i]['saldo'] == -1) {
            $mensagem   = 'Real';
        } 
        elseif ($dinheiro[$i]['saldo'] > 0 && $dinheiro[$i]['saldo'] < 1) {
            $mensagem   = 'Centavos';
        } 
        
        if ($dinheiro[$i]['saldo'] <= 0) {
            $msg        = "<font color='red'>Limite Estourado</font>";
        } 
        elseif ($dinheiro[$i]['saldo'] >= 100) {
            $msg        = "<font color='lime'>Está no limite</font>";
        } 
        elseif ($dinheiro[$i]['saldo'] <= 100 && $dinheiro[$i]['saldo'] >= 1) {
            $msg        = "<font color='yellow'>Tome Cuidado</font>";
        } 
        else {
            $mensagem = 'Reais';
        }
        
            $saldo = $dinheiro[$i]['saldo']; 
            $relatorio='';
                        
                        if ($dinheiro[$i]['saida']  >= $dinheiro[$i]['entrada'] ) {
                     $saldo  ="<font color='red'>$saldo </font>";
                } else {
                     $saldo  = "<font color='lime'>$saldo </font>";
                }
                               
 $relatorio.= $saldo . '&nbsp' . '&nbsp' . $mensagem . '&nbsp' . $msg;
                         
    ?>                                
    <tr bgcolor='<?=$color?>' class="<?php ?>" id="odd_gradeX_<?= ($i + 1) ?>" data-id="<?= $dinheiro[$i]['cod'] ?>">
        
<tr bgcolor='<?=$color?>'>
      <td width='800px'>
          <h4><div align='center'><font color='white'><i><?= $relatorio ?></font></div></h4>
      </td>
      <td width='800px'>
          <h4><div align='center'><font color='white'><i> Relatório Referente a: <?=date('d/m/Y', strtotime($dinheiro[$i]['ano'])) ?>
                  </i></font></div></h4>
      </td>
<?php
}
?>       


</table>
<div class="pager">
    <li><?= $links_paginacao ?></li>
</div>

    </div>
    </tbody>
    </body>
    </html>
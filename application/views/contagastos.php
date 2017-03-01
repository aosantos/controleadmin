<br>
    <div align="center">
         <table class="table table-bordered breadcrumb">
            <thead >
            <th width="300px"> Ano</th>
            <th width="300px"> Conta</th>
            <th width="300px"> Total </th>
            
            </thead>
            <tbody>
                <tr>
    <?php

    $max = count($contas);
    $color ="";
    for ($i = 0; $i < $max; $i++) {

        if ($color == "lightcyan") {
            $color = "lightcyan";
        } else {
            $color = "lightcyan";
        }
        $cod         = $contas[$i]['cod'];
        $conta       = $contas[$i]['contas'];
        $admcod      = $contas[$i]['administrador_cod'];
        $ano         = $contas[$i]['dinheiro_ano'];
        $total       = $contas[$i]['total'];
        
        $msg = ' &nbsp;Reais';
        $mensagem ='&nbsp;Real';
        $msn='&nbsp;Centavos';
        
        ?> 

    <tr bgcolor='<?= $color ?>' class="<?php ?>" id="odd_gradeX_<?= ($i + 1) ?>" data-id="<?= $contas[$i]['cod'] ?>">
        <td style="width:485px;"><i><b><?= date('Y', strtotime($ano)) ?></b></i></td>
        <td style="width:450px;"><i><b>&nbsp;<?= $conta ?></b></i></td>
        <td style="width:450px;"><i><b>&nbsp;<?php    if($total>1){
            echo $total.$msg;
        }elseif($total<1){
            echo $total.$msn;
        }  else {
            echo $total.$mensagem;
        }
     ?></b></i></td>
        
    <?php
}
?>      

</table>
    
    </div>
    </tbody>

    </body>
    </html>
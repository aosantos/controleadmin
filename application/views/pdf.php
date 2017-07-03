<?php

$data = [];

		$hoy = date("dmyhis");

        //load the view and saved it into $html variable
           $color          = 'beige';
                 

$max = count($dinheiro);

for ($i = 0; $i < $max; $i++) {

    $id = $dinheiro[$i]['cod'];
  if ($color  == '#333;') {
                            $color  = 'lightcyan';
                        }
                        else {
                            $color  = '#333;';
                        }
                        $saldo      = $dinheiro[$i]['saldo']; 
                        $entrada    = $dinheiro[$i]['entrada']; 
                        $saida      = $dinheiro[$i]['saida']; 
                        $novasaida  = $dinheiro[$i]['novasaida']; 
                        $ano        = $dinheiro[$i]['ano']; 
                        $relatorio  = $dinheiro[$i]['relatorio']; 
                        
                        if ($dinheiro[$i]['saida']  >= $dinheiro[$i]['entrada'] ) {
                     $saldo  ="<font color='red'>$saldo </font>";
                } else {
                     $saldo  = "<font color='lime'>$saldo </font>";
                }
    ?>                                
    <tr bgcolor='<?=$color?>' class='<?php ?>' id='odd_gradeX_<?= ($i + 1) ?>' data-id='<?= $dinheiro[$i]['cod'] ?>'>
        <td style='width:150px;'><i><?=date('d/m/Y', strtotime($ano))?></i></td>
        <td style='width:150px;'><i><?= $entrada ?></i></td>
        <td style='width:150px;'><i><?= $saida?></i></td>
        <td style='width:150px;'><i><?= $saldo ?></i></td>
        <td style='width:150px;'><i><?= $relatorio ?></i></td>
               
    </tr>
<?php
}
?>               
        </tbody>
   
   <?php

        // $html = $this->load->view('v_dpdf',$date,true);
 		
 		$html="   
       '<table width='100%' cellspacing='1' cellpadding='4' border='0' class='BordaTabela' > 
    <tbody>
    	<tr class='TituloTabela'> 
        	<th width='5%' scope='col' class='ui-corner-tl'>
            	<div align='LEFT'><b>DATA</b></div>
        	</th>
            <th width='20%' scope='col'>
            	<div align='LEFT'><b>ENTRADA</b></div>
    		</th>
            <th width='10%' scope='col'>
            	<div align='LEFT'><b>SAIDA</b></div>
    		</th>
            <th width='30%' scope='col'>
            	<div align='LEFT'><b>SALDO</b></div>
    		</th>
            <th width='10%' scope='col'>
            	<div align='LEFT'><b>RELATORIO</b></div>
    		</th>
       	</tr>
";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "cipdf_".$hoy.".pdf";
 
        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4-L'); 
 		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, "D");
      
?>
 </table>
<?php 

function displaypdf($result){
 
        date_default_timezone_set("Asia/Colombo");
      require_once('../resource/tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("BODIMA.LK - Monthly Rent Report");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <style>
      table{
          
      }

      li{
        display: flex;
        justify-content: space-between;
        padding-top: 15px;
        padding-bottom: 15px;
      }
      
      
      </style>
      <h4 align="center">Payment Report - Monthly Rent </h4><br /> 
      Reciver : Rohini Wimalarathne<br/>

      Genarated date : '.date("Y/m/d  H:i:s") .'<br/>

      Report genarated automatically<br/><br/>

      <table border="1" cellspacing="0" cellpadding="3" align="center">  
       
        
            <tr>  
                <th width="25%">Month</th>  
                <th width="20%">amount</th>  
                <th width="20%">date</th>  
                <th width="20%">time</th>  
                <th width="15%">method</th>
           </tr>  
      ';  
      $payments=unserialize($_GET['pay']);
      $content .=fetchdata_pay($result);  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      ob_end_clean();
      $obj_pdf->Output('rent_report.pdf', 'I');  
 }



 function fetchdata_pay($results){
    $output2 ='';

foreach($results as $row){ 
    $output2 .="
    <tr>
    <td>".$row['paidDateTime']."</td>
    <td>".$row['first_name']."</td>
    <td>".$row['year'].' '.date('F',mktime(0,0,0,$row['month'],0,0))."</td>
    <td>".$row['amount']."</td>
    <td>".$row['cash_card']."</td>
    <td>000".$row['B_post_id']."</td>
    </tr>
";
    }

return $output2;
}

$results=unserialize($_GET['result']);
// displaypdf($results);
print_r($results);


?>
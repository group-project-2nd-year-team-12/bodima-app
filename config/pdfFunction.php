<?php 
// require_once ('../../config/database.php');
function userDetails($html,$name){

// create new PDF document
$pdf = new TCPDF('p', 'mm', 'A4', true, 'UTF-8', false);
// set margins
$pdf->AddPage();
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------
// set font


$pdf->SetFont('times', '', 16);
date_default_timezone_set("Asia/Colombo");
$imageFile=K_PATH_IMAGES.'logo1.png';
$pdf->Image($imageFile,20,10,40,'','PNG','','T',false,300,'C',false,false,0,false,false,false);
$pdf->Ln(20);
$pdf->SetFont('helvetica','B',16);
$pdf->SetTextColor(93,128,182);
$pdf->Cell(0,5,'Bodima accomadation management system',0,1,'C');
$pdf->SetFont('helvetica','B',12);
$pdf->SetTextColor(16,30,90);
$pdf->Cell(189,5,$name.' Report',0,1,'C');
$pdf->Ln(5);

$html.='
    <style>
    li{
      display: flex;
      justify-content: space-between;
      padding-top: 15px;
      padding-bottom: 15px;
    }
    tr{
        height:100px;
        font-weight: bolder;
        color: #5d5d5d;
        text-align:center;
        width:25%;
        padding:20px;
    }
    th{
        font-align:center;
        background-color: #5d80b6;
        padding:20px;
        color: white;
        height:100px;
        width:20%;
    }
    td{
        height:100px;
        width:20%
        font-align:center;
    }
    </style> 
';
$pdf->SetFont('helvetica','B',14);
$pdf->writeHTML($html); 
$pdf->Output('userdetails.pdf', 'I');
}
?>

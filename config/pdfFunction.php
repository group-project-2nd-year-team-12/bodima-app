<?php 
// require_once ('../../config/database.php');
function userDetails($html){
// class PDF extends TCPDF{
//     public function Header(){
//         date_default_timezone_set("Asia/Colombo");
//         $imageFile=K_PATH_IMAGES.'logo1.png';
//         $this->Image($imageFile,10,5,40,'','PNG','','T',false,300,'C',false,false,0,false,false,false);
//         $this->Ln(20);
//         $this->SetFont('helvetica','B',16);
//         $this->SetTextColor(93,128,182);
//         $this->Cell(0,5,'Bodima accomadation management system',0,1,'C');
//         $this->SetFont('helvetica','B',12);
//         $this->SetTextColor(16,30,90);
//         $this->Cell(189,5,'User Details Report',0,1,'C');
        
//         $content = '';  
//         $content .= '
//         <style>
//         li{
//           display: flex;
//           justify-content: space-between;
//           padding-top: 15px;
//           padding-bottom: 15px;
//         }
//         tr{
//             height:100px;
//             font-weight: bolder;
//             color: #5d5d5d;
//             text-align:left;
//         }
//         th{
//             text-align: left;
//             background-color: #5d80b6;
//             padding:10px;
//             color: white;
//         }
//         </style> 
//         Reciver : Rohini Wimalarathne<br/>
  
//         Genarated date : '.date("Y/m/d  H:i:s") .'<br/>
  
//         Report genarated automatically<br/><br/>
  
//         <table border="1" cellspacing="0" cellpadding="3" align="center">           
//              <tr>  
//                 <th style="width:25%;height:100px;"width="25%"; height="100px";background-color="#101e5a">User type </th>  
//                 <th style="width:25%;height:100px;"width="25%"; height="100px">Number of user </th>  
//                 <th style="width:25%;height:100px;"width="25%"; height="100px">Last Name</th>  
//                 <th style="width:25%;height:100px;"width="25%"; height="100px">Email</th>  
               
//             </tr>
//              <tr>  
//                 <td style="width:25%;height:100px;background-color:#101e5a;color:#fff">Student </td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Number of user </td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Last Name</td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Email</td>  
               
//              </tr>
//              <tr>  
//                 <td style="width:25%;height:100px;background-color:#101e5a;color:#fff">Boarder </td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Number of user </td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Last Name</td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Email</td>  
              
//             </tr>
//             <tr>  
//                 <td style="width:25%;height:100px;background-color:#101e5a;color:#fff">Boarding Owner </td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Number of user </td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Last Name</td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Email</td>  
                
//              </tr>
//              <tr>  
//                 <td style="width:25%;height:100px;background-color:#101e5a;color:#fff">Food Supplier </td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Number of user </td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Last Name</td>  
//                 <td style="width:25%;height:100px;"width="25%"; height="100px">Email</td>  
//             </tr>
//             </table>';
//         // $this->writeHTML($content); 
//     }
//     public function Footer(){

//     }
// }
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
$pdf->Cell(189,5,'User Details Report',0,1,'C');
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
        text-align:left;
        width:25%;
        padding:20px;
    }
    th{
        font-align:center;
        background-color: #5d80b6;
        padding:20px;
        color: white;
        height:100px;
        width:25%;
    }
    td{
        height:100px;
        width:25%
        font-align:center;
    }
    </style> 
';
$pdf->SetFont('helvetica','B',14);
$pdf->writeHTML($html); 
$pdf->Output('userdetails.pdf', 'I');
}
?>

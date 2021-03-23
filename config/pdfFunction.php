<?php 
require_once ('../../config/database.php');
function userDetails(){
class PDF extends TCPDF{
    public function Header(){
        date_default_timezone_set("Asia/Colombo");
        $imageFile=K_PATH_IMAGES.'logo1.png';
        $this->Image($imageFile,10,5,40,'','PNG','','T',false,300,'C',false,false,0,false,false,false);
        $this->Ln(20);
        $this->SetFont('helvetica','B',16);
        $this->SetTextColor(93,128,182);
        $this->Cell(0,5,'Bodima accomadation management system',0,1,'C');
        $this->SetFont('helvetica','B',12);
        $this->SetTextColor(16,30,90);
        $this->Cell(189,5,'User Details Report',0,1,'C');
        
        $content = '';  
        $content .= '
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
        }
        th{
            text-align: left;
            background-color: #5d80b6;
            padding:10px;
            color: white;
        }
        </style> 
        Reciver : Rohini Wimalarathne<br/>
  
        Genarated date : '.date("Y/m/d  H:i:s") .'<br/>
  
        Report genarated automatically<br/><br/>
  
        <table border="1" cellspacing="0" cellpadding="3" align="center">           
             <tr>  
                <th style="width:25%;height:100px;"width="25%"; height="100px";background-color="#101e5a">User type </th>  
                <th style="width:25%;height:100px;"width="25%"; height="100px">Number of user </th>  
                <th style="width:25%;height:100px;"width="25%"; height="100px">Last Name</th>  
                <th style="width:25%;height:100px;"width="25%"; height="100px">Email</th>  
               
            </tr>
             <tr>  
                <td style="width:25%;height:100px;background-color:#101e5a;color:#fff">Student </td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Number of user </td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Last Name</td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Email</td>  
               
             </tr>
             <tr>  
                <td style="width:25%;height:100px;background-color:#101e5a;color:#fff">Boarder </td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Number of user </td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Last Name</td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Email</td>  
              
            </tr>
            <tr>  
                <td style="width:25%;height:100px;background-color:#101e5a;color:#fff">Boarding Owner </td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Number of user </td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Last Name</td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Email</td>  
                
             </tr>
             <tr>  
                <td style="width:25%;height:100px;background-color:#101e5a;color:#fff">Food Supplier </td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Number of user </td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Last Name</td>  
                <td style="width:25%;height:100px;"width="25%"; height="100px">Email</td>  
            </tr>
            </table>';
        $this->writeHTML($content); 
    }
    public function Footer(){

    }
}
// create new PDF document
$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Admin of bodima');
$pdf->SetTitle('User\'s details of bodima');
$pdf->SetSubject('Data record');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 041', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 16);

// add a page
$pdf->AddPage();


// $txt = 'Example of File Attachment.
// Double click on the icon to open the attached file.';
// $pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

// // attach an external file
// $pdf->Annotation(85, 27, 5, 5, 'text file', array('Subtype'=>'FileAttachment', 'Name' => 'PushPin', 'FS' => 'data/utf8test.txt'));

// ob_end_clean();
$pdf->Output('userdetails.pdf', 'I');
}
?>

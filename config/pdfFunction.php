<?php function userDetails(){


class PDF extends TCPDF{
    public function Header(){
        $imageFile=K_PATH_IMAGES.'logo1.png';
        $this->Image($imageFile,10,10,40,'','PNG','','T',false,200,'',false,false,0,false,false,false);
        $this->Ln(5);
        $this->SetFont('helvetica','B',16);
        $this->Cell(189,5,'Bodima accomadation management system',0,1,'C');
        $this->SetFont('helvetica','B',12);
        $this->Cell(189,5,'report User Details',0,1,'C');
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

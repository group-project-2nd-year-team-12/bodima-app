<?php function userDetails(){
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  // set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('Admin of bodima');
  $pdf->SetTitle('User\'s details of bodima');
  $pdf->SetSubject('Data record');
  $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
  
  // set default header data
  $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 045', PDF_HEADER_STRING);
  
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
  
  $pdf->SetFont('times', 'B', 20);
  
  // Create a fixed link to the first page using the * character
  $index_link = $pdf->AddLink();
  $pdf->SetLink($index_link, 0, '*1');
  $pdf->Cell(0, 10, 'Link to INDEX', 0, 1, 'R', false, $index_link);
  
  
  // fixed link to the first page using the * character
  $html = '<a href="#*1" style="color:blue;">link to INDEX (page 1)</a>';
  $pdf->writeHTML($html, true, false, true, false, '');
  
  $pdf->addTOCPage();
  
  // write the TOC title
  $pdf->SetFont('times', 'B', 16);
  $pdf->MultiCell(0, 0, 'Table Of Content', 0, 'C', 0, 1, '', '', true, 0);
  $pdf->Ln();
  
  $pdf->SetFont('times', '', 12);
  
  // add a simple Table Of Content at first page
  // (check the example n. 59 for the HTML version)
  $pdf->addTOC(1, 'courier', '.', 'INDEX', 'B', array(128,0,0));
  
  // end of TOC page
  $pdf->endTOCPage();
  ob_end_clean();
  $pdf->Output('User_details_of _bodima', 'D');
}
?>
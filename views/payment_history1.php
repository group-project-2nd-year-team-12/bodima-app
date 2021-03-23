<?php session_start();

date_default_timezone_set("Asia/Colombo");?>

<?php function fetchdata($val){
    $output='';
foreach($val as $payment){
        $output .=
"
<li>
    <span>".$payment['year']."  ".date('M', mktime(0, 0, 0,$payment['month'], 10))."</span>
    <span>".$payment['amount'].".00</span>
    <span>".date('Y/m/d',strtotime($payment['paidDateTime']))."</span>
    <span>".date('H:i:s',strtotime($payment['paidDateTime']))."</span>
    <span><h5>&nbsp;&nbsp;&nbsp;".$payment['cash_card']."</h5></span>
</li>
";
}
return $output;
}

function fetchdatapdf($val){
    $output='';
foreach($val as $payment){
        $output .=
"

<tr>
    <td>".$payment['year']."  ".date('M', mktime(0, 0, 0,$payment['month'], 10))."</td>
    <td>".$payment['amount']."</td>
    <td>".date('Y/m/d',strtotime($payment['paidDateTime']))."</td>
    <td>".date('H:i:s',strtotime($payment['paidDateTime']))."</td>
    <td>".$payment['cash_card']."</td>
</tr>

";
}
return $output;
}
 

if(isset($_POST["generate_pdf"]))  
 { 
      require_once('../resource/tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("BODIMA.LK Payment Report - Monthly Rent");  
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
      $content .= fetchdatapdf($payments);  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      ob_end_clean();
      $obj_pdf->Output('file.pdf', 'I');  
 }?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <title>Payment History</title>
	 <link rel="stylesheet" href="../resource/css/new_home.css">
	 <link rel="stylesheet" href="../resource/css/all.css">
	 <link rel="stylesheet" href="../resource/css/sidebar2.css">
	 
   
	 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="../resource/css/payment_history1.css">
    <link rel="stylesheet" href="../resource/css/extra.css">
</head>

 <body>


<?php require "header1.php"?>
	 <div class="container1">
     	
     <div class="container2">
        <div class="sidebar_b">
        <?php require "sidebar1.php"?>	
        </div>
        <div class="middle_b"> 
        <!-- ../controller/boarder_list_controlN.php?boarderlist=1 -->

        <?php 
        $payments=unserialize($_GET['pay']);
        $monthlist=unserialize($_GET['months']);
        // print_r($monthlist);
        ?>

          <h1>payment History<a href="../controller/new_payment_Control.php?id=1"><button class="paid"><i class="fas fa-chevron-left"></i>NEW</botton></a></h1>
              <div class="mid_G">
                  
                
                <h3>Rent &nbsp;Payments</h3>
                <hr/>
                <div class="filter_block">
                <span>filters</span>
                <hr/>
                </div>
                <div class="pay_list">
                    <div class="head_block">
                    <li>
                        <span>Month</span>
                        <span>amount</span>
                        <span>date</span>
                        <span>time</span>
                        <span>method</span>
                    </li>
                    </div>


<?php echo fetchdata($payments);?>

                   

                </div>
                <br/> 
                <hr/>
                
                
                
                <form method="post"> 
                <div class="pdfbar">
                   
                   <div class="pdfin"><button type="submit" name="generate_pdf" class="genarate_pdf_btn">Generate PDF<i class="far fa-file-pdf" style="font-size: medium; padding-left: 10px;"></i></button></div>
                  
               </div>
                </form>

                


              </div>
              <div class="mid_H">
                  
                  
                    <div class="Next_payment">
                        <h3>New Payment</h3>
                        <hr/>

                        <?php foreach($monthlist as $month){?>
                        <div class="new_payblock" onclick="location.href='../controller/new_payment_Control.php?id=1';">
                            <h3><?php echo date('F', $month['time'])?></h3>
                            <button>Pay</button>
                        </div>
                        <?php }?>

                       
                        
                        <br/>  
                        <hr/>                   
                    </div>


                    <div class="Set_Notifications">
                        <h3>Notifications</h3>   
                        <hr/>
                        <div class="notification_block">
                            <div class="notify">
                                <div class="msg_head">
                                    <div style="display:flex;"><img src="../resource/img/mortgage.png">
                                    <p>January payment Remainder</p>
                                    </div>
                                    <div><span> 35 min ago</span></div>
                                </div>
                                <div class="msg_body">
                                Your rent payment has due. Please pay before 2021-01-30
                                </div>
                                  
                            </div>  
                            <div class="notify">
                                <div class="msg_head">
                                    <div style="display:flex;"><img src="../resource/img/mortgage.png">
                                    <p>January payment Remainder</p>
                                    </div>
                                    <div><span> 35 min ago</span></div>
                                </div>
                                <div class="msg_body">
                                Your rent payment has due. Please pay before 2021-01-30
                                </div>
                                  
                            </div>
                            <div class="notify">
                                <div class="msg_head">
                                    <div style="display:flex;"><img src="../resource/img/mortgage.png">
                                    <p>January payment Remainder</p>
                                    </div>
                                    <div><span> 35 min ago</span></div>
                                </div>
                                <div class="msg_body">
                                Your rent payment has due. Please pay before 2021-01-30
                                </div>
                                  
                            </div>


                        </div>                        
  

                    </div>

                    

                 
              
               
               
              </div>
        </div>
        
    </div>

	</div>	
	 
	 <script>
    // $('.btn').click(function(){
    //   $(this).toggleClass("click");
      $('.sidebar').toggleClass("show");
    // });
      $('.profile-btn').click(function(){
        $('nav ul .profile-show').toggleClass("show");
        $('nav ul .first').toggleClass("rotate");
      });
      $('.serv-btn').click(function(){
        $('nav ul .serv-show').toggleClass("show1");
        $('nav ul .second').toggleClass("rotate");
      });

      $('nav ul .open-show').toggleClass("show1");

      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });
    </script>
</body>
</html>

    
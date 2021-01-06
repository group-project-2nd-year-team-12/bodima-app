<?php session_start();

?>

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

          <h1>payment History<a href="../controller/boarder_list_controlN.php?boarderlist=1"><button class="paid"><i class="fas fa-chevron-left"></i>NEW</botton></a></h1>
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

                    <?php foreach($payments as $payment){?>
                    <li>
                    <span><?php echo $payment['year']?> <?php echo date('F', mktime(0, 0, 0,$payment['month'], 10)); ?></span>
                        <span><?php echo $payment['amount']?>.00</span>
                        <span><?php echo date("Y/m/d",strtotime($payment['paidDateTime']))?></span>
                        <span><?php echo date("H:i:s",strtotime($payment['paidDateTime']))?></span>
                        <span><h5>&nbsp;&nbsp;&nbsp;<?php echo $payment['cash/card']?></h5></span>
                    </li>
                    <?php }?>
                    
                   
                    
                </div>

              </div>
              <div class="mid_H">
                  
                  
                    <div class="Next_payment">
                        <h3>New Payment</h3>
                        <hr/>

                        <?php foreach($monthlist as $month){?>
                        <div class="new_payblock">
                            <h3><?php echo date('F', $month['time'])?></h3>
                            <button>Pay</button>
                        </div>
                        <?php }?>

                        <div class="new_payblock">
                            <h3>January</h3>
                            <button>Pay</button>
                        </div>
                        <div class="new_payblock">
                            <h3>December</h3>
                            <button>Pay</button>
                        </div>
                        
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

    
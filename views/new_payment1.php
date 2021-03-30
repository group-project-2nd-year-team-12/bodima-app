<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <title>New Payment</title>
	 <link rel="stylesheet" href="../resource/css/new_home.css">
	 <link rel="stylesheet" href="../resource/css/all.css">
	 <link rel="stylesheet" href="../resource/css/sidebar2.css">
	 
   
	 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="../resource/css/new_payment1.css">
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
        $BOdetails=unserialize($_GET['BOd']);
        $months=unserialize($_GET['months']);
        $cost_per_person=unserialize($_GET['cppv']);
    //    print_r($BOdetails);
    //    print_r($months);

        ?>

          <h1>New Payment<a href="../controller/payment_history_controlN.php?id=1"><button class="paid"><i class="fas fa-chevron-left"></i>BACK</botton></a></h1>
              <div class="mid_I">
                  
                
                <h3>boarding&nbsp; Rent &nbsp;Payment</h3>
                <hr/>
               <p style="font-size:smaller;">Pay your monthly rentals here. . .</p>
<br/><br/>

                <div class="payblock1">
                
                <div class="con"><div class="th_p">Reciver</div><div class="td_p">: <?php echo $BOdetails['first_name'].' '.$BOdetails['last_name']; ?></div></div>
                <div class="con"> <div class="th_p">Payment Month </div><div class="td_p">:
                    <select id="cars">
                    <?php 
                    $c_flag=0;
                    foreach($months as $month){
                        if ($c_flag==0){
                            $paymonth=$month['month'];
                            ?>
                            <option value="<?php echo $month['month'];?>"><?php echo $month['month'];?></option>
                            <?php
                            $c_flag=1;
                        }elseif($c_flag==1){
                            ?>
                            <option value="<?php echo $month['month'];?>" disabled><?php echo $month['month'];?></option>
                            <?php

                        }
                         }?>
                    </select>
                </div>
               </div>
               <div class="con"><div class="th_p">Amount</div><div class="td_p">: 
               <input type="text" id="lname" name="lname" value="<?php echo $cost_per_person['cost_per_person']?>" disabled>
               </div>
            </div>
<!-- sandbox -->

            <?php $arr=[];
                    $arr['B']=$_SESSION['Bid'];//Bid
                    $arr['BO']=$BOdetails['BOid'];//BOid
                    $arr['y']=substr($paymonth,0,4);//year
                    $arr['m']=substr($paymonth,5);//month
                    $arr['a']=$cost_per_person['cost_per_person'];//costperperson
                    $arr['c']='card';   
                    $s='';
                    $s='&B='.$arr['B'].'&BO='.$arr['BO'].'&y='.$arr['y'].'&m='.$arr['m'].'&a='.$arr['a'].'&c='.$arr['c'];
                        //  print_r($arr);
                        //  echo $s;
                    ?>

            <form action="https://sandbox.payhere.lk/pay/checkout" method="post">
           
            <input type="hidden" name="merchant_id" value="1215562">    
            <input type="hidden" name="return_url" value='http://localhost/bodima-app/controller/new_payment_Control.php?success<?php echo $s?>'>
            <input type="hidden" name="cancel_url" value="http://localhost/bodima-app/controller/payhereOnlineCancelIshanphp?request_id=<?php echo $request_id;?>">
            <input type="hidden" name="notify_url" value="http://localhost/bodima-app/config/paycon.php"> 
            
            <!--reciever details  -->
            <input type="hidden" name="order_id" value="<?php echo  $BOdetails['BOid'];?>">
            <input type="hidden" name="baddress" value="colombo">
            <input type="hidden" name="items" value="colombo"><br>
            <input type="hidden" name="currency" value="LKR">
            <input type="hidden" name="amount" value="<?php echo $cost_per_person['cost_per_person'];?>">  
            <!--payer details(who is doing payment)  -->
            <input type="hidden" name="first_name" value="<?php echo $_SESSION['first_name'];?>">
            <input type="hidden" name="last_name" value="<?php echo $_SESSION['last_name'];?>"><br>
            <input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">
            <input type="hidden" name="address" value="No.1, Galle Road">
            <input type="hidden" name="city" value="Colombo">
            <input type="hidden" name="country" value="Sri Lanka"><br><br>  
            <div class="btnp">
                 <button type="submit" value="Pay & Reserve" name="value">Pay NOW</button>
            </div>
           </form>

              
            </div>
            <br><br>
            <hr>

              </div>
              <div class="mid_J">
                  
                  
                    <div class="Next_payment">
                        <h3>New Payment</h3>
                        <hr/>

                        <?php foreach($months as $month){?>
                        <div class="new_payblock">
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

    
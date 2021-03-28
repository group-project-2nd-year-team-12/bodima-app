<?php   require_once ('../config/database.php');
        require_once ('../models/reg_user.php');
        session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resource/css/nav.css">
    <link rel="stylesheet" href="../resource/css/paymentFoodSlide.css">
    <link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/paymentFood.css">
    <title>Document</title>
</head>
<body onload="checked('accept');">
<div class="header">

 <!-- this function for select order type -->
<script>
    function orderType(id)
{
    var order=document.getElementById(id);
    const shortTerm=document.getElementById('shortTerm-box');
    const longTerm=document.getElementById('longTerm-box');
    if(id=='shortTerm')
    {
        shortTerm.style.display='block';
        longTerm.style.display='none';
    }
    order.style.display='block';
}
</script>

            <div class="logo">
                 <img src="../resource/img/logo.svg" alt="">
                <h1><small style="font-size: 14px; color:white;">   Solution for many problems</small></h1>
            </div>
            
            <div class="sign">
                <?php if(isset($_SESSION['email'])){ 
                     echo '<div class="user"><h4>Hi <span style="color:#FDDB21;font-weight:bold">'.$_SESSION['first_name'].' </span>!</h4></div>'; 
                    ?>

                    <div class="notification">
                        <i class="fa fa-bell fa-lg"></i>
                        <div class="notification-box" >
                            <ul>
                                <li><i class="fas fa-times fa-2x"></i></li>
                                <a href="#"><li>You have notification</li></a>
                                <a href="#"><li>You have notification</li></a>
                                <a href="#"><li>You have notification</li></a>
                                <a href="#"><li>You have notification</li></a>
                                <a href="#"><li>You have notification</li></a>
                            </ul>
                        </div>
                    </div>
                    <div class="profile"><a href="../controller/profile_controlN.php?profile=1"> <i  class="fa fa-user-circle fa-lg"></a></i></div>
                    <button onclick="window.location='../controller/logoutController.php'">Sign out <i class="fa fa-sign-out-alt"></i></button>
                <?php } ?>
                
            </div>
        </div>
    <div class="container">
        <div class="content">
        <?php include  'paymentFoodSlide.php';?>  

        <!-- sub nav  -->
        <div class="subNav">
                <ul>
                    <div>
                        <div id="noti-recShort" class="count"><h5></h5></div>
                        <li tabindex="0" id="shortTerm" onclick="orderType(this.id);" title="Dinner" class="subNav-item"><img src="https://img.icons8.com/cotton/40/000000/breakfast--v2.png"/></li>
                    </div>
                </ul>
        </div>

        <?php
            $ids=unserialize($_GET['ids']);
            $data_rows=unserialize($_GET['data_rows']);
            $new=array_column($data_rows,'term');
       ?>         
        <div id="shortTerm-box" class="accept">
            <div class="title">
            <div class="order-title">
                    <h3>Accepted List </h3>
                </div>
               <?php
                 $total='';
                $i=1;
                $x=0;
                if(in_array('shortTerm',$new) ){
                foreach($ids as $id){
                    if($id['term']=='shortTerm'  ){
                   ?>
                <div class="box" >
                <div class="resend" onclick="order('<?php echo $x ?>')">
                        <div class="right"><i class="fa fa-check fa-2x"></i></div>
                        <div class="letter">
                            <h4>Order ID : <?php echo $id['order_id'] ?> <span class="dot dot1">.</span> <span class="dot dot2">.</span> <span class="dot dot3">.</span> <small>View More</small> </h4> 
                            <h5 style="color:#2c3e8f;">Card Payment Time Out in : <span  id="minute<?php echo $x; ?>"> min</span> <span id="secound<?php echo $x; ?>"> sec</span></h5>
                        </div>
                    </div>
                    <div id="<?php echo $x ?>" class="details-box">
                        <div style="width: 300px;"> <img style="width: 200px;  margin:50px 50px" src="../resource/img/approve.svg" alt=""></div>
                        <div class="button-pay ">
                        <h2 class="order_item order-head">ORDER INFO</h2>
                        <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Id  </h4><h4>: <?php echo $id['order_id']; ?></h4></div>
                        <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Item  </h4></div>
                            <?php 
                                  foreach($data_rows as $data_row)
                                  {
                                      if($data_row['order_id']==$id['order_id'])
                                      {
                                          $total=$data_row['total'];
                                          $time=$data_row['time'];
                                          $restaurant=$data_row['restaurant'];
                                          $method=$data_row['method'];
                                          $address=$data_row['address'];
                                          ?> 
                                          <?php
                                          echo '<div class="product_item"><h5 class="item">'.$i++.'.'.$data_row['item_name'].'</h5>';
                                          echo '<h5 class="quantity">Quantity :'.$data_row['quantity'].'</h5></div>';
                                      }
                                          
                                  }
                                  $i=1;
                            ?>
                             <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Ordered time </h4><h4>: <?php echo $time ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Resturent  </h4><h4>: <?php echo $restaurant ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Address  </h4><h4>: <?php echo $address ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                       
                            <h4 style="text-align:left;color: #101e5a;" > Please pay your order !</h4>
                            <form class="form1" method="post" action="https://sandbox.payhere.lk/pay/checkout">
                                <button> Pay Card</button>
                                <input type="hidden" name="merchant_id" value="1215562">    <!-- Replace your Merchant ID -->
                                <input type="hidden" name="return_url" value="http://localhost/bodima-app/controller/orderCon.php"> 
                                <input type="hidden" name="cancel_url" value="http://localhost/mvc/application/views/sucsses.php">
                                <input type="hidden" name="notify_url" value="http://localhost/mvc/application/config/payCon.php">  
                                <input type="hidden" name="order_id" value="<?php echo $id['order_id'] ?>">
                                <input type="hidden" name="items" value="siri niwasa"><br>
                                <input type="hidden" name="currency" value="LKR">
                                <input type="hidden" name="amount" value="<?php echo $total; ?>">  
                                <input type="hidden" name="first_name" value="<?php echo $_SESSION['first_name'];?>">
                                <input type="hidden" name="last_name" value="<?php echo $_SESSION['last_name'];?>"><br>
                                <input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">
                                <input type="hidden" name="phone" value="0771234567"><br>
                                <input type="hidden" name="address" value="No.1, Galle Road"> 
                                <input type="hidden" name="city" value="Colombo">
                                <input type="hidden" name="country" value="Sri Lanka"><br><br> 
                            </form>
                        </div>
                  </div>
                    
                </div>
                <script>
                    // timing function
             $(document).ready(function(){
                function acceptTimer()
                     {
                        cardOrder="<?php echo $id['order_id']; ?>";
                        $.ajax({
                            url:"../controller/orderCon.php",
                            method:"POST",
                            data:{cardOrder:cardOrder},
                            dataType:"json",
                            success:function(data)
                            {
                                if(data.minute==0 && data.secound<=1 || data.invert==0){
                                    document.querySelector('.timeOut').classList.add('timeOut-active');
                                    document.getElementById('timeOutId').innerHTML='['+data.acceptId+']';
                                    document.getElementById('timeOutRes').innerHTML='['+data.rasturent+']';
                                      $.ajax({
                                        url:"../controller/orderCon.php",
                                        method:"POST",
                                        data:{cancel:cardOrder},
                                        dataType:"json",
                                        success:function(data){
                                            console.log(data)
                                        },
                                        error: function (xhr, ajaxOptions, thrownError) {
                                            console.log(xhr.status);
                                            console.log(thrownError);
                                        }
                                    })
                                }
                                else{
                                    document.getElementById('minute<?php echo $x; ?>').innerHTML=data.minute+'min';
                                    document.getElementById('secound<?php echo $x; ?>').innerHTML=data.secound+'sec';
                                }
                             console.log(data);
                                
                            }
                              })
        
                        }
                        acceptTimer();

                        setInterval(function(){ 
                            acceptTimer();
                        }, 1000);
                     })
                </script>
                <?php
           $x=$x+2;  }
        }
        }else
        {?>
            <div class="empty">
                 <h1> Nothing to show here</h1>
            </div>
              <?php  }
                ?>
            </div>
        </div>
     </div>
    </div>

<!-- Timeout popup -->
<div class="timeOut">
    <div class="timeOut-box">
        <div class="accHeader">
        <div class="iconClose">  <i id="orderIcon" class="fas fa-times fa-2x" onclick="window.location='../controller/orderCon.php?id=2'"></i></div>
        <img src="https://img.icons8.com/pastel-glyph/100/4a90e2/sale-time--v1.png"/>
            <h1>Card Payment Time Out !</h1>
            <h4>Your order <span id="timeOutId" style="color:black"></span> placed at <span id="timeOutRes" style="color:black"></span> is card payment timeout. Because You were unable to make the payment within the allotted time [10 min]</h4>
            <button class="accept-btn" id="accept-btn" style="margin: 10px 0 10px 0;" onclick="window.location='foodpostviewN.php'">New Order</button>
            <button class="cancel-btn" id="accept-btn" onclick="window.location='../controller/orderCon.php?id=2'">cancel</button>
        </div>
    </div>
</div>

    <!-- <?php include 'footer.php'?> -->
</body>
<script src="../resource/js/timing.js"></script>
<script src="../resource/js/newOrder.js"></script>
<script src="../resource/js/paymentFood_accept.js"></script>
<script>
        function order(x,y) {  
            var orderDown=document.getElementById(x);
            var btn=document.getElementById(y);
            if(orderDown.style.display=='none' || orderDown.style.display==''){orderDown.style.display='flex';btn.style.visibility='hidden'}
            else{orderDown.style.display='none';btn.style.visibility='visible'}
    }

   
</script>
</html>
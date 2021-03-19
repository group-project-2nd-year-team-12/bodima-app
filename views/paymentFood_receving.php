<?php   require_once ('../config/database.php');
        require_once ('../models/reg_user.php');
        require_once ('../controller/orderCon.php');
        // session_start(); 
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
<body onload="checked('receive');">

 <!-- sub nav select function -->
<script>
    function orderType(id)
    {
        var order=document.getElementById(id);
        const shortTerm=document.getElementById('shortTerm-box');
        if(id=='shortTerm')
        {
            shortTerm.style.display='block';
            longTerm.style.display='none';
        }
        order.style.display='block';
    }
</script>


<div class="header">
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
                    <div class="profile"><a href="profilepage.php"> <i  class="fa fa-user-circle fa-lg"></a></i></div>
                    <button onclick="window.location='../controller/logoutController.php'">Sign out <i class="fa fa-sign-out-alt"></i></button>
                <?php } ?>
                
            </div>
        </div>
    <div class="container">
        <div class="content">
          <?php include  'paymentFoodSlide.php';?> 

          <!-- sub nav -->
        <div class="subNav">
            <ul>
                <div>
                    <div id="noti-delShort" class="count"><h5></h5></div>
                    <li tabindex="0" id="shortTerm" onclick="orderType(this.id);" title="Dinner" class="subNav-item"><img src="https://img.icons8.com/cotton/40/000000/breakfast--v2.png"/></li>
                </div>
            </ul>
         </div>
            
            
          <?php
            $dataSet=orderReceive($connection);
            $ids=unserialize($dataSet[0]);
            $data_rows=unserialize($dataSet[1]);
            $new=array_column($data_rows,'term');
       ?>
        <div id="shortTerm-box" class="pending">
            <div class="title">
            <div class="order-title">
                    <h3>Receiving Orders </h3>
                </div>
                <?php 
                $total='';
                $x=0;
                $i=1;
                if(in_array('shortTerm',$new)){
                foreach($ids as $id){
                    if($id['term']=='shortTerm'  ){
                ?>
                <div class="box" >
                    <div class="resend " onclick="order('<?php echo $x ?>')">
                    <div class="right"><img src="https://img.icons8.com/color/48/000000/delivery--v2.png"/></div>
                        <div class="letter">
                            <h4>Order ID : <?php echo $id['order_id'] ?> <span class="dot dot1">.</span> <span class="dot dot2">.</span> <span class="dot dot3">.</span> <small>View More</small> </h4> 
                        </div>
                    </div>
                  <div id="<?php echo $x ?>"  class="details-box">
                  <div style="width: 300px;"> <img style="width: 250px;  margin:70px 10px" src="../resource/img/delivery1.svg" alt=""></div>
                        <div class="button-pay">
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
                            <h4 style="text-align:left;color: #101e5a;" >Please confirm that your order has been received !</h4>
                            <button id="con<?php echo $x; ?>" tabindex="1"   type="button" class="btn1"> Confirm </button>                        
                        </div>
                  </div>
                </div>
                <script>
                    $(document).on('click', "#con<?php echo $x ?>", function(){
                        var d = new Date();
                        document.querySelector('.orderAccept').classList.add('orderAccept-active');
                        document.getElementById('confirmId').innerHTML='[<?php echo $id["order_id"]; ?>]';
                        document.getElementById('resTime').innerHTML='['+d.toLocaleString()+']'
                    });
                 </script> 
                <?php
                    }  
            
           $x=$x+2; 
        }
        } else
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

<!-- click the confirm button then update the database   -->
<script>
     $(document).on('click', "#accept-btn", function(){
         var orderId=document.getElementById('confirmId').innerHTML;
         orderId=orderId.substring(1,11);
        window.location="../controller/orderCon.php?orderConfirm_id="+orderId+"";
    });
</script>

<!-- Order receive popuo -->
<div class="orderAccept">
    <div class="acceptPop-box">
        <div class="accHeader">
        <div class="iconClose">  <i id="orderIcon" class="fas fa-times fa-2x" onclick="document.querySelector('.orderAccept').classList.remove('orderAccept-active');"></i></div>
        <img src="https://img.icons8.com/pastel-glyph/100/4a90e2/delivery-scooter--v1.png"/>
            <h1>Confirm Your Order Received !</h1>
            <h4 style="margin-top: 20px">Confirm that your order <span id="confirmId" style="color:black"></span> has been received by  <span id="resTime" style="color:black"></span>  </h4>
            <div style="margin-top:30px;">
                    <div style="display: none;" ><h4 id="termType"></h4></div>
            </div>
         <button style="margin: 10px 0 10px 0;" class="accept-btn" id="accept-btn">Confirm</button>
         <button class="cancel-btn" onclick="document.querySelector('.orderAccept').classList.remove('orderAccept-active');">cancel</button>
        </div>
    </div>
</div>

</body>
<script src="../resource/js/timing.js"></script>
<script src="../resource/js/newOrder.js"></script>
<script>
        function order(x,y) {  
            var orderDown=document.getElementById(x);
            var btn=document.getElementById(y);
            if(orderDown.style.display=='none' || orderDown.style.display==''){orderDown.style.display='flex';btn.style.visibility='hidden'}
            else{orderDown.style.display='none';btn.style.visibility='visible'}
    }
</script>
</html>
<?php   require_once ('../config/database.php');
        require_once ('../models/orderModel.php');
        require_once ('../controller/orderConFood.php');
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
<body onload="checked('deliver');">

<!-- Order type select function -->
<script>
    function orderType(id)
{
    const order=document.getElementById(id);
    const breakfast=document.getElementById('breakfast-box');
    const lunch=document.getElementById('lunch-box');
    const dinner=document.getElementById('dinner-box');
    if(id=='breakfast')
    {
        breakfast.style.display='block';
        dinner.style.display='none';
        lunch.style.display='none';
    }else{
      
    }
    if(id=='lunch')
    {
        lunch.style.display='block';
        breakfast.style.display='none';
        dinner.style.display='none';
    }else{
        
    }
    if(id=='dinner')
    {
        dinner.style.display='block';
        lunch.style.display='none';
        breakfast.style.display='none';
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
                    <div class="profile"><a href="../controller/profile_controlN.php?profile=1"> <i  class="fa fa-user-circle fa-lg"></a></i></div>
               
                  
                 <button onclick="window.location='../controller/logoutController.php'">Sign out <i class="fa fa-sign-out-alt"></i></button>
                <?php } ?>
            </div>
</div>

<div class="container">
        <div class="content">  
        <?php include 'orderSide.php' ?> 
        
        <div class="subNav">
                <ul>
                    <div>
                        <div class="count" id="noti-delBreakfast"><h5></h5></div>
                        <li tabindex="0" id="breakfast" onclick="orderType(this.id);" title="Breakfast" class="subNav-item"><img src="https://img.icons8.com/cotton/40/000000/toast--v4.png"/></li>
                    </div>
                    <div>
                        <div class="count" id="noti-delLunch"><h5></h5></div>
                        <li tabindex="0" id="lunch" onclick="orderType(this.id);" title="Lunch" class="subNav-item"><img src="https://img.icons8.com/cotton/40/000000/breakfast--v1.png"/></li>
                    </div>
                    <div>
                        <div class="count" id="noti-delDinner"><h5></h5></div>
                        <li tabindex="0" id="dinner" onclick="orderType(this.id);" title="Dinner" class="subNav-item"><img src="https://img.icons8.com/cotton/40/000000/breakfast--v2.png"/></li>
                    </div>
                   
                </ul>
            </div>  
          
        <?php 
        $dataSet=getShortTerm($connection);
        $records=unserialize($dataSet[0]);
        $new=array_column($records,'order_type');
        $termArray=array_column($records,'term');
         ?>      
        <div class="short-term-box ">

        <!-- long term short term select tabs -->
        <div class="term">
            <a style="background-color: orange;" onclick="window.location='orderDelivery.php'" id="Short-Term"> Short-term List</a>
            <a onclick="window.location='orderDeliveryLong.php'" id="Long-Term"> Long-term List</a>
        </div>

        
        <div id="breakfast-box" class="accept-term">
            <div class="title">
            <div class="order-title">
                    <h3>Delivery List </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
                   $i=0;
                   $y=1;
                   if(in_array('breakfast',$new) && in_array('shortTerm',$termArray)){

                    foreach($records as $record)
                    {
                        if($record['order_type']=='breakfast' && $record['term']=='shortTerm'){?>
                     <div class="box" >
                            <div class="resend" onclick="order('<?php echo $i ?>','<?php echo $y ?>')">
                                    <div class="right"><img src="https://img.icons8.com/color/48/000000/delivery--v2.png"/></div>
                                    <div class="letter"><h4>Order ID : <?php echo $record['order_id']; ?></h4></div>
                                    <div id="<?php echo $y; ?>" class="button-pay">
                                        <button onclick='if(confirm("Confirm that you get the order ?")) window.location="../controller/orderConFood.php?orderConfirmFS_id=<?php echo $record["order_id"]; ?>"'  type="button" class="btn1 "> Confirm </button>
                                    </div>
                                  
                            </div>
                            <div id="<?php echo $i ?>" class="details-box">
                            <div><img style="width: 300px;" src="../resource/img/pending.gif" alt=""></div>
                                <div class="button-pay">
                                <h2 class="order_item order-head">ORDER INFO</h2>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Id  </h4><h4>: <?php echo $record['order_id']; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Item  </h4></div>
                                    <?php   $getOrder=orderModel::getOrderFoodSupplierTerm($connection,$record['order_id'],3,"shortTerm");
                                        while($result=mysqli_fetch_assoc($getOrder))
                                        {
                                            echo '<div class="product_item"><h5  class="item">'.$result['item_name'].'</h5>';
                                            echo '<h5 class="quantity">Quantity :'.$result['quantity'].'</span></h5></div>';
                                            $address=$result['address'];
                                            $email=$result['email'];
                                            $first_name=$result['first_name'];
                                            $last_name=$result['last_name'];
                                            $total=$result['total'];
                                            $phone=$result['phone'];
                                            $method=$result['method'];
                                        
                                        }?>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Customer Name  </h4><h4>: <?php echo  $first_name ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Delivery Address </h4><h4>: <?php echo $address ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Contact Number </h4><h4>: <?php echo $phone; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                                    <h4 class="order_item" style="color: #101e5a;margin-top:20px">If you delivered this order. Please confirm this order</h4>
                                    <button id="con<?php echo $i; ?>" tabindex="1"   type="button" class="btn1"> Confirm </button>                        
                            </div>
                            </div>
                         </div>
                         <script>
                            //  window.location="../controller/orderConFood.php?orderConfirmFS_id=<?php echo $record["order_id"]; ?>"'
                            $(document).on('click', "#con<?php echo $i ?>", function(){
                                var d = new Date();
                                document.querySelector('.orderAccept').classList.add('orderAccept-active');
                                document.getElementById('confirmId').innerHTML='[<?php echo $id["order_id"]; ?>]';
                                document.getElementById('resTime').innerHTML='['+d.toLocaleString()+']'
                            });
                        </script> 
                <?php    }
                   $i=$i+2;$y=$y+2;  }
                }   else
                {?>
                    <div class="empty">
                         <h1> Nothing to show here</h1>
                    </div>
              <?php  }
                 ?>                         
            </div>
        </div>
        <div id="lunch-box" class="accept-term none">
            <div class="title">
            <div class="order-title">
                    <h3>Delivery List </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
                   $i=0;
                   $y=1;
                   if(in_array('lunch',$new)  && in_array('shortTerm',$termArray)){

                    foreach($records as $record)
                    {
                        if($record['order_type']=='lunch' && $record['term']=='shortTerm'){?>
                     <div class="box " >
                            <div class="resend " onclick="order('<?php echo $i ?>','<?php echo $y ?>')" >
                            <div class="right"><img src="https://img.icons8.com/color/48/000000/delivery--v2.png"/></div>
                                    <div class="letter"><h4>Order ID : <?php echo $record['order_id']; ?></h4></div>
                                    <div id="<?php echo $y; ?>" class="button-pay">
                                        <button onclick='if(confirm("Confirm that you get the order ?")) window.location="../controller/orderConFood.php?orderConfirmFS_id=<?php echo $record["order_id"]; ?>"'  type="button" class="btn1 "> Confirm </button>
                                    </div>
                            </div>
                            <div id="<?php echo $i ?>" class="details-box">
                            <div><img style="width: 300px;" src="../resource/img/pending.gif" alt=""></div>
                                <div class="button-pay">
                                <h2 class="order_item order-head">ORDER INFO</h2>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Id  </h4><h4>: <?php echo $record['order_id']; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Item  </h4></div>
                                    <?php   $getOrder=orderModel::getOrderFoodSupplierTerm($connection,$record['order_id'],3,"shortTerm");
                                        while($result=mysqli_fetch_assoc($getOrder))
                                        {
                                            echo '<div class="product_item"><h5  class="item">'.$result['item_name'].'</h5>';
                                            echo '<h5 class="quantity">Quantity :'.$result['quantity'].'</span></h5></div>';
                                            $address=$result['address'];
                                            $email=$result['email'];
                                            $first_name=$result['first_name'];
                                            $last_name=$result['last_name'];
                                            $total=$result['total'];
                                            $phone=$result['phone'];
                                            $method=$result['method'];
                                        
                                        }?>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Customer Name  </h4><h4>: <?php echo  $first_name ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Delivery Address </h4><h4>: <?php echo $address ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Contact Number </h4><h4>: <?php echo $phone; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                                <h4 class="order_item" style="color: #101e5a;margin-top:20px">If you delivered this order. Please confirm this order</h4>
                                <button id="con<?php echo $i; ?>" tabindex="1"   type="button" class="btn1"> Confirm </button>                        
                            </div>
                            </div>
                         </div>
                         <script>
                            $(document).on('click', "#con<?php echo $i ?>", function(){
                                var d = new Date();
                                document.querySelector('.orderAccept').classList.add('orderAccept-active');
                                document.getElementById('confirmId').innerHTML='[<?php echo $record["order_id"]; ?>]';
                                document.getElementById('resTime').innerHTML='['+d.toLocaleString()+']'
                            });
                        </script> 
                <?php    }
                   $i=$i+2;$y=$y+2;  }
                }   else
                {?>
                    <div class="empty">
                         <h1> Nothing to show here</h1>
                    </div>
              <?php  }
                 ?>                         
            </div>
        </div>
        <div id="dinner-box" class="accept-term none">
            <div class="title">
            <div class="order-title">
                    <h3>Delivery List </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
                   $i=0;
                   $y=1;
                   if(in_array('dinner',$new) && in_array('shortTerm',$termArray)){

                    foreach($records as $record)
                    {
                        if($record['order_type']=='dinner' && $record['term']=='shortTerm'){?>
                     <div class="box ">
                            <div class="resend " onclick="order('<?php echo $i ?>','<?php echo $y ?>')">
                            <div class="right"><img src="https://img.icons8.com/color/48/000000/delivery--v2.png"/></div>
                                    <div class="letter"><h4>Order ID : <?php echo $record['order_id']; ?></h4></div>
                                    <div id="<?php echo $y; ?>" class="button-pay">
                                        <button onclick='if(confirm("Confirm that you get the order ?")) window.location="../controller/orderConFood.php?orderConfirmFS_id=<?php echo $record["order_id"]; ?>"'  type="button" class="btn1 "> Confirm </button>
                                    </div>
                            </div>
                            <div id="<?php echo $i ?>" class="details-box">
                            <div><img style="width: 300px;" src="../resource/img/pending.gif" alt=""></div>
                                <div class="button-pay">
                                <h2 class="order_item order-head">ORDER INFO</h2>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Id  </h4><h4>: <?php echo $record['order_id']; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Item  </h4></div>
                                    <?php   $getOrder=orderModel::getOrderFoodSupplierTerm($connection,$record['order_id'],3,"shortTerm");
                                        while($result=mysqli_fetch_assoc($getOrder))
                                        {
                                            echo '<div class="product_item"><h5  class="item">'.$result['item_name'].'</h5>';
                                            echo '<h5 class="quantity">Quantity :'.$result['quantity'].'</span></h5></div>';
                                            $address=$result['address'];
                                            $email=$result['email'];
                                            $first_name=$result['first_name'];
                                            $last_name=$result['last_name'];
                                            $total=$result['total'];
                                            $phone=$result['phone'];
                                            $method=$result['method'];
                                        
                                        }?>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Customer Name  </h4><h4>: <?php echo  $first_name ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Delivery Address </h4><h4>: <?php echo $address ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Contact Number </h4><h4>: <?php echo $phone; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                                <h4 class="order_item" style="color: #101e5a;margin-top:20px">If you delivered this order. Please confirm this order</h4>
                                <button id="con<?php echo $i; ?>" tabindex="1"   type="button" class="btn1"> Confirm </button>                        
                            </div>
                            </div>
                         </div>
                         <script>
                            $(document).on('click', "#con<?php echo $i ?>", function(){
                                var d = new Date();
                                document.querySelector('.orderAccept').classList.add('orderAccept-active');
                                document.getElementById('confirmId').innerHTML='[<?php echo $record["order_id"]; ?>]';
                                document.getElementById('resTime').innerHTML='['+d.toLocaleString()+']'
                            });
                        </script> 
                <?php    }
                   $i=$i+2;$y=$y+2;  }
                }   else
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
    </div>
<!-- click the confirm button then update the database   -->
<script>
     $(document).on('click', "#accept-btn", function(){
        var orderId=document.getElementById('confirmId').innerHTML;
        orderId=orderId.substring(1,11);
        window.location="../controller/orderConFood.php?orderConfirmFS_id="+orderId+"";
    });
</script>

<!-- Order receive popuo -->
<div class="orderAccept">
    <div class="acceptPop-box">
        <div class="accHeader">
        <div class="iconClose">  <i id="orderIcon" class="fas fa-times fa-2x" onclick="document.querySelector('.orderAccept').classList.remove('orderAccept-active');"></i></div>
        <img src="https://img.icons8.com/pastel-glyph/100/4a90e2/delivery-scooter--v1.png"/>
            <h1>Confirm Order Deliverd !</h1>
            <h4 style="margin-top: 20px">Confirm that <span id="cusName"></span> order <span id="confirmId" style="color:black"></span> has been Deliverd by  <span id="resTime" style="color:black"></span>  </h4>
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
<script src="../resource/js/order.js"></script>
<script src="../resource/js/jquery.js"></script>
<script>
        function order(x,y) {  
            var orderDown=document.getElementById(x);
            var btn=document.getElementById(y);
            if(orderDown.style.display=='none' || orderDown.style.display==''){orderDown.style.display='flex';btn.style.visibility='hidden'}
            else{orderDown.style.display='none';btn.style.visibility='visible'}
    }
</script>
</html>
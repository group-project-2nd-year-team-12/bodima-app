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
<body onload="checked('receive');">
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
    if(id=='longTerm')
    {
        longTerm.style.display='block';
        shortTerm.style.display='none';
    }
    order.style.display='block';
  
}
</script>
<div class="header">
            <div class="logo">
                 <img src="../resource/img/logo.png" alt="">
                <h1><small style="font-size: 14px; color:white;">   Solution for many problems</small></h1>
            </div>
            
            <div class="sign">
                <?php if(isset($_SESSION['email'])){ 
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
                <?php
                    echo '<div class="user"><h4>Welcome '.$_SESSION['first_name'].'</h4></div>'; ?>
                    <button onclick="window.location='../controller/logoutController.php'">Sign out <i class="fa fa-sign-out-alt"></i></button>
                <?php } ?>
                
            </div>
        </div>
    <div class="container">
        <div class="content">
          <?php include  'paymentFoodSlide.php';?> 
          <div class="subNav">
                <ul>
                    
                    <div>
                        <div id="noti-dinner"><h5></h5></div>
                        <li tabindex="0" id="shortTerm" onclick="orderType(this.id);" title="Dinner" class="subNav-item"><img src="https://img.icons8.com/cotton/40/000000/breakfast--v2.png"/></li>
                    </div>
                    <div>
                        <div id="noti-longTerm"><h5></h5></div>
                        <li tabindex="0" id="longTerm" onclick="orderType(this.id);" title="Log Term " class="subNav-item"><img src="https://img.icons8.com/cute-clipart/40/000000/property-with-timer.png"/></li>
                    </div>
                </ul>
            </div>       
          <?php
            $ids=unserialize($_GET['ids']);
            $data_rows=unserialize($_GET['data_rows']);
            $new=array_column($data_rows,'order_type');
       ?>
        <div id="shortTerm-box" class="pending">
            <div class="title">
            <div class="order-title">
                    <h3>Receiving Orders </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
               
                $total='';
                $x=0;
                if(in_array('breakfast',$new) || in_array('dinner',$new) || in_array('lunch',$new)){
                foreach($ids as $id){
                    if($id['order_type']=='breakfast' || $id['order_type']=='lunch' || $id['order_type']=='dinner' ){
                ?>
                <div class="box" onclick="order('<?php echo $x ?>')">
                    <div class="resend receiving">
                        <div class="right"><i class="fas fa-motorcycle fa-2x"></i></div>
                        <div class="letter"><h4>Your order is delivering <span class="dot dot1">.</span> <span class="dot dot2">.</span> <span class="dot dot3">.</span></h4></div>
                    </div>
                  <div id="<?php echo $x ?>" class="details-box">
                    <div class="details">
                            <h2>Order Id :<span style="color:sienna;"><?php echo $id['order_id']; ?></h2>
                            <h4 class="order_item"><i class="fas fa-caret-right"></i> Order Item :</h4>
                            <?php $i=1;
                                 foreach($data_rows as $data_row)
                                 {
                                     if($data_row['order_id']==$id['order_id'])
                                     {
                                         $total=$data_row['total'];
                                         $time=$data_row['time'];
                                         $restaurant=$data_row['restaurant'];
                                         echo '<div class="product_item"><h5 class="item">'.$i++.'.'.$data_row['product_name'].'</h5>';
                                         echo '<h5 class="quantity">Quantity :'.$data_row['quantity'].'</h5></div>';
                                     }
                                         
                                 }
                                 $i=1;
                            ?>
                            <h4 class="order_item"><i class="fas fa-caret-right"></i> Payed amount :<span style="color: red;"> RS <?php echo $total; ?></span></h4>
                        </div>
                        <div class="button-pay">
                        <h4 class="order_item"><i class="fas fa-caret-right"></i> Ordered time : <span style="color: sienna;"><?php echo $time ?></span> </h4>
                        <h4 class="order_item"><i class="fas fa-caret-right"></i> Resturent  : <span style="color: sienna;"><?php echo $restaurant ?></span> </h4>
                            <h4 class="order_item"  style="border-top: 2px solid rgb(176, 175, 177);font-weight:lighter"><i class="fas fa-check-square"></i> If your  order is received. Please Confirm </h4>
                            <button onclick='if(confirm("Confirm that you get the order ?")) window.location="../controller/orderCon.php?orderConfirm_id=<?php echo $id; ?>"'  type="button" class="btn1 "> Confirm </button>
                        </div>
                  </div>
                    
                </div>
               
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
        <div id="longTerm-box" class="pending none">
            <div class="title">
            <div class="order-title">
                    <h3>Receiving Orders  </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
               
                $total='';
                $x=$x+2;
                if(in_array('longTerm',$new)){
                foreach($ids as $id){
                    if($id['order_type']=='longTerm' ){
                ?>
                <div class="box" onclick="order('<?php echo $x ?>')">
                    <div class="resend receiving">
                        <div class="right"><i class="fas fa-motorcycle fa-2x"></i></div>
                        <div class="letter"><h4>Your order is delivering <span class="dot dot1">.</span> <span class="dot dot2">.</span> <span class="dot dot3">.</span></h4></div>
                    </div>
                  <div id="<?php echo $x ?>" class="details-box">
                    <div class="details">
                            <h2>Order Id :<span style="color:sienna;"><?php echo $id['order_id']; ?></h2>
                            <h4 class="order_item"><i class="fas fa-caret-right"></i> Order Item :</h4>
                            <?php $i=1;
                                 foreach($data_rows as $data_row)
                                 {
                                     if($data_row['order_id']==$id['order_id'])
                                     {
                                         $total=$data_row['total'];
                                         $time=$data_row['time'];
                                         $restaurant=$data_row['restaurant'];
                                         echo '<div class="product_item"><h5 class="item">'.$i++.'.'.$data_row['product_name'].'</h5>';
                                         echo '<h5 class="quantity">Quantity :'.$data_row['quantity'].'</h5></div>';
                                     }
                                         
                                 }
                                 $i=1;
                            ?>
                            <h4 class="order_item"><i class="fas fa-caret-right"></i> Payed amount :<span style="color: red;"> RS <?php echo $total; ?></span></h4>
                        </div>
                        <div class="button-pay">
                        <h4 class="order_item"><i class="fas fa-caret-right"></i> Ordered time : <span style="color: sienna;"><?php echo $time ?></span> </h4>
                        <h4 class="order_item"><i class="fas fa-caret-right"></i> Resturent  : <span style="color: sienna;"><?php echo $restaurant ?></span> </h4>
                            <h4 class="order_item"  style="border-top: 2px solid rgb(176, 175, 177);font-weight:lighter"><i class="fas fa-check-square"></i> If your  order is received. Please Confirm </h4>
                            <button onclick='if(confirm("Confirm that you get the order ?")) window.location="../controller/orderCon.php?orderConfirm_id=<?php echo $id; ?>"'  type="button" class="btn1 "> Confirm </button>
                        </div>
                  </div>
                    
                </div>
               
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
    <!-- <?php include 'footer.php'?> -->
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
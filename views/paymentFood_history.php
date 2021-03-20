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
<body onload="checked('history');">
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
            $data_set=orderHistory($connection);
            $ids=unserialize($data_set[0]);
            $data_rows=unserialize($data_set[1]);
            $new=array_column($data_rows,'term');
            // print_r($new);
       ?>
        <div id="shortTerm-box"  class="pending">
            <div class="title">
            <div class="order-title">
                    <h3>Order History </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
              
                $i=1;
                $x=0;
                $total='';
                if(in_array('shortTerm',$new) ){
                    // print_r($new);
                foreach($ids as $id){
                    if($id['term']=='shortTerm'  ){
                ?>
                <div class="box " onclick="order('<?php echo $x ?>')">
                    <div class="resend ">
                        <div class="right"><i class="fas fa-history fa-2x"></i></div>
                        <div class="letter">
                            <h4>Order ID : <?php echo $id['order_id'] ?></h4> 
                        </div>
                    </div>
                  <div id="<?php echo $x ?>" class="details-box">
                  <div style="width: 300px;"><img style="width: 250px;" src="../resource/img/history.svg" alt=""></div>
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
                    <h3> Order History </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
              
                $i=1;
                $x=$x+2;
                $total='';
                if(in_array('longTerm',$new)){
                foreach($ids as $id){
                    if($id['term']=='longTerm' ){
                ?>
                <div class="box" onclick="order('<?php echo $x ?>')">
                <div class="resend ">
                        <div class="right"><i class="fas fa-history fa-2x"></i></div>
                        <div class="letter">
                            <h4>Order ID : <?php echo $id['order_id'] ?></h4> 
                        </div>
                    </div>
                  <div id="<?php echo $x ?>" class="details-box">
                  <div style="width: 300px;"><img style="width: 250px;" src="../resource/img/history.svg" alt=""></div>
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
<?php if(isset($_GET['success']) && isset($_GET['order_id'])){ ?>
  <div class="rating-box">
    <div class="rating">
        <form class="form-rate" action="" method="post">
        <h2 style="text-align: center;">Rate for order !</h2>
        <div class="rate">
            <input type="radio" name="rate" id="star1"><label for="star1"></label>
            <input type="radio" name="rate" id="star2"><label for="star2"></label>
            <input type="radio" name="rate" id="star3"><label for="star3"></label>
            <input type="radio" name="rate" id="star4"><label for="star4"></label>
            <input type="radio" name="rate" id="star5"><label for="star5"></label>
        </div>
        <h3>Unrate</h3>
            <input type="text" placeholder="Title">
            <textarea name="" id="" cols="5" rows="5" placeholder="Add commet"></textarea>
            <div>
                <button class="btn-rate" type="submit" >Submit</button>
                <button onclick="window.location='paymentFood_history.php'" class="btn-rate cancel-rate" type="button" >Cancel</button>
            </div>
        </form>
    </div>
  </div>
    <?php } ?>

    <!-- <?php include 'footer.php'?> -->
</body>
<script src="../resource/js/requestHistory.js"></script>
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
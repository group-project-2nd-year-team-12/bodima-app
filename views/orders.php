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
<body onload="checked('order');">


<!-- order type select function -->
<script>
    function orderType(id)
{
    var order=document.getElementById(id);
    const breakfast=document.getElementById('breakfast-box');
    const lunch=document.getElementById('lunch-box');
    const dinner=document.getElementById('dinner-box');
    const longTerm=document.getElementById('longTerm-box');
    if(id=='breakfast')
    {
        breakfast.style.display='block';
        dinner.style.display='none';
        lunch.style.display='none';
        longTerm.style.display='none';
    }else{
        
    }
    if(id=='lunch')
    {
        lunch.style.display='block';
        breakfast.style.display='none';
        dinner.style.display='none';
        longTerm.style.display='none';
    }else{
        
    }
    if(id=='dinner')
    {
        dinner.style.display='block';
        lunch.style.display='none';
        breakfast.style.display='none';
        longTerm.style.display='none';
    }
    if(id=='longTerm')
    {
        longTerm.style.display='block';
        dinner.style.display='none';
        lunch.style.display='none';
        breakfast.style.display='none';
    }
    order.style.display='block';
}
</script>

<!-- header -->
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

<!-- container page -->
<div class="container">
        <div class="content">
         <?php include 'orderSide.php' ?>

         <!-- sub nav order type -->
            <div class="subNav">
                <ul>
                    <div>
                        <div id="noti-breakfast"><h5></h5></div>
                        <li tabindex="0" id="breakfast" onclick="orderType(this.id);" title="Breakfast" class="subNav-item"><img src="https://img.icons8.com/cotton/40/000000/toast--v4.png"/></li>
                    </div>
                    <div>
                        <div id="noti-lunch"><h5></h5></div>
                        <li tabindex="0" id="lunch" onclick="orderType(this.id);" title="Lunch" class="subNav-item"><img src="https://img.icons8.com/cotton/40/000000/breakfast--v1.png"/></li>
                    </div>
                    <div>
                        <div id="noti-dinner"><h5></h5></div>
                        <li tabindex="0" id="dinner" onclick="orderType(this.id);" title="Dinner" class="subNav-item"><img src="https://img.icons8.com/cotton/40/000000/breakfast--v2.png"/></li>
                    </div>
                    <div>
                        <div id="noti-longTerm"><h5></h5></div>
                        <li tabindex="0" id="longTerm" onclick="orderType(this.id);" title="Log Term " class="subNav-item"><img src="https://img.icons8.com/cute-clipart/40/000000/property-with-timer.png"/></li>
                    </div>
                </ul>
            </div>

         <?php 
         $dataSet=allOrders($connection);
         $records=unserialize($dataSet[0]);
         $new=array_column($records,'order_type');
         $term=array_column($records,'term');
         $i=0;
         ?>

<!-- short term breakfast -->
        <div id="breakfast-box" class="accept">
            <div class="title">
                <div class="order-title">
                    <h3>Orders </h3>
                </div>
                <?php
                if(in_array('breakfast',$new) && in_array('shortTerm',$term)){
                    foreach($records as $record)
                    {
                       if($record['order_type']=='breakfast' && $record['term']=='shortTerm'){?>
                        <form action="../controller/orderAcptCon.php" onsubmit="" method="post">
                        <div class="box order" >
                            <div class="resend" onclick="order('detail<?php echo $i ?>','btnSet<?php echo $i ?>')">
                                    <div class="right"><i class="fas fa-sort-amount-down-alt fa-2x"></i></div>
                                    <div class="letter"><h4>Order Id:<?php echo $record['order_id']; ?> </h4></div>
                                   <div id="btnSet<?php echo $i ?>" class="button-pay">
                                     <button class="btn-rate" name="accept" type="submit">Accept</button>
                                     <button class="cancel-rate" type="submit" name="remove" onclick="return confirm('Are you sure cancel this order ?')" >cancel</button>
                                   </div>
                            </div>
                            <div id="detail<?php echo $i ?>" class="details-box">
                            <div style="width: 300px;"><img style="width: 250px;margin:20px 30px" src="../resource/img/newOrder.svg" alt=""></div>
                                <div class="button-pay">
                                    <h2 class="order_item order-head">ORDER INFO</h2>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Id  </h4><h4>: <?php echo $record['order_id']; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Item  </h4></div>
                                    <?php   $getOrder=orderModel::getOrderFoodSupplier($connection,$record['order_id'],0); 
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
                                            $shedule=$result['shedule'];
                                        
                                        }?>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Sheduled Time  </h4><h4>: <?php echo  $shedule ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Customer Name  </h4><h4>: <?php echo  $first_name ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Delivery Address </h4><h4>: <?php echo $address ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Contact Number </h4><h4>: <?php echo $phone; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                                    <h4 class="order_item" style="color: #101e5a;margin-top:20px"> Please accept the Order</h4>
                                <input type="hidden" name='order_id' value="<?php echo $record['order_id']; ?>">
                                <input type="hidden" name='total' value="<?php echo $total; ?>">
                                <input type="hidden" name='address' value="<?php echo $address; ?>">
                                <input type="hidden" name='email' value="<?php echo $email; ?>">
                                <input type="hidden" name='first_name' value="<?php echo $first_name; ?>">
                                <input type="hidden" name='last_name' value="<?php echo $last_name; ?>">
                                <input type="hidden" name='method' value="<?php echo $method; ?>">
                                <button class="btn-rate" name="accept" type="submit">Accept</button>
                                <button class="cancel-rate" type="submit" name="remove" onclick="return confirm('Are you sure cancel this order ?')" >cancel</button>
                            </div>
                            </div>
                    
                         </div>
                     </form>
                <?php    } 
                 $i++;}
                }   else
                {?>
                    <div class="empty">
                         <h1> Nothing to show here</h1>
                    </div>
              <?php  }
                 ?>                
            </div>
        </div>

<!-- short term lunch box  -->
        <div id="lunch-box" class="accept none">
            <div class="title">
            <div class="order-title">
                    <h3>Orders </h3>
                </div>
                <?php 
                if(in_array('lunch',$new) && in_array('shortTerm',$term)){
                    foreach($records as $record)
                    {
                        if($record['order_type']=='lunch' && $record['term']=='shortTerm'){?>
                     <form action="../controller/orderAcptCon.php" onsubmit="" method="post">
                     <div class="box order">
                            <div class="resend"  onclick="order('detail<?php echo $i ?>','btnSet<?php echo $i ?>')">
                                    <div class="right"><i class="fas fa-sort-amount-down-alt fa-2x"></i></div>
                                    <div class="letter"><h4>Order Id:<?php echo $record['order_id']; ?> </h4></div>
                                    <div id="btnSet<?php echo $i ?>" class="button-pay">
                                     <button class="btn-rate" name="accept" type="submit">Accept</button>
                                     <button class="cancel-rate" type="submit" name="remove" onclick="return confirm('Are you sure cancel this order ?')" >cancel</button>
                                   </div>
                            </div>
                            <div id="detail<?php echo $i ?>" class="details-box">
                            <div style="width: 300px;"><img style="width: 250px;margin:20px 30px" src="../resource/img/newOrder.svg" alt=""></div>
                                    <div class="button-pay">
                                    <h2 class="order_item order-head">ORDER INFO</h2>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Id  </h4><h4>: <?php echo $record['order_id']; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Item  </h4></div>
                                    <?php   $getOrder=orderModel::getOrderFoodSupplier($connection,$record['order_id'],0);
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
                                            $shedule=$result['shedule'];
                                        
                                        }?>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Sheduled Time  </h4><h4>: <?php echo  $shedule ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Customer Name  </h4><h4>: <?php echo  $first_name ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Delivery Address </h4><h4>: <?php echo $address ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Contact Number </h4><h4>: <?php echo $phone; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                                    <h4 class="order_item" style="color: #101e5a;margin-top:20px"> Please accept the Order</h4>
                                <input type="hidden" name='order_id' value="<?php echo $record['order_id']; ?>">
                                <input type="hidden" name='total' value="<?php echo $total; ?>">
                                <input type="hidden" name='address' value="<?php echo $address; ?>">
                                <input type="hidden" name='email' value="<?php echo $email; ?>">
                                <input type="hidden" name='first_name' value="<?php echo $first_name; ?>">
                                <input type="hidden" name='last_name' value="<?php echo $last_name; ?>">
                                <input type="hidden" name='method' value="<?php echo $method; ?>">
                                <button class="btn-rate" name="accept" type="submit">Accept</button>
                                <button class="cancel-rate" type="submit" name="remove" onclick="return confirm('Are you sure cancel this order ?')" >cancel</button>
                            </div>
                            </div>
                    
                         </div>
                     </form>
                <?php    }
                   $i++;  }
                }   else
                {?>
                    <div class="empty">
                         <h1> Nothing to show here</h1>
                    </div>
              <?php  }
                 ?>                      
            </div>
        </div>
<!-- short term dinner -->
        <div id="dinner-box" class="accept none">
            <div class="title">
            <div class="order-title">
                    <h3>Orders </h3>
                </div>
                <?php 
                 if(in_array('dinner',$new) && in_array('shortTerm',$term)){
                    foreach($records as $record)
                    {
                        if($record['order_type']=='dinner' && $record['term']=='shortTerm'){?>
                     <form action="../controller/orderAcptCon.php" onsubmit="" method="post">
                     <div class="box order" >
                            <div class="resend" onclick="order('detail<?php echo $i ?>','btnSet<?php echo $i?>')">
                                    <div class="right"><i class="fas fa-sort-amount-down-alt fa-2x"></i></div>
                                    <div class="letter"><h4>Order Id:<?php echo $record['order_id']; ?> </h4></div>
                                    <div id="btnSet<?php echo $i ?>" class="button-pay">
                                     <button class="btn-rate" name="accept" type="submit">Accept</button>
                                     <button class="cancel-rate" type="submit" name="remove" onclick="return confirm('Are you sure cancel this order ?')" >cancel</button>
                                   </div>
                            </div>
                            <div id="detail<?php echo $i ?>" class="details-box">
                            <div style="width: 300px;"><img style="width: 250px;margin:20px 30px" src="../resource/img/newOrder.svg" alt=""></div>
                                    <div class="button-pay">
                                    <h2 class="order_item order-head">ORDER INFO</h2>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Id  </h4><h4>: <?php echo $record['order_id']; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Item  </h4></div>
                                    <?php   $getOrder=orderModel::getOrderFoodSupplier($connection,$record['order_id'],0);
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
                                            $shedule=$result['shedule'];
                                        
                                        }?>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Sheduled Time  </h4><h4>: <?php echo  $shedule ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Customer Name  </h4><h4>: <?php echo  $first_name ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Delivery Address </h4><h4>: <?php echo $address ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Contact Number </h4><h4>: <?php echo $phone; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                                    <h4 class="order_item" style="color: #101e5a;margin-top:20px"> Please accept the Order</h4>
                                <input type="hidden" name='order_id' value="<?php echo $record['order_id']; ?>">
                                <input type="hidden" name='total' value="<?php echo $total; ?>">
                                <input type="hidden" name='address' value="<?php echo $address; ?>">
                                <input type="hidden" name='email' value="<?php echo $email; ?>">
                                <input type="hidden" name='first_name' value="<?php echo $first_name; ?>">
                                <input type="hidden" name='last_name' value="<?php echo $last_name; ?>">
                                <input type="hidden" name='method' value="<?php echo $method; ?>">
                                <button class="btn-rate" name="accept" type="submit">Accept</button>
                                <button class="cancel-rate" type="submit" name="remove" onclick="return confirm('Are you sure cancel this order ?')" >cancel</button>
                            </div>
                            </div>
                    
                         </div>
                     </form>
                <?php    }
                   $i++;  }
                }   else
                {?>
                    <div class="empty">
                         <h1> Nothing to show here</h1>
                    </div>
              <?php  }
                 ?>  
                             
            </div>
        </div>
        
<!-- Long term food  -->
        <div id="longTerm-box" class="accept none">
            <div class="title">
            <div class="order-title">
                    <h3>Orders </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
                 if(in_array('longTerm',$term)){
                    foreach($records as $record)
                    {
                        if($record['term']=='longTerm'){?>
                     <form action="../controller/orderAcptCon.php" onsubmit="" method="post">
                     <div class="box order">
                            <div class="resend"  onclick="order('detail<?php echo $i ?>','btnSet<?php echo $i ?>')">
                                    <div class="right"><i class="fas fa-sort-amount-down-alt fa-2x"></i></div>
                                    <div class="letter"><h4>Order Id:<?php echo $record['order_id']; ?> </h4></div>
                                    <div id="btnSet<?php echo $i ?>" class="button-pay">
                                     <button class="btn-rate" name="accept" type="submit">Accept</button>
                                     <button class="cancel-rate" type="submit" name="remove" onclick="return confirm('Are you sure cancel this order ?')" >cancel</button>
                                   </div>
                            </div>
                            <div id="detail<?php echo $i ?>" class="details-box">
                            <div style="width: 300px;"><img style="width: 250px;margin:20px 30px" src="../resource/img/newOrder.svg" alt=""></div>
                                    <div class="button-pay">
                                    <h2 class="order_item order-head">ORDER INFO</h2>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Id  </h4><h4>: <?php echo $record['order_id']; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Item  </h4></div>
                                    <?php   $getOrder=orderModel::getOrderFoodSupplier($connection,$record['order_id'],0);
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
                                            $shedule=$result['shedule'];
                                        
                                        }?>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Sheduled Time  </h4><h4>: <?php echo  $shedule ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Customer Name  </h4><h4>: <?php echo  $first_name ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Delivery Address </h4><h4>: <?php echo $address ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Contact Number </h4><h4>: <?php echo $phone; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                                    <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                                    <h4 class="order_item" style="color: #101e5a;margin-top:20px"> Please accept the Order</h4>
                                <input type="hidden" name='order_id' value="<?php echo $record['order_id']; ?>">
                                <input type="hidden" name='total' value="<?php echo $total; ?>">
                                <input type="hidden" name='address' value="<?php echo $address; ?>">
                                <input type="hidden" name='email' value="<?php echo $email; ?>">
                                <input type="hidden" name='first_name' value="<?php echo $first_name; ?>">
                                <input type="hidden" name='last_name' value="<?php echo $last_name; ?>">
                                <input type="hidden" name='method' value="<?php echo $method; ?>">
                                <button class="btn-rate" name="accept" type="submit">Accept</button>
                                <button class="cancel-rate" type="submit" name="remove" onclick="return confirm('Are you sure cancel this order ?')" >cancel</button>
                            </div>
                            </div>
                    
                         </div>
                     </form>
                <?php    }
                   $i++;  }
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
    <!-- <?php include 'footer.php'?> -->
</body>
<script src="../resource/js/timing.js"></script>
<script src="../resource/js/settingOrder.js"></script>
<script src="../resource/js/order.js"></script>

<script>
        function order(x,y) {  
            var orderDown=document.getElementById(x);
            var btn=document.getElementById(y);
            if(orderDown.style.display=='none' || orderDown.style.display==''){orderDown.style.display='flex';btn.style.visibility='hidden'}
            else{orderDown.style.display='none';btn.style.visibility='visible'}
    }
</script>
</html>
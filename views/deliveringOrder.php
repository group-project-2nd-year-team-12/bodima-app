<?php   require_once ('../config/database.php');
        require_once ('../models/orderModel.php');
        session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resource/css/nav.css">
    <link rel="stylesheet" href="../resource/css/footer.css">
    <link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/paymentFood.css">
    <title>Document</title>
</head>
<body>
<div class="header">
            <div class="logo">
                 <img src="../resource/img/logo.png" alt="">
                <h1><small style="font-size: 14px; color:black;">   Solution for many problem</small></h1>
            </div>
            <div class="sign">
                <?php if(!isset($_SESSION['email'])){echo '<a href="../controller/logingController.php?click1">Sign In <i class="fa fa-sign-in-alt"></i></a>';}?>
                <?php if(isset($_SESSION['email'])){ 
                    if($_SESSION['level']=='administrator'){echo '<a href="../controller/adminPanelCon.php?admin"> Dash Board &nbsp</a>'; }
                    ?>

                    <div class="notification">
                        <i class="fa fa-bell"></i>
                        <div class="notification-box" >
                            <ul>
                                <li><i class="fas fa-times"></i></li>
                                <a href="#"><li>You have notification</li></a>
                                <a href="#"><li>You have notification</li></a>
                                <a href="#"><li>You have notification</li></a>
                                <a href="#"><li>You have notification</li></a>
                                <a href="#"><li>You have notification</li></a>
                            </ul>
                        </div>
                    </div>
                    <div class="profile"><a href="profilepage.php"> <i  class="fa fa-user-circle"></a></i></div>
                <?php
                    echo '<div class="user">Hi '.$_SESSION['first_name'].'</div>'; 
                    echo '<a href="../controller/logoutController.php">Sign out <i class="fa fa-sign-out-alt"></i></a>';}
                ?> 
                
            </div>
        </div>
    <div class="container">
        <div class="content">
          <div class="payment-slide">
              <ul>
                  <li onclick="window.location='../index.php'">Home page</li>
                  <li onclick="window.location='orders.php'">New Orders</li>
                  <li onclick="window.location='deliveringOrder.php'">Delivering Orders</li>
                  <li onclick="window.location='#'">Deliverd History</li>
               
              </ul>
          </div>          
        <div class="accept">
            <div class="title">
                <h3>New orders </h3>
                <?php 
                $FSid=$_SESSION['FSid'];
                $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
                $F_post_id_set=array();
                while($row=mysqli_fetch_assoc($F_post_id))
                {
                    $getOrder_id=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],3);
                    while($record=mysqli_fetch_assoc($getOrder_id))
                    {?>
                     <form action="../controller/orderAcptCon.php" method="post">
                     <div class="box ">
                            <div class="resend receiving">
                                    <div class="right"><i class="fas fa-motorcycle fa-2x"></i></div>
                                    <div class="letter"><h4>Already payed for this order ... Delivery this order </h4></div>
                            </div>
                            <div class="details-box">
                                    <div class="details">
                                        <h2>Order Id :<span style="color:sienna;"><?php echo $record['order_id']; ?></h2>
                                        <h4 class="order_item">Order Item :</h4>
                     <?php   $getOrder=orderModel::getOrderFoodSupplier($connection,$record['order_id'],3);
                        while($result=mysqli_fetch_assoc($getOrder))
                        {
                            echo '<div class="product_item"><h5 class="item">'.$result['product_name'].'</h5>';
                            echo '<h5 class="quantity">Quantity :'.$result['quantity'].'</span></h5></div>';
                            $address=$result['address'];
                            $email=$result['email'];
                            $first_name=$result['first_name'];
                            $last_name=$result['last_name'];
                            $total=$result['total'];
                           
                        }?>
            
                                        <h4>Pay amount :<?php echo $total; ?></h4>
                                        
                                    </div>
                                <div class="button-pay">
                                <h3>Select Please confirm the Order</h3>
                                <input type="hidden" name='order_id' value="<?php echo $record['order_id']; ?>">
                                <input type="hidden" name='total' value="<?php echo $total; ?>">
                                <input type="hidden" name='address' value="<?php echo $address; ?>">
                                <input type="hidden" name='email' value="<?php echo $email; ?>">
                                <input type="hidden" name='first_name' value="<?php echo $first_name; ?>">
                                <input type="hidden" name='last_name' value="<?php echo $last_name; ?>">
                                <button class="btn-rate" name="accept" type="submit">Accept</button>
                                <button class="cancel-rate" name="remove" type="submit">cancel</button>
                            </div>
                            </div>
                    
                         </div>
                     </form>
                <?php    }
                } ?>                
            </div>
        </div>
        </div>
    </div>
    <!-- <?php include 'footer.php'?> -->
</body>
</html>
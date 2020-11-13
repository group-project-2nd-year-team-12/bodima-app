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
                  <li onclick="window.location='paymentFood_pending.php'">Pending Orders</li>
                  <li onclick="window.location='paymentFood_accept.php'">Accepted Orders</li>
                  <li onclick="window.location='paymentFood_history.php'">Order History</li>
                  <li onclick="window.location='foodposts.php'">New Order</li>
              </ul>
          </div>          
       
        <div class="pending">
            <div class="title">
                <h3>Order history</h3>
                <?php 
                $email=$_SESSION['email'];
                $ids_set=reg_user::getOrderById($connection,$email,3);
                $order_pending=reg_user::getOrderAll($connection,$email,3);
                // print_r($order_pending);
                // print_r($ids_set);
                $ids=array();
                while($record=mysqli_fetch_assoc($ids_set))
                {
                    $ids[]=$record['order_id'];
                }
                $data_rows=array();
                $i=0;
                while($record=mysqli_fetch_assoc($order_pending))
                {
                    $data_rows[$i]=$record;
                    $i++;
                }
                $total='';
                foreach($ids as $id){
                foreach($data_rows as $data_row)
                {
                    if($data_row['order_id']==$id)
                    {
                        $total=$data_row['total'];
                        // echo $total;
                    }
                        
                }
                ?>
                <div class="box small">
                  <div class="details-box">
                    <div class="details">
                            <h2>Order Id : <span style="color:sienna;"><?php echo $id; ?></span> </h2>
                            <h5>Payed amount :<?php echo $total; ?></h5>
                            <h5>Order Date :2020 / 04 / 16</h5>
                        </div>
                        <div class="button-pay">
                            
                            <h3>Order Details</h3>
                            
                        </div>
                  </div>
                    
                </div>
                <?php
            }
                ?>
               
            </div>
        </div>
        <div class="more-details">
                    <div class="more">
                        <h2>Order Details</h2>
                        <h3>Order Id : <span style="color: sienna;">1245685625</span></h3>
                        <h4>Payed amout :123.15</h4>
                        <h4>Order Date :2020 / 04 /21</h4>
                        <h4>Order item :</h4>
                        <ul>
                            <li>1. rice</li>
                            <li>2. kotthu</li>
                            <li>3. fyed rice</li>
                        </ul>
                    </div>
        </div>
        </div>
    </div>
    <!-- <?php include 'footer.php'?> -->
</body>
</html>
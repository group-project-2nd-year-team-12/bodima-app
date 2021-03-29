<?php  
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
<body onload="checked('setting');">
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
        <div class="content setting">
         <?php include 'orderSide.php' ?>
         <div class="settingOuter"> 
             <div class="setting-box"> 
             <h3>Option</h3>       
                <div style="box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);">
                <div class="option">
                    <div class="taggle">
                    <div>
                            <h5>Order Status </h5>
                            <h5 style="color: rgb(120, 120, 120);font-weight:normal">Availabled</h5>
                    </div>
                        <form id="formAvailable" action="../controller/orderConFood.php?avail" method="post">
                            
                            <input id="available"  type="checkbox" name="isAvail" value="true" >
                        </form>
                    </div>

                </div>
                <div  class="option">
                    
                </div>
              
             <h3>Services</h3>
             <div class="option" style="border-radius:5px 5px 0 0 ;">
                    <div class="taggle">
                            <div>
                                    <h5>Email Notification </h5>
                            </div>
                            <i class="fas fa-check"></i>
                    </div>
             </div>
             <h3>Other details</h3>
             <div class="option">
                    <div class="taggle">
                            <div>
                                    <h5>Order time out </h5>
                            </div>
                            <h5 style="padding: 7px;">20 min</h5>
                    </div>
             </div>
            </div>
            </div>
        </div>
    </div>
    <!-- <?php include 'footer.php'?> -->
</body>
<script src="../resource/js/timing.js"></script>
<script src="../resource/js/jquery.js"></script>
<script src="../resource/js/settingOrder.js"></script>
</html>
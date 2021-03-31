<link rel="stylesheet" href="../resource/css/liveSupport.css" >
<script src="../resource/js/jquery.js"></script>
<script src="../resource/js/liveSupport.js"></script>
<script src="../resource/js/notification_other.js"></script>
        <div class="header">
            <div class="logo">
                 <img src="../resource/img/logo.svg" alt="">
                <h1><small style="font-size: 14px; color:white;">   Solution for many problems</small></h1>
            </div>
            <div class="sign">
                
                <?php if(!isset($_SESSION['email'])){?>
                    <button onclick="window.location='register.php'">Sign Up <i class="fas fa-user-plus"></i></button>
                    <button onclick="window.location='../controller/logingController.php?click1'">Sign In <i class="fa fa-sign-in-alt"></i></button>
                    <?php }?>
                <?php if(isset($_SESSION['email'])){ 
                   echo '<div class="user"><h4>Hi <span style="color:#FDDB21;font-weight:bold">'.$_SESSION['first_name'].'</span></h4></div>'; 
                    ?>
                    
                    <div class="notification">
                        <i class="fa fa-bell fa-lg"></i>
                        <div class="notification-box">
                            <ul class="notifi-record">
                            </ul>
                        </div>
                    </div>
                    <div class="profile"><a href="../controller/profile_controlN.php?profile=1"> <i class="fa fa-user-circle fa-lg"></a></i></div>
                <?php
                   
                    if($_SESSION['level']=='administrator'){?> <button onclick="window.location='../controller/adminPanelCon.php?admin'"><i class="fas fa-cogs"></i> Dash Board </button>&nbsp<?php }
                    ?>
                    <button onclick="window.location='../controller/logoutController.php'">Sign out <i class="fa fa-sign-out-alt"></i></button>
                <?php } ?> 
                
            </div>
        </div>
        <div class="nav">
                <div class="burger">
                        <div>
                            <div class="line1"></div>
                            <div class="line2"></div>
                            <div class="line3"></div>
                        </div>
                    </div>
            <ul class="nav_bar">
                <li class="nav_item " onclick="window.location='../index.php'"><i class=" fa fa-home"></i> Home</li>
                <li id="boarding" class="nav_item " onclick="window.location='boardings_live.php'"><i class="fa fa-bed"></i> Boardings</li>
                <li id="food" class="nav_item " onclick="window.location='../controller/foodpostviewN_control.php'"><i class="fas fa-hamburger"></i> Order Food</li>
                <li id="about" class="nav_item " onclick="window.location='about.php'"><i class="fa fa-address-card"></i> About us</li>
                <li id="contact" class="nav_item " onclick="window.location='contact_us.php'"><i class="fa fa-address-book"></i> Contact Us</li>
            </ul>
        </div>
            <div class="slide-nav">
            <ul><?php if(isset($_SESSION['email'])){?> 
                    <li onclick="window.location='../controller/profile_controlN.php?profile=1'">Profile</li>

                   
                    <?php if($_SESSION['level']=='food_supplier'){?>
                        <li onclick='window.location="orders.php"'>Orders</li>
                        
                       
                   <?php } ?>
                    <?php if($_SESSION['level']=='boardings_owner'){?>
                        <li onclick='window.location="../views/myBoardingReqIshan_new.php"'>My Requests</li>
                       
                   <?php } ?>

                   <?php if($_SESSION['level']=='student'){?>
                      <li onclick='window.location="pendingReqIshan_New.php"'>Boarding Request </li>
                      
                      
                   <?php } ?>
                   <?php if($_SESSION['level']=='boardings_owner' || $_SESSION['level']=='boarder'){?>
                    <li onclick='window.location="../views/paymentFood_pending.php"'>My food Orders</li>
                    <?php } ?>
                    <li onclick="window.location='../controller/logoutController.php'">Log out</li>
                <?php } else{?>
                    <h4>Plase sign in first to system.</h4>
                        <h3 class="nav-sign" onclick="window.location='user_loging.php'">Sign in </h3>
                        
                <?php } ?>
                </ul>
        </div>
        <?php include ("../views/liveSupport.php"); ?>
<div class="header" style="position:sticky; top:0; z-index:1000;">
            <div class="logo">
                <img src="../resource/img/logo.png" alt="">
                <h1><small style="font-size: 14px; color:white;font-weight:normal">   Solutions for many problems</small></h1>
            </div>
            <div class="sign">
                
                <?php if(!isset($_SESSION['email'])){?>
                    <button onclick="window.location='views/register.php'">Sign Up <i class="fas fa-user-plus"></i></button>
                    <button onclick="window.location='controller/logingController.php?click1'">Sign In <i class="fa fa-sign-in-alt"></i></button>
                    <?php }?>
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
                    <div class="profile"><a href="../controller/profile_controlN.php?profile=1"> <i class="fa fa-user-circle fa-lg"></a></i></div>
                <?php
                    echo '<div class="user"><h4>Welcome<span style="color:#FDDB21; font-weight:700;"> '.$_SESSION['first_name'].'</span></h4></div>'; 
                    if($_SESSION['level']=='administrator'){?> <button onclick="window.location='controller/adminPanelCon.php?admin'"><i class="fas fa-cogs"></i> Dash Board </button>&nbsp<?php }
                    ?>
                    <button onclick="window.location='../controller/logoutController.php'">Sign out <i class="fa fa-sign-out-alt"></i></button>
                <?php } ?> 
                
            </div>
            <div class="dot_menu">
            <i class="fas fa-ellipsis-v" style="color:white; float:right;"></i>
                <!-- <li>profile</li>
                <li>SignOut</li> -->
            </div>
        </div>
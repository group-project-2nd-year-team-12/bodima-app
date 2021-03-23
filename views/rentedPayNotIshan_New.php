<?php   require_once ('../config/database.php');
        require_once ('../models/reg_user.php');
        require_once ('../models/StudentRequestIshan.php');
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
    <link rel="stylesheet" type="text/css" href="../resource/css/boarding_request_B.css">
    <script src="../resource/js/jquery.js"></script>
    <title>Rented - payment not done</title>
</head>

<div class="header">
            <div class="logo">
                 <img src="../resource/img/logo.svg" alt="">
                <h1><small style="font-size: 14px; color:white; font-weight:lighter">   Solution for many problems</small></h1>
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
        <?php include  'boardingRentSlide_ishan.php';?> 
 
        <div id="shortTerm-box" class="pending">
            <div class="title">
            <div class="order-title">
                    <h3>Rented - payment not done</h3>
            </div>
<!---------------------------------------------------------------------  -->
<?php 
            $student_email=$_SESSION['email'];
            $result=StudentRequestIshan::selectRPayNotD($connection,$student_email);
            while ($user=mysqli_fetch_assoc($result))
            {
                $request_id=$user['request_id'];
                $image=$user['image'];
                $B_post_id=$user['B_post_id'];
                $city=$user['city'];
                $house_num=$user['house_num'];
                $lane=$user['lane'];
                $first_name=$user['first_name'];
                $last_name=$user['last_name'];
 ?> 

        <div class="boxx">
                <div class="resend wait" style="background-color:  rgb(47, 96, 201);">
                        <div class="right" ><i class="fas fa-play-circle" ></i></div>
                        <div class="letter"><h3>Your Information have been Submitted succesfully <small> pay rent and reserve</small></h3></div>
                </div>
                <div class="details-boxx">
                        <div class="details">
                            <h2>Request Id :<span style="color: rgb(11, 50, 134);"><?php echo $request_id; ?></h2>
                            <img src="<?php echo $image; ?>" class="post_image" alt="" >
                            <h4>post Id :<?php echo $B_post_id; ?></h4>
                            <h4><?php echo $B_post_id; ?></h4>
                        </div>
                        <div class="button-pay">
                            <h2>Hand over your payment to complete reservation </h2>
                            <h4>Your informtion have been submitted. continue payment<br/><br/></h4>
                            <h4>Address : <span style="color: rgb(11, 50, 134);"><?php echo $house_num.", ".$lane.", ".$city; ?></span></h4>
                            <h4>Owner : <span style="color: rgb(11, 50, 134);"><?php echo $first_name."  ".$last_name; ?></span></h4>
                        </div>
                </div>
        </div>
                
<?php
}
?>              
<!---------------------------------------------------------------------  -->
          
            <div class="empty">
            </div>
            </div>
        </div>
        </div>
    </div>
 


</body>
<script src="../resource/js/timing.js"></script>
<script src="../resource/js/settingOrder.js"></script>
<script src="../resource/js/newOrder.js"></script>
<script> src="../resource/order.js"</script>
<script src="../resource/js/disableBack.js"></script>



</html>
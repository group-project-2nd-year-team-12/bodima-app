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
    <title>pending requests</title>
</head>


<!-- page separate 2 section short term long term  -->



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
        <?php include  'paymentFoodSlide_ishan.php';?> 
      
           
        <!-- short term order set       -->
        <div id="shortTerm-box" class="pending">
            <div class="title">
            <div class="order-title">
                    <h3>Accepted Requests </h3>
            </div>
<!-----------------------------------------------------------------------------------  -->
 <?php 

        $student_email=$_SESSION['email'];
        $result=StudentRequestIshan::AcceptRequest($student_email,$connection);
        while ($user=mysqli_fetch_assoc($result))
        {
            $request_id=$user['request_id'];
            $student_email=$user['student_email'];
            $B_post_id=$user['B_post_id'];
            $city=$user['city'];
            $image=$user['image'];
            $reqDate=$user['date'];
            $cenvertedTime = date('Y-m-d H:i:s',strtotime('+23 days',strtotime($reqDate)));
            $first_name=$user['first_name'];
            $last_name=$user['last_name'];
 ?>   

         <div class="boxx">
            <input type="hidden" id="date" value="<?php echo $cenvertedTime; ?>">
            <div class="resend wait" style="background-color: #74bcf5;">
                <div class="right" ><i class="fas fa-play-circle" ></i></div>
                <div class="letter"><h3>Your Request has Accepted - continue renting here <small><b id="countdown"><div id="data"></div></b> This request will cancel </small></h3></div>
            </div>
            <div class="details-boxx">
                <div class="details">
                    <h2>Request Id :<span style="color:#0900b0;"><?php echo $request_id; ?></h2>
                    <img src="<?php echo $image; ?>" class="post_image" alt="" >
                    <h4>post Id :<?php echo $B_post_id; ?></h4>
                    <h4><?php echo $city; ?></h4>
                 </div>
                <div class="button-pay">
                    <h2>Congratulations! You Can continue renting</h2>
                    <h4>Your request has been Accepted by post owner.<br/></h4>
                    <h4>Post owner : <span style="color:#0900b0;"><?php echo $first_name."  ".$last_name; ?></span></h2>
                    <br/><br/><hr>
                    <h4>If you want to rent this boarding, click 'Pay and Reserve'</h4><br/>
                    <button type="button" id="btnpay" class="" onclick='if(confirm("Are you want to accept this Request ?")) window.location="../controller/requestIshan.php?requestCAccept_id=<?php echo $request_id; ?>"'> Pay and Reserve</button>
                    <button type="button" class="btncancel2" style="background-color:rgb(150, 12, 12);"  onclick='if(confirm("Are you want to cancel this Request ?")) window.location="../controller/requestIshan.php?requestDelete_id=<?php echo $request_id; ?>"'> Cancel</button>
                </div>
            </div>
        </div>      
                
<?php
}
?>           
<!-----------------------------------------------------------------------------------  -->
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
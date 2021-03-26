<?php   require_once ('../config/database.php');
        require_once ('../models/reg_user.php');
        require_once ('../models/BOwnerReqIshan.php');
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
    <title>Add as a New Boarder</title>
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
                    <div class="profile"><a href="../controller/profile_controlN.php?profile=1"> <i  class="fa fa-user-circle fa-lg"></a></i></div>
            
                    <button onclick="window.location='../controller/logoutController.php'">Sign out <i class="fa fa-sign-out-alt"></i></button>
                <?php } ?>
                
            </div>
        </div>
    <div class="container">
        <div class="content">
        <?php include  'requestManageBO_Side_ishan.php';?> 
      
           
        <!-- short term order set       -->
        <div id="shortTerm-box" class="pending">
            <div class="title">
            <div class="order-title">
                    <h3>Add as a New Boarder</h3>
            </div>
<!---------------------------------------------------------------------  -->
<?php 

        $email=$_SESSION['email'];
        $BOid=$_SESSION['BOid'];
        $result=BOwnerReqIshan::selectMyBordersBOPaynot($connection,$BOid);
        while ($user=mysqli_fetch_assoc($result))
        {
                $request_id=$user['request_id'];
                $student_email=$user['student_email'];
                $B_post_id=$user['B_post_id'];
                $first_name=$user['first_name'];
                $payment_date=$user['payment_date'];
                $keymoneyAmount=$user['keymoneyAmount'];
                $rend_id=$user['rent_id'];
                $gender=$user['gender'];
                $rend_id=$user['rent_id'];
                $nic=$user['NIC'];
                $institute=$user['institute'];
                $telephone=$user['telephone'];
?>

        <div class="boxx">
            <div class="resend wait" style="background-color:rgb(1, 167, 233);">
                    <div class="right" style="color:white;" ><i class="fas fa-user-plus fa-2x"></i></div>
                    <div class="letter">
                    <h3 style="margin-top:35px;">Add As a new Boarder<small> post number: <?php echo $B_post_id; ?><br/>request no: <?php echo $request_id; ?></small>
                    </h3>
                    </div>
            </div>
            <div class="details-boxx">
                <div class="button-pay" style="width:60%;">
                    <h2>New person has manual Payment </h2>
                    <h4>Name: <span style="color: rgb(6, 165, 131);"><?php echo $first_name; ?></span><br/></h4>
                    <h4>Gender: <span style="color: rgb(6, 165, 131);"><?php echo $gender; ?></span><br/></h4>
                    <h4>NIC: <span style="color: rgb(6, 165, 131);"><?php echo $nic; ?></span><br/></h4>
                    <h4>telephone no: <span style="color: rgb(6, 165, 131);"><?php echo $telephone; ?></span><br/></h4>
                    <h4>University/working at: <span style="color: rgb(6, 165, 131);"><?php echo $institute; ?></span><br/></h4>
                    <br/><hr>
                    <h4><span style="color: rgb(6, 165, 131); text-decoration:underline;"><a href="../controller/boarder_list_controlN.php?boarderlist=1">click here</a></span> to view My boarders</h4><br/>
                </div>
                <div class="details"  style="width:40%; border-right:none;border-left :1px solid; padding-top:20px; padding:15px;">
                    <h2>amount : <span style="color: rgb(6, 165, 131);">Rs. 6000</span></h2><br/>
                    <h4>If Your payment recieved, click below to add as a boarder.</h4>
                    <button type="button" class="btn5 Accept_Request" style="background-color: rgb(3, 204, 3); margin-left:none; width:20vw;" onclick='if(confirm("Are you want to add this Boarder ?")) window.location="../controller/requestIshan.php?ConreqAccBOwner_id=<?php echo $request_id; ?>"'><i class="fas fa-hand-holding-usd"></i> Payment Recieved<br/>&<br/><i class="fas fa-user-plus"></i> Add to my boarders</button>
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
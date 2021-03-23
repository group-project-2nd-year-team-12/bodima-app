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
    <title>New boarder Added</title>
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
        <?php include  'requestManageBO_Side_ishan.php';?> 
      
    
        <div id="shortTerm-box" class="pending">
            <div class="title">
            <div class="order-title">
                    <h3>New Boarder Added</h3>
            </div>
<!---------------------------------------------------------------------------------  -->
<?php 

        $email=$_SESSION['email'];
        $BOid=$_SESSION['BOid'];
        $result=BOwnerReqIshan::selectMyBordersBO($connection,$BOid);
        while ($user=mysqli_fetch_assoc($result))
        {
            $request_id=$user['request_id'];
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
                    <div class="resend wait" style="background-color: rgb(29, 236, 191);">
                        <div class="right" ><i class="fas fa-user-check fa-2x"></i></div>
                        <div class="letter"><h3 style="margin-top:35px;">Congratulations! You have a new boarder.<small> post number: <?php echo $B_post_id; ?><br/>request no: <?php echo $request_id; ?></small></h3></div>
                    </div>
                  <div class="details-boxx">
                        <div class="details">
                            <h2>Payment :<span style="color: rgb(6, 165, 131);">successful</h2><br/><br/>
                            <!-- <img src="../resource/Images/uploaded_boarding/2.jpg" class="post_image" alt="" > -->
                            <h2>amount : <span style="color: rgb(6, 165, 131);"><?php echo $keymoneyAmount; ?></span></h2><br/>
                            <h4>recieved at: <span style="color: rgb(6, 165, 131);"><?php echo $payment_date; ?></span></h4>
                            <h4>payment id:<?php echo $rend_id; ?></h4>
                        </div>
                        <div class="button-pay">
                        <h2>New person has done Advance payment! </h2>
                            <h4>Name: <span style="color: rgb(6, 165, 131);"><?php echo $first_name; ?></span><br/></h4>
                            <h4>Gender: <span style="color: rgb(6, 165, 131);"><?php echo $gender; ?></span><br/></h4>
                            <h4>NIC: <span style="color: rgb(6, 165, 131);"><?php echo $nic; ?></span><br/></h4>
                            <h4>telephone no: <span style="color: rgb(6, 165, 131);"><?php echo $telephone; ?></span><br/></h4>
                            <h4>University/working at: <span style="color: rgb(6, 165, 131);"><?php echo $institute; ?></span><br/></h4>
                            <br/><hr>
                            <h4><span style="color: rgb(6, 165, 131); text-decoration:underline;"><a href="myboarders.php">click here</a></span> to view My boarders</h4><br/>
                        </div>
                  </div>
        </div>
                
                
<?php
}
?>             
<!---------------------------------------------------------------------------------  -->
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
<?php   require_once ('../config/database.php');
        require_once ('../models/reg_user.php');
        require_once ('../models/StudentRequestIshan.php');
       // require_once ('../controller/boarding_req_con_B_Ishan.php');
         require_once ('../controller/boarding_req_con_B_Ishan.php');
        // session_start(); //
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
    <title>Pending requests</title>
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
                    <div class="profile"><a href="../controller/profile_controlN.php?profile=1"> <i  class="fa fa-user-circle fa-lg"></a></i></div>
            
                    <button onclick="window.location='../controller/logoutController.php'">Sign out <i class="fa fa-sign-out-alt"></i></button>
                <?php } ?>
                
            </div>
        </div>
    <div class="container">
        <div class="content">
        <?php include  'paymentFoodSlide_ishan.php';?> 
      
           
        <div id="shortTerm-box" class="pending">
            <div class="title">
            <div class="order-title">
                    <h3>Pending Orders </h3>
            </div>
<!-- ---------------------------------------------------------------------------- -->
               
<?php 

                // $student_email=$_SESSION['email'];
                // $result=StudentRequestIshan::selectPendingRequest($student_email,$connection);



              $pending_request=pendingRequest($connection);
                // while($user=mysqli_fetch_assoc($result)) 
                // {
                    // $request_id=$user['request_id'];
                    // $student_email=$user['student_email'];
                    // $B_post_id=$user['B_post_id'];
                    // $city=$user['city'];
                    // $image=$user['image'];
                    // $reqDate=$user['date'];
                    // $cenvertedTime = date('Y-m-d H:i:s',strtotime('+3 days',strtotime($reqDate)));
                    // $first_name=$user['first_name'];
                    // $last_name=$user['last_name'];
                   

//print_r($pending_request);
?>  
 <?php foreach($pending_request as $pending){

     $reqDate=$pending['date'];
    $cenvertedTime = date('Y-m-d H:i:s',strtotime('+3 days',strtotime($reqDate)));

    ?>
        <div class="boxx">
            <input type="hidden" id="date" value="<?php echo $cenvertedTime; ?>">
            <input type="hidden"  id="request_id" value="<?php echo $pending['request_id']; ?>">
                 
            <div class="resend wait" >
                <div class="right"><i class="far fa-clock fa-2x"></i></div>
                    <div class="letter">
                        <h3>Your Request is Pending <span class="dot dot1">.</span> <span class="dot dot2">.</span> <span class="dot dot3">.</span> <small><b id="countdown">  
                        <div id="data">
                        </div>
                        </b> This request will cancel </small>
                        </h3>
                    </div>
            </div>
            <div class="details-boxx">
                <div class="details">
                    <h2 >Request Id :<span style="color:sienna;"><?php echo $pending['request_id']; ?></h2>
                    <img src="<?php echo $pending['image']; ?>" class="post_image" alt="" >
                    <h4>post Id :<?php echo $pending['B_post_id'] ; ?></h4>
                    <h4><?php echo $pending['city'] ; ?></h4>
                </div>
                <div class="button-pay">
                    <h2>Your request has been sent succesfully<br/></h2>
                    <h4>Post owner : <span style="color:sienna;"><?php echo $pending['first_name']."  ".$pending['last_name'] ; ?></span></h2>
                    <!-- <br/><br/><hr> -->
                    <h4>If you want cancel request. click the cancel request</h4>
                    <button type="button" class="btn1 cancel"   onclick='if(confirm("Are you want to cancel this Request ?")) window.location="../controller/requestIshan.php?requestDelete_id=<?php echo $pending['request_id']
                    ; ?>"'> Cancel Request</button>
                </div>
            </div>
        </div>

<?php } ?>  
                
               
<!-- ---------------------------------------------------------------------------- -->
            <div class="empty">
            </div>
        </div>
        </div>
        </div>
    </div>
 


</body>
<script src="../resource/js/timing.js"></script>


<script>
    function func() {
        var dateValue = document.getElementById("date").value;
        var request_id = <?php echo $pending['request_id'] ; ?>
 
        var date = Math.abs((new Date().getTime() / 1000).toFixed(0));
        var date2 = Math.abs((new Date(dateValue).getTime() / 1000).toFixed(0));
 
        var diff = Math.abs(date2 - date);

        var days=Math.floor(diff/86400);
        var hours=Math.floor(diff/3600)%24;
         var minutes=Math.floor(diff/60)%60;
          var seconds=diff%60;
          
       
        document.getElementById("data").innerHTML = days+" days, "+hours+"  hours, "+minutes+"  minutes, "+seconds+" seconds";
          if (days==0 && hours==0 && minutes==0 && seconds==0) {
          window.location="../controller/requestIshan.php?requesttimeout_id=<?php echo $request_id; ?>"
          }
    }
 
    func();
    var interval = setInterval(func, 1000);
</script>




<script src="../resource/js/settingOrder.js"></script>
<script src="../resource/js/newOrder.js"></script>
<script> src="../resource/order.js"</script>
<script src="../resource/js/disableBack.js"></script>



</html>
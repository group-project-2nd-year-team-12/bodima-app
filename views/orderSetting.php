<?php  
        session_start(); 
        // print_r($_SESSION);
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
                 <img src="../resource/img/logo.png" alt="">
                <h1><small style="font-size: 14px; color:white;">   Solution for many problems</small></h1>
                
            </div>
            <div class="sign">
             
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
                    <div class="profile"><a href="profilepage.php"> <i  class="fa fa-user-circle fa-lg"></a></i></div>
                <?php
                  echo '<div class="user"><h4>Welcome '.$_SESSION['first_name'].'</h4></div>'; ?>
                 <button onclick="window.location='../controller/logoutController.php'">Sign out <i class="fa fa-sign-out-alt"></i></button>
                <?php } ?>
            </div>
        </div>
    <div class="container">
        <div class="content setting">
         <?php include 'orderSide.php' ?>
         <div class="settingOuter"> 
             <div class="setting-box"> 
            <?php
          
                if(isset($_GET['error']))
                {
                    $error=unserialize($_GET['error']);
                   
                    ?>
                    <div id="error" class="error">
                       <h4><?php  echo $error; ?></h4>
                    </div>

              <?php  }
            ?>
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
                    <div id="down" class="taggle">
                    <div>
                            <h5>Manage your unavailable date </h5>
                            <h5 style="color: rgb(120, 120, 120);font-weight:normal">You can select date that you unavailable </h5>
                    </div>
                    <i id="down-icon" class="fas fa-sort-down fa-2x"></i>  
                    </div>
                    <div id="dropDown" class="dropdown-1">
                        <div class="unavailable">
                        <!-- <h5>Select date that your available </h5> -->
                        <form action="../controller/orderConFood.php" method="post"> 
                            <input type="date" name="date">
                            
                            <button name="unavailable"  type="submit">&nbsp;&nbsp;&nbsp; <i  class="fas fa-plus"></i></button>
                        </form>
                        </div>
                        <div class="list">
                            <h5>Unavailable Dates</h5>
                           <?php $dates=unserialize($_GET['date']);
                           foreach($dates as $date)
                           {?>
                               <h5 style="color:red"><?php echo $date['unavailable_date'] ?>&nbsp;&nbsp;&nbsp; <i style="cursor:pointer" onclick="if(confirm('Do you want to delete this date ?')){window.location='../controller/orderConFood.php?delectDate=<?php echo $date['unavailable_date']; ?>'}" class="far fa-trash-alt" title="Delete"></i></h5>
                      <?php     }
                           ?>
                        </div>

                    </div>
                </div>
                </div>
             <h3>Services</h3>
             <div class="option" style="border-radius:5px 5px 0 0 ;">
                    <div class="taggle">
                            <div>
                                    <h5>Email Notification </h5>
                                    <!-- <h5 style="color: rgb(120, 120, 120);font-weight:normal">Availabled</h5> -->
                            </div>
                            <i class="fas fa-check"></i>
                    </div>
             </div>
             <div class="option">
                    <div class="taggle">
                            <div>
                                    <h5>SMS Notification </h5>
                                    <!-- <h5 style="color: rgb(120, 120, 120);font-weight:normal">Availabled</h5> -->
                            </div>
                            <i class="fas fa-check"></i>
                    </div>
             </div>
             <div class="option">
                    <div class="taggle">
                            <div>
                                    <h5>Long term food delivery </h5>
                                    <h5 style="color: rgb(120, 120, 120);font-weight:normal">Disabled</h5>
                            </div>
                            <form action="../controller/orderCon.php?avail" method="post">
                            <input onchange="if(confirm('Are you sure disable this service ?'))this.form.submit();" type="checkbox" name="isAvail" value="true"  checked>
                        </form>
                    </div>
             </div>
             <div class="option">
                    <div class="taggle">
                            <div>
                                    <h5>Sort term food delivery </h5>
                                    <h5 style="color: rgb(120, 120, 120);font-weight:normal">Disabled</h5>
                            </div>
                            <form action="../controller/orderCon.php?avail" method="post">
                            <input onchange="if(confirm('Are you sure disable this service ?'))this.form.submit();" type="checkbox" name="isAvail" value="true"  checked>
                        </form>
                    </div>
             </div>
             <h3>Other details</h3>
             <div class="option">
                    <div class="taggle">
                            <div>
                                    <h5>Order time out </h5>
                                    <!-- <h5 style="color: rgb(120, 120, 120);font-weight:normal">Disabled</h5> -->
                            </div>
                            <h5 style="padding: 7px;">20 min</h5>
                    </div>
             </div>
             <div class="option">
                    <div class="taggle">
                            <div>
                                    <h5>Long term food delivery </h5>
                                    <h5 style="color: rgb(120, 120, 120);font-weight:normal">Disabled</h5>
                            </div>
                            <form action="../controller/orderCon.php?avail" method="post">
                            <input onchange="if(confirm('Are you sure disable this service ?'))this.form.submit();" type="checkbox" name="isAvail" value="true"  checked>
                        </form>
                    </div>
             </div>
             <div class="option">
                    <div class="taggle">
                            <div>
                                    <h5>Short term food delivery </h5>
                                    <h5 style="color: rgb(120, 120, 120);font-weight:normal">Disabled</h5>
                            </div>
                            <form action="../controller/orderCon.php?avail" method="post">
                            <input onchange="if(confirm('Are you sure disable this service ?'))this.form.submit();" type="checkbox" name="isAvail" value="true"  checked>
                        </form>
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
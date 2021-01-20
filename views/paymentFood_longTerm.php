<?php   require_once ('../config/database.php');
        require_once ('../models/reg_user.php');
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
    <script src="../resource/js/jquery.js"></script>
    <title>Document</title>
</head>
<body onload="checked('long-term');">

<!-- page separate 2 section short term long term  -->
<script>
    function orderType(id)
{
    var order=document.getElementById(id);
    const shortTerm=document.getElementById('shortTerm-box');
    const longTerm=document.getElementById('longTerm-box');
    if(id=='shortTerm')
    {
        shortTerm.style.display='block';
        longTerm.style.display='none';
    }
    if(id=='longTerm')
    {
        longTerm.style.display='block';
        shortTerm.style.display='none';
    }
    order.style.display='block';
  
}
</script>


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
        <?php include  'paymentFoodSlide.php';?> 
        <div class="subNav">
                <ul>
                    <div>
                        <div id="noti-longTerm"><h5></h5></div>
                        <li tabindex="0" id="longTerm" onclick="orderType(this.id);" title="Log Term " class="subNav-item"><img src="https://img.icons8.com/cute-clipart/40/000000/property-with-timer.png"/></li>
                    </div>
                </ul>
            </div>
            <?php 
                    $recordsSeritaize=getLongTerm($connection);
                    $ids=unserialize($recordsSeritaize[0]);
                    $data_rows=unserialize($recordsSeritaize[1]);
                
                    ?>
            <div style="overflow-x:hidden ;" id="shortTerm-box" class="pending">
            <div class="title">
            <div class="order-title">
                    <h3>Long Term Orders </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
               
               
                $total='';
                $i=1;
                $x=0;
                $date=0;
            
                foreach($ids as $id){
                ?>
                <div class="box" id="<?php echo $id['order_id'] ?>">
                  
                    <div class="resend " onclick="order('<?php echo $x ?>')">
                        <div class="right"><i class="far fa-clock fa-2x"></i></div>
                        <div class="letter">
                            <h4>Order ID : <?php echo $id['order_id'] ?> <span class="dot dot1">.</span> <span class="dot dot2">.</span> <span class="dot dot3">.</span> <small>View More</small> </h4> 
                            <h5 style="color:#2c3e8f;">Order Time Out in : <span  id="minute<?php echo $x; ?>"> min</span> <span id="secound<?php echo $x; ?>"> sec</span></h5>
                        </div>
                    </div>
                  <div id="<?php echo $x ?>" class=" longTerm-struct">
                       <div class="longTerm-details">
                        <!-- <div style="width: 300px;"> <img style="width: 300px;  margin:50px 20px" src="../resource/img/pending.svg" alt=""></div> -->
                        <div style="width: 60%; margin:20px" class="button-pay">
                                <h2 class="order_item order-head">ORDER INFO</h2>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Id  </h4><h4>: <?php echo $id['order_id']; ?></h4></div>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Item  </h4></div>
                                <?php 
                                    foreach($data_rows as $data_row)
                                    {
                                        if($data_row['order_id']==$id['order_id'])
                                        {
                                            $total=$data_row['total'];
                                            $time=$data_row['time'];
                                            $restaurant=$data_row['restaurant'];
                                            $method=$data_row['method'];
                                            $address=$data_row['address'];
                                            $type=$data_row['order_type'];
                                            ?> 
                                            <?php
                                            //   echo '<div class="product_item"><h5 class="item">'.$i++.'.'.$data_row['order_item'].'</h5>';
                                            //   echo '<h5 class="quantity">Quantity :'.$data_row['quantity'].'</h5></div>';
                                        }
                                            
                                    }
                                ?>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Ordered time </h4><h4>: <?php echo $time ?></h4></div>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Type </h4><h4>: <?php echo $type; ?></h4></div>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Resturent  </h4><h4>: <?php echo $restaurant ?></h4></div>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Address  </h4><h4>: <?php echo $address ?></h4></div>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                            </div>
                            <div class="longTerm-table">
                                <h1>Long term delivery records</h1>
                                <table>
                                        <tr>
                                            <th>Date</th>
                                            <th>Delivery State </th>
                                            <th>Delivered Time</th>
                                            
                                        </tr> 
                                        <?php
                                        
                                            foreach($data_rows as $row)
                                            {
                                                if($row['order_id']==$id['order_id'])
                                                {
                                            ?>
                                            <tr>
                                            
                                                <td><?php echo $row['day']; ?>
                                                <td style="text-align: center;"><button id="stateBtn<?php echo $i ?>" class="longTerm-btn-1">Receive</button></td>
                                                <td id="delivery<?php echo $i ?>"><?php echo $row['deliveredTime']; ?></td>
                                                <script>
                                                    $(document).ready(function () {
                                                            var date='<?php echo $row['day']; ?>';
                                                            var orderId=<?php echo $row['order_id']; ?>;
                                                            var stateBtn=document.getElementById('stateBtn<?php echo $i ?>');
                                                        $(window).on('load', function () {
                                                           
                                                            $.ajax({
                                                            type: "POST",
                                                            url: "../controller/orderCon.php",
                                                            data:{date:date,orderId:orderId},
                                                            dataType: "json",
                                                            success: function (data) {
                                                               
                                                                if(data.date=='qual' && data.delivery==0 )
                                                                {                                                       
                                                                    stateBtn.style.backgroundColor='blue'; 
                                                                     
                                                            
                                                                }
                                                                if(data.date=='qual' && data.delivery==1 )
                                                                {                                                       
                                                                    stateBtn.style.backgroundColor='black';  
                                                                    stateBtn.innerHTML='Received';
                                                                    stateBtn.disabled=true;
                                                                }
                                                                if(data.date=='plus')
                                                                {
                                                                    stateBtn.disabled=true;      
                                                                    stateBtn.style.backgroundColor='gray';  
                                                                
                                                                }
                                                                if(data.delivery==1 && data.date=='minus')
                                                                {
                                                                    stateBtn.disabled=true;      
                                                                    stateBtn.style.backgroundColor='black';  
                                                        
                                                                }
                                                                if(data.delivery==0 && data.date=='minus')
                                                                {
                                                                    stateBtn.innerHTML='Not Received';
                                                                    stateBtn.disabled=true;
                                                                    stateBtn.style.backgroundColor='black';
                                                                }
                                                                
                                                               
                                                            }
                                                            });
                                                      
                                                    });
                                                     
                                                    $(document).on('click', "#stateBtn<?php echo $i ?>", function(){
                                                    
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "../controller/orderCon.php",
                                                            data:{dateUp:date,orderIdUp:orderId},
                                                            dataType: "json",
                                                            success: function (data) {
                                                                console.log(data); 
                                                                stateBtn.style.backgroundColor='black';  
                                                                stateBtn.innerHTML='Received';
                                                                stateBtn.disabled=true; 
                                                                document.getElementById('delivery<?php echo $i ?>').innerHTML=data.deliveryTime;      
                                                            }

                                                        });
                                                    
                                                     });

                                                });
                                                   
                                                </script>
                                                
                                            </tr>
                                            <?php $i++; } 

                                            }?>
                                    </table>        
                              </div>
                       </div>
                
                          
         
                  </div>
               
                </div>
                <?php
                    
            $date+=2;
           $x=$x+2; 
        }?>      
            </div>
        </div>
        </div>
    </div>
</body>
<script src="../resource/js/timing.js"></script>
<script src="../resource/js/settingOrder.js"></script>
<script src="../resource/js/pendingOrder.js"></script>
<script src="../resource/js/newOrder.js"></script>
<script src="../resource/js/disableBack.js"></script>

</html>
<?php   require_once ('../config/database.php');
        require_once ('../models/reg_user.php');
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
    <script src="../resource/js/jquery.js"></script>
    <title>Document</title>
</head>
<body onload="checked('pending');">

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
                 <img src="../resource/img/logo.png" alt="">
                <h1><small style="font-size: 14px; color:white; font-weight:lighter">   Solution for many problems</small></h1>
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
        <div class="content">
        <?php include  'paymentFoodSlide.php';?> 
        <div class="subNav">
                <ul>
                  
                    <div>
                        <div id="noti-breakfast"><h5></h5></div>
                        <li tabindex="0" id="shortTerm" onclick="orderType(this.id);" title="Dinner" class="subNav-item"><img src="https://img.icons8.com/cotton/40/000000/breakfast--v2.png"/></li>
                    </div>
                    <div>
                        <div id="noti-longTerm"><h5></h5></div>
                        <li tabindex="0" id="longTerm" onclick="orderType(this.id);" title="Log Term " class="subNav-item"><img src="https://img.icons8.com/cute-clipart/40/000000/property-with-timer.png"/></li>
                    </div>
                </ul>
            </div>
        <?php 
            $ids=unserialize($_GET['ids']);
            $data_rows=unserialize($_GET['data_rows']);
            $new=array_column($data_rows,'term');
        ?>            
        <div id="shortTerm-box" class="pending">
            <div class="title">
            <div class="order-title">
                    <h3>Pending Orders </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
               
               
                $total='';
                $i=1;
                $x=0;
                $date=0;
                if(in_array('shortTerm',$new)){
                foreach($ids as $id){
                  if($id['term']=='shortTerm' ){
                ?>
                <div class="box" id="<?php echo $id['order_id'] ?>">
                  
                    <div class="resend " onclick="order('<?php echo $x ?>')">
                        <div class="right"><i class="far fa-clock fa-2x"></i></div>
                        <div class="letter">
                            <h4>Order ID : <?php echo $id['order_id'] ?> <span class="dot dot1">.</span> <span class="dot dot2">.</span> <span class="dot dot3">.</span> <small>View More</small> </h4> 
                            <h5 style="color:#2c3e8f;">Order Time Out in : <span  id="minute<?php echo $x; ?>"> min</span> <span id="secound<?php echo $x; ?>"> sec</span></h5>
                        </div>
                    </div>
                  <div id="<?php echo $x ?>" class="details-box req-pending">
                  <div style="width: 300px;"> <img style="width: 300px;  margin:50px 20px" src="../resource/img/pending.svg" alt=""></div>
                        <div class="button-pay">
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
                                          ?> 
                                          <?php
                                          echo '<div class="product_item"><h5 class="item">'.$i++.'.'.$data_row['product_name'].'</h5>';
                                          echo '<h5 class="quantity">Quantity :'.$data_row['quantity'].'</h5></div>';
                                      }
                                          
                                  }
                                  $i=1;
                            ?>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Ordered time </h4><h4>: <?php echo $time ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Resturent  </h4><h4>: <?php echo $restaurant ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Address  </h4><h4>: <?php echo $address ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                            <h4 class="order_item" style="color: #101e5a;margin-top:20px"> Please wait for food supplier accept this order.</h4>
                           <div class="order_item" style="color: #101e5a;"><h4>Do you want to cancel this order ?</h4> <h4><button onclick='if(confirm("Are you want to cancel this Order ?")) window.location="../controller/orderCon.php?orderDelete_id=<?php echo $id["order_id"]; ?>"' type="button" class="btn1 cancel"> Cancel</button></h4></div> 
                        </div>
                  </div>
               
                </div>
                <script>
                    // timing function
             $(document).ready(function(){
                function newOrder()
                     {
                        view="<?php echo $id['order_id']; ?>";
                        $.ajax({
                            url:"../controller/orderCon.php",
                            method:"POST",
                            data:{view:view},
                            dataType:"json",
                            success:function(data)
                            {
                                if(data.minute==0 && data.secound<=1){
                                    window.location="../controller/orderCon.php?id=1";
                                }
                                else{
                                document.getElementById('minute<?php echo $x; ?>').innerHTML=data.minute+'min';
                                document.getElementById('secound<?php echo $x; ?>').innerHTML=data.secound+'sec';
                                
                                }
                                console.log(data);
                                if(data.state==1 || data.state==3)
                                {
                                        document.querySelector('.orderAccept').classList.add('orderAccept-active');
                                        document.getElementById('acceptMethod').innerHTML=' : '+data.payment;
                                        document.getElementById('acceptId').innerHTML=' : '+data.acceptId;
                                        document.getElementById('acceptRes').innerHTML=' : '+data.rasturent;
                                       if(data.payment=="card")
                                       {
                                        document.getElementById('accept-btn').innerHTML='Check & Pay';
                                       }
                                       else{
                                        document.getElementById('accept-btn').innerHTML='Receiving Order';
                                       }
                                        
                                        // document.querySelector('.')
                                }
                                if(data.state==2)
                                {
                                    document.querySelector('.orderCancel').classList.add('orderCancel-active');
                                }
                             
                                
                            }
                              })
        
                        }
                        newOrder();

                        setInterval(function(){ 
                            newOrder();
                        }, 1000);
                     })
                </script>
                <?php
                    }  
            $date+=2;
           $x=$x+2; 
        }
        } else
        {?>
            <div class="empty">
                 <h1> Nothing to show here</h1>
            </div>
      <?php  }
         ?>     
               
            </div>
        </div>
        <div id="longTerm-box" class="pending none">
            <div class="title">
            <div class="order-title">
                    <h3>Pending Orders </h3>
                    <!-- <div><h5>1</h5></div> -->
                </div>
                <?php 
               
               
                $total='';
                $i=1;
                $date=0;
                $x=$x+2;
                if(in_array('longTerm',$new)){
                foreach($ids as $id){
                    if($id['term']=='longTerm'){
                ?>
                <div id="<?php echo $id ?>" class="box" >
                
                <div class="resend " onclick="order('<?php echo $x ?>')">
                        <div class="right"><i class="far fa-clock fa-2x"></i></div>
                        <div class="letter">
                            <h4>Order ID : <?php echo $id['order_id'] ?> <span class="dot dot1">.</span> <span class="dot dot2">.</span> <span class="dot dot3">.</span> <small>View More</small> </h4> 
                            <h5 style="color:#2c3e8f;">Order Time Out in : <span  id="minute<?php echo $x; ?>"> min</span> <span id="secound<?php echo $x; ?>"> sec</span></h5></div>
                    </div>
                  <div id="<?php echo $x ?>" class="details-box req-pending">
                  <div><img style="width: 300px;" src="../resource/img/pending.gif" alt=""></div>
      
                  <div class="button-pay">
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
                                          ?> 
                                          <?php
                                          echo '<div class="product_item"><h5 class="item">'.$i++.'.'.$data_row['product_name'].'</h5>';
                                          echo '<h5 class="quantity">Quantity :'.$data_row['quantity'].'</h5></div>';
                                      }
                                          
                                  }
                                  $i=1;
                            ?>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Ordered time </h4><h4>: <?php echo $time ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Resturent  </h4><h4>: <?php echo $restaurant ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order Address  </h4><h4>: <?php echo $address ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment method </h4><h4>: <?php echo $method; ?></h4></div>
                            <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Pay amount </h4><h4>: RS <?php echo $total; ?></h4></div>
                            <h4 class="order_item" style="color: #101e5a;margin-top:20px"> Please wait for food supplier accept this order.</h4>
                           <div class="order_item" style="color: #101e5a;"><h4>Do you want to cancel this order ?</h4> <h4><button onclick='if(confirm("Are you want to cancel this Order ?")) window.location="../controller/orderCon.php?orderDelete_id=<?php echo $id["order_id"]; ?>"' type="button" class="btn1 cancel"> Cancel</button></h4></div> 
                        </div>
                  </div>
                </div>
                <script>
                    // timing function
             $(document).ready(function(){
                function newOrder()
                     {
                        view="<?php echo $id['order_id']; ?>";
                        $.ajax({
                            url:"../controller/orderCon.php",
                            method:"POST",
                            data:{view:view},
                            dataType:"json",
                            success:function(data)
                            {
                                if(data.minute==0 && data.secound==1){
                                        document.querySelector('.timeOut').classList.add('timeOut-active');
                                }
                                else{
                                document.getElementById('minute<?php echo $x; ?>').innerHTML=data.minute+'min';
                                document.getElementById('secound<?php echo $x; ?>').innerHTML=data.secound+'sec';
                                
                                }
                                if(data.state==1 || data.state==3)
                                {
                                        document.querySelector('.orderAccept').classList.add('orderAccept-active');
                                        document.getElementById('acceptMethod').innerHTML=' : '+data.payment;
                                        document.getElementById('acceptId').innerHTML=' : '+data.acceptId;
                                        document.getElementById('acceptRes').innerHTML=' : '+data.rasturent;
                                       if(data.payment=="card")
                                       {
                                        document.getElementById('accept-btn').innerHTML='Check & Pay';
                                       }
                                       else{
                                        document.getElementById('accept-btn').innerHTML='Receiving Order';
                                       }
                                        
                                        // document.querySelector('.')
                                }
                                if(data.state==2)
                                {
                                    document.querySelector('.orderCancel').classList.add('orderCancel-active');
                                }
                             
                                
                            }
                              })
        
                        }
                        newOrder();

                        setInterval(function(){ 
                            newOrder();
                        }, 1000);
                     })
                </script>
                <?php
                $date+=2;
               
                $x=$x+2;  }
        }
        } else
        {?>
            <div class="empty">
                 <h1> Nothing to show here</h1>
            </div>
      <?php  }
         ?>     
               
            </div>
        </div>
        </div>
    </div>
 

  <!-- time out function -->
<?php if(isset($_GET['timeOut']))
{   ?>
    <div class="timeOut">
    <div class="timeOut-box">
        <div class="iconClose">  <i id="timeOutIcon" class="fas fa-times fa-2x" onclick="window.location='../controller/orderCon.php?id=1'"></i></div>
        <div class="outImg"><img src="../resource/img/timeout.svg" alt=""></div>
        <div class="outHeader">
            <h1>Your Order time out </h1>
            <h4>Your order timeout. Because food supplier not accept your order .Please try again or place order another resturent</h4>
            <?php 
            $timeOutDatas=unserialize($_GET['timeOut']); 
              foreach($timeOutDatas as $timeOutData)
              {
                    $total=$timeOutDatas['total'];
                    $time=$timeOutDatas['time'];
                    $restaurant=$timeOutDatas['restaurant'];
                    $id=$timeOutDatas['order_id'];
             }
        ?>
          <div style="margin-top:30px;">
            <div class="order_item"> <h4 style="width: 120px;text-align:left;color: #101e5a;">Order ID </h4><h4>: <?php echo $id ?></h4></div>
                <div class="order_item"> <h4 style="width: 120px;text-align:left;color: #101e5a;">Ordered time </h4><h4>: <?php echo $time ?></h4></div>
                <div class="order_item"> <h4 style="width: 120px;text-align:left;color: #101e5a;">Resturent </h4><h4>: <?php echo $restaurant ?></h4></div>
            </div>
        </div>
    </div>
    </div>

<?php }
?>
 

 <!-- Order accpet popup -->
 <div class="orderAccept">
    <div class="acceptPop-box">
        <div class="accHeader">
            <h1>Your Order Accepted </h1>
            <h4 style="margin-top: 20px;margin-left:10px">Your order accpted by food supplier. Cash payment user can receive order </h4>
          <div style="margin-top:30px;">
                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order ID </h4><h4 id="acceptId"></h4></div>
                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment Method </h4><h4 id="acceptMethod"></h4></div>
                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Resturent </h4><h4 id="acceptRes"></h4></div>
         </div>
        </div>
        <button class="accept-btn" id="accept-btn" onclick="if(document.getElementById('acceptMethod').innerHTML==' : card'){window.location='../controller/orderCon.php?id=2'}else{window.location='../controller/orderCon.php?id=3'}">Order Details</button>
    </div>
    </div>

<!-- cancel order poppup -->
    <div class="orderCancel">
    <div class="orderCancel-box">
        <div class="accHeader">
        <div class="iconClose">  <i id="orderIcon" onclick="document.querySelector('.orderCancel').classList.remove('orderCancel-active');window.location='../controller/orderCon.php?id=1;'" class="fas fa-times fa-2x"></i></div>
            <h1>Your Order Cancelled </h1>
            <h4 style="margin-top: 20px;margin-left:10px">Your order accpted by food supplier. Cash payment user can receive order </h4>
          <div style="margin-top:30px;">
                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Order ID </h4><h4 id="acceptId"></h4></div>
                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Payment Method </h4><h4 id="acceptMethod"></h4></div>
                <div class="order_item"> <h4 style="width: 150px;text-align:left;color: #101e5a;">Resturent </h4><h4 id="acceptRes"></h4></div>
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
<!-- clickable drop down -->
<script>
        function order(x,y) {  
            var orderDown=document.getElementById(x);
            var btn=document.getElementById(y);
            if(orderDown.style.display=='none' || orderDown.style.display==''){orderDown.style.display='flex';btn.style.visibility='hidden'}
            else{orderDown.style.display='none';btn.style.visibility='visible'}
    }
</script>

</html>
<?php   require_once ('../config/database.php');
        require_once ('../models/reg_user.php');
        session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../resource/css/nav.css">
    <link rel="stylesheet" href="../resource/css/footer.css">
    <link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/card1.css">
    <script src="../resource/js/jquery.js"></script>
</head>
<body>

  <?php include 'nav.php' ?>
  <div class="cart-wrap">
    <h1><?php echo $_GET['name']; ?></h1>
    <h3><?php echo $_GET['address']; ?></h3>
    <h3>For breakfast,lunch and dinner delivery to your home.</h3>
    <div class="rate"><h4><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star-half"></i></h4></div>
    <img src="../resource/img/resturent.jpg" alt="">
</div>
<?php 

if(isset($_GET['Pid']))
{
  $fpid=$_GET['Pid'];
?>
 <div class="view-product">
<div class="order-type">
    <div class="order-typeBox">
      <h1>Your Cart Details </h1>
      <!-- <?php  print_r($_SESSION) ?> -->
      <h3>Order Type</h3>
      <div class="type">
        <input name="type" id="1" onclick="typeOrder(this.id);" type="radio" checked>
        <label for="1">Breakfast</label>
      </div>
      <div class="type">
        <input name="type" id="2" onclick="typeOrder(this.id);" type="radio">
        <label for="2">Lunch</label>
      </div>
      <div class="type">
        <input name="type" id="3" onclick="typeOrder(this.id);" type="radio">
        <label for="3">Dinner</label>
      </div>
      <h3>Long term food delivery</h3>
      <div class="term">
        <input id="longTerm-check" type="checkbox" onclick="if(this.checked){document.querySelector('.longTerm').classList.add('longTerm-active')}else{document.querySelector('.shedule').style.display='none'}">
        <h4>Please tick the button place long term food order</h4>
    </div>
      <form action="">
      <div class="shedule">
        <h4>Shedule the long term order </h4>
        <h5 id="error-start" style="color: red;"></h5>
          <div>
            <label for="">Start date</label>
            <input type="date" name="end">
          </div>
          <h5 id="error-end" style="color: red;"></h5>
          <div>
            <label for="">End Date</label>
            <input type="date" name="start">
          </div>
          <h5>Notice : <span>After the long term food order you can bla bla bla </span> </h5>  
        
        </div>  
        <div class="cart-icon">   
              <a href="cartItem.php?Pid=<?php echo $fpid?>"><i class="fas fa-shopping-cart"></i> Cart <span id="cart-count" class="count">0</span></a>
          </div>
          <h4><a href="../controller/cartClearCon.php?Pid=<?php echo $_GET['Pid']?>&name=<?php echo $_GET['name'] ?>&address=<?php echo $_GET['address']?>">Clear Cart</a></h4>
    </form>
      
    </div>
   
</div>
<div class="product">
<div class="catogory checked" id="breakfast">
    <div class="cato-header">
      <img  src="../resource/img/breakfast.jpg" alt="">
      <div>
        <h1>Get  </h1>
        <h1>Your</h1>
        <h1>Breakfast</h1>
           <form action="#">
            <div class="search-item">
              <input type="text" placeholder="search food ...">
              <h4><i class="fas fa-search"></i></h4>
            </div>
          </form>
      </div>
    </div>
    <div class="cart-wrapper">
    <?php
    $i=0;
      $result =reg_user::getProductsByPostid($fpid,$connection); 
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result))
        {
          if($row['breakfast']==1)
          {?>
        <div class="cartbox">  
             <form class="breakformForm<?php echo $i  ?>" action='#'>         
                 <div class="card"> 
                     <div style="width: 100%; height: 150px;overflow:hidden"><img src="<?php echo $row['image'];?>" alt=""></div>
                     <h3><?php echo $row['product_name'];?><span class="price"> Rs. <?php echo $row['price'];?></span></h3>
                     
                     <p>Some text about the item </p>
                     <input id="quantity<?php echo $i ?>" type="hidden" name="quantity" value="1">
                     <input id="id<?php echo $i ?>" type="hidden" name="id" value="<?php echo $row['id'] ?>">
                     <input id="item_name<?php echo $i ?>" type="hidden" name="item_name" value="<?php echo $row['product_name'];?> ">
                     <input id="price<?php echo $i ?>" style="color: green;" type="hidden" name="price" value="<?php echo $row['price'];?>">
                     <!-- <input type="hidden" name="FSid" value="<?php echo $row['FSid'];?>"> -->
                     <input id="Pid<?php echo $i ?>" type="hidden" name="Pid" value="<?php echo $fpid;?>">
                     <input id="name<?php echo $i ?>" type="hidden" name="name" value="<?php echo $_GET['name'];?>">
                     <input id="address<?php echo $i ?>" type="hidden" name="address" value="<?php echo $_GET['address'];?>">
                     <input id="order_type<?php echo $i ?>" type="hidden" name="order_type" value="breakfast">
                     <p><button id="add<?php echo $i ; ?>" type="button" class="cart-num block1" name="add"><i style="padding-right:5px;" class="fa fa-cart-plus"></i>Add to Order</button></p>
                 </div>
               </form>
         </div>
         <script>
         $(document).ready(function(){
            $(document).on('click','#add<?php echo $i ; ?>',function(){
              if(document.getElementById('longTerm-check').checked)
              {
                var term ='longTerm';
              }else{
                var term='shortTerm';
              }
              var quantity=$("#quantity<?php echo $i ?>").val();
              var id=$("#id<?php echo $i ?>").val();
              var price=$("#price<?php echo $i ?>").val();
              var Pid=$("#Pid<?php echo $i ?>").val();
              var name=$("#name<?php echo $i ?>").val();
              var address=$("#address<?php echo $i ?>").val();
              var item_name=$("#item_name<?php echo $i ?>").val();
              var order_type=$("#order_type<?php echo $i ?>").val();
              var add ='add';
              $.ajax({
                url:"../controller/cartCon.php",
                method:"POST",
                data:{quantity:quantity,id:id,price:price,Pid:Pid,name:name,address:address,add:add,item_name:item_name,order_type:order_type,term:term},
                dataType:"json",
                success:function(data)
		            	{
                  
                    if(data.login!='')
                    {
                      window.location='../views/user_loging.php?login';
                    }
                    else{
                      $('.count').html(data.count);
                      if(data.added!='')
                        {
                          alert(data.added);
                        }
                        if(data.term=""){
                          document.getElementById('1').disabled=false;
                          document.getElementById('2').disabled=false;
                          document.getElementById('3').disabled=false;
                          document.getElementById('longTerm-check').disabled=false;
                        }
                        else{
                          document.getElementById('1').disabled=true;
                          document.getElementById('2').disabled=true;
                          document.getElementById('3').disabled=true;
                          document.getElementById('longTerm-check').disabled=true;
                        }
                      }
                  
                  },
                error:function(jqXHR, textStatus, error)
                {
                  window.location='../views/user_loging.php?login';
                    console.log(jqXHR.responseText);
                    console.log(jqXHR.statusText);
                }
            });
          
         });
        });
         </script>
        <?php $i++; }

        }
      }
    ?>
    </div>
  </div>
  <div class="catogory" id="lunch">
  <div class="cato-header">
      <img  src="../resource/img/lunch.jpg" alt="">
      <div>
        <h1>Get  </h1>
        <h1>Your</h1>
        <h1>Lunch</h1>
           <form action="#">
            <div class="search-item">
              <input type="text" placeholder="search food ...">
              <h4><i class="fas fa-search"></i></h4>
            </div>
          </form>
      </div>
    </div>
    <div class="cart-wrapper">
    <?php
      $result =reg_user::getProductsByPostid($fpid,$connection); 
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result))
        {
          if($row['lunch']==1)
          {?>
        <div class="cartbox">  
             <form id="lunchForm<?php echo $i ?>" action="../controller/cartCon.php" method="post">         
                 <div class="card"> 
                 <div style="width: 100%; height: 150px;overflow:hidden"><img src="<?php echo $row['image'];?>" alt=""></div>
                     <h3><?php echo $row['product_name'];?><span class="price"> Rs. <?php echo $row['price'];?></span></h3>
                     
                     <p>Some text about the item </p>
                     <input type="hidden" name="quantity" value="1">
                     <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                     <input type="hidden" name="item_name" value="<?php echo $row['product_name'];?> ">
                     <input style="color: green;" type="hidden" name="price" value="<?php echo $row['price'];?>">
                     <!-- <input type="hidden" name="FSid" value="<?php echo $row['FSid'];?>"> -->
                     <input type="hidden" name="Pid" value="<?php echo $fpid;?>">
                     <input type="hidden" name="name" value="<?php echo $_GET['name'];?>">
                     <input type="hidden" name="address" value="<?php echo $_GET['address'];?>">
                     <p><button class="cart-num block2" name="add"><i style="padding-right:5px;" class="fa fa-cart-plus"></i>Add to Order</button></p>
                 </div>
               </form>
         </div>
        <?php $i++; }

        }
      }
    ?>
    </div>
  </div>
  <div class="catogory" id="dinner">
  <div class="cato-header">
      <img  src="../resource/img/dinner.jpg" alt="">
      <div>
        <h1>Get  </h1>
        <h1>Your</h1>
        <h1>Dinner</h1>
           <form action="#">
            <div class="search-item">
              <input type="text" placeholder="search food ...">
              <h4><i class="fas fa-search"></i></h4>
            </div>
          </form>
      </div>
    </div>
    <div class="cart-wrapper">
    <?php
      $result =reg_user::getProductsByPostid($fpid,$connection); 
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result))
        {
          if($row['dinner']==1)
          {?>
       <div class="cartbox">  
             <form id="dinnerForm<?php echo $i ?>" action="../controller/cartCon.php" method="post">         
                 <div class="card"> 
                 <div style="width: 100%; height: 150px;overflow:hidden"><img src="<?php echo $row['image'];?>" alt=""></div>
                     <h3><?php echo $row['product_name'];?><span class="price"> Rs. <?php echo $row['price'];?></span></h3>
                     
                     <p>Some text about the item </p>
                     <input type="hidden" name="quantity" value="1">
                     <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                     <input type="hidden" name="item_name" value="<?php echo $row['product_name'];?> ">
                     <input style="color: green;" type="hidden" name="price" value="<?php echo $row['price'];?>">
                     <!-- <input type="hidden" name="FSid" value="<?php echo $row['FSid'];?>"> -->
                     <input type="hidden" name="Pid" value="<?php echo $fpid;?>">
                     <input type="hidden" name="name" value="<?php echo $_GET['name'];?>">
                     <input type="hidden" name="address" value="<?php echo $_GET['address'];?>">
                     <p><button class="cart-num block3" name="add"><i style="padding-right:5px;" class="fa fa-cart-plus"></i>Add to Order</button></p>
                 </div>
               </form>
         </div>
         <script>

         </script>
        <?php $i++; }

        }
      }
    ?>
    </div>
  </div>
</div>
 </div>

    <?php }
    ?>

    <!-- long term food service message -->
 <div class="longTerm">
    <div class="longTerm-box">
        <div class="accHeader">
            <h1>Active Long Term Food delivery Service </h1>
            <h3 style="margin-top: 15px;margin:0 10px">After activating this service you can order food automatically within a certain number of day.</h3>
            <h4>Notice : Only cash on hand is valid for this service </h4> 
        </div>
        <div class="btn-long">
          <button class="active" onclick="activeLongterm();" id="accept-btn" >Long term</button>
          <button class="cancel" onclick="cancelLongTerm();">Cancel</button>
        </div>
    </div>
    </div>
      
    <div class="longTerm">
    <div class="longTerm-box">
        <div class="accHeader">
            <h1>Active Long Term Food delivery Service </h1>
            <h3 style="margin-top: 15px;margin:0 10px">After activating this service you can order food automatically within a certain number of day.</h3>
            <h4>Notice : Only cash on hand is valid for this service </h4> 
        </div>
        <div class="btn-long">
          <button class="active" onclick="activeLongterm();" id="accept-btn" >Long term</button>
          <button class="cancel" onclick="cancelLongTerm();">Cancel</button>
        </div>
    </div>
    </div>


<?php include 'footer.php'?>
  <!-- order type -->
  <script>
    function typeOrder(type)
    {
      var breakfast=document.getElementById('breakfast');
      var lunch=document.getElementById('lunch');
      var dinner=document.getElementById('dinner');
        if(type==1)
        {
          breakfast.style.display='block';
          lunch.style.display='none';
          dinner.style.display='none';
        }
        else{
          breakfast.style.display='none';
        }
        if(type==2)
        {
          lunch.style.display='block';
          breakfast.style.display='none';
          dinner.style.display='none';
        }else{
          lunch.style.display='none';
        }
        if(type==3)
        {
          dinner.style.display='block';
          breakfast.style.display='none';
          lunch.style.display='none';
        }else{
          dinner.style.display='none';
        }
    }
  </script>
</body>
<script src="../resource/js/cart.js"></script>
<script src="../resource/js/home1.js"></script>
</html> 
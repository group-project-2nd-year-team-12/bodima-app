<!-- preload assesment -->
<?php   require_once ('../config/database.php');
        require_once ('../controller/cartCon.php');
        require_once ('../models/reg_user.php');
        require_once ('../controller/rateConFood.php');
       // session_start(); 
?>

<!-- page -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../resource/css/nav.css">
    <link rel="stylesheet" href="../resource/css/footer.css">
    <link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/card1.css">
    <script src="../resource/js/jquery.js"></script>
    <link rel="stylesheet" href="../resource/css/boardingpage_detailed_rate.css">
</head>
<body>
  <?php include 'nav.php' ?>   <!--nav bar-->


      <?php 


if(isset($_GET['Pid']))
{
  $fpid=$_GET['Pid'];
  //$_SESSION['rating_F_post_id']=$fpid;
  //echo $fpid;
 
 //print_r($_SESSION);
  //echo $_SESSION['rating_F_post_id'];
}
   

  $dataset=rategetcount($fpid,$connection);
  //print_r($dataset);
  $count=$dataset['count'];
  $total=$dataset['total'];
  //echo $total;
  //echo "gggg";
  $avg = '';
  
  if($count != 0){
      if(is_nan(round(($total/$count),1))){
          $avg=0;
      }else{
          $avg=round(($total/$count),1);
      }
  }else{
      $avg=0;
  }
?>


  <!-- intro warpper -->
  <div class="cart-wrap">
    <h1><?php echo $_GET['name']; ?></h1>
    <h3><?php echo $_GET['address']; ?></h3>
    <h3>For breakfast,lunch and dinner delivery to your home.</h3>
    
    <img src="../resource/img/resturent.jpg" alt="">





    <div class="foodratediv">
       <div class="rnb rv1">
                                    <p> <b> <?php echo $avg; ?>/5.0</b></p>
                                </div>
<div class="pdt-rate">
                                    <div class="pro-rating">
                                        <div class="clearfix rating mart8">
                                            <div class="rating-stars">
                                                <div class="grey-stars"></div>
                                                <div class="filled-stars" style="width:<?php echo $avg * 20; ?>%;"></div>
                                            </div>
                                        </div>
                                    </div>
                </div>
                

</div>
</div>

<?php 
if(isset($_GET['Pid']))
{
  $fpid=$_GET['Pid'];
?>
<input type="hidden" id="fpid" value="<?php echo $fpid; ?>">
 <div class="view-product">
<div class="order-type">

  <!-- order type select box -->
    <div class="order-typeBox">
      <h1>Your Cart Details </h1>
      <h3>Order Type</h3>
        <div class="type">
          <input name="type" id="1" onclick="typeOrder(this.id);" type="radio" checked>
          <label for="1" id="next">Breakfast</label>
        </div>
        <div class="type">
          <input name="type" id="2" onclick="typeOrder(this.id);" type="radio">
          <label for="2">Lunch</label>
        </div>
        <div class="type">
          <input name="type" id="3" onclick="typeOrder(this.id);" type="radio">
          <label for="3">Dinner</label>
        </div>

      <!-- long term check box -->
      <h3>Long term food delivery</h3>
      <div class="term">
        <input id="longTerm-check" type="checkbox" onclick="if(this.checked){document.querySelector('.longTerm').classList.add('longTerm-active')}else{document.querySelector('.shedule').style.display='none'}">
          <?php 
            if( isset($_SESSION['term']) && $_SESSION['term']  =='longTerm')
            { ?>
             <script> document.getElementById('longTerm-check').checked=true; </script>
         <?php   }
          ?>
  
        <h4>Please tick the button place long term food order</h4>
    </div>

      <form name="shedule" action="">
      <div class="shedule">
        <h4>Shedule the long term order </h4>
        <h5 id="error-start" style="color: red;"></h5>
          <div>
            <label for="">Start date</label>
            <input id="startDate" type="date" name="start">
          </div>
          <h5 id="error-end" style="color: red;"></h5>
          <div>
            <label for="">End Date</label>
            <input id="endDate" type="date" name="end">
          </div>
          <h5>Notice : <span>After the long term food order you can bla bla bla </span> </h5>  
        
        </div>  
        <div class="cart-icon">   
              <a onclick="validateLongTerm()"><i class="fas fa-shopping-cart"></i> View Cart <span id="cart-count" class="count">0</span></a>
          </div>
          <h4><a href="../controller/cartClearCon.php?Pid=<?php echo $_GET['Pid']?>&name=<?php echo $_GET['name'] ?>&address=<?php echo $_GET['address']?>">Clear Cart</a></h4>
    </form>

      <script>

      // check the short term chart is empty or long term chart is empty 
          function validateLongTerm()
          {
            var count=document.getElementById('cart-count').innerHTML;
            if(document.getElementById('longTerm-check').checked==false && count >0)
            {
              window.location='cartItem.php?Pid=<?php echo $fpid?>';
            }
            else{
              var startDate=$('#startDate').val();
              var endDate=$('#endDate').val();
              $.ajax({
                url:'../controller/cartCon.php',
                method:'post',
                dataType:'json',
                data:{startDate:startDate,endDate:endDate},
                success:function(data)
                {
                  console.log(data);
                
                  if(formSheduleValidate() && count >0 )  // cart  js function 
                    {
                       window.location='cartItem.php?Pid=<?php echo $fpid?>';
                     }
                 else if(count == 0){
                    alert('Your cart is empty');
                  }
                 
                  }
                })
              }
          }
      </script>
    </div>
   
</div>
<!-- product side -->
<div class="product">
<div class="catogory" id="breakfast">
    <div class="cato-header">
      <img  src="../resource/img/breakfast.jpg" alt="">
      <div>
        <h1>Get  </h1>
        <h1>Your</h1>
        <h1>Breakfast</h1>
           
            <div class="search-item">
              <input id="breakfast-search" type="text" placeholder="search food ...">
              <h4><i class="fas fa-search"></i></h4>
            </div>
          
      </div>
    </div>
    <div class="cart-wrapper">
    <?php
    $i=0;
      $result =getProduct($fpid,$connection); 
      if(!empty($result)){
        foreach($result as $row)
        {
          if($row['breakfast']==1)
          {?>
        <div id="b<?php echo $row['product_name'];?>" class="cartbox">  
             <form class="breakformForm<?php echo $i  ?>" action='#'>         
                 <div class="card"> 
                     <div style="width: 100%; height: 150px;overflow:hidden"><img src="<?php echo $row['image'];?>" alt=""></div>
                     <h3><span  class="food-item"><?php echo $row['product_name'];?></span><span class="price"> Rs. <?php echo $row['price'];?></span></h3>
                     
                     <input id="quantity<?php echo $i ?>" type="hidden" name="quantity" value="1">
                     <input id="id<?php echo $i ?>" type="hidden" name="id" value="<?php echo $row['id'] ?>">
                     <input id="item_name<?php echo $i ?>" type="hidden" name="item_name" value="<?php echo $row['product_name'];?> ">
                     <input id="price<?php echo $i ?>" style="color: green;" type="hidden" name="price" value="<?php echo $row['price'];?>">
                     <!-- <input type="hidden" name="FSid" value="<?php echo $row['FSid'];?>"> -->
                     <input id="Pid<?php echo $i ?>" type="hidden" name="Pid" value="<?php echo $fpid;?>">
                     <input id="name<?php echo $i ?>" type="hidden" name="name" value="<?php echo $_GET['name'];?>">
                     <input id="img<?php echo $i ?>" type="hidden" name="img" value="<?php echo $row['image'];?>">
                     <input id="address<?php echo $i ?>" type="hidden" name="address" value="<?php echo $_GET['address'];?>">
                     <input id="order_type<?php echo $i ?>" type="hidden" name="order_type" value="breakfast">
                     <p><button id="add<?php echo $i ; ?>" type="button" class="cart-num block1" name="add"><i style="padding-right:5px;" class="fa fa-cart-plus"></i>Add to Order</button></p>
                     <div class="unavailable">
                      <h1>Food supplier not available</h1>
                    </div>
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
              var img=$("#img<?php echo $i ?>").val();
              var add ='add';
              $.ajax({
                url:"../controller/cartCon.php",
                method:"POST",
                data:{quantity:quantity,id:id,price:price,Pid:Pid,name:name,address:address,add:add,item_name:item_name,order_type:order_type,term:term,img:img},
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
                  // window.location='../views/user_loging.php?login';
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
           
            <div class="search-item">
              <input  id="lunch-search"  type="text" placeholder="search food ...">
              <h4><i class="fas fa-search"></i></h4>
            </div>
          
      </div>
    </div>
    <div class="cart-wrapper">
    <?php
      $result =getProduct($fpid,$connection); 
      if(!empty($result)){
        foreach($result as $row)
        {
          if($row['lunch']==1)
          {?>
             <div id="l<?php echo $row['product_name'];?>" class="cartbox">  
             <form class="breakformForm<?php echo $i  ?>" action='#'>         
                 <div class="card"> 
                     <div style="width: 100%; height: 150px;overflow:hidden"><img src="<?php echo $row['image'];?>" alt=""></div>
                     <h3><?php echo $row['product_name'];?><span class="price"> Rs. <?php echo $row['price'];?></span></h3>
                     
                     <input id="quantity<?php echo $i ?>" type="hidden" name="quantity" value="1">
                     <input id="id<?php echo $i ?>" type="hidden" name="id" value="<?php echo $row['id'] ?>">
                     <input id="item_name<?php echo $i ?>" type="hidden" name="item_name" value="<?php echo $row['product_name'];?> ">
                     <input id="price<?php echo $i ?>" style="color: green;" type="hidden" name="price" value="<?php echo $row['price'];?>">
                     <!-- <input type="hidden" name="FSid" value="<?php echo $row['FSid'];?>"> -->
                     <input id="Pid<?php echo $i ?>" type="hidden" name="Pid" value="<?php echo $fpid;?>">
                     <input id="name<?php echo $i ?>" type="hidden" name="name" value="<?php echo $_GET['name'];?>">
                     <input id="img<?php echo $i ?>" type="hidden" name="img" value="<?php echo $row['image'];?>">
                     <input id="address<?php echo $i ?>" type="hidden" name="address" value="<?php echo $_GET['address'];?>">
                     <input id="order_type<?php echo $i ?>" type="hidden" name="order_type" value="lunch">
                     <p><button id="add<?php echo $i ; ?>" type="button" class="cart-num block1" name="add"><i style="padding-right:5px;" class="fa fa-cart-plus"></i>Add to Order</button></p>
                     <div class="unavailable">
                      <h1>Food supplier not available</h1>
                    </div>
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
              var img=$("#img<?php echo $i ?>").val();
              var add ='add';
              $.ajax({
                url:"../controller/cartCon.php",
                method:"POST",
                data:{quantity:quantity,id:id,price:price,Pid:Pid,name:name,address:address,add:add,item_name:item_name,order_type:order_type,term:term,img:img},
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
                  // window.location='../views/user_loging.php?login';
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
  <div class="catogory" id="dinner">
  <div class="cato-header">
      <img  src="../resource/img/dinner.jpg" alt="">
      <div>
        <h1>Get  </h1>
        <h1>Your</h1>
        <h1>Dinner</h1>
           
            <div class="search-item">
              <input  id="dinner-search" type="text" placeholder="search food ...">
              <h4><i class="fas fa-search"></i></h4>
            </div>
          
      </div>
    </div>
    <div class="cart-wrapper">
    <?php
      $result =getProduct($fpid,$connection); 
      if(!empty($result)){
        foreach($result as $row)
        {
          if($row['dinner']==1)
          {?>
            <div id="d<?php echo $row['product_name'];?>" class="cartbox">  
             <form class="breakformForm<?php echo $i  ?>" action='#'>         
                 <div class="card"> 
                     <div style="width: 100%; height: 150px;overflow:hidden"><img src="<?php echo $row['image'];?>" alt=""></div>
                     <h3><?php echo $row['product_name'];?><span class="price"> Rs. <?php echo $row['price'];?></span></h3>
                     
                     <input id="quantity<?php echo $i ?>" type="hidden" name="quantity" value="1">
                     <input id="id<?php echo $i ?>" type="hidden" name="id" value="<?php echo $row['id'] ?>">
                     <input id="item_name<?php echo $i ?>" type="hidden" name="item_name" value="<?php echo $row['product_name'];?> ">
                     <input id="price<?php echo $i ?>" style="color: green;" type="hidden" name="price" value="<?php echo $row['price'];?>">
                     <!-- <input type="hidden" name="FSid" value="<?php echo $row['FSid'];?>"> -->
                     <input id="Pid<?php echo $i ?>" type="hidden" name="Pid" value="<?php echo $fpid;?>">
                     <input id="name<?php echo $i ?>" type="hidden" name="name" value="<?php echo $_GET['name'];?>">
                     <input id="img<?php echo $i ?>" type="hidden" name="img" value="<?php echo $row['image'];?>">
                     <input id="address<?php echo $i ?>" type="hidden" name="address" value="<?php echo $_GET['address'];?>">
                     <input id="order_type<?php echo $i ?>" type="hidden" name="order_type" value="dinner">
                     <p><button id="add<?php echo $i ; ?>" type="button" class="cart-num block1" name="add"><i style="padding-right:5px;" class="fa fa-cart-plus"></i>Add to Order</button></p>
                     <div class="unavailable">
                      <h1>Food supplier not available</h1>
                    </div>
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
              var img=$("#img<?php echo $i ?>").val();
              var add ='add';
              $.ajax({
                url:"../controller/cartCon.php",
                method:"POST",
                data:{quantity:quantity,id:id,price:price,Pid:Pid,name:name,address:address,add:add,item_name:item_name,order_type:order_type,term:term,img:img},
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
                  // window.location='../views/user_loging.php?login';
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
</div>
 </div>

    <?php }
    ?>

    <!-- long term food service message -->
 <div class="longTerm">
    <div class="longTerm-box">
    <img src="https://img.icons8.com/ios-filled/70/4a90e2/happy-eyes.png"/>
        <div class="accHeader">
            <h1>Active Long Term Food delivery Service </h1>
            <h4 style="margin-top: 15px;margin:0 10px">After activating this service you can order food automatically within a certain number of day.</h4>
            <!-- <h4>Notice : Only cash on hand is valid for this service and The maximum term of an order is one month </h4>  -->
            <!-- <h5>No</h5> -->
        </div>
        <div class="btn-long">
          <button class="active" onclick="activeLongterm();" id="accept-btn" >Long Term</button>
          <button class="cancel" onclick="cancelLongTerm();">Cancel</button>
        </div>
    </div>
  </div>
      
  <!-- login warning box -->
<?php 
if(!isset($_SESSION['email']))
{?>
  <div class="log">
  <div class="log-box">
      <div class="accHeader">
          <h1>Loggin</h1>
          <h3 style="margin-top: 15px;margin:0 10px">Please, First  log in to system for search food item and place an order</h3>
      </div>
      <div class="btn-long">
        <button class="active" onclick="window.location='user_loging.php';" id="accept-btn" >Sign in</button>
        <button class="active" onclick="window.location='register.php';">Sign up</button>
      </div>
  </div>
  </div>
<?php }

?>


<?php include 'footer.php'?>
  <!-- order type -->
  <script>
    function typeOrder(type)
    {
     
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
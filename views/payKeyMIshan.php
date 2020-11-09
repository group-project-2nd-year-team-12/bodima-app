<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../resource/css/registerIshan.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <title>Registration Form</title>
    
</head>
<body class="body2">
    <div class="container">
    <div class="para">
            <h1><b>P</b>ay <b>K</b>ey Money</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga doloremque sunt nam ipsam nihil quo quidem asperiores quisquam pariatur expedita ducimus, voluptatem nisi, dignissimos recusandae. </p>
    </div>
    <div class="register">
    
       <?php
       if(isset($_GET['param']))
       {
           $errors=$_GET['param'];
           foreach($errors as $error)
           {
               echo '<p class="error"><b>'.$error.'</b></p>';
           }
       }
     
     ?>
           <form action="https://sandbox.payhere.lk/pay/checkout" method="post">
            <!-- <p>Address</p>
            <input type="text" name="address" placeholder="Enter Address Name">

            <p>Location link</p>
            <input type="text" name="link" placeholder="Enter Location Name">
               
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password"> -->

            <input type="hidden" name="merchant_id" value="1215562">    <!-- Replace your Merchant ID -->
            <input type="hidden" name="return_url" value="http://localhost:1234/applicationNew/views/successIshan.php">
            <input type="hidden" name="cancel_url" value="http://localhost:1234/applicationNew/views/successIshan.php">
            <input type="hidden" name="notify_url" value="http://localhost:1234/applicationNew/config/paycon.php"> 


            <br><br>Item Details<br>
            <input type="text" name="order_id" value="ItemNo12345">
            <input type="text" name="items" value="Door bell wireless"><br>
            <input type="text" name="currency" value="LKR">
            <input type="text" name="amount" value="1000">  

            <p>Customer Details</p>
            <input type="text" name="first_name" value="Saman">
            <input type="text" name="last_name" value="Perera"><br>
            <input type="text" name="email" value="samanp@gmail.com">
            <input type="text" name="phone" value="0771234567"><br>
            <input type="text" name="address" value="No.1, Galle Road">
            <input type="text" name="city" value="Colombo">
            <input type="hidden" name="country" value="Sri Lanka"><br><br> 
            <input type="submit" value="Buy Now" name="value"> 






                    
           
           
           
           </form>
    </div>
    </div>
   <!--  <script src="../resource/js/main.js"></script> -->
</body>
</html>






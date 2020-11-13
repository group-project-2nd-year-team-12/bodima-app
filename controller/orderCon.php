<?php 
 require_once ('../config/database.php');
 require_once ('../models/reg_user.php');
    session_start ();
?>

<?php
if(isset($_POST['submit']))
{

   if(!isset($_POST['address']) || strlen(trim($_POST['address']))<1)
   {
      $error="Enter the delivery address";
      header('Location:../views/cartItem.php?error&Pid='.$_POST['Pid']);
   }else{
   //  print_r($_SESSION);
    if(isset($_SESSION['cart']))
    {
       $email=$_SESSION['email'];
       $F_post_id=$_POST['Pid'];
       $first_name=$_SESSION['first_name'];
       $last_name=$_SESSION['last_name'];
       $address=$_POST['address'];
       $products=$_SESSION['cart'];
       $order_id=time().mt_rand($email);
       $total=$_SESSION['total'];
       $_SESSION['order_id']=$order_id;  
       foreach($products as $product)
       {
        reg_user::food_request($F_post_id,$email,$address,$first_name,$last_name,$product['item_name'],$product['item_quantity'],$order_id,$total,$connection);
       }
      //  $_SESSION['isdisable']=1;
      header('Location:../views/paymentFood_pending.php');
   }
}
}


?>
<?php 
 require_once ('../config/database.php');
 require_once ('../models/orderModel.php');
 require_once('../config/acceptReq.php');
    session_start ();
?>

<?php
if(isset($_GET['click']))
{
  header('Location:../views/orders.php');
}

// accept order
if(isset($_POST['accept']))
{
   
   $order_id=$_POST['order_id'];
   $address=$_POST['address'];
   $email=$_POST['email'];
   $total=$_POST['total'];
   $first_name=$_POST['first_name'];
   $last_name=$_POST['last_name'];
   $method=$_POST['method'];
   if($method=='card')
   {
      $result=orderModel::accept($order_id,1,$connection);
      // sentAccept( $order_id,$email,$first_name,$address,$total);
      header('Location:orderConFood.php?id=2');
   }elseif($method=="cash")
   {
      $result=orderModel::accept($order_id,3,$connection);
      header('Location:../views/deliveringOrder.php');
   }
   
}

// cancel order 
if(isset($_POST['remove']))
{
   $order_id=$_POST['order_id'];
   $result=orderModel::remove($order_id,$connection);
   header('Location:orderConFood.php?id=1');
}
print_r($_POST);
?>
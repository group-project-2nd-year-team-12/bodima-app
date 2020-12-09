<?php 
 require_once ('../config/database.php');
 require_once ('../models/orderModel.php');
 require_once ('../models/reg_user.php');
    session_start ();
?>

<?php
if(isset($_POST['submit']))
{
$errors=array();
   if(!isset($_POST['address']) || strlen(trim($_POST['address']))<1)
   {
      $error['address']="errorAddress";
   }
   if((!isset($_POST['phone']) || strlen(trim($_POST['phone']))<1) )
   {
      $error['phone']="errorPhone";
   }elseif(!is_numeric($_POST['phone']) || (strlen(trim($_POST['phone']))>10 || strlen(trim($_POST['phone']))!=10))
   {
      $error['phone1']="errorPhone1";
   }
   if(empty($error)){
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
       $phone=$_POST['phone'];
       $method=$_POST['method'];
       date_default_timezone_set("Asia/Colombo");
       $time=date("h:i:sa");
       $_SESSION['order_id']=$order_id;  
       foreach($products as $product)
       {
        orderModel::food_request($F_post_id,$email,$address,$first_name,$last_name,$product['item_name'],$product['item_quantity'],$order_id,$total,$phone,$method,$time,$product['restaurant'],$connection);
       }
      header('Location:orderCon.php?id=1');
   }
}else{
   header('Location:../views/cartItem.php?'.$error['address'].'&'.$error['phone'].'&'.$error['phone1'].'&Pid='.$_POST['Pid']);
}
}

if(isset($_GET['id']))
{
   $email=$_SESSION['email'];
   $ids_set=reg_user::getOrderById($connection,$email,0);
   $order_pending=reg_user::getOrderAll($connection,$email,0);
   if($ids_set->num_rows==0)
   {
      header('Location:../views/paymentFoodEmpty.php');
   }
   else
   {
      $ids=array();
      while($record=mysqli_fetch_assoc($ids_set))
      {
          $ids[]=$record['order_id'];
      }
      $data_rows=array();
      $i=0;
      while($record=mysqli_fetch_assoc($order_pending))
      {
          $data_rows[$i]=$record;
          $i++;
      }
      $data1=serialize($ids);
      $data2=serialize($data_rows);
      header('Location:../views/paymentFood_pending.php?ids='.$data1.'&data_rows='.$data2.'');
   }
}


if(isset($_GET['orderDelete_id'])){
   $order_id=$_GET['orderDelete_id'];
   $result=orderModel::requestOrderDelete($connection,$order_id);
   if($result){
      header('Location:orderCon.php?id=1');
   }
   {
      echo "Mysqli query failed";
   }
}
if(isset($_GET['orderConfirm_id'])){
   $order_id=$_GET['orderConfirm_id'];
   date_default_timezone_set("Asia/Colombo");
    $deliveredTime=date("h:i:sa");
   $result=orderModel::requestOrderConfirm($connection,$deliveredTime,$order_id);
   if($result){
      header('Location:../views/paymentFood_history.php?success&order_id='.$order_id);
   }
   {
      echo "Mysqli query failed";
   }
}
if(isset($_GET['orderConfirmFS_id'])){
   $order_id=$_GET['orderConfirmFS_id'];
   date_default_timezone_set("Asia/Colombo");
    $deliveredTime=date("h:i:sa");
   $result=orderModel::requestOrderConfirm($connection,$deliveredTime,$order_id);
   if($result){
      header('Location:../views/deliveredHistory.php');
   }
   {
      echo "Mysqli query failed";
   }
}

if(isset($_GET['order_id'])){
   $order_id=$_GET['order_id'];
   $result=orderModel::paymentOrder($connection,$order_id);
   if($result){
      header('Location:../views/paymentFood_receving.php');
   }
   {
      echo "Mysqli query failed";
   }
}


// on aff button 

if(isset($_GET['avail'])){
   if(isset($_POST['isAvail']))
   {
      echo "checked";
   }
   else
   {
      echo "not";
   }
}
?>
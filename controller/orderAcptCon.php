<?php 
   require_once ('../config/database.php');
   require_once ('../models/orderModel.php');
   require_once ('../models/notificationModel.php');
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
   date_default_timezone_set("Asia/Colombo");
   $time=date('Y-m-d H:i:s');
   $expireTime=date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($time)));
   $term=orderModel::checkTermOrder($connection,$order_id);
   $termFetch=mysqli_fetch_assoc($term);

// notification - F2
      $title="Your order Accpeted";
      $discription="Order id :".$order_id;
      $type="order";
      date_default_timezone_set("Asia/Colombo");
      $time=Date('H:i');
      if($method=='card')
      {
      $responseUrl="controller/orderCon.php?id=2";
      }elseif($method=="cash")
      {
      $responseUrl="controller/orderCon.php?id=3";
      }
      notificationModel::notificationOrderAccept($connection,$email,$title,$discription,$time,$type,$responseUrl);


      $detailreciever=mysqli_fetch_assoc(notificationModel::find_levelAndId($connection,$email));
      $orderdetails=mysqli_fetch_assoc(notificationModel::resturant_name($connection,$order_id));
      $type_number=1;
      $from_level=$_SESSION['level'];
      $from_id=$_SESSION['FSid'];
      $to_level=$detailreciever['level'];    
      $to_id=$detailreciever['id'];              
      $massageHeader="Your Order Accepted";
      if($method=="card"){
      $massage="Resturant : ".$orderdetails['restaurant']."<br>Order id :".$order_id.'<br>Total amount :'.$total.'<p style="font-size:12px; color:black;">Please do the card payment';
      }else if($method=="cash"){
      $massage="Resturant : ".$orderdetails['restaurant']."<br>Order id :".$order_id.'<br>Total amount :'.$total;
      }

      $redirect_url='../views/paymentFood_accept.php';
      $res=notificationModel::insertnotification($connection,$type_number,$from_level,$from_id,$to_level,$to_id,$massageHeader,$massage,$redirect_url);

/************/

//accept order 
   if($method=='card')
   {   
      $result=orderModel::accept($order_id,1,$expireTime,$connection);
      sentAccept( $order_id,$email,$first_name,$address,$total);
      header('Location:orderConFood.php?id=2');
   }elseif($method=="cash")
   {
      $result=orderModel::accept($order_id,3,$expireTime,$connection);
      if($termFetch['term']=='shortTerm')
      {
         header('Location:orderConFood.php?term=short');
      }
      if($termFetch['term']=='longTerm')
      {
         header('Location:orderConFood.php?term=long');
      }
      echo $termFetch;
      
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
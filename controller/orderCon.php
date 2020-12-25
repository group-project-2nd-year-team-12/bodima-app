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
       $time=date('Y-m-d H:i:s');
       $expireTime=date('Y-m-d H:i:s',strtotime('+20 minutes',strtotime($time)));
       echo $expireTime;
       $_SESSION['order_id']=$order_id;  
       foreach($products as $product)
       {
        orderModel::food_request($F_post_id,$email,$address,$first_name,$last_name,$product['item_name'],$product['item_quantity'],$order_id,$total,$phone,$method,$time,$expireTime,$product['restaurant'],$connection);
       }
      header('Location:orderCon.php?id=1');
   }
}else{
   header('Location:../views/cartItem.php?'.$error['address'].'&'.$error['phone'].'&'.$error['phone1'].'&Pid='.$_POST['Pid']);
}
}

// pending order details print 
if((isset($_GET['id']) && $_GET['id']==1))
{
   $email=$_SESSION['email'];
   date_default_timezone_set("Asia/Colombo");
   $date=date('Y-m-d H:i:s');
   $nowTime=date_create($date);
   $ids_set=reg_user::getOrderById($connection,$email,0);
   $order_pending=reg_user::getOrderAll($connection,$email,0);
      $ids=array();
      while($record=mysqli_fetch_assoc($ids_set))
      {
          $ids[]=$record;
      }
      $data_rows=array();
      $time_out=array();
      $i=0;
      while($record=mysqli_fetch_assoc($order_pending))
      {
            $expireDate=date_create($record['expireTime']);
       
            $diff= $expireDate->diff($nowTime);
         
            if($diff->invert)
            {
               echo "not expireed";
            }
            else{
               orderModel::deleteRequest($record['request_id'],$connection);
               $time_out=$record;
               $id=$record['order_id'];
               break;
            }
          $data_rows[]=$record;
          $i++;
      }
      $data1=serialize($ids);
      $data2=serialize($data_rows);
      $data3=serialize($time_out);
   

      if(empty($time_out)) {header('Location:../views/paymentFood_pending.php?ids='.$data1.'&data_rows='.$data2.'');}
     else  {header('Location:../views/paymentFood_pending.php?ids='.$data1.'&data_rows='.$data2.'&timeOut='.$data3.'&timeOutId='.$id.'');}
   
}

// Accepted order deatils
if(isset($_GET['id']) && $_GET['id']==2)
{
   $email=$_SESSION['email'];
   $ids_set=reg_user::getOrderById($connection,$email,1);
   $order_pending=reg_user::getOrderAll($connection,$email,1);
   
      $ids=array();
      while($record=mysqli_fetch_assoc($ids_set))
      {
          $ids[]=$record;
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
      header('Location:../views/paymentFood_accept.php?ids='.$data1.'&data_rows='.$data2.'');
   
}
// Receiving order details
if(isset($_GET['id']) && $_GET['id']==3)
{
   $email=$_SESSION['email'];
   $ids_set=reg_user::getOrderById($connection,$email,3);
   $order_pending=reg_user::getOrderAll($connection,$email,3);
   
      $ids=array();
      while($record=mysqli_fetch_assoc($ids_set))
      {
          $ids[]=$record;
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
      header('Location:../views/paymentFood_receving.php?ids='.$data1.'&data_rows='.$data2.'');
   
}
// order history details 
if(isset($_GET['id']) && $_GET['id']==4)
{
   $email=$_SESSION['email'];
   $ids_set=reg_user::getOrderById($connection,$email,4);
   $order_pending=reg_user::getOrderAll($connection,$email,4);
  
      $ids=array();
      while($record=mysqli_fetch_assoc($ids_set))
      {
          $ids[]=$record;
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
      header('Location:../views/paymentFood_history.php?ids='.$data1.'&data_rows='.$data2.'');
    
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


// ajex countdown

if(isset($_POST['view']))
{
   $order_id= $_POST['view'];
   $exDate=orderModel::getCountDown($connection,$order_id);
   $exfectch=mysqli_fetch_assoc($exDate);
   date_default_timezone_set("Asia/Colombo");
   $date=date('Y-m-d H:i:s');
   $nowTime=date_create($date);
   $expireDate=date_create($exfectch['expireTime']);  
   $diff= $expireDate->diff($nowTime);
   if($diff->invert)
   {
      $minute=$diff->format('%i');
      $second=$diff->format('%s');
     
   }else{
      orderModel::deleteRequest($record['request_id'],$connection);
   }
   $data=array(
      'minute'=>$minute,
      'secound'=>$second,
      'acceptId'=>$exfectch['order_id'],
      'state'=>$exfectch['is_accepted'],
      'payment'=>$exfectch['method'],
      'rasturent'=>$exfectch['restaurant']
   );
 
    echo json_encode($data);
}

?>
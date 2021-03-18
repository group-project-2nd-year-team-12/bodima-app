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
       $shedule=$_POST['shedule'];
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
      //  echo $F_post_id;

       $_SESSION['order_id']=$order_id;  
       $term=$_SESSION['term'];
       foreach($products as $product)
       {
         $order_type=$product['order_type'];
         $restaurant=$product['restaurant'];
       }
        orderModel::food_request($F_post_id,$email,$address,$first_name,$last_name,$order_id,$order_type,$term,$shedule,$total,$phone,$method,$time,$expireTime,$restaurant,$connection);
       
       foreach($products as $product)
       {
         orderModel::food_item($product['item_name'],$product['item_quantity'],$order_id,$connection);
       }
     
       if($_SESSION['term']=='longTerm')
       {
          $start=$_SESSION['startDate'];
          $end=$_SESSION['endDate'];

          $dates=date_diff(date_create($end),date_create($start));
          print_r($dates->days);
          $startDate=date_create($start);
          for($i=0; $i<$dates->days; $i++)
          {
            $startDate->modify('+1 day');
            orderModel::addLongTerm($connection,$startDate->format('Y-m-d H:i:s'),$order_id);
          }
       }
      header('Location:../views/paymentFood_pending.php');
   }
}else{
   header('Location:../views/cartItem.php?'.$error['address'].'&'.$error['phone'].'&'.$error['phone1'].'&Pid='.$_POST['Pid']);
}
}

// pending order details print 
function getPending($connection){
   $email=$_SESSION['email'];
   date_default_timezone_set("Asia/Colombo");
   $date=date('Y-m-d H:i:s');
   $nowTime=date_create($date);
   $ids_set=orderModel::getOrderById($connection,$email,0);
   $order_pending=orderModel::getOrderAll($connection,$email,0);
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
            // print_r($record);
            $diff= $expireDate->diff($nowTime);
            if(($diff->s <=1 && $diff->i==0) || !$diff->invert)
            {
               orderModel::deleteRequest($record['request_id'],$connection);
               $time_out=$record;
               $id=$record['order_id'];
               break;
            }
          $data_rows[]=$record;
          $i++;
      }
      // print_r($data_rows);
      $data=array();
      $data[0]=serialize($ids);
      $data[1]=serialize($data_rows);
      $data[2]=serialize($time_out);
      return $data;
   //    if(empty($time_out)) {header('Location:../views/paymentFood_pending.php?ids='.$data1.'&data_rows='.$data2.'');}
   //   else  {header('Location:../views/paymentFood_pending.php?ids='.$data1.'&data_rows='.$data2.'&timeOut='.$data3.'&timeOutId='.$id.'');}
   
}

// Accepted order deatils
if(isset($_GET['id']) && $_GET['id']==2)
{
   $email=$_SESSION['email'];
   $ids_set=orderModel::getOrderById($connection,$email,1);
   $order_pending=orderModel::getOrderAll($connection,$email,1);
   
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
   $ids_set=orderModel::getOrderById($connection,$email,3);
   $order_pending=orderModel::getOrderAll($connection,$email,3);
   
      $ids=array();
      while($record=mysqli_fetch_assoc($ids_set))
      {
          $ids[]=$record;
      }
      $data_rows=array();
      $i=0;
      while($record=mysqli_fetch_assoc($order_pending))
      {
         if($record['term']=='shortTerm')
         {
            $data_rows[$i]=$record;
            $i++;
         }
         
      }
      $data1=serialize($ids);
      $data2=serialize($data_rows);
      header('Location:../views/paymentFood_receving.php?ids='.$data1.'&data_rows='.$data2.'');
   
}
// order history details 
if(isset($_GET['id']) && $_GET['id']==4)
{
   $email=$_SESSION['email'];
   $ids_set=orderModel::getOrderById($connection,$email,4);
   $order_pending=orderModel::getOrderAll($connection,$email,4);
  
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
      if(isset($_GET['success']))
      {
         header('Location:../views/paymentFood_history.php?success&order_id='.$_GET['order_id'].'&ids='.$data1.'&data_rows='.$data2.'');
      }else{
         header('Location:../views/paymentFood_history.php?ids='.$data1.'&data_rows='.$data2.'');
      }
     
    
}

function getLongTerm($connection)
{
   $email=$_SESSION['email'];
   $longTermID=orderModel::getLongTermID($connection,$email);
   // print_r($longTermID);
   $record=orderModel::getLongTerm($connection,$email);
   $foodItem=orderModel::getLongTermFood($connection,$email);
   // print_r($record);
   $ids=array();
   $result=array();
   $item=array();
      while($row=mysqli_fetch_assoc($longTermID))
      {
          $ids[]=$row;
      }
      while($row=mysqli_fetch_assoc($record))
      {
          $result[]=$row;
      }
      while($row=mysqli_fetch_assoc($foodItem))
      {
          $item[]=$row;
      }
   // print_r($ids);
   $data[0]=serialize($ids);
   $data[1]=serialize($result);
   $data[2]=serialize($item);
      return $data;
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

// order confirm after go to history page
if(isset($_GET['orderConfirm_id'])){
   $order_id=$_GET['orderConfirm_id'];
   date_default_timezone_set("Asia/Colombo");
    $deliveredTime=date("h:i:sa");
   $result=orderModel::requestOrderConfirm($connection,$deliveredTime,$order_id);
   header('Location:orderCon.php?success&order_id='.$order_id.'&id=4');
   
}


// if(isset($_GET['order_id'])){
//    $order_id=$_GET['order_id'];
//    $result=orderModel::paymentOrder($connection,$order_id);
//    if($result){
//       header('Location:../views/paymentFood_receving.php');
//    }
//    {
//       echo "Mysqli query failed";
//    }
// }


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
   $minute=$diff->format('%i');
   $second=$diff->format('%s');
   $data=array(
      'invert'=>$diff->invert,
      'minute'=>$minute,
      'secound'=>$second,
      'acceptId'=>$exfectch['order_id'],
      'state'=>$exfectch['is_accepted'],
      'payment'=>$exfectch['method'],
      'rasturent'=>$exfectch['restaurant']
   );
    echo json_encode($data);
}

if(isset($_POST['cardOrder']))
{
   $order_id= $_POST['cardOrder'];
   $exDate=orderModel::getCountDown($connection,$order_id);
   $exfectch=mysqli_fetch_assoc($exDate);
   date_default_timezone_set("Asia/Colombo");
   $date=date('Y-m-d H:i:s');
   $nowTime=date_create($date);
   $expireDate=date_create($exfectch['expireTime']);  
   $diff= $expireDate->diff($nowTime);
   $minute=$diff->format('%i');
   $second=$diff->format('%s');
   $data=array(
      'invert'=>$diff->invert,
      'minute'=>$minute,
      'secound'=>$second,
      'acceptId'=>$exfectch['order_id'],
      'state'=>$exfectch['is_accepted'],
      'payment'=>$exfectch['method'],
      'rasturent'=>$exfectch['restaurant']
      ); 
    echo json_encode($data);
}

if(isset($_POST['cancel'])){
   $order_id=$_POST['cancel'];
   orderModel::deleteOrder($order_id,$connection);
   echo json_encode("sucess");
}


// long term date controller
if(isset($_POST['date']) && isset($_POST['orderId']))
{
   date_default_timezone_set("Asia/Colombo");
   $today=date('Y-m-d');
   $date=$_POST['date'];
   $todayObj=date_create($today);
   $dateObj=date_create($date);
   $diff=date_diff($dateObj,$todayObj);
   $order_id=$_POST['orderId'];
   $result=orderModel::checkLongTermState($connection,$order_id,$date);
   $resultFetch=mysqli_fetch_assoc($result);
   $lastDateobj=orderModel::longTermLast($connection,$order_id);
   $lastDateFetch=mysqli_fetch_assoc($lastDateobj);
   $lastDate=$lastDateFetch['day'];
   $lastDate=date_create($lastDate);
   if($todayObj->format('%d') == $dateObj->format('%d'))
   {
      $state='qual';
   }
   if($todayObj->format('%d') < $dateObj->format('%d'))
   {
      $state='plus';
   }
   if($todayObj->format('%d') > $dateObj->format('%d'))
   {
      $state='minus';
   }
   if($todayObj->format('%d') > $lastDate->format('%d'))
   {
      $complete='complete';
   }
   else{
      $complete='incomplete';
   }
   

   $data=array(
      'date'=>$state,
      'delivery'=> $resultFetch['delivery_state'],
      'complete'=>$complete
   );
 
    echo json_encode($data);
}

if(isset($_POST['dateUp']) && isset($_POST['orderIdUp']) )
{
   date_default_timezone_set("Asia/Colombo");
   $today=date('Y-m-d');
   $date=$_POST['dateUp'];
   $todayObj=date_create($today);
   $dateObj=date_create($date);
   $diff=date_diff($dateObj,$todayObj);
   $order_id=$_POST['orderIdUp'];
   $result=orderModel::updateLongTermState($connection,$order_id,$date,date('Y-m-d H:i:s'));
  
   $data=array(
      'deliveryTime'=>date('Y-m-d H:i:s'),
 
   );
 
    echo json_encode($data);
}

?>
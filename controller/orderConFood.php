<?php 
 require_once ('../config/database.php');
 require_once ('../models/orderModel.php');
 require_once ('../models/reg_user.php');
    session_start ();
?>

<?php 
// order page details 
if(isset($_GET['id']) && $_GET['id']==1)
{
    $FSid=$_SESSION['FSid'];
    $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
    $available=orderModel::checkAvailable( $FSid,$connection);
    $availableFetch=mysqli_fetch_assoc($available);
    $data1=array();
    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $getOrder_id=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],0);
        while($record=mysqli_fetch_assoc($getOrder_id))
        {
            $data1[]=$record;
        }
    }
    $record=serialize($data1);
    print_r($data1);
    header('Location:../views/orders.php?record='.$record.'&available='.$availableFetch['available'].'');
}
// orderNotPayment Page details
if(isset($_GET['id']) && $_GET['id']==2)
{
    $FSid=$_SESSION['FSid'];
    $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
    $available=orderModel::checkAvailable( $FSid,$connection);
        $availableFetch=mysqli_fetch_assoc($available);
    $data1=array();
    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $getOrder_id=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],1);
        while($record=mysqli_fetch_assoc($getOrder_id))
        {
            $data1[]=$record;
        }
    }
    $record=serialize($data1);
    header('Location:../views/orderNotPayment.php?record='.$record.'&available='.$availableFetch['available'].'');
}

// delivering order
if(isset($_GET['term']) && $_GET['term']=='short')
{
    $FSid=$_SESSION['FSid'];
    $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
    $available=orderModel::checkAvailable( $FSid,$connection);
        $availableFetch=mysqli_fetch_assoc($available);
    $data1=array();
    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $getOrder_id=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],3);
        while($record=mysqli_fetch_assoc($getOrder_id))
        {
            $data1[]=$record;
        }
    }
    $record=serialize($data1);
 
    header('Location:../views/orderDelivery.php?record='.$record.'&result='.$result.'&available='.$availableFetch['available'].'');
}
if(isset($_GET['term']) && $_GET['term']=='long')
{
    $FSid=$_SESSION['FSid'];
    $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
    $available=orderModel::checkAvailable( $FSid,$connection);
        $availableFetch=mysqli_fetch_assoc($available);
    $data1=array();

    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $getOrder_id=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],3);
        while($record=mysqli_fetch_assoc($getOrder_id))
        {
            $data1[]=$record;
        }
    }
    $record=serialize($data1);
 
    header('Location:../views/orderDeliveryLong.php?record='.$record.'&result='.$result.'&available='.$availableFetch['available'].'');
}
// order history page
if(isset($_GET['id']) && $_GET['id']==4)
{
    $FSid=$_SESSION['FSid'];
    $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
    $available=orderModel::checkAvailable( $FSid,$connection);
        $availableFetch=mysqli_fetch_assoc($available);
    $data1=array();
    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $getOrder_id=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],4);
        while($record=mysqli_fetch_assoc($getOrder_id))
        {
            $data1[]=$record;
        }
    }
    $record=serialize($data1);
 
    header('Location:../views/orderHistory.php?record='.$record.'&result='.$result.'&available='.$availableFetch['available'].'');
}

if(isset($_GET['orderConfirmFS_id'])){
    $order_id=$_GET['orderConfirmFS_id'];
    date_default_timezone_set("Asia/Colombo");
     $deliveredTime=date("h:i:sa");
    $result=orderModel::requestOrderConfirm($connection,$deliveredTime,$order_id);
    if($result){
       header('Location:../controller/orderConFood.php?id=4');
    }
    {
       echo "Mysqli query failed";
    }
 }

// ordersetting page settings
if((isset($_GET['id']) && $_GET['id']==5) || isset($_POST['unavailable']))
{
    $FSid=$_SESSION['FSid'];
    $result=orderModel::getUnavailableDate($FSid,$connection);
    $available=orderModel::checkAvailable( $FSid,$connection);
    $availableFetch=mysqli_fetch_assoc($available);
    $date=array();
    while($row=mysqli_fetch_assoc($result))
    {
        if(strtotime($row['unavailable_date'])-strtotime(date("Y-m-d"))<1)
        {
            orderModel::deleteUnavailableDate($row['unavailable_date'],$connection);
            continue;
        }
       
        $date[]=$row;
    }
    $data=serialize($date);

    if(isset($_GET['id']) && $_GET['id']==5)       // page normal load
    {
        header('Location:../views/orderSetting.php?date='.$data.'&available='.$availableFetch['available'].'');
    }

    if(isset($_POST['unavailable']))  // add unavailable date
{
      // date validation
    date_default_timezone_set("Asia/Colombo"); 
    if(!isset($_POST['date']) || empty($_POST['date']))
    {
        $error="Date is not set ";
    }
    elseif(strtotime($_POST['date'])-strtotime(date("Y-m-d"))<1)
    {
        $error="invalid date"; // check that date is future 
    }
    $checkDate=orderModel::checkUnavailableDate(($_POST['date']),$connection);
    if($checkDate && $checkDate->num_rows!=0)
    {
        $error="Date is already selected";
    }

    if(empty($error))
    {
        $getDate=strtotime(mysqli_real_escape_string($connection,$_POST['date']));
        $dateFormat=date('Y-m-d',$getDate);
        $FSid=$_SESSION['FSid'];
        $available=orderModel::checkAvailable( $FSid,$connection);
        $availableFetch=mysqli_fetch_assoc($available);
        orderModel::unavailableDate($FSid,$dateFormat,$connection);
        $result=orderModel::getUnavailableDate($FSid,$connection);
        $date=array();
        while($row=mysqli_fetch_assoc($result))
        {
            $date[]=$row;
        }
        $data=serialize($date);
      header('Location:../views/orderSetting.php?date='.$data.'&available='.$availableFetch['available'].'');

    }
    else{
        $error=serialize($error);
        header('Location:../views/orderSetting.php?date='.$data.'&error='.$error.'&available='.$availableFetch['available'].'');
    }
}
    
}


if(isset($_GET['delectDate']))
{
    $deleteDate=$_GET['delectDate'];
    $FSid=$_SESSION['FSid'];
    $result=orderModel::deleteUnavailableDate($deleteDate,$connection);
    $available=orderModel::checkAvailable( $FSid,$connection);
    $availableFetch=mysqli_fetch_assoc($available);
    if($result)
    {
        $result=orderModel::getUnavailableDate($FSid,$connection);
        $date=array();
        while($row=mysqli_fetch_assoc($result))
        {
            $date[]=$row;
        }
        $data=serialize($date);
      header('Location:../views/orderSetting.php?date='.$data.'&available='.$availableFetch['available'].''); 
    }
    else{
        echo "Query fails";
    }
}

if(isset($_GET['avail']))
{
    $FSid=$_SESSION['FSid'];
    if(isset($_POST['isAvail']))
    {
        $available=$_POST['isAvail'];
       
        orderModel::available($FSid,1,$connection);
        $available=orderModel::checkAvailable( $FSid,$connection);
        $availableFetch=mysqli_fetch_assoc($available);
        echo $FSid;
        $result=orderModel::getUnavailableDate($FSid,$connection);
        $date=array();
        while($row=mysqli_fetch_assoc($result))
        {
            $date[]=$row;
        }
        $data=serialize($date);
      header('Location:../views/orderSetting.php?date='.$data.'&available='.$availableFetch['available'].'');

    }
    else
    {
        orderModel::available($FSid,0,$connection);
        $available=orderModel::checkAvailable( $FSid,$connection);
        $availableFetch=mysqli_fetch_assoc($available);
        $result=orderModel::getUnavailableDate($FSid,$connection);
        $date=array();
        while($row=mysqli_fetch_assoc($result))
        {
            $date[]=$row;
        }
        $data=serialize($date);
      header('Location:../views/orderSetting.php?date='.$data.'&available='.$availableFetch['available'].'');
    }
    
    
}

function getLongTerm($connection)
{

   $FSid=$_SESSION['FSid'];
   $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
   $ids=array();
   $data1=array();
    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $getOrder_id=orderModel::getLongTermFood($connection,$row['F_post_id']);
        while($record=mysqli_fetch_assoc($getOrder_id))
        {
            $data1[]=$record;
        }
    }
    
   // print_r($ids);
//    $data[0]=serialize($ids);
   $data[0]=serialize($data1);
      return $data;
}


?>
<?php 
 require_once ('../config/database.php');
 require_once ('../models/orderModel.php');
 require_once ('../models/reg_user.php');
    session_start ();
?>

<?php 

// order page details 
function allOrders($connection)
{
    $FSid=$_SESSION['FSid'];
    $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
    $data1=array();
    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $getOrder_id=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],0);
        while($record=mysqli_fetch_assoc($getOrder_id))
        {
            $data1[]=$record;
        }
    }
    $data[0]=serialize($data1);
    return $data;
    // header('Location:../views/orders.php?record='.$record.'');
    // json_encode($data1);
}
// orderNotPayment Page details
if(isset($_GET['id']) && $_GET['id']==2)
{
    $FSid=$_SESSION['FSid'];
    $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
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
    header('Location:../views/orderNotPayment.php?record='.$record.'');
}


// order history page
function longTermHistoryFood($connection){
    $FSid=$_SESSION['FSid'];
    $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
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
    $data[0]=serialize($data1);
    return $data;
}

// order confirm 
if(isset($_GET['orderConfirmFS_id'])){
    $order_id=$_GET['orderConfirmFS_id'];
    date_default_timezone_set("Asia/Colombo");
     $deliveredTime=date("h:i:sa");
    $result=orderModel::requestOrderConfirm($connection,$deliveredTime,$order_id);
    if($result){
       header('Location:../views/orderHistory.php');
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
//short term page details
function getShortTerm($connection){
    $FSid=$_SESSION['FSid'];
    $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
    $data1=array();
    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $getOrder_id=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],3);
        while($record=mysqli_fetch_assoc($getOrder_id))
        {
            $data1[]=$record;
        }
    }
    $data[0]=serialize($data1);
    return $data;
}

// long term page details
function getLongTerm($connection)
{
   $FSid=$_SESSION['FSid'];
   $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
   $ids=array();
   $result=array();
   $date=array();
    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $result_set=orderModel::getLongTermFoodSupplier($connection,$row['F_post_id']);
        while($record=mysqli_fetch_assoc($result_set))
        {
            $result[]=$record;
        }
        $getOrder_id=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],3);
        while($record=mysqli_fetch_assoc($getOrder_id))
        {
            $ids[]=$record;
        }
        $getOrder_date=orderModel::getLongTermSupplier($connection,$row['F_post_id'],3);
        while($record=mysqli_fetch_assoc($getOrder_date))
        {
            $date[]=$record;
        }
        

    }
   $data[0]=serialize($ids);
   $data[1]=serialize($result);
   $data[2]=serialize($date);
      return $data;
}

// check the food supplier is available
if(isset($_POST['checkAvailable']))
{
    $FSid=$_SESSION['FSid'];
    $available=orderModel::checkAvailable( $FSid,$connection);
    $availableFetch=mysqli_fetch_assoc($available);
    $data=array(
        'available'=>$availableFetch['available'],
     );
      echo json_encode($data);
}

?>
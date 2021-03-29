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

// order setting page settings
if((isset($_GET['id']) && $_GET['id']==5))
{
    $FSid=$_SESSION['FSid'];
    $email=$_SESSION['email'];
    $available=orderModel::checkAvailable( $FSid,$connection);
    $availableFetch=mysqli_fetch_assoc($available);
    $noOrder=orderModel::OrderCount($connection,$email,1);
    header('Location:../views/orderSetting.php?available='.$availableFetch['available'].'&Dorder='.$noOrder->num_rows);
}


// ajest function for availability.
if(isset($_GET['avail']))
{
    $FSid=$_SESSION['FSid'];
    if(isset($_POST['isAvail']))
    {
        $email=$_SESSION['email'];
        $available=$_POST['isAvail'];
        orderModel::available($FSid,1,$connection);
        $available=orderModel::checkAvailable( $FSid,$connection);
        $availableFetch=mysqli_fetch_assoc($available);
        $noOrder=orderModel::OrderCount($connection,$email,4);
        header('Location:../views/orderSetting.php?available='.$availableFetch['available'].'&Dorder='.$noOrder->num_rows);

    }
    else
    {
        $email=$_SESSION['email'];
        orderModel::available($FSid,0,$connection);
        $available=orderModel::checkAvailable( $FSid,$connection);
        $availableFetch=mysqli_fetch_assoc($available);
        $noOrder=orderModel::OrderCount($connection,$email,4);
        header('Location:../views/orderSetting.php?available='.$availableFetch['available'].'&Dorder='.$noOrder->num_rows);
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
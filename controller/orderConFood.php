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
    header('Location:../views/orders.php?record='.$record.'');
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

// delivering order
if(isset($_GET['id']) && $_GET['id']==3)
{
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
    $record=serialize($data1);
 
    header('Location:../views/orderDelivery.php?record='.$record.'&result='.$result.'');
}
// order history page
if(isset($_GET['id']) && $_GET['id']==4)
{
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
 
    header('Location:../views/orderHistory.php?record='.$record.'&result='.$result.'');
}

// ordersetting page settings
if((isset($_GET['id']) && $_GET['id']==5) || isset($_POST['unavailable']))
{
    $FSid=$_SESSION['FSid'];
    $result=orderModel::getUnavailableDate($FSid,$connection);
    $date=array();
    while($row=mysqli_fetch_assoc($result))
    {
        $date[]=$row;
    }
    $data=serialize($date);

    if(isset($_GET['id']) && $_GET['id']==5)       // page normal load
    {
        header('Location:../views/orderSetting.php?date='.$data.'');
    }

    if(isset($_POST['unavailable']))  // add unavailable date
{
    $errors=array();   // date validation
    date_default_timezone_set("Asia/Colombo"); 
    if(!isset($_POST['date']) || empty($_POST['date']))
    {
        $errors[]="Date is not set ";
    }
    elseif(strtotime($_POST['date'])-strtotime(date("Y-m-d"))<1)
    {
        $errors[]="invalid date"; // check that date is future 
    }
    $checkDate=orderModel::checkUnavailableDate(($_POST['date']),$connection);
    if($checkDate && $checkDate->num_rows!=0)
    {
        $errors[]="Date is already selected";
    }

    if(empty($errors))
    {
        $getDate=strtotime(mysqli_real_escape_string($connection,$_POST['date']));
        $dateFormat=date('Y-m-d',$getDate);
        $FSid=$_SESSION['FSid'];
        orderModel::unavailableDate($FSid,$dateFormat,$connection);
        $result=orderModel::getUnavailableDate($FSid,$connection);
        $date=array();
        while($row=mysqli_fetch_assoc($result))
        {
            $date[]=$row;
        }
        $data=serialize($date);
      header('Location:../views/orderSetting.php?date='.$data.'');

    }
    else{
        $error=serialize($errors);
        header('Location:../views/orderSetting.php?date='.$data.'&error='.$error.'');
    }
}
    
}


?>
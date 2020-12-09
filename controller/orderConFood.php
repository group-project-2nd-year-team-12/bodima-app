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
?>
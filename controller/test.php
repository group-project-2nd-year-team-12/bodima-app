<?php
require_once ('../config/database.php');
require_once ('../models/orderModel.php');
session_start();

if(isset($_POST['view'])){
    $FSid=$_SESSION['FSid'];
    $F_post_id=orderModel::getPostFoodSupplier($connection,$FSid);
    $bCount=0;
    $lCount=0;
    $dCount=0;
    $ltCount=0;
    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $getOrder_id=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],0);
        while($record=mysqli_fetch_assoc($getOrder_id))
        {
            if($record['order_type']=='breakfast'){$bCount++;}
            if($record['order_type']=='lunch'){$lCount++;}
            if($record['order_type']=='dinner'){$dCount++;}
            if($record['order_type']=='longTerm'){$ltCount++;}
        }
    }

    // echo $bCount;
    // echo $lCount;
    // echo $dCount;
    // echo $ltCount;
    $data=array(
        'breakfast'=>$bCount,
        'lunch'=>$lCount,
        'dinner'=>$dCount,
        'longTerm'=>$ltCount
    );
    echo json_encode($data);
}

?>
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
    $accBCount=0;
    $accLCount=0;
    $accDCount=0;
    $accLTCount=0;
    $delBCount=0;
    $delLCount=0;
    $delDCount=0;
    $delLTCount=0;
    while($row=mysqli_fetch_assoc($F_post_id))
    {
        $getOrderIdNew=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],0);
        while($record=mysqli_fetch_assoc($getOrderIdNew))
        {
            if($record['order_type']=='breakfast'){$bCount++;}
            if($record['order_type']=='lunch'){$lCount++;}
            if($record['order_type']=='dinner'){$dCount++;}
            if($record['order_type']=='longTerm'){$ltCount++;}
        }
        $getOrderIdAccept=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],1);
        while($record=mysqli_fetch_assoc($getOrderIdAccept))
        {
            if($record['order_type']=='breakfast'){$accBCount++;}
            if($record['order_type']=='lunch'){$accLCount++;}
            if($record['order_type']=='dinner'){$accDCount++;}
            if($record['order_type']=='longTerm'){$accLTCount++;}
        }
        $getOrderIdAccept=orderModel::getOrderIDFoodSupplier($connection,$row['F_post_id'],3);
        while($record=mysqli_fetch_assoc($getOrderIdAccept))
        {
            if($record['order_type']=='breakfast'){$delBCount++;}
            if($record['order_type']=='lunch'){$delLCount++;}
            if($record['order_type']=='dinner'){$delDCount++;}
            if($record['order_type']=='longTerm'){$delLTCount++;}
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
        'longTerm'=>$ltCount,
        'acceptBreakfast'=>$accBCount,
        'accLunch'=>$accLCount,
        'accDinner'=>$accDCount,
        'accLongTerm'=>$accLTCount,
        'delBCount'=>$delBCount,
        'delLCount'=>$delLCount,
        'delDCount'=>$delDCount,
        'delLTCount'=>$delLTCount

    );
    echo json_encode($data);
}



if(isset($_POST['request']))
{
    $email=$_SESSION['email'];
    $PCount=orderModel::OrderCount($connection,$email,0);
    $ACount=orderModel::OrderCount($connection,$email,1);
    $DCount=orderModel::OrderCount($connection,$email,3);
    $deliveryCount=$DCount->num_rows;
    $acceptCount=$ACount->num_rows;
    $acceptS=0;
    $acceptL=0;
    $recevieS=0;
    $recevieL=0;
    while($row=mysqli_fetch_assoc($ACount))
    {
        if($row['order_type']=='breakfast' || $row['order_type']=='lunch' || $row['order_type']=='dinner' )
        {
            $acceptS++;
        }
        elseif($row['order_type']=='longTerm')
        {
            $acceptL++;
        }
    }
    while($row=mysqli_fetch_assoc($DCount))
    {
        if($row['order_type']=='breakfast' || $row['order_type']=='lunch' || $row['order_type']=='dinner' )
        {
            $recevieS++;
        }
        elseif($row['order_type']=='longTerm')
        {
            $recevieL++;
        }
    }
    $arr=array(
        'aCount'=>$acceptCount,
        'acceptLong'=>$acceptL,
        'acceptShort'=>$acceptS,
        'dCount'=>$deliveryCount,
        'deliveryShort'=>$recevieS,
        'deliveryLong'=>$recevieL

    );
    echo json_encode($arr);
}
?>
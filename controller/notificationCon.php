<?php
require_once ('../config/database.php');
require_once ('../models/orderModel.php');
require_once ('../models/notificationModel.php');
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
            if($record['order_type']=='breakfast' && $record['term']=='shortTerm'){$bCount++;}
            if($record['order_type']=='lunch' && $record['term']=='shortTerm'){$lCount++;}
            if($record['order_type']=='dinner' && $record['term']=='shortTerm'){$dCount++;}
            if($record['term']=='longTerm'){$ltCount++;}
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
            if($record['order_type']=='breakfast' && $record['term']=='shortTerm' ){$delBCount++;}
            if($record['order_type']=='lunch' && $record['term']=='shortTerm'){$delLCount++;}
            if($record['order_type']=='dinner'&& $record['term']=='shortTerm'){$delDCount++;}
            if($record['order_type']=='longTerm' && $record['term']=='shortTerm'){$delLTCount++;}
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
    $pendingCount=$PCount->num_rows;
    $pendingS=0;
    $pendingL=0;
    $acceptS=0;
    $acceptL=0;
    $recevieS=0;
    $recevieL=0;
    $longTermCount=0;
    while($row=mysqli_fetch_assoc($PCount))
    {
        if($row['term']=='shortTerm')
        {
            $pendingS++;
        }
        elseif($row['term']=='longTerm')
        {
            $pendingL++;
        }
    }
    while($row=mysqli_fetch_assoc($ACount))
    {
        if($row['term']=='shortTerm')
        {
            $acceptS++;
        }
        elseif($row['term']=='longTerm')
        {
            $acceptL++;
        }
    }
    while($row=mysqli_fetch_assoc($DCount))
    {
        if($row['term']=='shortTerm')
        {
            $recevieS++;
        }
        elseif($row['term']=='longTerm')
        {
            $longTermCount++;
        }
    }
    $arr=array(
        'aCount'=>$acceptCount,
        'acceptLong'=>$acceptL,
        'acceptShort'=>$acceptS,
        'dCount'=>$recevieS,
        'deliveryShort'=>$recevieS,
        'deliveryLong'=>$recevieL,
        'pCount'=>$pendingCount,
        'pendingShort'=>$pendingS,
        'pendingLong'=>$pendingL,
        'longTerm'=>$longTermCount

    );
    echo json_encode($arr);
}

if(isset($_POST['postId']))
{
    $pid=$_POST['postId'];
    $available=orderModel::checkAvailableUser($connection,$pid);
    $availableFetch=mysqli_fetch_assoc($available);
    $arr=array(
    'available'=>$availableFetch['available'],
    );
    echo json_encode($arr);
}


if(isset($_POST['count']))
{
    $email=$_SESSION['email'];
    $results=notificationModel::notificationAll($connection,$email);
    $count=0;
    $record=array();
    while($row=mysqli_fetch_assoc($results)){
        if($row['seen_state']==0)
        {
            $count++;
        }
        $record[]=$row;
    }
    $arr=array(
        'data'=>$record,
        'count'=>$count
        );
        echo json_encode($arr);
}

if(isset($_POST['id']) && isset($_POST['email']))
{
    $email=$_POST['email'];
    $noID=$_POST['id'];
    notificationModel::notificationSeen($connection,$email,$noID);
    $result=notificationModel::notificationResponce($connection,$email,$noID);
    $resultFetch=mysqli_fetch_assoc($result);
    $arr=array(
        'responce'=>$resultFetch["responce_url"],
      
        );
        echo json_encode($arr);
}
?>
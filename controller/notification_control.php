<?php
require_once ('../config/database.php');
require_once ('../models/orderModel.php');
require_once ('../models/notificationModel.php');
session_start();


if(isset($_POST['count']))
{
    $email=$_SESSION['email'];
    $level=$_SESSION['level'];
    if($level=='boarder'){
        $id=$_SESSION['Bid'];
    }elseif($level=='boardings_owner'){
        $id=$_SESSION['BOid'];
    }elseif($level=='food_supplier'){
        $id=$_SESSION['FSid'];
    }elseif($level=='student'){
        $id=$_SESSION['Reg_id'];
    }else{
        $id=$_SESSION['a_id'];
    }
    
    // $results=notificationModel::notificationAll($connection,$email);
    $results=notificationModel::notificationsAll2($connection,$email,$level,$id);
    $count=0;
    $record=array();
    while($row=mysqli_fetch_assoc($results)){
        // if($row['seen_state']==0)
        // {
            $count++;
        // }
        $record[]=$row;
    }
    $arr=array(
        'data'=>$record,
        'count'=>$count
        );
        echo json_encode($arr);
}
?>
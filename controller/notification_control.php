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
    $results=notificationModel::notificationAll($connection,$email);
    $results=notificationModel::notificationsAll2($connection,$email,$level,$id);
    $count=0;
    
    $record=array();
    while($row=mysqli_fetch_assoc($results)){
            $count++;
            $record[]=$row;
    //         // $arr[]=$row;
    //         // $arr['ago']=time_Ago(strtotime($arr['sendDateTime']));
    //         // $record[]=$arr;
        
    }
    $arr=array(
        'data'=>$record,
        'count'=>$count,
        );
        
        echo json_encode($arr);
}



// if(isset($_POST['id']))
// {
//     $noID=$_POST['id'];
//     notificationModel::notificationSeen_N($connection,$noID);
//     $result=notificationModel::notificationResponce_N($connection,$noID);
//     $resultFetch=mysqli_fetch_assoc($result);
//     $arr=array(
//         'responce'=>$resultFetch["responce_url"],
      
//         );
//         echo json_encode($arr);
// }


if(isset($_GET['delete']))
{
    $id=0;
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
    $notify_id=$_GET['notify_id'];
    notificationModel::delete_notification_by_Id($connection,$notify_id);
    $results=notificationModel::notificationsAll2($connection,$email,$level,$id);
    $count=0;
    
    $record=array();
    while($row=mysqli_fetch_assoc($results)){
            $count++;
            $record[]=$row;
            // $arr[]=$row;
            // $arr['ago']=time_Ago(strtotime($arr['sendDateTime']));
            // $record[]=$arr;
        
    }
   header('Location:../index.php');
}

?>
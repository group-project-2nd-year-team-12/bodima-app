<!-- an -->
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
    
    // public static function time_Ago($time) { 
    //     $diff	 = time() - $time; 
    //     $sec	 = $diff; 
    //     $min	 = round($diff / 60 ); 
    //     $hrs	 = round($diff / 3600); 
    //     $days	 = round($diff / 86400 ); 
    //     $weeks	 = round($diff / 604800); 
    //     $mnths	 = round($diff / 2600640 ); 
    //     $yrs	 = round($diff / 31207680 ); 
    //     if($sec <= 60) { 
    //         echo "$sec seconds ago"; 
    //     } 
    //     else if($min <= 60) { 
    //         if($min==1) { 
    //             echo "one minute ago"; 
    //         } 
    //         else { 
    //             echo "$min minutes ago"; 
    //         } 
    //     } 
    //     else if($hrs <= 24) { 
    //         if($hrs == 1) { 
    //             echo "an hour ago"; 
    //         } 
    //         else { 
    //             echo "$hrs hours ago"; 
    //         } 
    //     } 
    //     else if($days <= 7) { 
    //         if($days == 1) { 
    //             echo "Yesterday"; 
    //         } 
    //         else { 
    //             echo "$days days ago"; 
    //         } 
    //     } 
    //     else if($weeks <= 4.3) { 
    //         if($weeks == 1) { 
    //             echo "a week ago"; 
    //         } 
    //         else { 
    //             echo "$weeks weeks ago"; 
    //         } 
    //     } 
    //     else if($mnths <= 12) { 
    //         if($mnths == 1) { 
    //             echo "a month ago"; 
    //         } 
    //         else { 
    //             echo "$mnths months ago"; 
    //         } 
    //     } 
    //     else { 
    //         if($yrs == 1) { 
    //             echo "one year ago"; 
    //         } 
    //         else { 
    //             echo "$yrs years ago"; 
    //         } 
    //     } 
    // } 
    // $results=notificationModel::notificationAll($connection,$email);
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
    $arr=array(
        'data'=>$record,
        'count'=>$count
        );
        echo json_encode($arr);
}



if(isset($_POST['id']))
{
    $noID=$_POST['id'];
    notificationModel::notificationSeen_N($connection,$noID);
    $result=notificationModel::notificationResponce_N($connection,$noID);
    $resultFetch=mysqli_fetch_assoc($result);
    $arr=array(
        'responce'=>$resultFetch["responce_url"],
      
        );
        echo json_encode($arr);
}


if(isset($_GET['delete']))
{
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
    $arr=array(
        'data'=>$record,
        'count'=>$count
        );
        echo json_encode($arr);
}

?>
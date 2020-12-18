<?php 
require_once ('../config/database.php');
session_start ();
include('../models/StudentRequestIshan.php');
include('../models/reg_userIshan.php');?>
<?php 

if(isset($_GET['requestDelete_id'])){
   $request_id=$_GET['requestDelete_id'];
   $result=StudentRequestIshan::PendingrequestDelete($connection,$request_id);
   if($result){
      header('Location:../views/cancelReqIshan.php');
   }
   
}

if(isset($_GET['requestDeleteBO_id'])){
   $request_id=$_GET['requestDeleteBO_id'];
   $result=reg_userIshan::PendingrequestDelete($connection,$request_id);
   if($result){
      header('Location:../views/myBoardingReqIshan.php');
   }
   {
     // echo "Mysqli query failed";
   }
}




if(isset($_GET['requestCAccept_id'])){
   $request_id=$_GET['requestCAccept_id'];
   $result=StudentRequestIshan::confirmDealAcc($request_id,$connection);
   if($result){
     header('Location:../views/payKeyAndRegBIshan.php?request_id='.$request_id);
   }
   
}
if(isset($_GET['reqAccBOwner_id'])){
   $request_id=$_GET['reqAccBOwner_id'];
   $result=reg_userIshan::confirmReqAccBO($request_id,$connection);
   if($result){
     header('Location:../views/myBoardingReqIshan.php');
   }
   
}
if (isset($_GET['requesttimeout_id'])) {
 echo   $request_id=$_GET['requesttimeout_id'];
 $result=StudentRequestIshan::setTimeoutIshanSt($request_id,$connection);
  if($result){
     header('Location:../views/pendingReqIshan.php');
   }
  
}

if (isset($_GET['BOrequesttimeout_id'])) {
    $request_id=$_GET['BOrequesttimeout_id'];
 $result=StudentRequestIshan::setTimeoutIshanSt($request_id,$connection);
  if($result){
     header('Location:../views/myBoardingReqIshan.php');
   }
  
}

if (isset($_GET['ConreqAccBOwner_id'])) {
  $request_id=$_GET['ConreqAccBOwner_id'];
$result=BOwnerReqIshan::updateStTOBorderByBO($connection,$request_id);
if ($result) {
  header('Location:../views/addAsBoarderIshanBO.php');
}
}





 ?>
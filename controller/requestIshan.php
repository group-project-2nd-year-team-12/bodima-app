<?php 
require_once ('../config/database.php');
session_start ();
include('../models/StudentRequestIshan.php');
include('../models/reg_userIshan.php');
include('../models/BOwnerReqIshan.php');
?>

<?php 

if(isset($_GET['requestDelete_id'])){
   $request_id=$_GET['requestDelete_id'];
   $result=StudentRequestIshan::PendingrequestDelete($connection,$request_id);
   if($result){
      header('Location:../views/pendingReqIshan_New.php');
   }
   
}

if(isset($_GET['ArequestDelete_id'])){
   $request_id=$_GET['ArequestDelete_id'];
   $result=StudentRequestIshan::PendingrequestDelete($connection,$request_id);
   if($result){
      header('Location:../views/acceptedReqIshan_New.php');
   }
   
}




if(isset($_GET['requestDeleteBO_id'])){
   $request_id=$_GET['requestDeleteBO_id'];
   $result=StudentRequestIshan::PendingrequestDelete($connection,$request_id);
   if($result){
      header('Location:../views/myBoardingReqIshan_New.php');
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
     header('Location:../views/myBoardingReqIshan_New.php');
   }
   
}
if (isset($_GET['requesttimeout_id'])) {
 echo   $request_id=$_GET['requesttimeout_id'];
 $result=StudentRequestIshan::setTimeoutIshanSt($request_id,$connection);
  if($result){
     header('Location:../views/pendingReqIshan_New.php');
   }
  
}


if (isset($_GET['Arequesttimeout_id'])) {
 echo   $request_id=$_GET['Arequesttimeout_id'];
 $result=StudentRequestIshan::setTimeoutIshanSt($request_id,$connection);
  if($result){
     header('Location:../views/acceptedReqIshan_New.php');
   }
  
}

if (isset($_GET['BOrequesttimeout_id'])) {
    $request_id=$_GET['BOrequesttimeout_id'];
 $result=StudentRequestIshan::setTimeoutIshanSt($request_id,$connection);
  if($result){
     header('Location:../views/myBoardingReqIshan_New.php');
   }
  
}

if (isset($_GET['ConreqAccBOwner_id'])) {
  $request_id=$_GET['ConreqAccBOwner_id'];
$result=BOwnerReqIshan::updateStTOBorderByBO($connection,$request_id);
if ($result) {
  header('Location:boarder_list_controlN.php?boarderlist=1');
}
}


if (isset($_GET['onPayNSReq'])) {
  $request_id=$_GET['onPayNSReq'];
$result=StudentRequestIshan::setHandover($connection,$request_id);
if ($result) {
 header('Location:../views/rentedPayNotIshan_New.php');
}
}

if (isset($_GET['onReqCan'])) {
  $request_id=$_GET['onReqCan'];
$student_email=$_SESSION['email'];
   $result=reg_userIshan::getboarderIspaid($connection,$student_email);
  
  $user=mysqli_fetch_assoc($result);
  $Bid=$user['Bid'];

    StudentRequestIshan::deleteconfirm($connection,$request_id);
    StudentRequestIshan::deleteboaParent($connection,$Bid);
    StudentRequestIshan::deleteboarder($connection,$Bid);
     StudentRequestIshan::UpdateCtoAReq($connection,$request_id);
    header('Location: ../views/acceptedReqIshan_New.php');

}


 ?>
<?php 
require_once ('../config/database.php');
session_start ();
include('../models/reg_userIshan.php');?>
<?php 

if(isset($_GET['requestDelete_id'])){
   $request_id=$_GET['requestDelete_id'];
   $result=reg_userIshan::PendingrequestDelete($connection,$request_id);
   if($result){
      header('Location:../views/pendingReqIshan.php');
   }
   {
     // echo "Mysqli query failed";
   }
}


if(isset($_GET['requestCAccept_id'])){
   $request_id=$_GET['requestCAccept_id'];
   $result=reg_userIshan::confirmDealAcc($request_id,$connection);
   if($result){
     header('Location:../views/payKeyAndRegBIshan.php');
   }
   
}



 ?>
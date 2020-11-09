<?php 
require_once('../config/database.php');
require_once('../models/reg_userIshan.php');
require_once('../config/conDealBoarderIshanEmail.php');
//require_once('../config/confirmRB.php');

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirm Boarding Deal</title>
</head>
<body>
<h1>Confirm Boarding Deal</h1>
</body>
</html>
<?php 

if (isset($_POST['accept'])) {
	//print_r($_POST);
	$B_post_id=$_POST['B_post_id'];
	$student_email=$_POST['student_email'];

	$result=reg_userIshan::confirmDealAcc($B_post_id,$student_email,$connection);
   /* $result1=reg_user::getBOwnerEmail($B_post_id,$connection);
   if (mysqli_num_rows($result1) > 0) {
	while($rowData = mysqli_fetch_array($result1)){
  		 $BOEmail=$rowData["email"];
	   }
     }*/


	 //echo "{$result1}";
	echo "successfully accept";
	sentConDealAcc($BOEmail);

	header('Location:../views/payKeyAndRegBIshan.php');
}
if (isset($_POST['remove'])) {
//	print_r($_SESSION);
	$B_post_id=$_POST['B_post_id'];
	$student_email=$_POST['student_email'];

	$result=reg_userIshan::confirmDealRej($B_post_id,$student_email,$connection);

//	$result1=reg_user::getBOwnerEmail($B_post_id,$connection);
  /* if (mysqli_num_rows($result1) > 0) {
	while($rowData = mysqli_fetch_array($result1)){
  		 $BOEmail=$rowData["email"];
	   }
     }*/
     //sentConDealRej($BOEmail);
	echo "successfully rejected";

	header('Location:../views/myrequests.php');



}

 ?>
<?php 
require_once ('../config/database.php');
        require_once ('../models/reg_userIshan.php');
     
        session_start(); 



 ?>
 
 <?php 

if (isset($_GET['success'])) {
	//print_r($_SESSION);
	$student_email=$_SESSION['email'];
	
	  $B_post_id=$_GET['order_id'];

	 $result=reg_userIshan::getboarderIspaid($connection,$student_email);
	
	$user=mysqli_fetch_assoc($result);
	$Bid=$user['Bid'];

    reg_userIshan::insertboarderIspaid($connection,$Bid,$B_post_id);

//$Bid=$_GET['Bid'];
 	unset($_SESSION['Reg_id']);
 	unset($_SESSION['level']);
 	$student_email=$_SESSION['email'];

 	$_SESSION['Bid']=$Bid;
 	$_SESSION['level']="boarder";

$result=reg_userIshan::updateStTOBorder($connection,$student_email);


    header('Location: ../views/rentedPayIshan_New.php');

}

  ?>
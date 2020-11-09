<?php session_start(); ?>
<?php include('../config/database.php');?>

<?php include('../models/reg_userIshan.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Request Page</title>
</head>
<body>
	<h1>Ishan</h1>
	<?php //print_r($_SESSION);
//	header('Location:boardings.php'); ?>

<?php 
 	$B_post_id=$_GET['B_post_id']; 
 	$BOid=$_GET['BOid'];
 	$category=$_GET['category'];
  	$city=$_GET['city']; 
  	 $student_email=$_SESSION['email'];
  	 $student_name=$_SESSION['first_name'];	
  
	 $message="I am $student_name.I  like to get the your $city boarding place and would like to request  your boarding house";
	 

        $result=reg_userIshan::insertReq($connection,$student_email,$BOid,$B_post_id,$message);



	 	 if($result){
			 echo $result="<script>confirm('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
			 
		 	  if ( $result==true) {
		 	  header('Location:../views/BoardingPage.php?id='.$B_post_id.'');
		 	  }
		  }else
		  {
		  	echo "<script>alert('sorry failed.')</script>";

		  }


 ?>





</body>
</html>
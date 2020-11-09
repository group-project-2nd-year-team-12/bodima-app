<?php 
 require_once ('../config/database.php');
 require_once ('../models/reg_userIshan.php');
 require_once('../config/temReqBOIshanEmail.php');
//require_once('../config/temperyRej.php');
    //session_start ();
?>

<?php
if(isset($_GET['click']))
{
  header('Location:../views/request.php');
}


if(isset($_POST['accept']))
{
   $B_post_id=$_POST['B_post_id'];
   $student_email=$_POST['student_email'];
   $city=$_POST['city'];
  // $total=$_POST['total'];
  // $first_name=$_POST['first_name'];
  // $last_name=$_POST['last_name'];
   $result=reg_userIshan::temchooseB($B_post_id,$student_email,$connection);
   // email order is accepted
   // echo $total;
   // print_r($_SESSION);
   sentCDAccept($student_email,$city);
   header('Location: ../views/ConBODealIshan.php');
   //print_r($_SESSION);
}


// if(isset($_POST['remove']))
// {
//    $B_post_id=$_POST['B_post_id'];
//    $student_email=$_POST['student_email'];
//   // $email=$_POST['email'];
//   // $total=$_POST['total'];
//   // $first_name=$_POST['first_name'];
//   // $last_name=$_POST['last_name'];
//    $result=reg_user::rejectreq($B_post_id,$student_email,$connection);
//    // email order is accepted
//    // echo $total;
//    // print_r($_SESSION);
//  //  sentRejAcc($student_email);
//    header('Location:../views/request.php');
//    //print_r($_SESSION);
// }

?>



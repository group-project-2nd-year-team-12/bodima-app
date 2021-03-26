<?php 



 require_once ('../config/database.php');
 require_once ('../models/StudentRequestIshan.php');
 session_start();

function pendingRequest($connection) {
 // $result=StudentRequestIshan::selectPendingRequest($student_email,$connection);
 $student_email=$_SESSION['email'];
 //echo $student_email;


$pending_req=StudentRequestIshan::selectPendingRequest($student_email,$connection);

 // if(mysqli_num_rows($pending_req)>0)
    // {
        while($row=mysqli_fetch_assoc($pending_req))
        {
            $data[]=$row;
           // echo '<br/><br/>';
            // print_r($row);
        }
       // $pending_request=serialize($data);

	return $data;
    
}

 ?>
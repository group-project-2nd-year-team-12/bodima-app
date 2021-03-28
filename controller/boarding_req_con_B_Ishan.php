<?php 



 require_once ('../config/database.php');
 require_once ('../models/StudentRequestIshan.php');
 session_start();

function pendingRequest($connection) {
 // $result=StudentRequestIshan::selectPendingRequest($student_email,$connection);
 $student_email=$_SESSION['email'];
 //echo $student_email;
$data=array();

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

function AcceptRequest($connection){

       $data=array();

        $student_email=$_SESSION['email'];
        $accept_req=StudentRequestIshan::AcceptRequest($student_email,$connection);

        while ($row=mysqli_fetch_assoc($accept_req)) {
           $data[]=$row;
        }

        return $data;


}


function rentedPay($connection){

        $data=array();
        $student_email=$_SESSION['email'];
        $result=StudentRequestIshan::selectRPayD($connection,$student_email);

        while ($row=mysqli_fetch_assoc($result)) {
            $data[]=$row;
        }

        return $data;

}
function rentedPayNot($connection){

        $data=array();
          $student_email=$_SESSION['email'];
            $result=StudentRequestIshan::selectRPayNotD($connection,$student_email);

        while ($row=mysqli_fetch_assoc($result)) {
            $data[]=$row;
        }

        return $data;

}




 ?>
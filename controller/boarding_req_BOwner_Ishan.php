<?php 

 require_once ('../config/database.php');
require_once ('../models/BOwnerReqIshan.php');
 session_start();


function selectnewRequest($connection){



 $BOid=$_SESSION['BOid'];
$data=array();

$select_pen_req=BOwnerReqIshan::selectnewRequest($BOid,$connection);

 // if(mysqli_num_rows($pending_req)>0)
    // {
        while($row=mysqli_fetch_assoc($select_pen_req))
        {
            $data[]=$row;
           // echo '<br/><br/>';
            // print_r($row);
        }
       // $pending_request=serialize($data);

	return $data;



}



function selectMyBordersBO($connection){



 $BOid=$_SESSION['BOid'];
$data=array();

$select_pen_req=BOwnerReqIshan::selectMyBordersBO($connection,$BOid);

 // if(mysqli_num_rows($pending_req)>0)
    // {
        while($row=mysqli_fetch_assoc($select_pen_req))
        {
            $data[]=$row;
           // echo '<br/><br/>';
            // print_r($row);
        }
       // $pending_request=serialize($data);

	return $data;



}


function selectMyBordersBOPaynot($connection){



 $BOid=$_SESSION['BOid'];
$data=array();

$select_pen_boarder=BOwnerReqIshan::selectMyBordersBOPaynot($connection,$BOid);

 // if(mysqli_num_rows($pending_req)>0)
    // {
        while($row=mysqli_fetch_assoc($select_pen_boarder))
        {
            $data[]=$row;
           // echo '<br/><br/>';
            // print_r($row);
        }
       // $pending_request=serialize($data);

	return $data;



}
  







 ?>
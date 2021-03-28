<?php
    require_once ('../config/database.php');
    require_once ('../models/ratemodel.php');
    session_start(); 
    

?>
<?php 
 //echo "dddddd"; 
 $email=$_SESSION['email'];
 $starRate = $_POST['starRate'];
 $rateMsg = $_POST['rateMsg'];
 $date = $_POST['date'];
 $name = $_POST['name'];
 //$nima ="nima";
 $data = [$email,$starRate, $rateMsg, $date, $name];

print_r($data);

$result_set=rating::getUseremail($email,$connection);
$result_post=mysqli_fetch_assoc($result_set);
//$val=$result_post['uName'];

//print_r($result_post['uName']);

if(!$result_post){
    rating::postRating($email,$starRate,$rateMsg,$date,$name,$connection);
    echo "insertrd successful";
}else{
    $result_set=rating::getUpdate($email,$starRate,$rateMsg,$date,$name,$connection); 
    echo "Update successful";
}
    

?>
<?php
    require_once ('../config/database.php');
    require_once ('../models/ratemodelFood.php');
    session_start(); 
    

?>
<?php 
 //echo "dddddd"; 
 
 if(isset($_POST['starRate'])){

    $email=$_SESSION['email'];
    $rating_F_post_id=$_SESSION['rating_F_post_id'];
  echo $_SESSION['rating_F_post_id'];
    $starRate = $_POST['starRate'];
    $rateMsg = $_POST['rateMsg'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    //$nima ="nima";
    $data = [$rating_F_post_id,$email,$starRate, $rateMsg, $date, $name];
   
   print_r($data);
   
   $result_set=rating::getUseremail($rating_F_post_id,$email,$connection);
   $result_post=mysqli_fetch_assoc($result_set);
   //$val=$result_post['uName'];
   
   //print_r($result_post['uName']);
   
   if(!$result_post){
       rating::postRating($rating_F_post_id,$email,$starRate,$rateMsg,$date,$name,$connection);
       echo "insertrd successful";
   }else{
       $result_set=rating::getUpdate($rating_F_post_id,$email,$starRate,$rateMsg,$date,$name,$connection); 
       echo "Update successful";
   }

 }


function rategetcount($rating_F_post_id,$connection){
    $result_set=rating::getids($rating_F_post_id,$connection);
    $count=mysqli_num_rows($result_set);
    //echo $count;

    $result_set=rating::getSum($rating_F_post_id,$connection);
    $data=mysqli_fetch_assoc($result_set);
    $total=$data['total'];

    $rate_array=array(
        'count'=>$count,
        'total'=>$total
    );

    return $rate_array;
}
    

?>
<?php 
require_once ('../config/database.php');
require_once ('../models/chatModel.php');
session_start();


if(isset($_POST['chat'])){

    $email=$_SESSION['email'];
    $results=chatModel::getChat($connection,$email);
    $resultsFetch=mysqli_fetch_all($results);
    $arr=array(
        'message'=>$resultsFetch,
        'email'=>$email,
        );
        echo json_encode($arr);
}

if(isset($_POST['msg']))
{
    $msg=$_POST['msg'];
    $email=$_SESSION['email'];
    chatModel::setChat($connection,$email,$msg);
    $arr=array(
        'available'=>$msg,
        );
        echo json_encode($arr);
}
?>
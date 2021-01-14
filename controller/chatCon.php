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
    $sender=$_SESSION['email'];
    if($_SESSION['level']=="administrator")
    {
        $userEmail=$_POST['userEmail'];
    }else{
        $userEmail=$_SESSION['email'];
    }
    $name=$_SESSION['first_name'].' '.$_SESSION['last_name'];
    chatModel::setChat($connection,$userEmail,$sender,$msg,$name);
    $arr=array(
        'available'=>$msg,
        );
        echo json_encode($arr);
}

if(isset($_POST['user']))
{
    $result=chatModel::getChatUser($connection);
    $resultFetch=mysqli_fetch_all($result);
    $arr=array(
        'chatUser'=>$resultFetch,
        );
        echo json_encode($arr);
}

if(isset($_POST['email']))
{
    $email=$_POST['email'];
    $adminEmail=$_SESSION['email'];
    $adminName=$_SESSION['first_name'].' '.$_SESSION['last_name'];
    $results=chatModel::getChat($connection,$email);
    $resultsFetch=array();
    $userName="";
    
    while($row=mysqli_fetch_assoc($results))
    {
        if($row['sender_name']!=$adminName)
        {
            $userName=$row['sender_name'];
        }
        $resultsFetch[]=$row;
        
    }
    $arr=array(
        'message'=>$resultsFetch,
        'userName'=>$userName,
        'userEmail'=>$email,
        'email'=>$adminEmail
        );
        echo json_encode($arr);
}
?>
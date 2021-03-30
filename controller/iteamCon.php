<?php
    
    require_once ('../config/database.php');
    require_once ('../models/food_post.php');
    session_start();
    

   

?>

<?php

$submit=$_POST['submit'];

if(isset($_POST['submit']))
{

    $errors=array(); //create empty array

    $pName=$_POST['pName'];
    if(empty($_POST['pName']) || strlen(trim($_POST['pName']))<1){
        $errors['err1']='*Product Name Name is required';
    }

    $price=$_POST['price'];
    if(empty($_POST['price']) || strlen(trim($_POST['price']))<1){
        $errors['err2']='*Price is required';
    }else if(!is_numeric($price)) {
        $errors['err3']='*Price Data entered was not numeric';
    }

    if(isset($_POST['breakfirst'])){
        $breakfirst=1; 
    }else{
        $breakfirst=0; 
    }

    if(isset($_POST['lunch'])){
        $lunch=1; 
    }else{
        $lunch=0; 
    }

    if(isset($_POST['dinner'])){
        $dinner=1; 
    }else{
        $dinner=0; 
    }

    if(empty($errors)){
        if($submit=='post advertisement'){
    
            $pName=$_POST['pName'];
                    
    
            $image_name=$_FILES['pimage']['name'];
            $image_type=$_FILES['pimage']['type'];
            $image_size=$_FILES['pimage']['size'];
            $temp_name=$_FILES['pimage']['tmp_name'];
    
            $upload_to='../resource/Images/uploaded_foodpost/';
    
            move_uploaded_file($temp_name, $upload_to . $image_name);
    
            $price=$_POST['price'];
            //$breakfirst=$_POST['breakfirst'];
                
                    
            //$lunch=$_POST['lunch'];
                    
            //$dinner=$_POST['dinner'];
    
            //echo $Hnumber;
    
            $fid=$_SESSION['FSid'];
            echo $fid;
            $result_set=foodSupplierPost::getFoodPostId($fid,$connection);
            $result_food=mysqli_fetch_assoc($result_set);
            $foodPostId=$result_food['F_post_id'];
            echo $foodPostId;
    
    
            // $result1=foodSupplierPost::delete_food_post($connection);
            // echo $result1;
            foodSupplierPost::addIteam($fid,$foodPostId,$pName,$image_name,$upload_to,$breakfirst,$lunch,$dinner,$price,$connection);
    
            header('Location:../views/iteam.php?success&popf=1');
            // print_r($_POST);
    
            // print_r($_FILES);
    
    
        }elseif($submit=='Add Iteam')
        {
    
    
                            
            $pName=$_POST['../resource/Images/uploaded_foodpost/'];
                    
    
            $image_name=$_FILES['pimage']['name'];
            $image_type=$_FILES['pimage']['type'];
            $image_size=$_FILES['pimage']['size'];
            $temp_name=$_FILES['pimage']['tmp_name'];
    
            $upload_to='../img/';
    
            move_uploaded_file($temp_name, $upload_to . $image_name);
    
            $price=$_POST['price'];
            //$breakfirst=$_POST['breakfirst'];
                
                    
            //$lunch=$_POST['lunch'];
                    
            //$dinner=$_POST['dinner'];
    
            //echo $Hnumber;
    
            $fid=$_SESSION['FSid'];
            echo $fid;
            $result_set=foodSupplierPost::getFoodPostId($fid,$connection);
            $result_food=mysqli_fetch_assoc($result_set);
            $foodPostId=$result_food['F_post_id'];
            echo $foodPostId;
    
    
    
            
            foodSupplierPost::addIteam($fid,$foodPostId,$pName,$image_name,$upload_to,$breakfirst,$lunch,$dinner,$price,$connection);
    
    
    
            header('Location:../views/iteam.php');
    
            print_r($_POST);
    
            print_r($_FILES);
    
        }

    }else{
        header('Location:../views/iteam.php?'.http_build_query(array('param'=>$errors)));
    }


   
                
           
}





if (isset($_GET['success'])) {
    echo "gggggg";
	//print_r($_SESSION);
	//$student_email=$_SESSION['email'];
    //$result_P=foodSupplierPost::delete_food_post($connection);
    //echo $result;
	  $F_post_id=$_GET['order_id'];
      $id=$F_post_id;
      echo $F_post_id;

  

      foodSupplierPost::updatePostpayf($id,$connection);

      //boarding::delete_post($connection);

      header('Location:../controller/profile_controlN.php?profile=1');
      
      print_r($_POST);
      echo "sfsdfhdfsjhs";



}



if(isset($_GET['deletePost'])){

    $result=foodSupplierPost::delete_food_post($connection);
    echo $result;
    header('Location:profile_controlN.php?profile=1'); //link changed
    // $state="";
    // if($result->num_rows!=0){
    //     $state="sucess";
    // }else{
    //     $state="unsucess";
    // }

    // $data=array(
    //     'setPost'=>'nima'
    // );
    // echo json_encode($data);
}

?>
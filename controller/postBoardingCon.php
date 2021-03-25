<?php
    require_once ('../config/database.php');
    require_once ('../models/post_boarding.php');
    session_start();
    // print_r($_POST['Aamount']);

?>

<?php


if(isset($_POST['submit']))
{
$errors=array(); //create empty array


    $title=$_POST['title'];
    if(empty($_POST['title']) || strlen(trim($_POST['title']))<1){
        $errors['err17']='*Title is required';  //erros 17
    }

    $Hnumber=$_POST['Hnumber'];
    if(empty($_POST['Hnumber']) || strlen(trim($_POST['Hnumber']))<1){
        $errors['err1']='*Home Number is required';
    }
    
    $lane=$_POST['lane'];
    if(empty($_POST['lane']) || strlen(trim($_POST['lane']))<1){
        $errors['err2']='*Lane is required';
    }
  
    $city=$_POST['city'];
    if(empty($_POST['city']) || strlen(trim($_POST['city']))<1){
        $errors['err3']='*City is required';
    }

    
    $district=$_POST['district'];
    if(empty($_POST['district']) || strlen(trim($_POST['district']))<1){
        $errors['err4']='*District is required';
    }

   // $location=$_POST['location'];
    //if(empty($_POST['location']) || strlen(trim($_POST['location']))<1){
      //  $errors[]='*location is required';
    //}

    
    if(!isset($_POST['individual'])){
        $errors['err5']='*Select one option';
    }

    if(!isset($_POST['gender'])){
        $errors['err6']='*Select one option';
    }
    
    $Pcount=$_POST['Pcount'];
    //print_r($_POST['Pcount']);
    
    if(empty($Pcount) || strlen(trim($Pcount))<1){
        $errors['err7']='*Person Count is required';
    }else if($Pcount<=1){
        $errors['err8']='*Should be greater than  1';
    }else if($Pcount>=30){
        $errors['err9']='*Should be less than 30';
    }

    $CPperson=$_POST['CPperson'];
    if(empty($_POST['CPperson']) || strlen(trim($_POST['CPperson']))<1){
        $errors['err10']='*Cost Per Person For Month is required';
    }else if(!is_numeric($CPperson)) {
        $errors['err11']='*Should be an integer';
    }else if($CPperson<-1){
        $errors['err16']='*Should be Posivite';
    } 

    $Keymoney=$_POST['Keymoney'];
    if(empty($_POST['Keymoney']) || strlen(trim($_POST['Keymoney']))<1){
        $errors['err12']='*Keymoney is required';
    }else if(!is_numeric($Keymoney)) {
        $errors['err13']='*Should be an integer';
    }else if($Keymoney<-1){
        $errors['err16']='*Should be Posivite';
    } 


    $Lifespan=$_POST['Lifespan'];
    //print_r($_POST['Pcount']);
    
    if(empty($Lifespan) || strlen(trim($Lifespan))<1){
        $errors['err14']='*Lifespan is required';
    }else if($Lifespan<30){
        $errors['err15']='*Should be greater than 30 days';
    } 

    
   
   


    if(empty($errors)){

        $title=$_POST['title'];
        $Hnumber=$_POST['Hnumber'];
        $lane=$_POST['lane'];
        $city=$_POST['city'];
        $district=$_POST['district'];
        $location=$_POST['location'];
        $description=$_POST['description'];

        $individual=$_POST['individual'];
        $gender=$_POST['gender'];
        $Pcount=$_POST['Pcount'];
        $CPperson=$_POST['CPperson'];
        $Keymoney=$_POST['Keymoney'];
        $Lifespan=$_POST['Lifespan'];
        //$Aamount=$_SESSION['result'];
        $Aamount=$_POST['Aamount'];




        $image_name1=$_FILES['image1']['name'];
        if(null==trim($image_name1)){
        //    echo "null";
            $image_name1="defaultbp1.jpg";
        }else{
            // echo " have value";
        }
        
        $image_type1=$_FILES['image1']['type'];
        $image_size1=$_FILES['image1']['size'];
        $temp_name1=$_FILES['image1']['tmp_name'];
        // print_r($_FILES);
        $upload_to="../resource/Images/uploaded_boarding/";
    
        move_uploaded_file($temp_name1, $upload_to . $image_name1);


        $id=$_SESSION['BOid'];
        //$id=1;
       

     $creattime=date('Y-m-d h:i:s');
      // $creattime=dat;
        //$result=boarding::delete_post($connection);
       // echo $result;

        boarding::postBoarding($id,$Hnumber,$lane,$city,$district,$description,$creattime,$title,$image_name1,$upload_to,$individual,$location,$gender,$Pcount,$CPperson,$Keymoney,$Lifespan,$Aamount,$connection);

        $result_set=boarding::getPostId($connection);
        $result_post=mysqli_fetch_assoc($result_set);
        $postid=$result_post['B_post_id'];
        // echo $postid;

        foreach ($_FILES['image']['tmp_name'] as $key => $value){

            $image_name=$_FILES['image']['name'][$key];
            
           /* if(null==trim($image_name)){
                echo "null";
                $image_name="defaultbp1.jpg";
            }else{
                echo " have value";
            }*/

            $temp_name=$_FILES['image']['tmp_name'][$key];
            $image_type=$_FILES['image']['type'][$key];
            $image_size=$_FILES['image']['size'][$key];
            $upload_to="../resource/Images/uploaded_boarding/";

            // print_r($_FILES);
        
            


            if(null!=trim($image_name)){
                echo "null";
                $image_name_edit='post'.$postid.'img'.$image_name;
                move_uploaded_file($temp_name, $upload_to . $image_name_edit);
                boarding::image_save($id,$postid, $image_name_edit,$upload_to,$connection);
            }
            

        }

        // echo $upload_to.$image_name;


    
        //echo $Hnumber;
         //header('Location:../views/postBoarding.php?success&pop=1&amount='.$Aamount.'&lifespan='.$Lifespan);
         header('Location:../views/postBoarding.php?success&pop=1');

        //header('Location:../views/postBoarding.php?success'); //meka balanna

    }else{
        header('Location:../views/postBoarding.php?'.http_build_query(array('param'=>$errors)));
    }
    

    
}


if (isset($_GET['success'])) {
    echo "gggggg";
	//print_r($_SESSION);
	//$student_email=$_SESSION['email'];
    //$result_P=boarding::delete_post($connection);
    //echo $result;
	  $B_post_id=$_GET['order_id'];
      $id=$B_post_id;
      echo $B_post_id;

  

      boarding::updatePostpay($id,$connection);

      $result_P=boarding::delete_post($connection);
      echo $result;

      header('Location:../views/myads_boardingowner.php');
      
      print_r($_POST);
      echo "sfsdfhdfsjhs";



}



if(isset($_GET['deletePost'])){

    $result=boarding::delete_post($connection);
    echo $result;
    header('Location:../controller/profile_controlN.php?profile=1');
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


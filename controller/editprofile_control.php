<?php   require_once ('../config/database.php');
        require_once ('../models/profile_model.php');
        require_once ('../models/profile_modelN.php');
        session_start(); 
?>

<?php

// redirect to editprofile page 

if(isset($_GET['editprofile'])){

    if($_SESSION['level']=='boarder'){
        $user=profile_modelN::get_user_details_boarder($connection,$_SESSION['level'],$_SESSION['email']);  
        $detail= mysqli_fetch_assoc($user); 
        echo $detail['address']; 
        $user=serialize($detail); 


        $parent=profile_modelN::parent_details($connection,$detail['Bid']);
        $P_detail= mysqli_fetch_assoc($parent); 
        $parent=serialize($P_detail);

        // header('Location:../views/editprofile1.php?user='.$user.'&parent='.$parent);

        if(isset($_GET['msg'])){
            header('Location:../views/editprofile1.php?msg='.$_GET['msg'].'&user='.$user.'&parent='.$parent);
        }elseif(isset($_GET['error'])){
            header('Location:../views/editprofile1.php?error='.$_GET['error'].'&user='.$user);
        }else{
            header('Location:../views/editprofile1.php?user='.$user.'&parent='.$parent);
        }

    }else if($_SESSION['level']=='boardings_owner'| $_SESSION['level']=='food_supplier'| $_SESSION['level']=='student')

    {
    $user=profile_modelN::get_user_details($connection,$_SESSION['level'],$_SESSION['email']);  
    $detail= mysqli_fetch_assoc($user); 
    echo $detail['address']; 
    $user=serialize($detail); 

        
        if(isset($_GET['msg'])){
            header('Location:../views/editprofile1.php?msg='.$_GET['msg'].'&user='.$user);
        }elseif(isset($_GET['error'])){
            header('Location:../views/editprofile1.php?error='.$_GET['error'].'&user='.$user);
        }else{
            header('Location:../views/editprofile1.php?user='.$user);
        }
    }
}


// check the click submit and validation form
if(isset($_POST['editprofile_btn'])){

    $errors=array(); 

    if(!isset($_POST['first_name']) || strlen(trim($_POST['first_name']))<1)   //check if the username and password has been entered
                {
                $errors[]='your first name field is empty!';
                } 
            else{
                $first_name=$_POST['first_name'];
                $_SESSION['first_name']=$first_name;
                $update_firstname=profile_model::update_firstname($_SESSION['level'],$first_name,$_SESSION['email'],$connection);
                }


    if(!isset($_POST['last_name']) || strlen(trim($_POST['last_name']))<1)
                {
                $errors[]='your last name field is empty!';
                }
            else{
                $last_name=$_POST['last_name'];
                $_SESSION['last_name']=$last_name; 
                $update_lastname=profile_model::update_lastname($_SESSION['level'],$last_name,$_SESSION['email'],$connection);
                }

    if(!isset($_POST['address']) || strlen(trim($_POST['address']))<1)
                 {
                $errors[]='your address field is empty!';
               
                }else
                {
                $address=$_POST['address'];
                $_SESSION['address']=$address;
                $update_address=profile_model::update_address($_SESSION['level'],$_SESSION['address'],$_SESSION['email'],$connection);
                }
    if(!isset($_POST['contactno']) || strlen(trim($_POST['contactno']))<1)
                {
                $errors[]='your contact number field is empty!';
                }else
                {
                $contactno=$_POST['contactno'];
                $update_contactno=profile_model::update_contactno($_SESSION['level'],$contactno,$_SESSION['email'],$connection);
                }
            

      header('Location:../views/profilepage1.php?profile=1');


}


if(isset($_POST['password_change_btn'])){
    $current_password=sha1($_POST['current_password']);
    $new_password=sha1($_POST['new_password']);
    $out=profile_modelN::update_password($connection,$_SESSION['level'],$_SESSION['email'],$new_password,$current_password);
    if($out==0){
        $msg='Current password is invalid!';
    }else if($out==1){
        $msg='Your password has succesfully updated';
    }else{
        $msg='error occurred with multiple rows!';
    }
    echo $msg;
   
    // header('Location:../controller/editprofile_control.php?msg='.$msg.'&editprofile=1');
    
}



if(isset($_FILES['fileToUpload'])==true){
    $error='';
if(empty($_FILES['fileToUpload']['name'])==false){
   
    $allow_extn=array('jpg','jpeg','png','gif');
    $file_name=$_FILES['fileToUpload']['name'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
    $file_extn=explode('.',$file_name);
    if(in_array(strtolower(end($file_extn)),$allow_extn)){
       
        $file_path='../resource/Images/uploaded_profile_Image/'.$file_name;
        move_uploaded_file($file_tmp,$file_path);
        // echo $file_path;
        profile_modelN::upload_profileimage($connection,$_SESSION['email'],$_SESSION['level'], $file_path);
        $_SESSION['profileimage']= $file_path;
    }else{
        $error="Insert an image file!";
        // echo "Insert an image file!";
    }
    
}else{
    echo "please choose a file!";
    $error="please choose a file!";
    
}

if($error!=''){
    
    header('Location:../controller/editprofile_control.php?editprofile=1&error='.serialize($error));
}else{
    header('Location:../views/profilepage1.php?profile=1');
}


}





?>
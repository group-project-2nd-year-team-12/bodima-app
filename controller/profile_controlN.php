<!-- an -->
<?php   
        session_start();
        require_once ('../config/database.php');
        require_once ('../models/profile_modelN.php');       
?>


<?php
// supply data to profile
if(isset($_GET['profile']))
{

        if($_SESSION['level']=='boarder')
        {
        
                $profile_image=profile_modelN::getprofile_image($connection,$_SESSION['level'],$_SESSION['email']);
                $img=mysqli_fetch_assoc($profile_image);
                echo $img['profileimage'];
                $profileimage= serialize($img['profileimage']);
        

                $user=profile_modelN::get_user_details_boarder($connection,$_SESSION['level'],$_SESSION['email']);  
                $detail= mysqli_fetch_assoc($user); 
                echo $detail['telephone']; 
                $tele=serialize($detail['telephone']);
 
                header('Location:../views/profilepage1.php?profileimage='.$profileimage.'&tele='.$tele);



        }else if($_SESSION['level']=='boardings_owner'| $_SESSION['level']=='food_supplier'| $_SESSION['level']=='student')
             
        {
                $profile_image=profile_modelN::getprofile_image($connection,$_SESSION['level'],$_SESSION['email']);
                $img=mysqli_fetch_assoc($profile_image);
                echo $img['profileimage'];
                $profileimage= serialize($img['profileimage']);

                $user=profile_modelN::get_user_details($connection,$_SESSION['level'],$_SESSION['email']);  
                $detail= mysqli_fetch_assoc($user); 
                echo $detail['telephone']; 
                $tele=serialize($detail['telephone']);//only telephone number
       
                header('Location:../views/profilepage1.php?profileimage='.$profileimage.'&tele='.$tele);

        } 
        else{
                echo $_SESSION['first_name'].' '.$_SESSION['level'];
        } 
        
     


 }

        
?>
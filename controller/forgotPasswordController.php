<?php   require_once ('../config/database.php');
        require_once ('../models/reg_user.php');
        require_once ('../config/email.php');
        session_start(); 
?>
<?php
if (isset($_POST['submit']))
    {	
	                                                                                    //check validaty of email
        $errors['email']='';
        if(!isset($_POST['email']) || strlen(trim($_POST['email']))<1)
        {
            $errors['email']='*Email address requried ';
        }
        elseif (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) 
        {
            $errors['email']='*Invalied email address ';
        } 

        if($errors['email']=='')
        {
            $email=mysqli_real_escape_string($connection,$_POST['email']);

            $user=new reg_user();
            $result_set=$user->forgotPassword($email,$connection);
            if($result_set)
            {
                if(mysqli_num_rows($result_set)==1){ 
                    $user=mysqli_fetch_assoc($result_set);
                    $token=$user['token'];
                    $errors['token']=$token;
                    sendResetLink($email,$token);
                }else{
                    $errors['email']="*No account";
                   
                }
            }else{
                $errors['email']="*No account";
               
            }
        }
        echo json_encode($errors);
    }


    
if(isset($_POST['resend']))
{
        sendResetLink($_POST['email'],$_POST['token']);
        header('Location:../views/resetLink.php?resend&email='.$_POST['email'].'&token='.$_POST['token']);  

}

?>
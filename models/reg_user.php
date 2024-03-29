<?php 

class reg_user{
    // student registration 
    public static function studentReg($email,$first_name,$last_name,$nic,$password,$token,$connection)
    {
        $query="INSERT INTO student (email,first_name,last_name,NIC,password,token) VALUES('{$email}','{$first_name}','{$last_name}','{$nic}','{$password}','{$token}')";
        mysqli_query($connection,$query);
    }

// boarding owner registration 
    public static function boardingReg($email,$first_name,$last_name,$nic,$password,$token,$address,$merchent,$connection)
    {
        $query="INSERT INTO boardings_owner (email,first_name,last_name,NIC,password,token,address,merchent_id) VALUES('{$email}','{$first_name}','{$last_name}','{$nic}','{$password}','{$token}','{$address}','{$merchent}')";
        $result_set=mysqli_query($connection,$query);
        return$result_set;
    }
    // food supplier registration
    public static function foodReg($email,$first_name,$last_name,$nic,$password,$token,$merchent,$address,$connection)
    {
        $query="INSERT INTO food_supplier (email,first_name,last_name,NIC,password,token,address,merchent_id) VALUES('{$email}','{$first_name}','{$last_name}','{$nic}','{$password}','{$token}','{$address}','{$merchent}')";
        $result_set=mysqli_query($connection,$query);
        return$result_set;
    }
    // check the email email already used
    public static function checkUser($email,$connection)
    {
        $query="SELECT email FROM student  WHERE email='{$email}'
         UNION SELECT email FROM boardings_owner  WHERE email='{$email}'
         UNION SELECT email FROM food_supplier  WHERE email='{$email}'
         UNiON SELECT email FROM boarder  WHERE email='{$email}' LIMIT 1";
         $result_set=mysqli_query($connection,$query);
         return  $result_set;
    }
    // nic validation
    public static function checkNic($nic,$connection)
    {
        $query="SELECT NIC FROM boardings_owner  WHERE NIC='{$nic}'
         UNION SELECT NIC FROM food_supplier  WHERE NIC='{$nic}'
         UNiON SELECT NIC FROM boarder  WHERE NIC='{$nic}' LIMIT 1";
         $result_set=mysqli_query($connection,$query);
         return  $result_set;
    }
    // user accept
    public static function setApt($email,$level,$newtoken,$connection)
    {
        $query="UPDATE $level SET user_accepted=1,token='{$newtoken}' WHERE email='{$email}' ";
        $result_set=mysqli_query($connection,$query);
        return $result_set;
        //return $result_set;
    }

    // user login
    public static function loging($email,$password,$connection)
    {
        $query="SELECT level,email,first_name,last_name,address,user_accepted FROM  boarder WHERE email='$email' AND password='$password' 
        UNION SELECT level,email,first_name,last_name,address,user_accepted FROM  boardings_owner WHERE email='$email' AND password='$password'
        UNION SELECT level,email,first_name,last_name,address,user_accepted FROM administrator  WHERE email='$email' AND password='$password'  
        UNION SELECT level,email,first_name,last_name,address,user_accepted FROM food_supplier  WHERE email='$email' AND password='$password' 
        UNION SELECT level,email,first_name,last_name,address,user_accepted FROM food_supplier  WHERE email='$email' AND password='$password'
        UNION SELECT level,email,first_name,last_name,address,user_accepted FROM student  WHERE email='$email' AND password='$password' 
        LIMIT 1 ";
        $result_set=mysqli_query($connection,$query);
        return  $result_set;
    }
//  get the id 
     public static function getId($level, $email,$connection)
     {
       $query="SELECT * FROM $level WHERE email='{$email}'";
       $result_set=mysqli_query($connection,$query);
       return  $result_set;
     }

    //   forgot password get user
     public static function getUser($level,$token, $email,$connection)
     {
     $query="SELECT * FROM $level WHERE email='{$email}' AND token='{$token}'";
       $result_set=mysqli_query($connection,$query);
       return  $result_set;
     }
    

    public function forgotPassword($email,$connection)
    {
        $query="SELECT token,email FROM  boarder WHERE email='$email'  
        UNION SELECT token,email FROM  boardings_owner WHERE email='$email'  
        UNION SELECT token,email FROM  student WHERE email='$email'
        UNION SELECT token,email FROM  food_supplier WHERE email='$email'
                 LIMIT 1 ";
        $result_set=mysqli_query($connection,$query);
        return $result_set; 
    }   

    public static function newPassword($token,$connection)
    {
        $query="SELECT email,level FROM boarder WHERE token='{$token}' 
        UNION SELECT email,level FROM boardings_owner WHERE token='{$token}'
        UNION SELECT email,level FROM food_supplier WHERE token='{$token}'
        UNION SELECT email,level FROM student WHERE token='{$token}'
         LIMIT 1";
        $result_set=mysqli_query($connection,$query);
        return $result_set; 
    }   

    public function savePassword($newtoken,$email,$password,$level,$connection)
    {
        $query="UPDATE $level SET password='{$password}',token='{$newtoken}' WHERE email='{$email}'  ";
        $result_set=mysqli_query($connection,$query);
        return $result_set;
    }   

    public static function getProduct($connection){
        $query="SELECT * FROM product ORDER BY id ASC";// where ekak danna post_id ekata adaala products enna
        $result=mysqli_query($connection,$query);
        return $result;
    }

   
    public static function getOrder($connection,$order_id){
        // echo $order_id;
        $query="SELECT * FROM food_request WHERE order_id='{$order_id}'";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function getOrdId($connection)
    {
       $query="SELECT DISTINCT  order_id FROM food_request WHERE is_accepted=0";
       $result=mysqli_query($connection,$query);
       return $result;
    }

    

    
    public static function getProductsByPostid($F_post_id,$connection){
        $query="SELECT * FROM product WHERE F_post_id = $F_post_id";// where ekak danna post_id ekata adaala products enna
        //SELECT * FROM product WHERE 'F-post-id'=3 ORDER BY id ASC
        //SELECT * FROM `product` WHERE `F-post-id` = 3
        $result=mysqli_query($connection,$query);
        return $result;
    }


    
   
}


?>
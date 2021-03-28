<?php 

class rating{
    public static function getUseremail($email,$connection)
    {
        echo $query="SELECT * FROM rate WHERE email='$email'";


       $result= mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull  seccond <br>";
        }else{
            echo "Unsucessfull second <br>";
        }

        return $result;
    }


    public static function postRating($email,$starRate,$rateMsg,$date,$name,$connection){

        //$hh=$Hnumber;
        //echo $hh;
        //echo $individual;
        //echo "dssssss";
        
        echo $query="INSERT INTO rate (rateid,email,uName,uReview,uMsg,dReview)
        VALUES(null,'{$email}','{$name}','{$starRate}','{$rateMsg}','{$date}')";
      
      //die();
      $result=mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull first <br>";
        }else{
            echo "Unsucessfull first <br>";
        }
    }


    public static function getUpdate($email,$starRate,$rateMsg,$date,$name,$connection)
    {
        echo $query="UPDATE rate SET uName='$name',uReview=$starRate,uMsg='$rateMsg',dReview='$date' WHERE email='$email'";


       $result= mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull  third <br>";
        }else{
            echo "Unsucessfull  third <br>";
        }

        return $result;
    }

    public static function getids($connection)
    {
       $query="SELECT rateid FROM rate";


       $result= mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull  forth <br>";
        }else{
            echo "Unsucessfull forth <br>";
        }

        return $result;
    }

    public static function getSum($connection)
    {
     $query="SELECT SUM(uReview) AS total FROM rate";


       $result= mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull  fifth <br>";
        }else{
            echo "Unsucessfull fifth <br>";
        }

        return $result;
    }

    public static function getratingDetails($connection)
    {
       $query="SELECT * FROM rate";


       $result= mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull  ffff <br>";
        }else{
            echo "Unsucessfull ffff <br>";
        }

        return $result;
    }

}

?>
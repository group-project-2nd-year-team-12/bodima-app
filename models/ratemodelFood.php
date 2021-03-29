<?php 

class rating{
    public static function getUseremail($rating_F_post_id,$email,$connection)
    {
        echo $query="SELECT * FROM ratefood WHERE email='$email' AND ratingfpostid='$rating_F_post_id'";


       $result= mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull  seccond <br>";
        }else{
            echo "Unsucessfull second <br>";
        }

        return $result;
    }


    public static function postRating($rating_F_post_id,$email,$starRate,$rateMsg,$date,$name,$connection){

        //$hh=$Hnumber;
        //echo $hh;
        //echo $individual;
        //echo "dssssss";
        
        echo $query="INSERT INTO ratefood (ratefid,ratingfpostid,email,ufName,ufReview,ufMsg,dfReview)
        VALUES(null,'{$rating_F_post_id}','{$email}','{$name}','{$starRate}','{$rateMsg}','{$date}')";
      
      //die();
      $result=mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull first <br>";
        }else{
            echo "Unsucessfull first <br>";
        }
    }


    public static function getUpdate($rating_F_post_id,$email,$starRate,$rateMsg,$date,$name,$connection)
    {
        echo $query="UPDATE ratefood SET ufName='$name',ufReview=$starRate,ufMsg='$rateMsg',dfReview='$date' WHERE email='$email' AND ratingfpostid='$rating_F_post_id'";


       $result= mysqli_query($connection,$query);

        if($result){
            //echo "Sucessfull  third <br>";
        }else{
            //echo "Unsucessfull  third <br>";
        }

        return $result;
    }

    public static function getids($rating_F_post_id,$connection)
    {
       $query="SELECT ratefid FROM ratefood WHERE ratingfpostid='$rating_F_post_id'";


       $result= mysqli_query($connection,$query);

        if($result){
            //echo "Sucessfull  forth <br>";
        }else{
            //echo "Unsucessfull forth <br>";
        }

        return $result;
    }

    public static function getSum($rating_F_post_id,$connection)
    {
     $query="SELECT SUM(ufReview) AS total FROM ratefood WHERE ratingfpostid='$rating_F_post_id'";


       $result= mysqli_query($connection,$query);

        if($result){
            //echo "Sucessfull  fifth <br>";
        }else{
            //echo "Unsucessfull fifth <br>";
        }

        return $result;
    }

    public static function getratingDetails($rating_F_post_id,$connection)
    {
       $query="SELECT * FROM ratefood WHERE ratingfpostid='$rating_F_post_id'";


       $result= mysqli_query($connection,$query);

        if($result){
            //echo "Sucessfull  ffff <br>";
        }else{
            //echo "Unsucessfull ffff <br>";
        }

        return $result;
    }


    public static function getfoodpostid($order_id_r,$connection)
    {
       $query="SELECT F_post_id FROM food_request WHERE order_id='{$order_id_r}'";


       $result= mysqli_query($connection,$query);

        if($result){
            //echo "Sucessfull  ffff <br>";
        }else{
            //echo "Unsucessfull ffff <br>";
        }

        return $result;
    }

}

?>
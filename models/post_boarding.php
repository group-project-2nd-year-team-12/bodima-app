<?php

class boarding{

    public static function postBoarding($id,$Hnumber,$lane,$city,$district,$description,$creattime,$title,$image_name1,$upload_to,$individual,$location,$latitude,$longitude,$gender,$Pcount,$CPperson,$Keymoney,$Lifespan,$Aamount,$connection){

        //$hh=$Hnumber;
        //echo $hh;
        //echo $individual;
        //echo "dssssss";
        
      echo $query="INSERT INTO boarding_post (B_post_id,BOid,category,girlsBoys,person_count,cost_per_person,rating,image,house_num,lane,city,district,description,location,latitude,longitude,lifespan,post_amount,review,keymoney,title,create_time)
        VALUES(null,'{$id}','{$individual}','{$gender}','{$Pcount}','{$CPperson}','8 ','{$upload_to}{$image_name1}','{$Hnumber}','{$lane}','{$city}','{$district}','{$description}','{$location}',$latitude , $longitude ,'{$Lifespan}','{$Aamount}','ishan','{$Keymoney}','{$title}','{$creattime}')";
    //   echo $query;
    //   die();
      $result=mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull first <br>";
        }else{
            echo "Unsucessfull first <br>";
        }
    }




    public static function getPostId($connection)
    {
        $query="SELECT B_post_id FROM boarding_post 
                ORDER BY B_post_id desc LIMIT 1;";


       $result= mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull  seccond <br>";
        }else{
            echo "Unsucessfull second <br>";
        }

        return $result;
    }

    public static function getPostpop($connection)
    {
        $query="SELECT B_post_id,image,city,lifespan,post_amount,title FROM boarding_post ORDER BY B_post_id desc LIMIT 1;";


       $result= mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull  seccond <br>";
        }else{
            echo "Unsucessfull second <br>";
        }

        return $result;
    }


    public static function image_save($id,$postid,$image_name,$upload_to,$connection){

        //$hh=$Hnumber;
        echo $postid;
        //echo $individual;
        //echo "dssssss";
        
        echo $query="INSERT INTO image (imgid,boid,postid,image_name)
        VALUES(null,'{$id}','{$postid}','{$upload_to}{$image_name}')";
        $result=mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull third <br>";
        }else{
            echo "Unsucessfull third <br>";
        }
    }


    public static function delete_post($connection)
    {
        $query1="DELETE FROM image WHERE is_pay=0";
        $query2="DELETE FROM boarding_post WHERE is_pay_post=0";

        
        //echo $query;
        //die();
        mysqli_query($connection,$query1);
        mysqli_query($connection,$query2);
       // mysqli_query($connection,$query);
        //return $result;

        // if($result){
        //     echo "Sucessfull 4 <br>";
        // }else{
        //     echo "Unsucessfull 4 <br>";
        // }
        
        
    }


    public static function updatePostpay($id,$connection)
    {
        $query1="UPDATE boarding_post SET is_pay_post=1 WHERE B_post_id=$id;";
        $query2="UPDATE image SET is_pay=1 WHERE postid=$id;";


       $result1= mysqli_query($connection,$query1);
       $result2= mysqli_query($connection,$query2);

        if($result1){
            echo "Sucessfull  seccond <br>";
        }else{
            echo "Unsucessfull second <br>";
        }
        if($result2){
            echo "Sucessfull  seccond <br>";
        }else{
            echo "Unsucessfull second <br>";
        }

        //return $result1$result2;
    }


}

?>
<?php

class boarding{

    public static function postBoarding($id,$Hnumber,$lane,$city,$district,$description,$creattime,$title,$image_name1,$upload_to,$individual,$location,$gender,$Pcount,$CPperson,$Keymoney,$Lifespan,$Aamount,$connection){

        //$hh=$Hnumber;
        //echo $hh;
        //echo $individual;
        //echo "dssssss";
        
      echo $query="INSERT INTO boarding_post (B_post_id,BOid,category,girlsBoys,person_count,cost_per_person,rating,image,house_num,lane,city,district,description,location,lifespan,post_amount,review,keymoney,title,create_time)
        VALUES(null,'{$id}','{$individual}','{$gender}','{$Pcount}','{$CPperson}','8 ','{$upload_to}{$image_name1}','{$Hnumber}','{$lane}','{$city}','{$district}','{$description}','{$location}','{$Lifespan}','{$Aamount}','ishan','{$Keymoney}','{$title}','{$creattime}')";
      
      //die();
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

}

?>
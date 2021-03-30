<?php

class foodSupplierPost{

    public static function foodPost($fid,$resName,$address,$description,$image_name,$type,$otDeadline,$Lifespan,$Aamount,$upload_to,$connection){
        //$hh=$resName;
        //echo $hh;
        //echo $individual;
        //echo "dssssss";
        
        $query="INSERT INTO food_post (F_post_id,FSid,ad_title,description,address,type,rating,orderingtimedeadline,lifespan,post_amount,image)
        VALUES(null,'{$fid}','{$resName}','{$description}','{$address}','{$type}',1,'{$otDeadline}','{$Lifespan}','{$Aamount}','{$upload_to}{$image_name}')";
        $result=mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull";
        }else{
            echo "Unsucessfull";
        }
    }





    public static function addIteam($fid,$foodPostId,$pName,$image_name,$upload_to,$breakfirst,$lunch,$dinner,$price,$connection){
        //$hh=$resName;
        //echo $hh;
        //echo $individual;
        //echo "dssssss";
        
        $query="INSERT INTO product (id,FSid,F_post_id,product_name,image,price,breakfast,lunch,dinner)
        VALUES(null,'{$fid}','{$foodPostId}','{$pName}','{$upload_to}{$image_name}','{$price}','{$breakfirst}','{$lunch}','{$dinner}')";
        $result=mysqli_query($connection,$query);
        
        if($result){
            echo "Sucessfull";
        }else{
            echo "Unsucessfull";
        }
    }


    public static function getFoodPostId($FSid,$connection)
    {
        $query="SELECT F_post_id FROM food_post 
                WHERE FSid=$FSid
                ORDER BY F_post_id desc LIMIT 1;";


       $result= mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull";
        }else{
            echo "Unsucessfull";
        }

        return $result;
    }



    public static function delete_food_post($connection)
    {
        $query1="DELETE FROM product WHERE is_pay=0";
        $query2="DELETE FROM food_post WHERE is_pay_post=0";

        
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


    public static function getPostpopf($connection)
    {
        $query="SELECT F_post_id,ad_title,image,type,orderingtimedeadline,lifespan,post_amount FROM food_post ORDER BY F_post_id desc LIMIT 1;";


       $result= mysqli_query($connection,$query);

        if($result){
            //echo "Sucessfull  seccond <br>";
        }else{
            //echo "Unsucessfull second <br>";
        }

        return $result;
    }



    public static function updatePostpayf($id,$connection)
    {
        $query1="UPDATE food_post SET is_pay_post=1 WHERE F_post_id=$id;";
        $query2="UPDATE product SET is_pay=1 WHERE F_post_id=$id;";


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
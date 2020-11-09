<?php

class foodSupplierPost{

    public static function foodPost($fid,$resName,$address,$location,$description,$image_name,$type,$otDeadline,$Lifespan,$Aamount,$connection){
        //$hh=$resName;
        //echo $hh;
        //echo $individual;
        //echo "dssssss";
        
        $query="INSERT INTO food_post (F_post_id,FSid,ad_title,description,address,location,type,rating,orderingtimedeadline,lifespan,post_amount,image)
        VALUES(null,'{$fid},'{$resName}','{$description}','{$address}','{$location}','{$type}',1,'{$otDeadline}','{$Lifespan}','{$Aamount}','{$image_name}')";
        $result=mysqli_query($connection,$query);

        if($result){
            echo "Sucessfull";
        }else{
            echo "Unsucessfull";
        }
    }





    
}

?>
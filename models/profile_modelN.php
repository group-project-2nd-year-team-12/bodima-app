<?php

class profile_modelN{

    public static function getprofile_image($connection,$level,$email){
        $query="SELECT profileimage FROM {$level} 
                WHERE email='{$email}';";

        // echo $query;
        // die();
       return mysqli_query($connection,$query);
    }

    public static function get_user_details_boarder($connection,$level,$email){
        $query="SELECT Bid,email,first_name,last_name,level,address,location_link,NIC,image,institute,gender,telephone,profileimage
                FROM {$level} 
                WHERE email='{$email}';";
        // echo $query;
        // die();
       return mysqli_query($connection,$query);
    }

    public static function get_user_details($connection,$level,$email){
        $query="SELECT email,first_name,last_name,level,NIC,address,profileimage
                FROM {$level} 
                WHERE email='{$email}';";
        // echo $query;
        // die();
       return mysqli_query($connection,$query);
    }

    public static function parent_details($connection,$Bid){
        $query="SELECT * FROM boaderparent 
                WHERE Bid='{$Bid}';";
        // echo $query;
        // die();
       return mysqli_query($connection,$query);
    }



}
?>
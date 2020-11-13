<?php

class profile_model{

    public static function update_firstname($level,$first_name,$email,$connection)
    {
        $query="UPDATE {$level} SET first_name='{$first_name}' where email='{$email}'";
        return mysqli_query($connection,$query);
    }

    public static function update_lastname($level,$last_name,$email,$connection)
    {
        $query="UPDATE {$level} SET last_name='{$last_name}' where email='{$email}'";
        return mysqli_query($connection,$query);
    }

    public static function update_address($level,$address,$email,$connection)
    {
        $query="UPDATE {$level} SET address='{$address}' where email='{$email}'";
        return mysqli_query($connection,$query);
    }

    public static function b_postListByPerson($BOid,$connection)
    {
        $query="SELECT * FROM boarding_post 
                WHERE BOid=$BOid
                ORDER BY B_post_id desc;";

        mysqli_query($connection,$query);
    }


}


?>
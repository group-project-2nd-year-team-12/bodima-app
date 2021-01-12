<?php 
class chatModel{
    public static function getChat($connection,$email)
    {
        $query="SELECT * FROM livesupport WHERE user='{$email}' OR admin='{$email}'";
        $result_set=mysqli_query($connection,$query);
        return$result_set;

    }
    public static function setChat($connection,$email,$msg)
    {
        $query="INSERT INTO livesupport(user,message) VALUES ('{$email}','{$msg}')";
        $result_set=mysqli_query($connection,$query);
        return$result_set;

    }
}


?>
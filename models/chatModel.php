<?php 
class chatModel{
    public static function getChat($connection,$email)
    {
        $query="SELECT * FROM livesupport WHERE user='{$email}' OR admin='{$email}'";
        $result_set=mysqli_query($connection,$query);
        return$result_set;

    }
    public static function setChat($connection,$userEmail,$sender,$msg,$name)
    {
        $query="INSERT INTO livesupport(user,sender,message,sender_name) VALUES ('{$userEmail}','{$sender}','{$msg}','{$name}')";
        $result_set=mysqli_query($connection,$query);
        return$result_set;

    }

    public static function getChatUser($connection)
    {
        $query="SELECT * FROM livesupport GROUP BY user";
        $result_set=mysqli_query($connection,$query);
        return$result_set;

    }
}


?>
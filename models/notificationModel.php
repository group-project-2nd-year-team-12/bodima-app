<?php 
class notificationModel{
    public static function notificationOrderAccept($connection,$email,$title,$discription,$time,$type,$responce)
    {
        $query="INSERT INTO notification (email,title,discription,time,type,responce_url) 
        VALUES('{$email}','{$title}','{$discription}','{$time}','{$type}', '{$responce}')";
         $result=mysqli_query($connection,$query);
    }

    public static function notificationAll($connection,$email)
    {
        $query="SELECT * FROM notification WHERE email='{$email}' ORDER BY seen_state=0 DESC";
         $result=mysqli_query($connection,$query);
         return $result;
    }
    public static function notificationSeen($connection,$email,$noId)
    {
        $query="UPDATE notification SET seen_state=1  WHERE email='{$email}' AND noID=$noId";
         $result=mysqli_query($connection,$query);
       
    }
    public static function notificationResponce($connection,$email,$noId)
    {
        $query="SELECT responce_url FROM notification WHERE email='{$email}' AND noID=$noId";
         $result=mysqli_query($connection,$query);
       return $result;
    }
    


}



?>
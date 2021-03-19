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


    public static function notificationsAll2($connection,$email,$level,$id)
    {
        $query="SELECT * FROM notifications WHERE to_id=$id and to_level='{$level}' ORDER BY is_seen=0 ,sendDateTime DESC";
        // SELECT * FROM notifications WHERE to_id=37 and to_level='boarder' ORDER BY is_seen=0 DESC 
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
    

    // ****************************************************************************

    public static function insertnotification($connection,$type_number,$from_level,$from_id,$to_level,$to_id,$massageHeader,$massage,$redirect_url)
    {
        $query="INSERT INTO notifications(type_number,from_level,from_id,to_level,to_id,massageHeader,massage,redirect_url)
                VALUES($type_number,'{$from_level}',$from_id,'{$to_level}',$to_id,'{$massageHeader}','{$massage}','{$redirect_url}')";
// echo $query;
//         die(); 
                
        $result=mysqli_query($connection,$query);
        return $result;
    }


    public static function find_levelAndId($connection,$email){
        $query="select * from 
        (SELECT level,email,Bid as id FROM boarder 
        UNION 
        SELECT level,email,BOid as id FROM boardings_owner 
        UNION 
        (SELECT level,email,Reg_id as id FROM student WHERE user_accepted=1)) 
        as U WHERE email='{$email}'";
        // echo $query;
        // die(); 
       $result=mysqli_query($connection,$query);
       return $result;
            
    }

   
}



?>
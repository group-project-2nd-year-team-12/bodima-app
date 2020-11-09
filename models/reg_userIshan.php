<?php 

class reg_userIshan{
	//////////request
  public static function getReq($connection,$student_email,$id){
        $query="SELECT * FROM request WHERE student_email='{$student_email}' AND B_post_id=$id";
        $result=mysqli_query($connection,$query);
        return $result;
    }
///insert request
   public static function insertReq($connection,$student_email,$BOid,$B_post_id,$message){
   	$query = "INSERT INTO request (request_id ,student_email,BOid,B_post_id,message,isAccept,date) VALUES (NULL,'{$student_email}',$BOid,$B_post_id, '{$message}',0, CURRENT_TIMESTAMP) ";

   	$result=mysqli_query($connection,$query);
        return $result;

   }
   

   public static function SelectBOtemRequest($BOid,$connection)
     {
       $query="SELECT *  FROM request INNER JOIN boarding_post ON request.B_post_id=boarding_post.B_post_id WHERE request.BOid='{$BOid}' AND request.isAccept=0";
        $result=mysqli_query($connection,$query);
        return $result;
     }
///tempory accept for Boarding Owner
     public static function temAccBORequest($B_post_id,$student_email,$connection)
     {
        $query = "UPDATE request SET isAccept=1 WHERE student_email = '{$student_email}' AND B_post_id=$B_post_id";
        $result_set=mysqli_query($connection,$query);
       
     }
     //Reject for Boarding Owner
      public static function  temRejectBORequest($B_post_id,$student_email,$connection)
     {
         $query = "UPDATE request SET isAccept=2 WHERE student_email = '{$student_email}' AND B_post_id=$B_post_id";;
         $result_set=mysqli_query($connection,$query);
     }
     ///display student details

      public static function temBRequest($student_email,$connection)
     {
       $query="SELECT * FROM request  INNER JOIN boarding_post ON request.B_post_id=boarding_post.B_post_id WHERE isAccept=1 AND student_email='{$student_email}'";
           
        $result=$connection->query($query);
        return $result;
     }

     ///display confirm deal for boarding owner
     public static function SelectConBODeal($connection,$BOid)
     {
       $query="SELECT *  FROM request INNER JOIN boarding_post ON request.B_post_id=boarding_post.B_post_id WHERE request.BOid='{$BOid}' AND request.isAccept=3";
           
             $result=$connection->query($query);
             return $result;
     }


     ////accept the boarding deal =boarder
     public static function confirmDealAcc($B_post_id,$student_email,$connection)
    {
        $query="UPDATE request SET  isAccept=3 WHERE B_post_id=$B_post_id AND student_email='{$student_email}' AND isAccept=1";
        $result=mysqli_query($connection,$query);
        return $result;
    }

///reject the boarding deal=boarder
    public static function confirmDealRej($B_post_id,$student_email,$connection)
    {
        $query="UPDATE request SET  isAccept=4 WHERE B_post_id=$B_post_id AND student_email='{$student_email}' AND isAccept=1";
        $result=mysqli_query($connection,$query);
        return $result;
    }
        ////boarderge confirm deal eka accept kirima
     public static function  temchooseB($B_post_id,$student_email,$connection)
     {
         $query = "UPDATE request SET isAccept=5 WHERE student_email = '{$student_email}' AND B_post_id=$B_post_id";;
         $result_set=mysqli_query($connection,$query);
     }


}

 ?>
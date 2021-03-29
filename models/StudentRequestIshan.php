<?php 
class StudentRequestIshan{


	/////select pending details in student page
      public static function selectPendingRequest($student_email,$connection)
     {
       $query="SELECT * FROM
        request,
        boarding_post,
        boardings_owner 
        WHERE 
        request.B_post_id=boarding_post.B_post_id 
        AND request.BOid=boardings_owner.BOid 
        AND isAccept=0 
        AND student_email='{$student_email}' ORDER BY date DESC";
           
        $result=$connection->query($query);
        return $result;
     }


     /////////delete pending request
     ///if isAccept=5,cancel request
     public static function PendingrequestDelete($connection,$request_id){
        $query="UPDATE 
        request 
        SET 
        isAccept=5 
        WHERE 
        request_id='{$request_id}'";

        $result=mysqli_query($connection,$query);
        return $result;
     }

      public static function setTimeoutIshanSt($request_id,$connection){
        $query="UPDATE 
        request 
        SET 
        isAccept=6 
        WHERE 
        request_id='{$request_id}'";

        $result=mysqli_query($connection,$query);
        return $result;
     }

     

     /////select accept request in student page
      public static function AcceptRequest($student_email,$connection)
     {
       $query="SELECT * FROM 
       request,
       boarding_post,
       boardings_owner 
       WHERE 
       request.B_post_id=boarding_post.B_post_id 
       AND request.BOid=boardings_owner.BOid 
       AND isAccept=1 
       AND student_email='{$student_email}'";
           
        $result=$connection->query($query);
        return $result;
     }

     
      ////student accept the confirm boarding deal==accepted request
     public static function confirmDealAcc($request_id,$connection)
    {
        $query="UPDATE 
        request 
        SET  
        isAccept=3 
        WHERE 
        request_id='{$request_id}'";

        $result=mysqli_query($connection,$query);
        return $result;
    }


     /////////select confirm rent payment done
      /*public static function selectRPayD($connection,$student_email){
       
        $query="SELECT
         request.request_id,
         boarding_post.city,
         boarding_post.image, 
         boarding_post.house_num,
         boarding_post.lane,
         boardings_owner.first_name,
         boardings_owner.last_name,
         confirm_rent.payment_date,
         confirm_rent.B_post_id 
         FROM(((request
         INNER JOIN  boarding_post ON request.B_post_id=boarding_post.B_post_id)
         INNER JOIN boardings_owner ON request.BOid=boardings_owner.BOid)
         INNER JOIN confirm_rent ON request.BOid=confirm_rent.BOid)
         WHERE 
        request.student_email='{$student_email}'
        AND request.isAccept=3
        AND confirm_rent.is_paid=1 
        AND confirm_rent.payment_method='online' 
        LIMIT 1";

       $result=mysqli_query($connection,$query);
        return $result;
    }*/


    public static function selectRPayD($connection,$student_email){

//         $query = "SELECT 
//                 R.request_id as request_id,
//          P.city as city,
//          P.image as image, 
//          P.house_num as house_num,
//          P.lane as lane,
//          B.first_name as first_name,
//          B.last_name as last_name,
//          CR.payment_date as payment_date,
//          CR.B_post_id as B_post_id
// FROM request R
// LEFT JOIN boardings_owner B # Join owner
// ON R.BOid = B.BOid
// LEFT JOIN boarding_post P   # join post
// ON R.B_post_id = P.B_post_id
// LEFT JOIN confirm_rent CR   # join confirm_rent
// ON B.BOid = CR.BOid
// WHERE 
//     R.student_email = '$student_email' 
//     AND R.isAccept = 3
//     AND R.BOid = B.BOid
//     AND R.B_post_id = P.B_post_id
//     AND CR.is_paid = 1
//     AND CR.payment_method = 'online'
//     LIMIT 1";
        $query="SELECT 
        request.request_id,
        boarding_post.city,
        boarding_post.image, 
        boarding_post.house_num,
        boarding_post.lane,
        boardings_owner.first_name,
        boardings_owner.last_name,
        confirm_rent.payment_date,
        confirm_rent.B_post_id 
        FROM
        request,
        boarding_post,
        boardings_owner,
        confirm_rent 
        WHERE
        request.B_post_id=boarding_post.B_post_id 
        AND request.BOid=boardings_owner.BOid 
        AND request.request_id=confirm_rent.request_id 
        AND request.student_email='{$student_email}'
        AND request.isAccept=3
        AND confirm_rent.is_paid=1 
        AND confirm_rent.payment_method='online'";


       $result=mysqli_query($connection,$query);
        return $result;
    }

    ///////select boarder details

     public static function selectBorderid($connection,$st_email){
        $query="SELECT * FROM 
        boarder 
        WHERE 
        email='{$st_email}' ";

        $result=mysqli_query($connection,$query);
        return $result;
     }

/////////////////////meka poddak balanna

     //////////////////////select confirm rent Not Done student
     /* public static function selectRPayNotD($connection,$student_email){

    $query="SELECT 
        request.request_id,
        boarding_post.city,
        boarding_post.image, 
        boarding_post.house_num,
        boarding_post.lane,
        boardings_owner.first_name,
        boardings_owner.last_name,
        confirm_rent.B_post_id
         FROM(((request
         INNER JOIN  boarding_post ON request.B_post_id=boarding_post.B_post_id)
         INNER JOIN boardings_owner ON request.BOid=boardings_owner.BOid)
         INNER JOIN confirm_rent ON request.BOid=confirm_rent.BOid)
         WHERE
         request.isAccept=3
        AND request.student_email='{$student_email}'   
        AND confirm_rent.payment_method  IN ('cash','online') 
        AND confirm_rent.is_paid=0 ";


        $result=mysqli_query($connection,$query);
        return $result;
    }*/


    public static function selectRPayNotD($connection,$student_email){
              // $query = "SELECT 
              //   R.request_id,
              //    P.city,
              //    P.image, 
              //    P.house_num,
              //    P.lane,
              //    B.first_name,
              //    B.last_name,
              //   CR.B_post_id 
              
              //   FROM request R
              //   LEFT JOIN boardings_owner B # Join owner
              //   ON R.BOid = B.BOid
              //   LEFT JOIN boarding_post P   # join post
              //   ON R.B_post_id = P.B_post_id
              //   LEFT JOIN confirm_rent CR   # join confirm_rent
              //   ON B.BOid = CR.BOid
              //   WHERE 
              //   R.student_email = '$student_email' 
              //   AND R.isAccept = 3
              //   AND R.BOid = B.BOid
              //   AND R.B_post_id = P.B_post_id
              //   AND CR.is_paid = 0
              //   AND CR.payment_method  IN ('cash','online') 
              //   LIMIT 1";

        $query="SELECT 
                request.request_id,
                confirm_rent.B_post_id,
                boarding_post.city,
                boarding_post.image, 
                boarding_post.house_num,
                boarding_post.lane,
                 boardings_owner.first_name,
                 boardings_owner.last_name
               FROM request,
               confirm_rent,
               boarding_post,
               boardings_owner
               WHERE 
               request.request_id=confirm_rent.request_id 
               AND request.B_post_id=boarding_post.B_post_id
                AND request.BOid=boardings_owner.BOid
               AND request.isAccept=3
               AND request.student_email='{$student_email}'
               AND confirm_rent.is_paid=0 
               AND confirm_rent.payment_method IN('online','hand')";

           $result=mysqli_query($connection,$query);
        return $result;
    }



    /////select cancel request isAccept=5

    public static function selectcancelReq($connection,$student_email)
    {
        $query="SELECT * FROM 
        request,
        boarding_post 
        WHERE 
        request.B_post_id=boarding_post.B_post_id  
        AND request.student_email='{$student_email}' 
        AND isAccept=5 ";

           $result=mysqli_query($connection,$query);
        return $result;

    }

    ////when online payment is not success,then select cash handover
    public static function setHandover($connection,$request_id){
      $query="UPDATE 
      confirm_rent
      SET
      payment_method='hand'
      WHERE
      payment_method='online'
      AND request_id=$request_id";
      $result=mysqli_query($connection,$query);
      return $result;

    }

    ///////delete boarder data because online payment is successfull
    public static function deleteconfirm($connection,$request_id){
      $query="DELETE FROM
      confirm_rent 
      WHERE
      request_id=$request_id";
      $result=mysqli_query($connection,$query);
    }
    public static function deleteboaParent($connection,$Bid){
      $query="DELETE FROM
     boarderparent
      WHERE
      Bid=$Bid";
      $result=mysqli_query($connection,$query);
    }
    public static function deleteboarder($connection,$Bid){
      $query="DELETE FROM
      boarder
      WHERE
      Bid=$Bid";
      $result=mysqli_query($connection,$query);
    }

public static function UpdateCtoAReq($connection,$request_id){
  $query="UPDATE 
  request
  SET 
  isAccept=1
  WHERE 
  request_id=$request_id";
  $result=mysqli_query($connection,$query);
}



public static function selectReqTime($connection){

$query="SELECT date FROM request WHERE isAccept IN (0,1,3);";
 $result=mysqli_query($connection,$query);
 return $result;

}

// public static function updateReqTimeOut($connection){


//   $query="UPDATE 
//                 request
//                 SET 
//                 isAccept=6
//                 WHERE isAccept IN (0,1,8)";
//                 $result=mysqli_query($connection,$query);
// }






}


 ?>
<?php 


class BOwnerReqIshan{


     /////select new request  details in boarding owner page 
      public static function selectnewRequest($BOid,$connection)
     {
       $query="SELECT * FROM 
       request,
       boarding_post,
       student 
       WHERE 
       request.B_post_id=boarding_post.B_post_id 
       AND request.student_email=student.email 
       AND request.isAccept=0 
       AND request.BOid='{$BOid}'";
           
        $result=$connection->query($query);
        return $result;
     }


      ///////////select my Boarders
    public static function selectMyBordersBO($connection,$BOid){

// $query = "SELECT 
//           B.first_name,
//           B.gender,
//           B.NIC,
//           B.telephone,
//           B.institute,
//           CR.B_post_id,
//           CR.keymoneyAmount,
//           CR.payment_date,
//           CR.rent_id
//           FROM boardings_owner BO #Boardig owner
//           LEFT JOIN confirm_rent CR #Join confirm rent
//       ON CR.BOid = BO.BOid
//             LEFT JOIN boarder B #Join boarder
//               ON B.Bid = CR.Bid
//           WHERE 
//           BO.BOid= '$BOid'";
          $query="SELECT 
          request.request_id ,
          boarder.first_name,
          boarder.gender,
          boarder.NIC,
          boarder.telephone,
          boarder.institute,
          confirm_rent.B_post_id,
          confirm_rent.keymoneyAmount,
          confirm_rent.payment_date,
          confirm_rent.rent_id
         
          FROM 
          request ,
          boarder,
          confirm_rent
         
          WHERE 
          request.student_email=boarder.email 
          AND request.request_id=confirm_rent.request_id  
          AND boarder.user_accepted=1 
          AND confirm_rent.is_paid=1 
          AND confirm_rent.BOid=$BOid";

            $result=mysqli_query($connection,$query);
            return $result;

    }

     ///////////select my Boarders
    public static function selectMyBordersBOPaynot($connection,$BOid){

          $query="SELECT 
          request.request_id ,
          request.student_email,
          boarder.first_name,
          boarder.gender,
          boarder.NIC,
          boarder.telephone,
          boarder.institute,
          confirm_rent.B_post_id,
          confirm_rent.keymoneyAmount,
          confirm_rent.payment_date,
          confirm_rent.rent_id
         
          FROM 
          request ,
          boarder,
          confirm_rent
         
          WHERE 
          request.student_email=boarder.email 
          AND request.request_id=confirm_rent.request_id  
          AND boarder.user_accepted=0 
          AND confirm_rent.is_paid=0
          AND confirm_rent.payment_method IN ('online','hand')
          AND confirm_rent.BOid=$BOid";
          
            $result=mysqli_query($connection,$query);
            return $result;

    }

    ////////student interface to boarder Homepage
     public static function updateStTOBorderByBO($connection,$request_id){
        $query="UPDATE 
        boarder b 
        JOIN 
        student s 
        ON (b.email=s.email)
        JOIN
        confirm_rent c
        ON b.Bid=c.Bid 
        SET 
        b.user_accepted=1 ,
        s.user_accepted=3,
        c.payment_date=now(),
        c.is_paid=1
        WHERE 
        b.user_accepted=0 
        AND s.user_accepted=1
        AND c.is_paid=0
        AND c.request_id='{$request_id}' ";

         $result=mysqli_query($connection,$query);
         return $result;
     }
     

} ?>
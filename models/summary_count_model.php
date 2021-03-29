<?php require_once ('../config/database.php');

class summary_count_model{

    public static function Notification_count($connection,$to_id,$tolevel){
        $query="SELECT count(notify_id) AS notification FROM notifications WHERE to_level='{$tolevel}' AND to_id='{$to_id}'";
        // echo $query;
        // die();
        $result=mysqli_query($connection,$query);
        return $result;
    }


    public static function newRequest_count($connection,$BOid){
        $query="SELECT COUNT(request_id) AS newRequest FROM `request` WHERE BOid=$BOid and isAccept=0";
        // echo $query;
        // die();
        $result=mysqli_query($connection,$query);
        return $result;
    }


    public static function boarder_count($connection,$BOid){
        $query="SELECT count(rent_id) As boarders FROM `confirm_rent` WHERE BOid=$BOid and is_paid=1";
        // echo $query;
        // die();
        $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function myAdvertisement_BO_count($connection,$BOid){
        $query="SELECT count(*) AS my_Advertisements FROM `boarding_post` WHERE BOid=$BOid AND CURRENT_TIMESTAMP BETWEEN create_time and create_time +INTERVAL boarding_post.lifespan DAY  ";
        // echo $query;
        // die();
        $result=mysqli_query($connection,$query);
        return $result;
    }


    public static function duePayments_count($connection,$BOid,$Bid){ //boarder

        $query="SELECT DATEDIFF(SUBSTRING(CURRENT_TIMESTAMP, 1,10), SUBSTRING((SELECT concat(year,'/',month,'/1') as date FROM `payfee` WHERE Bid={$Bid} and BOid={$BOid} order by year DESC ,month DESC limit 1), 1,10)) / 30.436875 as diff";
        // $query="SELECT year,month FROM `payfee` WHERE Bid={$Bid} and BOid={$BOid} order by year DESC ,month DESC limit 1";
        $result=mysqli_query($connection,$query);

        if(mysqli_num_rows($result)>0){
            return $result;
        }else{
            $query2=" SELECT DATEDIFF(SUBSTRING(CURRENT_TIMESTAMP, 1,10), SUBSTRING((SELECT payment_date FROM `confirm_rent` WHERE Bid={$Bid} and BOid={$BOid} and is_paid=1 order by rent_id DESC ,payment_date DESC limit 1), 1,10)) / 30.436875 as diff";
            // $query2="SELECT payment_date FROM `confirm_rent` WHERE Bid={$Bid} and BOid={$BOid} and is_paid=1 order by rent_id DESC ,payment_date DESC limit 1";
            $result=mysqli_query($connection,$query);
            return $result;
        }
    }


    public static function proccesingfood_count($connection,$email){ //boarder
        $query="SELECT count(*) AS delivaring FROM food_request WHERE email='{$email}' and is_accepted=4";
        // echo $query;
        // die();
        $result=mysqli_query($connection,$query);
        return $result;
    }


    public static function newOrders_count($connection,$FSid){ //food supplier
        $query="SELECT count(*) as new_order FROM food_request 
        inner JOIN food_post  
        on food_request.F_post_id=food_post.F_post_id
        where food_post.FSid=$FSid and food_request.is_accepted=0";
        //    echo $query;
        //         die();
        $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function deliveringState_count($connection,$FSid){ //food supplier
        $query="SELECT count(*) as to_deliver FROM food_request 
                inner JOIN food_post  
                on food_request.F_post_id=food_post.F_post_id
                where food_post.FSid=$FSid and food_request.is_accepted=3";
        $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function Requests_count($connection,$email){ //user
        $query="SELECT count(*) AS requests FROM `request` WHERE student_email='{$email}' and (isAccept=0 or isAccept=1);";
        // echo $query;
        // die();
        $result=mysqli_query($connection,$query);
        return $result;
    }


    public static function Accepted_count($connection,$email){ //user
        $query="SELECT count(*) AS accepted FROM `request` WHERE student_email='{$email}' and isAccept=1;";
        // echo $query;
        // die();
        $result=mysqli_query($connection,$query);
        return $result;
    }

}



?>
<?php 
class foodpostviewN_model{
    //$connect >> $connection

public static function foodpost_details($connection){
    $user_blocked=2;
    $user_notaccepted=0;
    $post_bloced=1;
$query="SELECT f.F_post_id, f.FSid, f.ad_title, f.description, f.address, f.location, f.type, f.rating, f.orderingtimedeadline,f.lifespan, f.post_amount, f.image ,fs.user_accepted,fs.available,f.blocked
        FROM `food_post` AS f 
        LEFT JOIN food_supplier as fs
        ON f.FSid=fs.FSid
        WHERE (fs.user_accepted NOT  IN($user_blocked,$user_notaccepted))
        AND f.blocked NOT IN($post_bloced)
        ORDER BY fs.available DESC";
// echo $query;
// die();
$result = mysqli_query($connection, $query);
return $result;
}


}
?>
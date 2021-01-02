<?php 

class boarder_list_modelN{
												//$connect >> $connection

  	public static function all_boarderlist_of_owner($connection,$BOid){

        $query="SELECT DISTINCTROW bT.Bid, confirm_rent.BOid,CONCAT(Bpt.house_num, ', ', Bpt.lane, ', ', Bpt.city) as Bp_address,confirm_rent.B_post_id, bT.first_name, bT.last_name, bT.address, bT.location_link, bT.NIC, bT.image, bT.institute ,bT.gender ,bT.telephone ,bT.user_accepted ,bT.profileimage 
        FROM boarder As bT
        INNER JOIN confirm_rent ON bT.Bid = confirm_rent.Bid
        INNER JOIN boarding_post AS BpT ON BpT.B_post_id = confirm_rent.B_post_id
        WHERE confirm_rent.BOid=3";
        // echo $query;
        // die();
        $result = mysqli_query($connection, $query);
			return $result;
      }


      public static function search_boarder_in_list($connection,$qry,$BOid){

        $search = mysqli_real_escape_string($connection,$qry);
        $query="SELECT bT.Bid, confirm_rent.BOid, bT.first_name, bT.last_name, bT.address, bT.location_link, bT.NIC, bT.image, bT.institute ,bT.gender ,bT.telephone ,bT.user_accepted ,bT.profileimage 
        FROM boarder As bT 
        INNER JOIN confirm_rent ON bT.Bid = confirm_rent.Bid 
        WHERE confirm_rent.BOid=3
        AND (bT.first_name LIKE '%na%' 
             OR bT.last_name LIKE '%na%'
             OR bT.address LIKE '%na%'
             OR bT.gender LIKE '%na%'
             OR bT.telephone LIKE '%na%'
             OR bT.profileimage LIKE '%na%'
             OR bT.image LIKE '%na%'
            )";
        // echo $query;
        // die();
        $result = mysqli_query($connection, $query);
			return $result;
      }

      public static function boader_join_postConfirmdeal($connection,$Bid){

        $query="SELECT DISTINCTROW bT.Bid, confirm_rent.BOid,CONCAT(Bpt.house_num, ', ', Bpt.lane, ', ', Bpt.city) as Bp_address,confirm_rent.B_post_id, bT.first_name, bT.last_name, bT.address, bT.location_link, bT.NIC, bT.image, bT.institute ,bT.gender ,bT.telephone ,bT.user_accepted ,bT.profileimage 
        FROM boarder As bT
        INNER JOIN confirm_rent ON bT.Bid = confirm_rent.Bid
        INNER JOIN boarding_post AS BpT ON BpT.B_post_id = confirm_rent.B_post_id
        WHERE bT.Bid=$Bid";
        // echo $query;
        // die();
        $result = mysqli_query($connection, $query);
			return $result;
      }



    }

    ?>


  <!-- SELECT DISTINCTROW bT.Bid, confirm_rent.BOid,confirm_rent.B_post_id, bT.first_name, bT.last_name, bT.address, bT.location_link, bT.NIC, bT.image, bT.institute ,bT.gender ,bT.telephone ,bT.user_accepted ,bT.profileimage ,CONCAT(Bpt.house_num, ", ", Bpt.lane, ", ", Bpt.city) as Bp_address
FROM boarder As bT
INNER JOIN confirm_rent ON bT.Bid = confirm_rent.Bid
INNER JOIN boarding_post AS BpT ON BpT.B_post_id = confirm_rent.B_post_id
WHERE confirm_rent.BOid=3 -->


<!-- SELECT DISTINCTROW bT.Bid, confirm_rent.BOid,CONCAT(Bpt.house_num, ', ', Bpt.lane, ', ', Bpt.city) as Bp_address,confirm_rent.B_post_id, bT.first_name, bT.last_name, bT.address, bT.location_link, bT.NIC, bT.image, bT.institute ,bT.gender ,bT.telephone ,bT.user_accepted ,bT.profileimage 
        FROM boarder As bT
        INNER JOIN confirm_rent ON bT.Bid = confirm_rent.Bid
        INNER JOIN boarding_post AS BpT ON BpT.B_post_id = confirm_rent.B_post_id
        WHERE bT.Bid=38 -->
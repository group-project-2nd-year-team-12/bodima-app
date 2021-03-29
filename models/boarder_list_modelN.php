<?php //An

class boarder_list_modelN{
												

  	public static function all_boarderlist_of_owner($connection,$BOid){

        $query="SELECT DISTINCTROW bT.Bid, confirm_rent.BOid,CONCAT(Bpt.house_num, ', ', Bpt.lane, ', ', Bpt.city) as Bp_address,confirm_rent.B_post_id, bT.first_name, bT.last_name, bT.address, bT.location_link, bT.NIC, bT.image, bT.institute ,bT.gender ,bT.telephone ,bT.user_accepted ,bT.profileimage 
        FROM boarder As bT
        INNER JOIN confirm_rent ON bT.Bid = confirm_rent.Bid
        INNER JOIN boarding_post AS BpT ON BpT.B_post_id = confirm_rent.B_post_id
        WHERE confirm_rent.BOid=$BOid";
        $result = mysqli_query($connection, $query);
			return $result;
      }


      public static function search_boarder_in_list($connection,$qry,$BOid)
      {
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
        $result = mysqli_query($connection, $query);
			return $result;
      }


      public static function boader_join_postConfirmdeal($connection,$Bid)
      {
        $query="SELECT DISTINCTROW bT.Bid, confirm_rent.BOid,CONCAT(Bpt.house_num, ', ', Bpt.lane, ', ', Bpt.city) as Bp_address,confirm_rent.B_post_id, bT.first_name, bT.last_name, bT.address, bT.location_link, bT.NIC, bT.image, bT.institute ,bT.gender ,bT.telephone ,bT.user_accepted ,bT.profileimage 
        FROM boarder As bT
        INNER JOIN confirm_rent ON bT.Bid = confirm_rent.Bid
        INNER JOIN boarding_post AS BpT ON BpT.B_post_id = confirm_rent.B_post_id
        WHERE bT.Bid=$Bid";
        $result = mysqli_query($connection, $query);
			return $result;
      }


      public static function insert_payfee($connection,$Bid,$BOid,$year,$month,$amount,$cashcard)
      {
        $query="INSERT INTO `payfee` (`Bid`, `BOid`, `year`, `month`, `amount`, `cash_card`) 
                VALUES ('{$Bid}', '{$BOid}', '{$year}', '{$month}', '{$amount}',  '{$cashcard}');";
        $result = mysqli_query($connection, $query);
      }
      

      public static function select_payfee($connection,$Bid,$BOid){

        $query="SELECT * FROM `payfee` WHERE Bid={$Bid} and BOid={$BOid} order by year DESC ,month DESC";
        $result = mysqli_query($connection, $query);
        return $result;
      }

      
      public static function get_last_paymonth($connection,$Bid,$BOid)
      {
        $query="SELECT year,month FROM `payfee` WHERE Bid={$Bid} and BOid={$BOid} order by year DESC ,month DESC limit 1";
        $result = mysqli_query($connection, $query);
        return $result;
      }


      public static function get_dealed_date($connection,$Bid,$BOid)
      {
        $query="SELECT payment_date FROM `confirm_rent` WHERE Bid={$Bid} and BOid={$BOid} and is_paid=1 order by rent_id DESC ,payment_date DESC limit 1";
        // echo $query;
        // die();
        $result = mysqli_query($connection, $query);
        return $result;
      }


      public static function get_rent_amount($connection,$Bid,$BOid)
      {
        $query="SELECT cost_per_person FROM `boarding_post` 
        WHERE B_post_id =(SELECT B_post_id FROM `confirm_rent` 
        WHERE Bid=$Bid AND BOid=$BOid
        ORDER BY payment_date DESC LIMIT 1)";
        $result = mysqli_query($connection, $query);
        return $result;
      }


      public static function set_notification($connection,$from_BOid,$to_Bid,$date,$occurance,$massage)
      {
        $query="INSERT INTO set_notification (`from_BOid`, `to_Bid`, `deadline_date`, `occurance`, `massage`)
        VALUES ({$from_BOid},{$to_Bid},'{$date}','{$occurance}','{$massage}')";
        $result = mysqli_query($connection, $query);
        return $result;
      }



     

    }

    ?>


 
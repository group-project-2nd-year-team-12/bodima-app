<?php //An

class pay_rent_modelN{

      public static function select_payfee($connection,$Bid,$BOid)
      {
          $query="SELECT * FROM `payfee` WHERE Bid={$Bid} and BOid={$BOid} order by year DESC ,month DESC";
          $result = mysqli_query($connection, $query);
                return $result;
      }


      public static function get_BOid($connection,$Bid)
      {
        $query=" SELECT BOid FROM `confirm_rent` WHERE Bid=$Bid order by payment_date DESC LIMIT 1";
        $result = mysqli_query($connection, $query);
              return $result;
      }


      public static function get_last_paymonth($connection,$Bid,$BOid)
      {
        $query="SELECT year,month FROM `payfee` WHERE Bid={$Bid} and BOid={$BOid} order by year DESC ,month DESC limit 1";
        $result = mysqli_query($connection, $query);
              return $result;
      }


      public static function get_BO_details($connection,$Bid)
      {
        $query="SELECT BOid, first_name, last_name,NIC,account_no FROM boardings_owner 
        WHERE BOid =(SELECT BOid FROM `confirm_rent` WHERE Bid=$Bid order by payment_date DESC LIMIT 1)";
        $result = mysqli_query($connection, $query);
              return $result;
      }


      public static function get_costPerPerson($connection,$Bid)
      {
        $query="SELECT cost_per_person from boarding_post 
                WHERE B_post_id=(SELECT B_post_id 
                            FROM confirm_rent 
                            WHERE Bid=$Bid and is_paid=1 
                            ORDER BY rent_id LIMIT 1)";
        $result = mysqli_query($connection, $query);
              return $result;
      } 
   
   
      public static function insert_payfee($connection,$Bid,$BOid,$year,$month,$amount,$cashcard)
      {
              $query="INSERT INTO `payfee` (`Bid`, `BOid`, `year`, `month`, `amount`, `cash_card`) 
                      VALUES ('{$Bid}', '{$BOid}', '{$year}', '{$month}', '{$amount}',  '{$cashcard}');";
              $result = mysqli_query($connection, $query);
        }
     
}

?>
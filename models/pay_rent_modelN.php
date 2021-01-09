<?php

class pay_rent_modelN{

    public static function select_payfee($connection,$Bid,$BOid){

        $query="SELECT * FROM `payfee` WHERE Bid={$Bid} and BOid={$BOid} order by year DESC ,month DESC";
        // echo $query;
        // die();
        $result = mysqli_query($connection, $query);
        return $result;
      }


      public static function get_BOid($connection,$Bid){

        $query=" SELECT BOid FROM `confirm_rent` WHERE Bid=$Bid order by payment_date DESC LIMIT 1";
        // echo $query;
        // die();
        $result = mysqli_query($connection, $query);
        return $result;
      }

      public static function get_last_paymonth($connection,$Bid,$BOid){

        $query="SELECT year,month FROM `payfee` WHERE Bid={$Bid} and BOid={$BOid} order by year DESC ,month DESC limit 1";
        // echo $query;
        // die();
        $result = mysqli_query($connection, $query);
        return $result;
      }


      
     
}

?>
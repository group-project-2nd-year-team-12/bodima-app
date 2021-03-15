<?php

class BOwner_reports_Model{

    // public static function all_payments_default($connection,$BOid){
    //     $query="SELECT p.payid, p.Bid,b.first_name, p.BOid,p.year,p.month, p.amount,p.paidDateTime,'cash/card',c.B_post_id 
    //             FROM boarder as b
    //             LEFT JOIN  `payfee` as p
    //             ON p.Bid=b.Bid 
    //             INNER JOIN confirm_rent as c
    //             ON c.Bid=p.Bid";

    //      $query.= " WHERE p.BOid=$BOid
    //             ORDER BY p.paidDateTime DESC;";

    //     echo $query;
    //     die();
    //    return mysqli_query($connection,$query);
    // }


    public static function payments_filter($connection,$BOid,$sortcontext,$DESC_ASC,$Bid,$fromdate,$todate,$postno,$method){
        $query="SELECT p.payid, p.Bid,b.first_name,b.last_name, p.BOid,p.year,p.month, p.amount,p.paidDateTime,cash_card,c.B_post_id 
                FROM boarder as b
                LEFT JOIN  `payfee` as p
                ON p.Bid=b.Bid 
                INNER JOIN confirm_rent as c
                ON c.Bid=p.Bid 
                WHERE p.BOid=$BOid";
        if($Bid!='all'){
            $query.=" AND p.Bid=$Bid";
        }
        if($fromdate>0 && $todate>0){
                $query.=" AND (paidDateTime between '{$fromdate}' AND '{$todate}')";
        }
        if($postno>0){
            $query.=" AND (B_post_id =$postno)";
        }
        if($method!='all'){
            $query.=" AND (cash_card='{$method}')";
        }
         $query.= " ORDER BY $sortcontext $DESC_ASC;";

     
        return mysqli_query($connection,$query);
        // if(mysqli_num_rows($res)){
        //    return $res;
        // }else{
        //     return 0;
        // }

        // echo $query; 
        // die();
        
    }



    public static function boarder_namelist_BOwner($connection,$BOid){
        $query="SELECT DISTINCTROW bT.Bid, bT.first_name, bT.last_name 
        FROM boarder As bT
        INNER JOIN confirm_rent ON bT.Bid = confirm_rent.Bid
        INNER JOIN boarding_post AS BpT ON BpT.B_post_id = confirm_rent.B_post_id
        WHERE confirm_rent.BOid=$BOid";
        // echo $query;
        // die();
        $result = mysqli_query($connection, $query);
			return $result;
    }

    public static function postlist_BOwner($connection,$BOid){

        $query="SELECT DISTINCTROW confirm_rent.B_post_id 
        FROM boarder As bT
        INNER JOIN confirm_rent ON bT.Bid = confirm_rent.Bid
        INNER JOIN boarding_post AS BpT ON BpT.B_post_id = confirm_rent.B_post_id
        WHERE confirm_rent.BOid=$BOid";
        // echo $query;
        // die();
        $result = mysqli_query($connection, $query);
			return $result;
      }
}
?>
 
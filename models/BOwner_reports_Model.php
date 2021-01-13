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

        // echo $query;
        // die();
       return mysqli_query($connection,$query);
    }
}
?>
 
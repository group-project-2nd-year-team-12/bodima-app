<?php
    session_start();
    require_once ('../config/database.php');
    require_once ('../models/pay_rent_modelN.php');
    


    if(isset($_GET['id'])){

        $Bid=$_SESSION['Bid'];
        $BOidx=pay_rent_modelN::get_BOid($connection,$Bid);
        $BOidarr=mysqli_fetch_assoc($BOidx);
        $BOid=$BOidarr['BOid'];
        // print_r($BOid);
        $paymentdetails=pay_rent_modelN::select_payfee($connection,$Bid,$BOid);

        if(mysqli_num_rows($paymentdetails)>0){
            while($row=mysqli_fetch_assoc($paymentdetails)){
                $data[]=$row;
                echo '<br/><br/>';
                // print_r($row);
            }
            $paymentdetails=serialize($data);
        }
     
// ******************month list genarate***************************************************************
        $last=pay_rent_modelN::get_last_paymonth($connection,$Bid,$BOid);
        $lastpay=mysqli_fetch_assoc($last);

        print_r($lastpay);


        $y=$lastpay['year'];
        $m=date("m", mktime(0,0,0,$lastpay['month']+1,0,0));
        $date3=$y.'-'.$m.'-01';
        echo $date3."<br>";

        $d1=strtotime($date3);
        $d2 = strtotime(date('Y-m-d'));
        $totalSecondsDiff = abs($d1-$d2); 
        $totalMonthsDiff  = $totalSecondsDiff/60/60/24/30;
        echo $totalMonthsDiff;
        $monthgap=intval($totalMonthsDiff);//truncate decimal points of monthdiff
        echo ' | '.$monthgap.'  <br>';

        while($monthgap>0){
            $d1=strtotime('+1 month', $d1);
            $month = date('Y F', $d1);
            echo $month.'<br>';
            $output[] = [
                'time' => $d1,
                'month' => $month
                
            ];
            $monthgap=$monthgap-1;
        }
    
        $monthlist=serialize($output); 
   
// ***********************************************************************************************

        header('Location:../views/payment_history1.php?pay='.$paymentdetails.'&months='.$monthlist);
    }




?>
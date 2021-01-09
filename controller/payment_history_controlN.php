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
                print_r($row);
            }
            $paymentdetails=serialize($data);
        }
     
// ******************month list genarate***************************************************************
        $last=pay_rent_modelN::get_last_paymonth($connection,$Bid,$BOid);
        $lastpay=mysqli_fetch_assoc($last);
        print_r($lastpay);
            $y=$lastpay['year'];
            $m=$lastpay['month'];
            $date3 =$y.'-'.$m.'-01';
            echo $date3;
            $date1  = '2013-11-15';
            $date2  = date('Y-m-d');
            $output = [];
            $time   = strtotime($date3);
            $last   = date('Y F', strtotime($date2));
            $time = strtotime('+1 month', $time);

            do {
                $month = date('Y F', $time);
                
                $output[] = [
                    'time' => $time,
                    'month' => $month
                    
                ];
                $x=$month;
                echo '  <br/>'.$x;

                $time = strtotime('+1 month', $time);
            } while ($month != $last);

            $monthlist=serialize($output);  
// ***********************************************************************************************

        header('Location:../views/payment_history1.php?pay='.$paymentdetails.'&months='.$monthlist);
    }




?>
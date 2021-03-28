<!-- an -->
<?php
    session_start();
    require_once ('../config/database.php');
    require_once ('../models/pay_rent_modelN.php');
    

if(isset($_GET['id']))
{

        $Bid=$_SESSION['Bid'];
        $BOidx=pay_rent_modelN::get_BO_details($connection,$Bid);
        $BOidarr=mysqli_fetch_assoc($BOidx);
        $BOid=$BOidarr['BOid'];
        $BOidarray=serialize($BOidarr);  
        print_r($BOidarr);
        echo "<br><br><br>";
        
    // ******************month list genarate***************************************************************
        $last=pay_rent_modelN::get_last_paymonth($connection,$Bid,$BOid);
        $lastpay=mysqli_fetch_assoc($last);
        
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

        while($monthgap>0)
        {
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

        $cpparr=pay_rent_modelN::get_costPerPerson($connection,$Bid);
        $cppval=mysqli_fetch_assoc($cpparr);
        $cppv=serialize($cppval);
 
    // ***********************************************************************************************
    header('Location:../views/New_payment1.php?BOd='.$BOidarray.'&months='.$monthlist.'&cppv='.$cppv);
  
}


// online payment -payhere
if (isset($_GET['success']))
{
    echo 'payment done';
    if(isset($_GET['order_id']))
    {
        $BOid=$_GET['order_id'];
        echo $BOid;
        $Bid=$_GET['B'];
        $BOid=$_GET['BO'];
        $year=$_GET['y'];
        $month=date('n', strtotime($_GET['m']));
        $amount=$_GET['a'];
        $cashcard=$_GET['c'];
        pay_rent_modelN::insert_payfee($connection,$Bid,$BOid,$year,$month,$amount,$cashcard);

        header("location:../controller/payment_history_controlN.php?id=1");
    }
}




?>
<?php
    session_start();
    require_once ('../config/database.php');
    require_once ('../models/boarder_list_modelN.php');
    require_once ('../models/profile_modelN.php');

if(isset($_GET['Bid'])){
    $Bid=$_GET['Bid'];
    $details=boarder_list_modelN::boader_join_postConfirmdeal($connection,$Bid);
    $valset=mysqli_fetch_assoc($details);
    $details=serialize($valset);
    

    $parent_detail=profile_modelN::parent_details($connection,$Bid);
    $valset2=mysqli_fetch_assoc($parent_detail);
    $parent_detail=serialize($valset2);

    // boarder_list_modelN::insert_payfee($connection,$Bid,$BOid,$year,$month,$amount,$cashcard);
    // boarder_list_modelN::insert_payfee($connection,5,5,2005,5,5050,'cash');
   
    $BOid=$_SESSION['BOid'];

    $paydetail=boarder_list_modelN::select_payfee($connection,$Bid,$BOid);

    if(mysqli_num_rows($paydetail)>0){

        while($row=mysqli_fetch_assoc($paydetail)){
            $data[]=$row;
            echo '<br/><br/>';
            print_r($row);
        }
        $payments=serialize($data);
    }

    $last=boarder_list_modelN::get_last_paymonth($connection,$Bid,$BOid);
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
    // print_r($pay);

    header('Location:../views/boarder_inside_details1.php?details='.$details.'&parent='.$parent_detail.'&pay='.$payments.'&months='.$monthlist);
}

?>
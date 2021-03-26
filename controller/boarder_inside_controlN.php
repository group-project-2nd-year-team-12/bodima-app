<!-- an -->
<?php   session_start();
        require_once ('../config/database.php');
        require_once ('../models/boarder_list_modelN.php');
        require_once ('../models/profile_modelN.php');


// supply details to view 
        
if(isset($_GET['Bid']))
{
    $Bid=$_GET['Bid'];
    $details=boarder_list_modelN::boader_join_postConfirmdeal($connection,$Bid);
    $valset=mysqli_fetch_assoc($details);
    $details=serialize($valset);
    

    $parent_detail=profile_modelN::parent_details($connection,$Bid);
    $valset2=mysqli_fetch_assoc($parent_detail);
    $parent_detail=serialize($valset2);


    $BOid=$_SESSION['BOid'];
    $paydetail=boarder_list_modelN::select_payfee($connection,$Bid,$BOid);
    if(mysqli_num_rows($paydetail)>0)
    {
        while($row=mysqli_fetch_assoc($paydetail))
        {
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
            $date2  = date('Y-m-d');
            $output = [];
            $time   = strtotime($date3);
            $last   = date('Y F', strtotime($date2));
            $time = strtotime('+1 month', $time);

            while ($month < $last){
                $month = date('Y F', $time);
                
                $output[] = [
                    'time' => $time,
                    'month' => $month
                    
                ];
                $x=$month;
                echo '  <br/>'.$time;

                $time = strtotime('+1 month', $time);
            }

            $monthlist=serialize($output);


    $rentamount=boarder_list_modelN::get_rent_amount($connection,$Bid,$BOid);
    $amount=serialize(mysqli_fetch_assoc($rentamount));

    //set notification
    if(isset($_POST['set'])){
        $from_BOid=$_SESSION['BOid'];
        $to_Bid=$valset['Bid'];
        $date=date('Y-m-d',strtotime($_POST['calendar']));
        $occurance=$_POST['occure'];
        $massage=$_POST['mssage'];
        boarder_list_modelN::set_notification($connection,$from_BOid,$to_Bid,$date,$occurance,$massage);
    }

    header('Location:../views/boarder_inside_details1.php?details='.$details.'&parent='.$parent_detail.'&pay='.$payments.'&months='.$monthlist.'&amount='.$amount);
}




// payment handover
if(isset($_POST['paidurl']))
{
        $Bid=$_POST['Bid'];
        $year=intval(substr($_POST['setdate'],0,4));
        $month=date('m',strtotime(substr($_POST['setdate'],5)));
        $amount=$_POST['amount'];
        $BOid=$_SESSION['BOid'];
        boarder_list_modelN::insert_payfee($connection,$Bid,$BOid,$year,$month,$amount,'cash');

        header('Location:boarder_inside_controlN.php?Bid='.$Bid);

}





?>
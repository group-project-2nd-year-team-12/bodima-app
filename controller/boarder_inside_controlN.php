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
        $flag['fee']=1;
    }else{
        $flag['fee']=0;
    }


    //month genarate- by last pay month
    $last=boarder_list_modelN::get_last_paymonth($connection,$Bid,$BOid);
    
    if(mysqli_num_rows($last)>0)
    {
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
            $month = date('Y F', $time);

            $count=0;
            $xflag=0;
            while ($month < $last)
            {
                $month = date('Y F', $time);
                $count=$count+1;
                if($month==date('Y F') && $xflag==0){
                    $xflag=1;
                    $output[] = [
                        'time' => $time,
                        'month' => $month  
                    ];
                  }else  if($month!=date('Y F') & $xflag==0 & $count>0){
                    $output[] = [
                        'time' => $time,
                        'month' => $month  
                    ];
                  }else{
                    $output[] = [
                        'time' => "over",
                        'month' => "over"  
                    ];
                  }
               
                
                $x=$month;

                $time = strtotime('+1 month', $time);
            }

            if($month == $last && $count==0){
                $output[] = [
                    'time' => "over",
                    'month' => date('Y F')
                ];
            }
            // ******************print********
            print_r($output);


            // *******************************
            $monthlist=serialize($output);
            $flag['months']=1;
    }else{
        $flag['months']=0;

    }



    $rent_dealed=boarder_list_modelN::get_dealed_date($connection,$Bid,$BOid);
    if($flag['months']==0)
    {
        if(mysqli_num_rows($rent_dealed)>0)
        {
                $deal_date=mysqli_fetch_assoc($rent_dealed);
                $dealdate=date("Y F",strtotime(substr($deal_date['payment_date'],0,10)));
                $y=date("Y",strtotime(substr($deal_date['payment_date'],0,10)));
                $m=date("m",strtotime(substr($deal_date['payment_date'],0,10)));
                $date3 =$y.'-'.$m.'-01';
                echo $date3;
                $date2  = date('Y-m-d');
                $output = [];
                $time   = strtotime($date3);
                $last   = date('Y F', strtotime($date2));
                // $time = strtotime('+1 month', $time);
                $month = date('Y F', $time);

                $count=0;
                $xflag=0;
                while ($month < $last)
                {
                    $month = date('Y F', $time);
                    $count=$count+1;
                    if($month==date('Y F') && $xflag==0){
                        $xflag=1;
                        $output[] = [
                            'time' => $time,
                            'month' => $month  
                        ];
                    }else  if($month!=date('Y F') & $xflag==0 & $count>0){
                        $output[] = [
                            'time' => $time,
                            'month' => $month  
                        ];
                    }else{
                        $output[] = [
                            'time' => "over",
                            'month' => "over"  
                        ];
                    }
                
                    
                    $x=$month;

                    $time = strtotime('+1 month', $time);
                }

                if($month == $last && $count==0){
                    $output[] = [
                        'time' => "over",
                        'month' => date('Y F')
                    ];
                }
                
                print_r($output);
                $deal_list=serialize($output);
        }
    }


    


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

    echo "flag-fee=".$flag['fee'];
    echo "flag-months=".$flag['months'];
    $flagsdata=serialize($flag);

    // header('Location:../views/boarder_inside_details1.php?details='.$details.'&parent='.$parent_detail.'&pay='.$payments.'&months='.$monthlist.'&amount='.$amount);

    if($flag['fee']==0 & $flag['months']==0){
        header('Location:../views/boarder_inside_details1.php?details='.$details.'&parent='.$parent_detail.'&amount='.$amount.'&f='.$flag['months'].'&deal_list='.$deal_list);
    }else if($flag['fee']==1 & $flag['months']==0){
        header('Location:../views/boarder_inside_details1.php?details='.$details.'&parent='.$parent_detail.'&pay='.$payments.'&amount='.$amount.'&f='.$flag['months']);
    }else if($flag['fee']==0 & $flag['months']==1){
        header('Location:../views/boarder_inside_details1.php?details='.$details.'&parent='.$parent_detail.'&months='.$monthlist.'&amount='.$amount.'&f='.$flag['months']);
    }else if($flag['fee']==1 & $flag['months']==1){
        header('Location:../views/boarder_inside_details1.php?details='.$details.'&parent='.$parent_detail.'&pay='.$payments.'&months='.$monthlist.'&amount='.$amount.'&f='.$flag['months']);

    }
    
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
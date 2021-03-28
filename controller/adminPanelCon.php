<?php 
require '../config/database.php';
require '../models/adminModel.php';
require '../config/email.php';
require '../config/pdfFunction.php';
require_once('../config/pdf/tcpdf.php');
?>
<?php

// home page to admin panel 
if(isset($_GET['admin']))
{
    $student=adminModel::userDetails('student',$connection);
    $boarder=adminModel::userDetails('boarder',$connection);
    $boarding_owner=adminModel::userDetails('boardings_owner',$connection);
    $food_supplier=adminModel::userDetails('food_supplier',$connection);
    $boardingCount=adminModel::BpostCount($connection);
    $foodCount=adminModel::FpostCount($connection);

    header('Location:../views/adminPanel.php?student='.$student->num_rows.'&boarder='.$student->num_rows.'&boarding_owner='.$boarding_owner->num_rows.'&food_supplier='.$food_supplier->num_rows.'&boarding_count='.$boardingCount->num_rows.'&food_count='.$foodCount->num_rows);
}

// user block
if(isset($_POST['block']))
{
    $email=$_POST['email'];
    $level=$_POST['level'];
    $complaint=array();
    $complaint['con1']="";
    $complaint['con2']="";
    $complaint['con3']="";
    $complaint['con4']="";
    $complaint['con5']="";
    $complaint['con6']="";
    if(isset($_POST['condition1'])){
        $complaint['con1']=$_POST['condition1']; 
    }
    if(isset($_POST['condition2'])){
        $complaint['con2']=$_POST['condition2'];
    }
    if(isset($_POST['condition3'])){
        $complaint['con3']=$_POST['condition3'];
    }
    if(isset($_POST['condition4'])){
        $complaint['con4']=$_POST['condition4'];
    }
    if(isset($_POST['condition5'])){
        $complaint['con5']=$_POST['condition5'];
    }
    if(isset($_POST['condition6'])){
        $complaint['con6']=$_POST['condition6'];
    }
    print_r($level);

    $block=adminModel::blockUser($level,$email,$connection);
    // blockMail($complaint,$email);
    if($level=='student'){header('Location:../views/adminStudent.php');}
    if($level=='boarder'){header('Location:../views/adminBorder.php');}
    if($level=='boardings_owner'){header('Location:../views/adminBoardingOwner.php');}
    if($level=='food_supplier'){header('Location:../views/adminFoodSupplier.php');} 
}

//  unblock user
if(isset($_POST['unblock']))
{
    $email=$_POST['email'];
    $level=$_POST['level'];
    $block=adminModel::unblockUser($level,$email,$connection);
    // blockMail($complaint,$email);
    if($level=='student'){header('Location:../views/adminStudent.php');}
    if($level=='boarder'){header('Location:../views/adminBorder.php');}
    if($level=='boardings_owner'){header('Location:../views/adminBoardingOwner.php');}
    if($level=='food_supplier'){header('Location:../views/adminFoodSupplier.php');} 
}



// report page load statistic
if(isset($_POST['userDetails']))
{ 
    $yearPOST=$_POST['year'];
    $monthPOST=$_POST['month'];
    date_default_timezone_set("Asia/Colombo");
    $student=adminModel::userDetails('student',$connection);
    $month=array();
    $date='';
    $i=0;
    $countS=0;
    $countB=0;
    $countBO=0;
    $countF=0;

    $rateS=0;
    $rateB=0;
    $rateBO=0;
    $rateF=0;
    $registrationRate=0;
    $nowYear=date("Y");
    $nowMonth=date("F");
    $nowCount=0;
    while($row=mysqli_fetch_assoc($student))
    {
        $date=strtotime($row['reg_date']);
        $month[$i]=date("F",$date);  // month in name 
        $monthN[$i]=date("M",$date); // month in number
        $year[$i]=date("Y",$date);
        if($month[$i]==$monthPOST && $year[$i]==$yearPOST)
        {
            $countS++;
        }
        if($month[$i]==$nowMonth && $year[$i]==$nowYear)
        {
            $nowCount++;
        }
        $i++;
    }
    
    $boarder=adminModel::userDetails('boarder',$connection);
    while($row=mysqli_fetch_assoc($boarder))
    {
        $date=strtotime($row['reg_date']);
        $month[$i]=date("F",$date);
        $year[$i]=date("Y",$date);
        if($month[$i]==$monthPOST && $year[$i]==$yearPOST)
        {
            $countB++;
        }
        if($month[$i]==$nowMonth && $year[$i]==$nowYear)
        {
            $nowCount++;
        }
        $i++;
    }
    $food_supplier=adminModel::userDetails('food_supplier',$connection);
    while($row=mysqli_fetch_assoc($food_supplier))
    {
        $date=strtotime($row['reg_date']);
        $month[$i]=date("F",$date);
        $year[$i]=date("Y",$date);
        if($month[$i]==$monthPOST && $year[$i]==$yearPOST)
        {
            $countF++;
        }
        if($month[$i]==$nowMonth && $year[$i]==$nowYear)
        {
            $nowCount++;
        }

        $i++;
    }
    $boardings_owner=adminModel::userDetails('boardings_owner',$connection);
    while($row=mysqli_fetch_assoc($boardings_owner))
    {
        $date=strtotime($row['reg_date']);
        $month[$i]=date("F",$date);
        $year[$i]=date("Y",$date);
        if($month[$i]==$monthPOST && $year[$i]==$yearPOST)
        {
            $countBO++;
        }
        if($month[$i]==$nowMonth && $year[$i]==$nowYear)
        {
            $nowCount++;
        }
        $i++;
    }

    // registration rate
    $rateS=number_format(($countS/$student->num_rows)*100, 2, '.', '');
    $rateB=number_format(($countB/$boarder->num_rows)*100, 2, '.', '');
    $rateBO=number_format(($countF/$boardings_owner->num_rows)*100, 2, '.', '');
    $rateF=number_format(($countBO/$food_supplier->num_rows)*100, 2, '.', '');

    $data=array(
        "student"=>$student->num_rows,
        "boarder"=>$boarder->num_rows,
        "food_supplier"=>$boardings_owner->num_rows,
        "boardings_owner"=>$food_supplier->num_rows,

        "studentC"=>$countS,
        "boarderC"=>$countB,
        "food_supplierC"=>$countF,
        "boardings_ownerC"=>$countBO,

        "rateS"=>$rateS,
        "rateB"=>$rateB,
        "rateBO"=>$rateBO,
        "rateF"=>$rateF,
        "nowCount"=>$nowCount
        // "date"=>$month,
        // "year"=>$year
    );
    echo json_encode($data);
}


// PDF generation function report 
if(isset($_GET['userPDF']))
{ 
    userDetails($_GET['userPDF'],$_GET['name']);
}


// food report page load statistic
if(isset($_POST['foodDetails']))
{ 
    $yearPOST=$_POST['year'];
    $monthPOST=$_POST['month'];
    date_default_timezone_set("Asia/Colombo");
    $post=adminModel::foodpost($connection);
    $request=adminModel::foodRequest($connection);
    $i=0;
    $countSB=0;
    $countSL=0;
    $countSD=0;
    $countLB=0;
    $countLL=0;
    $countLD=0;

    $countSBD=0;
    $countSLD=0;
    $countSDD=0;
    $countLBD=0;
    $countLLD=0;
    $countLDD=0;

    $valueSBD=0;
    $valueSLD=0;
    $valueSDD=0;
    $valueLBD=0;
    $valueLLD=0;
    $valueLDD=0;
    $totalval=0;
    while($row=mysqli_fetch_assoc($request))
    {
        $date=strtotime($row['time']);
        $month[$i]=date("F",$date);  // month in name 
        $monthN[$i]=date("M",$date); // month in number
        $year[$i]=date("Y",$date);

        if($month[$i]==$monthPOST && $year[$i]==$yearPOST)
        {
           if($row['term']=='shortTerm')
           {
               if($row['order_type']=='breakfast')
               {
                   $countSB++;
                   if($row['is_accepted']==4)
                   {
                    $countSBD++;
                    $valueSBD=$valueSBD+$row['total'];
                   }
               }
               if($row['order_type']=='lunch')
               {
                   $countSL++;
                   if($row['is_accepted']==4)
                   {
                    $countSLD++;
                    $valueSLD=$valueSLD+$row['total'];
                   }
               }
               if($row['order_type']=='dinner')
               {
                   $countSD++;
                   if($row['is_accepted']==4)
                   {
                    $countSDD++;
                    $valueSDD=$valueSDD+$row['total'];
                   }
               }
           }
           if($row['term']=='longTerm')
           {
               if($row['order_type']=='breakfast')
               {
                   $countLB++;
                   if($row['is_accepted']==4)
                   {
                    $countLBD++;
                    $valueLBD=$valueLBD+$row['total'];
                   }
               }
               if($row['order_type']=='lunch')
               {
                   $countLL++;
                   if($row['is_accepted']==4)
                   {
                    $countLLD++;
                    $valueLLD=$valueLLD+$row['total'];
                   }
               }
               if($row['order_type']=='dinner')
               {
                   $countLD++;
                   if($row['is_accepted']==4)
                   {
                    $countLDD++;
                    $valueLDD=$valueLDD+$row['total'];
                   }
               }
           }

        }
        if($row['is_accepted']==4){
            $totalval=$totalval+$row['total'];
        }

        $i++;
    }

    $data=array(
        "posts"=>$post->num_rows,
        "total"=>$totalval,
        'countSB' =>$countSB,
        'countSL' =>$countSL,
        'countSD' =>$countSD,
        'countLB' =>$countLB,
        'countLL' =>$countLL,
        'countLD' =>$countLD,
        'countSBD' =>$countSBD,
        'countSLD' =>$countSLD,
        'countSDD' =>$countSDD,
        'countLBD' =>$countLBD,
        'countLLD' =>$countLLD,
        'countLDD' =>$countLDD,

        'valueSBD' =>$valueSBD,
        'valueSLD' =>$valueSLD,
        'valueSDD' =>$valueSDD,
        'valueLBD' =>$valueLBD,
        'valueLLD' =>$valueLLD,
        'valueLDD' =>$valueLDD,
    );
    echo json_encode($data);
}


// dash board details
if(isset($_POST['getAdmin'])){
    $pendingOrder=0;
    $completeOrder=0;
    $foodReniue=0;
    $boardingRenie=0;
    $totalval=0;
    $comReq=0;
    $penReq=0;
    $request=adminModel::foodRequest($connection);
    while($row=mysqli_fetch_assoc($request))
    {
        if($row['is_accepted']==0 || $row['is_accepted']==1 || $row['is_accepted']==3){
            $pendingOrder++;
        }
        if($row['is_accepted']==4){
            $completeOrder++;
            $totalval=$totalval+$row['total'];
        }
    }
    $boardingRequest=adminModel::boardingRequest($connection);
    while($row=mysqli_fetch_assoc($boardingRequest))
    {
        if($row['isAccept']==3){
            $comReq++;
        }
        if($row['isAccept']==0 || $row['isAccept']==1){
            $penReq++;
        }
    }


    $boardingCount=adminModel::BpostCount($connection);
    while($row=mysqli_fetch_assoc($boardingCount))
    {
        $boardingRenie=$boardingRenie+$row['post_amount'];
    }

    $foodCount=adminModel::FpostCount($connection);
    while($row=mysqli_fetch_assoc($foodCount))
    {
        $foodReniue=$foodReniue+$row['post_amount'];
    }

   

    $data=array(
        'all'=>$request->num_rows,
        'pendingOrder'=>$pendingOrder,
        'completeOrder'=>$completeOrder,
        'bRenue'=>$boardingRenie,
        'fRenue'=>$foodReniue,
        'totalOrder'=>$totalval,
        'allReq'=>$boardingRequest->num_rows,
        'penReq'=>$penReq,
        'comReq'=>$comReq
    );
    echo json_encode($data);
}

// admin student page details
function studentDetails($connection){
    $data=array();
    $result=adminModel::userDetails('student',$connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}

// admin student page search result
function studentSearchDetails($id,$word,$connection){
    $data=array();
    $result=adminModel::searchStudent($id,$word,$connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}

// admin border page details
function borderDetails($connection){
    $data=array();
    $result=adminModel::userDetails('boarder',$connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}

// admin border page search result
function borderSearchDetails($id,$word,$connection){
    $data=array();
    $result=adminModel::searchBoarder($id,$word,$connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}


// admin boarding owner page details
function boardingOwnerDetails($connection){
    $data=array();
    $result=adminModel::userDetails('boardings_owner',$connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}

// admin boarding owner page search result
function bordingownerSearchDetails($id,$word,$connection){
    $data=array();
    $result=adminModel::searchBoarding($id,$word,$connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}

// admin boarding owner page details
function foodsupplierDetails($connection){
    $data=array();
    $result=adminModel::userDetails('food_supplier',$connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}

// admin boarding owner page search result
function foodsupplierSearchDetails($id,$word,$connection){
    $data=array();
    $result=adminModel::searchFood($id,$word,$connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}

//  boarding post page  details
function bpostDetails($connection){
    $data=array();
    $result=adminModel::boardingPost($connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}

//  boarding post page search result
function bpostSearchDetails($id,$word,$connection){
    $data=array();
    $result=adminModel::searchBoardingPost($id,$word,$connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}

//  food post page  details
function fpostDetails($connection){
    $data=array();
    $result=adminModel::foodPost($connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}

//  food post page search result
function fpostSearchDetails($id,$word,$connection){
    $data=array();
    $result=adminModel::searchFoodPost($id,$word,$connection);
    while($row=mysqli_fetch_assoc($result)){   
        $data[]=$row;
    }

    return $data;
}
?>
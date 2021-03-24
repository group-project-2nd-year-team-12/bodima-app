<?php 
require '../config/database.php';
require '../models/adminModel.php';
require '../config/email.php';
require '../config/pdfFunction.php';
require_once('../config/pdf/tcpdf.php');
?>
<?php
if(isset($_GET['admin']))
{
    $student=adminModel::userDetails('student',$connection);
    $boarder=adminModel::userDetails('boarder',$connection);
    $boarding_owner=adminModel::userDetails('boardings_owner',$connection);
    $food_supplier=adminModel::userDetails('food_supplier',$connection);
    $boardingCount=adminModel::BpostCount($connection);
    $foodCount=adminModel::FpostCount($connection);

    header('Location:../views/admin/adminPanel.php?student='.$student->num_rows.'&boarder='.$student->num_rows.'&boarding_owner='.$boarding_owner->num_rows.'&food_supplier='.$food_supplier->num_rows.'&boarding_count='.$boardingCount->num_rows.'&food_count='.$foodCount->num_rows);
}

if(isset($_POST['block']))
{
    print_r($_POST);
    $email=$_POST['email'];
    $level=$_POST['level'];
    $complaint=array();
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
   print_r($complaint);

    $block=adminModel::blockUser($level,$email,$connection);
    blockMail($complaint,$email);
    header('Location:../views/admin/student.php');
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


// PDF generation function
if(isset($_GET['userPDF']))
{ 
    userDetails($_GET['userPDF']);
}

?>
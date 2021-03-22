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


// PDF generation function
if(isset($_GET['userPDF']))
{ 
    userDetails();
}
if(isset($_GET['studentPDF']))
{ 
    userDetails();
}
if(isset($_GET['boardingPDF']))
{ 
    userDetails();
}
if(isset($_GET['foodPDF']))
{ 
    userDetails();
}
if(isset($_GET['boarderPDF']))
{ 
    userDetails();
}
?>
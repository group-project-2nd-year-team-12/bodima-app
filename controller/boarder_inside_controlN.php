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

    header('Location:../views/boarder_inside_details1.php?details='.$details.'&parent='.$parent_detail);
}

?>
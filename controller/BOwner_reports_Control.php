<?php
session_start();
require_once ('../config/database.php');
require_once ('../models/BOwner_reports_Model.php');

// $BOid=3;
// $resultM=BOwner_reports_Model::all_payments_default($connection,$BOid);
// $result=mysqli_fetch_assoc($resultM);
// print_r($result);

date_default_timezone_set("Asia/Colombo");
echo $todate="tomorrow :".date( "Y-m-d 00:00:00", strtotime( "+1 days" ));

if(isset($_POST['go1'])){

echo '<br/>sort_by :'.$_POST['sort_by'];
echo '<br/>order: '.$_POST['order'];
echo '<br/>filter_Bid: '.$_POST['filter_Bid'];
echo '<br/>filter_postno : '.$_POST['filter_postno'];
echo '<br/>fromDate: '.$_POST['fromDate'];
echo '<br/>toDate : '.$_POST['toDate'];
echo '<br/>method: '.$_POST['method'];

echo '<br/><br/><br/>$BOid :'.$_SESSION['BOid'];
echo '<br/>$sortcontext: '.$_POST['sort_by'];
echo '<br/>$DESC_ASC: '.$_POST['order'];
echo '<br/>$filter_Bid: '.$_POST['filter_Bid'];
echo '<br/>$fromDate: '.$_POST['fromDate'];
echo '<br/>$toDate : '.$_POST['toDate'];
echo '<br/>$postno : '.$_POST['filter_postno'];
echo '<br/>method: '.$_POST['method'].'<br/><br/><br/>';


header('Location:../views/BOwner_reports.php?results='.$result);

// $resultM=BOwner_reports_Model::payments_filter($connection,3,'first_name','asc','2020-07-02 16:47:09',0,0,0);

// $resultM=BOwner_reports_Model::all_payments_default($connection,$BOid,$sortcontext,$DESC_ASC,$fromdate,$todate,$postno,$method);
// $resultM=BOwner_reports_Model::payments_filter($connection,3,'first_name','asc','2020-07-02 16:47:09','2021-01-12 16:47:09','5','cash');



?>
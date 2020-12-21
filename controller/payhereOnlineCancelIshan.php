<?php 
  require_once ('../config/database.php');
        require_once ('../models/reg_userIshan.php');
     
        session_start(); 

 ?>

 <?php 
 	if (isset($_GET['request_id'])) {
 		 $request_id=$_GET['request_id'];
 		 header('../views/onlinePayNotSIshan.php?request_id='.$request_id);
 	}
     
 //echo "string";


  ?>
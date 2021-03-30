<?php 
require_once ('../config/database.php');
require_once ('../models/foodpostviewN_model.php');
//session_start();


function foodpost_details($connection){



 
$data=array();

$result=foodpostviewN_model::foodpost_details($connection);


if(mysqli_num_rows($result)>0){

    while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
       
        

    }
   return $data;
}




 


}



 ?>
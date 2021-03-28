<!-- an -->
<?php   session_start();
        require_once ('../config/database.php');
        require_once ('../models/boarder_list_modelN.php');


if(isset($_GET['boarderlist'])){

    
    if(!isset($_POST["qry"]))
    {
        // search bar hasn't a query
        $boarder= boarder_list_modelN::all_boarderlist_of_owner($connection,$_SESSION['BOid']);

    }else{
        // search bar has a query
        $boarder= boarder_list_modelN::search_boarder_in_list($connection,$qry,$_SESSION['BOid']);
    }

$output=array();

    if(mysqli_num_rows($boarder)>0){

        while($row=mysqli_fetch_assoc($boarder)){
            $data[]=$row;
            
        }
        $boarderlist=serialize($data);
    }
    header('Location:../views/myboarders1.php?blist='.$boarderlist);
}







?>
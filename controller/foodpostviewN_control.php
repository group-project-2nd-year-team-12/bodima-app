
<?php 
require_once ('../config/database.php');
require_once ('../models/foodpostviewN_model.php');



$result=foodpostviewN_model::foodpost_details($connection);

if(mysqli_num_rows($result)>0){

    while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
        print_r($row);
        echo "<br/>";
        

    }
    $posts=serialize($data);
}
// $data = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $posts);
$posts2=unserialize($posts);

// print_r($posts2);
header('Location:../views/foodpostviewN.php?posts='.$posts);
?>
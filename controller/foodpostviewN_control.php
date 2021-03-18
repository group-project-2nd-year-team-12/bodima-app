
<?php 
require_once ('../config/database.php');
require_once ('../models/foodpostviewN_model.php');



if(isset($_POST["qry"]))
{
	// if(str_word_count($_POST["qry"])>1)
	// {

	// 	$result=live_search::multiple_word_match_b_post($connection,$_POST["qry"]);

	// }else{

	// 	$result=live_search::single_word_find_b_post($connection,$_POST["qry"]);

    // }
    echo "rhwjdddddddddddddddddgggggggggggggg";
	die();
}
else
{
	// $result=live_search::all_b_posts($connection);




$result=foodpostviewN_model::foodpost_details($connection);
}

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
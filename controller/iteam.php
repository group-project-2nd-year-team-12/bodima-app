<?php
    
    require_once ('../config/database.php');
    require_once ('../models/food_post.php');
    

   

?>

<?php

$submit=$_POST['submit'];

if(isset($_POST['submit']))
{



    if($submit=='save'){
    
        $pName=$_POST['pName'];
                

        $image_name=$_FILES['pimage']['name'];
        $image_type=$_FILES['pimage']['type'];
        $image_size=$_FILES['pimage']['size'];
        $temp_name=$_FILES['pimage']['tmp_name'];

        $upload_to='../resource/Images/uploaded_foodpost/';

        move_uploaded_file($temp_name, $upload_to . $image_name);

        $price=$_POST['price'];
        $breakfirst=$_POST['breakfirst'];
            
                
        $lunch=$_POST['lunch'];
                
        $dinner=$_POST['dinner'];

        //echo $Hnumber;

        foodSupplierPost::addIteam($pName,$image_name,$breakfirst,$lunch,$dinner,$price,$connection);


        print_r($_POST);

        print_r($_FILES);


    }elseif($submit=='Add Iteam')
    {


                        
        $pName=$_POST['pName'];
                

        $image_name=$_FILES['pimage']['name'];
        $image_type=$_FILES['pimage']['type'];
        $image_size=$_FILES['pimage']['size'];
        $temp_name=$_FILES['pimage']['tmp_name'];

        $upload_to='../img/';

        move_uploaded_file($temp_name, $upload_to . $image_name);

        $price=$_POST['price'];
        $breakfirst=$_POST['breakfirst'];
            
                
        $lunch=$_POST['lunch'];
                
        $dinner=$_POST['dinner'];

        //echo $Hnumber;

        foodSupplierPost::addIteam($pName,$image_name,$breakfirst,$lunch,$dinner,$price,$connection);



        header('Location:../views/iteam.php');

        print_r($_POST);

        print_r($_FILES);

    }
                
           
}
?>
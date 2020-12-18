<?php session_start(); ?>

<?php
require '../controller/FoodPostController.php';

$FoodPostController = new FoodPostController();

// if(isset($_POST['categories']))
// {
//     //Fill page with category of the selected type
//     $BoardingPostTables = $BoardingPostController->CreateBoardingTables($_POST['categories']);
// }
// else 
// {
//     //Page is loaded for the first time, no type selected -> Fetch all types
//     $BoardingPostTables = $BoardingPostController->CreateBoardingTables('%');
// }

//Output page data
$title = 'Food Posts';
$content =$FoodPostController->CreateFoodPostTables('%');
?>
<div class="food-header">
            <div class="header-description">
                <h1>Best Testing Experience !</h1>
                <h3>Select your favorite resturent</h3>
            </div>
            <img src="../resource/img/food-post.jpg" alt="">
</div>
<?php
// $content = $BoardingPostController->CreateCategoryDropdownList(). $BoardingPostTables;


include 'Template.php';

?>

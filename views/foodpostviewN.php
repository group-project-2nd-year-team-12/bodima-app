<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../resource/css/foodpostviewN.css">
    <link rel="stylesheet" href="../resource/css/nav.css">
    <link rel="stylesheet" href="../resource/css/footer.css">
    <link rel="stylesheet" href="../resource/css/extra.css">
    
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
  
    <title>Food</title>
</head>
<body onload="document.getElementById('food').style.backgroundColor='#07113d'">
<?php
//  $posts=unserialize($_GET['posts']);
//  print_r($posts);

require_once ('../config/database.php');
require_once ('../controller/food_view_anuki.php');

//  $result=foodpostviewN_model::foodpost_details($connection);

// if(mysqli_num_rows($result)>0){

//     while($row=mysqli_fetch_assoc($result)){
//         $data[]=$row;
       
        

//     }
//     $posts2=serialize($data);
// }
// $data = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $posts);
//$posts=unserialize($posts2);
$posts=foodpost_details($connection);

?>
	<div class="whole">
        <?php include 'nav.php' ?>
        <div class="backdrop_1">
        <div class="bc_title">
            <div class="toplayer">
                <h1>Best Tasting Experience!</h1>
                <span>Select your favourite Resturant ...</span>
                
                <div class="search_box">
                <input type="text" name="res_search" id="res_search" placeholder="Search . . ."><i class="fas fa-search"></i>
                </div>
            </div>
            </div>
            <img src="../resource/img/backdrop_2.jpg">
            
            
        </div>
        <div class="post_container">
            <div class="mid_K">
                <div class="iconbar">
                <div class="ibox2"><i class="fas fa-sliders-h"></i></div>
                <div class="ibox1"><i class="fas fa-search"></i></div>
                </div>

                <div class="filterform">
                <form>
                <input type="text" name="city_search" placeholder="City">  </br> 
                <input type="checkbox" name="longTerm" value="longterm">longTerm<br/>
                <input type="checkbox" name="shortTerm" value="longterm">shortTerm
                </form>
                </div>
            </div>
            <div class="mid_L">
                
                <div class="fp_search">
                <div class="search_box">
                <input type="text" name="res_search" id="res_search" placeholder="Search . . ."><i class="fas fa-search"></i>
                </div>
                </div>
                
                

            <div class="post_box" id="post_box">
            <!--***************** genarate food posts **********************-->
            <?php foreach($posts as $post){?>

                    <div class="f_post" onclick='window.location="../controller/cartClearCon.php?Pid=<?php echo $post["F_post_id"] ?>&name=<?php echo $post["ad_title"] ?>&address=<?php echo $post["address"] ?>"'>

                

                   <div class="f_image">
                       <img src="<?php echo $post['image']?>">
                    </div>
                    <div class="f_content">
                    
                        <li><h2><a><?php echo $post['ad_title']?></a>


                        <?php if ($post['available']=='0'){?>
                        <span class="not_available">Unavailable</span>
                        <?php }?>
                        </h2>
                        </li>
                        <li>3.5 
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i> (15) 
                        </li>
                        <li><i class="fas fa-map-marker-alt" id="map"></i><?php echo $post['address']?></li>
                        <li class="description"><p>"<?php echo $post['description']?>"</p></li>
                        <li class="term">

                        <?php if($post['type']=="Both" || $post['type']=="Short Term" ){?>
                            <div class="short">
                                <span>shortTerm</span>
                            </div>
                            <?php }
                            
                            if($post['type']=="Both" || $post['type']=="Long Term" ){?>
                            <div class="long">
                            <span>longTerm</span>
                            </div>
                            <?php }?>
                        </li>
                    </div>
                </div>

                
                    <?php }?>
            <!-- ************************************************************** -->

            
            </div>
            </div>
        </div>


    
        <?php include 'footer.php' ?>
			
	</div>




<script>
$(document).ready(function(){
	load_data();
	function load_data(qry)
	{
		$.ajax({
			url:"../controller/foodpostviewN_control.php",
			method:"post",
			data:{qry:qry},
			success:function(data)
			{
				
			}
		});
	}
	
	$('#res_search').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search).css({"backgroundColor":"black",
        "color":"white"});
		}
		else
		{
			load_data();			
		}
	});
});


$('th').css({"backgroundColor":"black",
        "color":"white"});
</script>
<script src="../resource/js/jquery.js"></script>
<script src="../resource/js/home1.js"></script>
<script src="../resource/js/new_home.js"></script>

</body>
</html>
 
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
<body>
	<div class="whole">
        <?php include 'nav.php' ?>
        <div class="backdrop_1">
        <div class="bc_title">
            <div class="toplayer">
                <h1>Best Tasting Experience!</h1>
                <span>Select your favourite Resturant ...</span>
                
                <div class="search_box">
                <input type="text" name="res_search" placeholder="Search . . ."><i class="fas fa-search"></i>
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
                <input type="text" name="res_search" placeholder="Search . . ."><i class="fas fa-search"></i>
                </div>
                </div>
            <div class="post_box">
            <?php for ($x = 0; $x <= 4; $x++) {?>
 

               <div class="f_post">
                   <div class="f_image">
                       <img src="../resource/img/backdrop_2.jpg">
                    </div>
                    <div class="f_content">
                        <li><h2><a>Rasika Food Delivery</a></h2></li>
                        <li>3.5 
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i> (15) 
                        </li>
                        <li><i class="fas fa-map-marker-alt" id="map"></i>171,High Level Rd., Maharagama</li>
                        <li class="description"><p>"The placeholder text is set with the placeholder attribute, which specifies a hint that describes the expected value of an input field.The placeholder text is set with the placeholder"</p></li>
                        <li class="term">
                            <div class="short">
                                <span>shortTerm</span>
                            </div>
                            <div class="long">
                            <span>longTerm</span>
                            </div>
                            
                        </li>
                    </div>
                </div>

                <?php }?>
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
			url:"../controller/livesearch_control.php",
			method:"post",
			data:{qry:qry},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
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
 
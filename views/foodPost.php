<?php
require_once ('../config/database.php');
require_once ('../models/food_post.php');

session_start(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>&#127835; Post Food</title>

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>food post</title>
    <link rel="stylesheet" href="../resource/css/new_home.css"> 
	<link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/extra.css">
  
	
	<!-- <script src="jquery-3.5.1.min.js"></script> -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>


	<link href="../resource/css/foodpost.css" rel="stylesheet">

	<style>

	</style>
</head>
<body>

<?php require "header1.php"?>


<div class="con-1" id="blur">
	<div class="con-2">

	<?php
		if(isset($_GET['param']))
		{
			$errors=$_GET['param'];
				/*
			foreach($errors as $error)
			{
				echo '<p class="error"><b>'.$error.'</b></p>';
			}*/
			//print_r($errors);
		}
			
	?>


	<form action="../controller/foodPostCon.php" method="post" enctype="multipart/form-data"  class="form">

	<h1>Food Advertisement Form</p><!-- postBoarding --> 
    <hr/>

	<div class="section">
		<p>Resturent Name </p>
		<input  type="text" name="resName" id="resName"  >
		<?php if(isset($errors['err1'])) echo "<div class='error_msg'>".$errors['err1']."</div>"; ?>
                    
        <p>Description </p >
        <!--<input type="text" name="description" id="description" placeholder="Enter Description" ><br><br>-->
    	<textarea name="description" id="description" rows="3" cols="26"></textarea>

	</div>

	<hr/>

	<div class="section">
		<p>Address </p>
	
		<!--<label for="">Address  </label><br>-->
		<input  type="text" name="address" id="address"  >
		<?php if(isset($errors['err2'])) echo "<div class='error_msg'>".$errors['err2']."</div>"; ?>

		<p>Location</p >
		<!-- <label for="">Location  </label><br> -->
		<input  type="text" name="location" id="location" ><br>

	</div>
	<hr/>

	<div class="section">
	
		<p class="cover">Resturent Cover Image (Optional)</p >

		<div id="photo1" class="images" style="position: relative;">
            <label for="inputFile"><img src="https://img.icons8.com/carbon-copy/100/000000/compact-camera.png" class="cam" id="blah1" alt="Img" width="100px" height="100px"><br><br></label>
            <button type="button" class="btn1" data-img-Name=""><i class="far fa-window-close fa-2x"></i></button>
            <input type="file" id="inputFile" name="image1" hidden > <br>
        </div>

	</div>

	<hr>

	<div class="section">
	<p>Type</p >
		
			<div class="radio-1">
			
				<input type="radio" name="type" id="shortTerm" value="Short Term" checked><span >   Short Term</span>
				<input type="radio" name="type" id="longTerm" value="Long Term"><span >   Long Term</span>
				<input type="radio" name="type" id="both" value="Both"><span >   Both</span>
				
			</div>
			<?php if(isset($errors['err3'])) echo "<div class='error'>".$errors['err3']."</div>"; ?>

			<p>Ordering Time Deadline </p >	
			<div class="radio-2">
			
			<!--<label for="">Address  </label><br>-->
			<input type="time" name="otDeadline" id="otDeadline" value="21:00:00" >

			</div>
			<?php if(isset($errors['err4'])) echo "<div class='error_msg'>".$errors['err4']."</div>"; ?>

		
			
	</div>

	<hr>
	<div class="section">

	<div class="group">
		<p id="life">Avertisement Lifespan (Days)</p >
				
		<input type="number" name="Lifespan" id="lifespan" value=30 class="control prc" >
			<?php   if(isset($errors['err5'])){
						echo "<div class='error2'>".$errors['err5']."</div>"; 
					}elseif(isset($errors['err6'])){
						echo "<div class='error2'>".$errors['err6']."</div>"; 
					}
			?>
	</div>
				
	<div class="group">
				
		<p id="Aamou">Avertisement Amount : Rs</p >
			<!-- <output  name="result" id="result"></output> -->
			<input type="text" disabled name="Aamount" id="Aamount" value=3000  >
	</div>
			
				
	</div>
	
	<hr>
	
	<div class="submitdiv">
		<input type="submit" name="submit" id="submit" value="Add Iteam" class="save" >
                
               
    </div>




	<script src="../resource/js/jquery-3.5.1.min.js"></script>
				<script>
					$('.group').on('input','.prc',function(){
						var totalsum =0;
						$('.group .prc').each(function(){
							var inputVal = $(this).val();
							if($.isNumeric(inputVal)){
								totalsum = parseFloat(inputVal)*100;
							}

						});
						$('#Aamount').val(totalsum);
						//result=$_SESSION['totalsum']

					});

					$('form').submit(function(e){
						$(':disabled').each(function(e){
							$(this).removeAttr('disabled');
						})

					});
				</script>



	<script src="../resource/js/custom.js"></script>

	</form>

	</div>
</div>

</body>
</html>
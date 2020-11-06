
<!DOCTYPE html>
<html lang="en">
<head>
	<title>&#127969; Post Boarding</title>
	<link href="../css/style.css" rel="stylesheet">

	<style>

	</style>
</head>
<body>

	<div class="postBoarding"><h1>Post On Your Site</h1></div><!-- postBoarding -->
		<div class=main>
			<form action="../controller/postBoardingCon.php" method="post" enctype="multipart/form-data"  id="postBoarding">
			<div id="name">

				<!--<label for="">Address  </label><br>-->
				<h3 class="name">Address </h3 >
				
				<input class="hnumber" type="text" name="Hnumber" id="Hnumber"  >
				<label class="hLable"> House Number / Name  </label><br>

				
				<input class="lane" type="text" name="lane" id="lane"  >
				<label class="lLable" > Lane </label><br>

				
				<input class="city" type="text" name="city" id="city" >
				<label class="cityLable" > City  </label>

				
				<input class="district" type="text" name="district" id="district"  >
				<label class="lDis" >District  </label><br>

			</div><!-- id name -->	

				<h3 class="name">Location</h3 >
				<!-- <label for="">Location  </label><br> -->
				<input type="text" name="location" id="location" ><br>

				<h3 class="name">Description </h3 >
				<!--<input type="text" name="description" id="description" placeholder="Enter Description" ><br><br>-->
				<textarea name="description" id="description" rows="5" cols="50"></textarea><br>

				
				<h3 class="name">Boarding Cover Image</h3 >
				<input type="file" name="BCimage" id="BCimage"><br>

				<!--<label for="">Boarding Images  </label><br>
				<input type="file" name="Bimage{}" id="Bimage" multiple ><br><br>-->
			
			
			
			</form>

		<div><!-- main -->
</body>
</html>
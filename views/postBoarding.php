<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>postboarding</title>
    <link rel="stylesheet" href="../resource/css/new_home.css"> 
	<link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/extra.css">
	<link href="../resource/css/boarding.css" rel="stylesheet">
	<!-- <script src="jquery-3.5.1.min.js"></script> -->
	

</head>
<body>

<?php require "header1.php"?>

<div class="con-1">
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
    

    
	
	<form action="../controller/postBoardingCon.php" method="post" enctype="multipart/form-data"  class="form">
			<!-- <div id="name"> -->

    <h1>Boarding Advertisement Form</p><!-- postBoarding --> 
    <hr/>

    <div class="section">
                    <p>Title</p>
                    <input type="text" name="title" id="title" ><br>
                    
                    <p>Description </p >
                    <!--<input type="text" name="description" id="description" placeholder="Enter Description" ><br><br>-->
                    <textarea name="description" id="description" rows="3" cols="26"></textarea><br>
    </div>

    <hr/>
    <div class="section">
                    <!--<label for="">Address  </label><br>-->
				<p>Address </p>
				
				<input class="hnumber" type="text" name="Hnumber" id="Hnumber"  placeholder="House Number / Name">
				<!-- <label class="hLable"> House Number / Name  </label><br> -->
				<?php if(isset($errors['err1'])) echo "<div class='error_msg'>".$errors['err1']."</div>"; ?>

				
				<input class="lane" type="text" name="lane" id="lane" placeholder="Lane" >
				<!-- <label class="lLable" > Lane </label><br> -->
				<?php if(isset($errors['err2'])) echo "<div class='error_msg'>".$errors['err2']."</div>"; ?>

				
				
				<input class="city" type="text" name="city" id="city" placeholder="City">
				<!-- <label class="cityLable" > City  </label><br> -->
				<?php if(isset($errors['err3'])) echo "<div class='error_msg'>".$errors['err3']."</div>"; ?>

			
				
				<input class="district" type="text" name="district" id="district" placeholder="District" >
				<!-- <label class="lDis" >District  </label><br> -->
				<?php if(isset($errors['err4'])) echo "<div class='error_msg'>".$errors['err4']."</div>"; ?>


			<!-- </div>id name	 -->

				<p>Location</p >
				<!-- <label for="">Location  </label><br> -->
                <input type="text" name="location" id="location" ><br>
                

    </div>


    <hr/>
    <div class="section">

			<h4>Add 5 Photos</h4><p class="opt">(Optional)</p>

			<div class="images">
            
				<input type="file" name="BCimage" accept=".jpg, .png, .jpeg"  id="BCimage" value=../resource/Images/uploaded_boarding/defaultbp1.jpg ><br>
			</div>	
    </div>


    <hr/>
    <div class="section">
            <h4>Boarding Information</h4>

			<p>Renting For (Girls / Boys / Any One) : </p >
			
					<div class="radio-1">
				
					<input type="radio" name="gender" value="Boys"> <span>Boys</span>
					<input type="radio" name="gender" value="Girls"> <span>Girls</span> 
					<input type="radio" name="gender" value="AnyOne"> <span>Any One</span> 

					</div>
					<?php if(isset($errors['err6'])) echo "<div class='error'>".$errors['err6']."</div>"; ?>

				
			
			<p>Renting Options : </p >

					<div class="radio-2">
				
					<input type="radio" name="individual" id="individual" value="Individual"  onclick="text('0')" checked><span id="individual" >&nbsp; <span>Individual</span></span>&nbsp;&nbsp;
					<input type="radio" name="individual" id="RoomOrHome" value="RoomOrHome"  onclick="text('1')" ><span id="RomeOrHome" >&nbsp; <span>Rome Or Home</span></span>&nbsp;&nbsp;
					</div>
					<?php if(isset($errors['err5'])) echo "<div class='error'>".$errors['err5']."</div>"; ?>

				
				

				
			
				<p>Total Person Count :  </p >
				<input type="number"  name="Pcount" id="pcount" value=1 min=0  >
				<?php   if(isset($errors['err7'])){
							echo "<div class='error2'>".$errors['err7']."</div>"; 
						}elseif(isset($errors['err8'])){
							echo "<div class='error2'>".$errors['err8']."</div>"; 
						}elseif(isset($errors['err9'])){
							echo "<div class='error2'>".$errors['err9']."</div>"; 
						} 
				?>

    </div>

                
    <hr/>          
    <div class="section">
    <h4>Boarding Renting fee details</h4>

			<p id="indivi">Cost Per Person For Month</p >
			<p id="ROrH">Cost Renting For Month</p >
				<input type="text" name="CPperson" id="cpperson"  >
				<?php   if(isset($errors['err10'])){
							echo "<div class='error2'>".$errors['err10']."</div>"; 
						}elseif(isset($errors['err11'])){
							echo "<div class='error2'>".$errors['err11']."</div>"; 
						}elseif(isset($errors['err16'])){
							echo "<div class='error2'>".$errors['err16']."</div>"; 
						}
				?>

				
				<p>KeyMoney</p >
				<input type="text" name="Keymoney" id="Keymoney" >
				<?php   if(isset($errors['err12'])){
							echo "<div class='error2'>".$errors['err12']."</div>"; 
						}elseif(isset($errors['err13'])){
							echo "<div class='error2'>".$errors['err13']."</div>"; 
						}elseif(isset($errors['err16'])){
							echo "<div class='error2'>".$errors['err16']."</div>"; 
						}
				?>

				<div class="group">
				<p id="life">Avertisement Lifespan (Days) : </p >
				
				<input type="number"  name="Lifespan" id="lifespan" value=30  class="control prc" >
				<?php   if(isset($errors['err14'])){
							echo "<div class='error2'>".$errors['err14']."</div>"; 
						}elseif(isset($errors['err15'])){
							echo "<div class='error2'>".$errors['err15']."</div>"; 
						}
				?>
				</div>
				
				<div class="group">
				
				<p id="Aamou">Avertisement Amount :     Rs  </p >
				<!-- <output  name="result" id="result"></output>   -->
				<input type="text"  disabled  name="Aamount" id="Aamount" value=3000 >
				</div>
						
				
    </div>
    <hr/>   
    <div class="submitdiv">
                <input type="submit" class="save" name="submit" id="submit" value="post advertisement" >
    </div>
				


				<!--<label for="">Boarding Images  </label><br>
				<input type="file" name="Bimage{}" id="Bimage" multiple ><br><br>-->
					
						
				<script src="../resource/js/jquery-3.5.1.min.js"></script>
				<script src="../resource/js/boarding.js"></script>
				


			
				
			</form>
</div>
</div>
    
</body>
</html>
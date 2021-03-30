<?php
require_once ('../config/database.php');
require_once ('../models/post_boarding.php');

session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>postboarding</title>
    <link rel="stylesheet" href="../resource/css/new_home.css"> 
	<link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/extra.css">
    <link rel="stylesheet" href="../resource/css/popboarding.css">
	<link href="../resource/css/boarding.css" rel="stylesheet">
	<style>
	#myMap 
	{
	height: 350px;
	width: 50vw;
	}
	</style>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>


	 <script >
            
            $(document).ready(function()
            {
               
				$("#downbefore").click(function(){
            		$("#downbefore").hide();
					//$("#photo-wrapper").hide("slow");
					$("#photo-wrapper").show("slow");
            		$("#upafter").show();
          		});

          		$("#upafter").click(function(){
					$("#downbefore").show();
					$("#photo-wrapper").hide("slow");
            		//$("#photo-wrapper").show("slow");
            		$("#upafter").hide();
          		});
				
            });
        </script>
	
	<?php require ("maps.php")?>
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
    

    
	
	<form action="../controller/postBoardingCon.php" method="post" enctype="multipart/form-data"  class="form">
	<!-- <form action="../controller/cont.php" method="post" enctype="multipart/form-data"  class="form"> -->
			<!-- <div id="name"> -->

    <h1>Boarding Advertisement Form</p><!-- postBoarding --> 
    <hr/>

    <div class="section">
                    <p>*Title</p>
					<input type="text" name="title" id="title" ><br>
					<?php if(isset($errors['err17'])) echo "<div class='error_msg'>".$errors['err17']."</div>"; ?>
                    
                    <p>Description </p >
                    <!--<input type="text" name="description" id="description" placeholder="Enter Description" ><br><br>-->
                    <textarea name="description" id="description" rows="3" cols="26"></textarea><br>
    </div>

    <hr/>
    <div class="section">
                    <!--<label for="">Address  </label><br>-->
				<p>*Address </p>
				
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

				
                

    </div>

	<hr/>
	<div class="section">
					<div class="clickable" >
					<p style="padding-left:20px;">Location</p>
						<i class="fas fa-map-marker-alt" style="padding-left:20px;"></i>
						<span> drag the red marker to add your boarding location</span>
					</div>
	</div>
    <div class="section" style="margin:20px;">
				
                <div class="outerboxmap" style="margin:10px;" >
					
					<div class="innerboxmap" style="display:flex; justify-content:space-around;">
						<!-- map -->
						
						<div id="myMap"></div>
						<input type="hidden" id="address" name="map_address" style="width:600px;"/><br/>
						<input type="hidden" id="latitude" name="latitude"  placeholder="Latitude" value=""/>
						<input type="hidden" id="longitude" name="longitude" placeholder="Longitude" value=""/>
						<!-- <input type="submit" name="submitmap" value="submit"> -->
						

					</div>
				</div>

	</div>


    <hr/>
    <div class="section">

			<h4>Boarding Photos</h4><p class="opt"> (Optional)</p>
			<p class="cover">Boarding Cover Image</p >


			<div id="photo1" class="images" style="position: relative;">
                    <label for="inputFile"><img src="https://img.icons8.com/carbon-copy/100/000000/compact-camera.png" class="cam" id="blah1" alt="Img" width="100px" height="100px"><br><br></label>
                    <button type="button" class="btn1" data-img-Name=""><i class="far fa-window-close fa-2x"></i></button>
                    <input type="file" id="inputFile" name="image1" hidden > <br>
            </div>
			
			
			<span id="downbefore"><i class="fas fa-chevron-down"></i>   Images For Display In Detailed Information Page....</span>
            <span id="upafter" style="display: none;"><i class="fas fa-chevron-up"></i>   Images For Display In Detailed Information Page....</span>
			
			<!-- <div  class="show_hide">
			<i class="fas fa-chevron-down"></i>
			<p class="slide-shower">Images For Display In Detailed Information Page.</p >

			</div>
			<div class="show_hide" style="display: none;">
			<p class="slide-shower"><i class="fas fa-chevron-up"></i> Images For Display In Detailed Information Page.</p > -->
			<div id="photo-wrapper" class="wrapper" style="display: none;">
                 <!-- clone photo div using js and append to photo-wrapper-->
                 <!-- one -->
                <div class="photo" style="position: relative;">
                    <label for="inputFile1"><img src="https://img.icons8.com/carbon-copy/100/000000/compact-camera.png" class="cam" id="blah" alt="Img" width="100px" height="100px"><br><br></label>
                    <button type="button" class="btn" data-img-Name=""><i class="far fa-window-close fa-2x"></i></button>
                    <input type="file" id="inputFile1" name="image[]" hidden > <br>
                </div>
                <!-- two -->
                <div class="photo" style="position: relative;">
                    <label for="inputFile2"><img src="https://img.icons8.com/carbon-copy/100/000000/compact-camera.png" class="cam" id="blah" alt="Img" width="100px" height="100px"><br><br></label>
                    <button type="button" class="btn" data-img-Name=""><i class="far fa-window-close fa-2x"></i></button>
                    <input type="file" id="inputFile2" name="image[]" hidden > <br>
                </div>
                <!-- three -->
                <div class="photo" style="position: relative;">
                    <label for="inputFile3"><img src="https://img.icons8.com/carbon-copy/100/000000/compact-camera.png" class="cam" id="blah" alt="Img" width="100px" height="100px"><br><br></label>
                    <button type="button" class="btn" data-img-Name=""><i class="far fa-window-close fa-2x"></i></button>
                    <input type="file" id="inputFile3" name="image[]" hidden > <br>
                </div>
                <!-- four -->
                <div class="photo" style="position: relative;">
                    <label for="inputFile4"><img src="https://img.icons8.com/carbon-copy/100/000000/compact-camera.png" class="cam" id="blah" alt="Img" width="100px" height="100px"><br><br></label>
                    <button type="button" class="btn" data-img-Name=""><i class="far fa-window-close fa-2x"></i></button>
                    <input type="file" id="inputFile4" name="image[]" hidden > <br>
                </div>
                <!-- five -->
                <div class="photo" style="position: relative;">
                    <label for="inputFile5"><img src="https://img.icons8.com/carbon-copy/100/000000/compact-camera.png" class="cam" id="blah" alt="Img" width="100px" height="100px"><br><br></label>
                    <button type="button" class="btn" data-img-Name=""><i class="far fa-window-close fa-2x"></i></button>
                    <input type="file" id="inputFile5" name="image[]" hidden > <br>
                </div>
            </div>
			</div>	



    </div>


    <hr/>
    <div class="section">
            <h4>Boarding Information</h4>

			<p>*Renting For (Girls / Boys / Any One) : </p >
			
					<div class="radio-1">
				
					<input type="radio" name="gender" value="Boys"> <span>Boys</span>
					<input type="radio" name="gender" value="Girls"> <span>Girls</span> 
					<input type="radio" name="gender" value="AnyOne"> <span>Any One</span> 

					</div>
					<?php if(isset($errors['err6'])) echo "<div class='error'>".$errors['err6']."</div>"; ?>

				
			
			<p>*Renting Options : </p >

					<div class="radio-2">
				
					<input type="radio" name="individual" id="individual" value="Individual"  onclick="text('0')" checked><span id="individual" >&nbsp; <span>Individual</span></span>&nbsp;&nbsp;
					<input type="radio" name="individual" id="RoomOrHome" value="RoomOrHome"  onclick="text('1')" ><span id="RomeOrHome" >&nbsp; <span>Rome Or Home</span></span>&nbsp;&nbsp;
					</div>
					<?php if(isset($errors['err5'])) echo "<div class='error'>".$errors['err5']."</div>"; ?>

				
				

				

				<p>Total Person Count :  </p >
				<input type="number"  name="Pcount" id="pcount" value=1 min=1 max=30 >
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

			<p id="indivi">*Cost Per Person For Month</p >
			<p id="ROrH">*Cost Renting For Month</p >
				<input type="text" name="CPperson" id="cpperson"  >
				<?php   if(isset($errors['err10'])){
							echo "<div class='error2'>".$errors['err10']."</div>"; 
						}elseif(isset($errors['err11'])){
							echo "<div class='error2'>".$errors['err11']."</div>"; 
						}elseif(isset($errors['err16'])){
							echo "<div class='error2'>".$errors['err16']."</div>"; 
						}
				?>

				
				<p>*KeyMoney</p >
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
				<input type="text"  disabled  name="Aamount" id="Aamount" value=3000 min="30" >
				</div>
						
				
    </div>
    <hr/>   
    <div class="submitdiv">
                <input type="submit" class="save" name="submit"  id="submit" value="post advertisement" >
                
                <!-- <button id="submit" type="button" class="save" onclick="toggle()" >post advertisement</button> -->
    </div>

    
                    <script type="text/javascript">

                        function toggle(){
                            //var blur = document.getElementById('blur');
                            //blur.classList.toggle('active')
                            var popup = document.getElementById('popup');
                            popup.classList.toggle('nima')
                        }

                    </script>


					<script>
						$('.group').on('input', '.prc', function() {
    						var totalsum = 0;
							$('.group .prc').each(function() {
								var inputVal = $(this).val();
								if ($.isNumeric(inputVal)) {
									totalsum = parseFloat(inputVal) * 100;
								}

							});
							$('#Aamount').val(totalsum);
							//$('#result').text(totalsum);

							//result=$_SESSION['totalsum']

						});

						$('form').submit(function(e) {
								$(':disabled').each(function(e) {
								$(this).removeAttr('disabled');
							})

						});
					
					</script>
				<!--<label for="">Boarding Images  </label><br>
				<input type="file" name="Bimage{}" id="Bimage" multiple ><br><br>-->
					
						
				<script src="../resource/js/jquery-3.5.1.min.js"></script>
				<script src="../resource/js/custom.js"></script>
				<script src="../resource/js/boarding.js"></script>

                <!-- <script type="text/javascript">

                    function Redirect() {
						//alert("ghjdssdjhs");
						$.ajax({
								url:"../controller/postBoardingCon.php",
								method:"POST",
								data:{deletePost:'nima'},
								dataType:"json",
								success:function(data){
									console.log(data);
									//window.location = "../controller/profile_controlN.php?profile=1";
								}
						});	
                        
                       
                    }
                    
                </script> -->
				


			
				
			</form>



<?php  if (isset($_GET['pop'])){?>
        <div  class="pop-modal" >
		<div class="pop-bg"></div>
	
        <div id="pop">
        
		<?php
		$result_set=boarding::getPostpop($connection);
        $result_post=mysqli_fetch_assoc($result_set);
        $postid=$result_post['B_post_id'];
		$image_p=$result_post['image'];
		$city_p=$result_post['city'];
		$lifespan_p=$result_post['lifespan'];
		$post_amount_p=$result_post['post_amount'];
		$title_p=$result_post['title'];
		?>
		<div class="pop-post">
		<img runat = 'server' style="margin-left: 10px; " src = '<?php echo $result_post['image']?>' height="100" width="100" />
		<div id="pop-post" >

		<h5><?php echo $title_p ?></h5>
		<p style="font-size: small;"><?php echo $city_p ?></p>
		</div>
		
		</div>
		<div class="post-amount">
       
        <p><b style="color: #101e5a;">Amount:</b>  <?php echo $post_amount_p ?></p>
        <p><b style="color: #101e5a;"> valid time period of the post:</b>  <?php echo $lifespan_p ?></p>
		</div>
        <form action="https://sandbox.payhere.lk/pay/checkout" method="post">

            <!-- <p>Address</p>
            <input type="text" name="address" placeholder="Enter Address Name">

            <p>Location link</p>
            <input type="text" name="link" placeholder="Enter Location Name">
               
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password"> -->

            <input type="hidden" name="merchant_id" value="1215562">    <!-- Replace your Merchant ID -->

            <input type="hidden" name="return_url" value='http://localhost/bodima-app/controller/postBoardingCon.php?success'>
            <input type="hidden" name="cancel_url" value="http://localhost/bodima-app/controller/payhereOnlineCancelIshan.php?request_id=<?php echo $request_id;?>">
            <input type="hidden" name="notify_url" value="http://localhost/bodima-app/config/paycon.php"> 



            <!-- <br><p>Boarding Details</p> -->
            <?php
            $B_post_id=$postid;
            $house_num=1;
            $lane='aaa';
            $city='aa';
            $first_name='hgg';
            $last_name='vbvv';
            $st_email='fgf@gmail.com';
            ?>
            <input type="hidden" name="order_id" value="<?php echo $B_post_id;?>">
            <!-- <p>Boarding address:</p> -->
            <input type="hidden" name="baddress" value="<?php echo $house_num.", ". $lane.", ".$city;?>">
            <!-- <p>Boarding Owner Name :</p> -->
            <input type="hidden" name="items" value="<?php echo $city." Boarding KeyMoney";?>"><br>
            <input type="hidden" name="currency" value="LKR">
            <!-- <p>KeyMoney Price(LKR):</p> -->
            <input type="hidden" name="amount" value="<?php echo $post_amount_p;?>">  
                <br><br>
            <!-- <p>My Details</p>
            <p>First Name:</p> -->
            <input type="hidden" name="first_name" value="<?php echo $first_name;?>">
            <!-- <p>Last Name:</p> -->
            <input type="hidden" name="last_name" value="<?php echo $last_name;?>"><br>
            <!-- <p>Email:</p> -->
            <input type="hidden" name="email" value="<?php echo $st_email;?>">
         
            <input type="hidden" name="address" value="No.1, Galle Road">
            <input type="hidden" name="city" value="Colombo">
            <input type="hidden" name="country" value="Sri Lanka"><br><br>
			<div class="pop-btn">
					<!-- <input type = "button" id="submit"  value = "Close" onclick = "Redirect();" /> -->
			<input type = "button" id="submit"  value = "Close" onclick = "window.location = '../controller/postBoardingCon.php?deletePost'"/>
            
            <input type="submit" value="Pay" name="value"> 
   

			</div>
            

        </form>
       </div>
	</div>	
	
    
    <?php }?>
</div>
</div>
    
</body>
</html>


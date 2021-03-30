<?php
require_once ('../config/database.php');
require_once ('../models/food_post.php');

session_start(); 
?>





<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>add iteam</title>
    <link rel="stylesheet" href="../resource/css/new_home.css"> 
	<link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/extra.css">
	<link rel="stylesheet" href="../resource/css/popboarding.css">
    
	<link href="../resource/css/iteam.css" rel="stylesheet">
	<!-- <script src="jquery-3.5.1.min.js"></script> -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	 

	<style>

	</style>
</head>
<body >
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

	<form action="../controller/iteamCon.php" method="post" enctype="multipart/form-data"  class="form">

	<h1>Add Iteam Form</p><!-- postBoarding --> 
    <hr/>

	<div class="section">
		<h4>Iteam Information</h4>

		<p>*Product Name </p >
				
		<input type="text" name="pName" id="pName" class="PName" >
		<?php if(isset($errors['err1'])) echo "<div class='error'>".$errors['err1']."</div>"; ?>


		
		<p>Product Image</p >

			<div id="photo1" class="images" style="position: relative;">
                <label for="inputFile"><img src="https://img.icons8.com/carbon-copy/100/000000/compact-camera.png" class="cam" id="blah1" alt="Img" width="100px" height="100px"><br><br></label>
                <button type="button" class="btn1" data-img-Name=""><i class="far fa-window-close fa-2x"></i></button>
                <input type="file" id="inputFile" name="pimage" hidden accept=".jpg, .png, .jpeg" > <br>
            </div>
		


			<p>*Price</p >
			<input type="text" name="price" id="price" >
			<?php   if(isset($errors['err2'])){
						echo "<div class='error2'>".$errors['err2']."</div>"; 
					}elseif(isset($errors['err3'])){
						echo "<div class='error2'>".$errors['err3']."</div>"; 
					}
			?>
	</div>

	<hr/>

	<div class="section">
				<!-- <label class="radio"> -->
					<input type="checkbox" name="breakfirst" id="breakfirst" value="1"><span>   Breakfirst</span>
					
				<!-- </label> -->
				
		<br>
				
				<!-- <label class="radio"> -->
					<input type="checkbox" name="lunch" id="lunch" value="1" checked><span>   Lunch</span>
					
				<!-- </label> -->
				
        <br>
        
				
				<!-- <label class="radio"> -->
					<input type="checkbox" name="dinner" id="dinner" value="1"><span >   Dinner</span>
					
				<!-- </label> -->
						
	</div>
	<hr>

	<div class="submitdiv">
	
                <input type="submit" class="save" name="submit"  id="submit" value="post advertisement" >
                
                <!-- <button id="submit" type="button" class="save" onclick="toggle()" >post advertisement</button> -->
    </div>

	<div class="submitdiv">
	
                <input type="submit" class="save" name="submit"  id="submit" value="Add Iteam" >
                
                <!-- <button id="submit" type="button" class="save" onclick="toggle()" >post advertisement</button> -->
    </div>

    
	</div>
			
			<script type="text/javascript">

				function toggle(){
					//var blur = document.getElementById('blur');
					//blur.classList.toggle('active')
					var popup = document.getElementById('popup');
					popup.classList.toggle('nima')
					}

			</script>

		
			<script src="../resource/js/jquery-3.5.1.min.js"></script>
			<script src="../resource/js/custom.js"></script>
			<script src="../resource/js/notBack.js"></script>
				
	</form>

	<?php  if (isset($_GET['popf'])){?>
        <div  class="pop-modal" >

        <div class="pop-bg"></div>
        
        <div id="pop">	
        
		<?php
		$result_set=foodSupplierPost::getPostpopf($connection);
        $result_post=mysqli_fetch_assoc($result_set);
        $postid=$result_post['F_post_id'];
		$image_p=$result_post['image'];
		$type_p=$result_post['type'];
		$lifespan_p=$result_post['lifespan'];
		$post_amount_p=$result_post['post_amount'];
		$ad_title_p=$result_post['ad_title'];
		$orderingtimedeadline_p=$result_post['orderingtimedeadline'];
		?>
		
		<div class="pop-post">
		<img runat = 'server' src = '<?php echo $result_post['image']?>' height="100" width="100" />
		<div id="pop-post" >

		<h5><?php echo $ad_title_p ?></h5>
		<p style="font-size: small;"><?php echo $type_p ?></p>
		<p style="font-size: small;"><?php echo $orderingtimedeadline_p ?></p>
		
		
	
		</div>
		</div>
        <div class="post-amount">
        <p><b style="color: #101e5a;">Amount:</b> <?php echo $post_amount_p ?></p>
        <p> <b style="color: #101e5a;"> valid time period of the post:</b> <?php echo $lifespan_p ?></p>
		</div>
        <form action="https://sandbox.payhere.lk/pay/checkout" method="post">

            <!-- <p>Address</p>
            <input type="text" name="address" placeholder="Enter Address Name">

            <p>Location link</p>
            <input type="text" name="link" placeholder="Enter Location Name">
               
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password"> -->

            <input type="hidden" name="merchant_id" value="1215562">    <!-- Replace your Merchant ID -->

            <input type="hidden" name="return_url" value='http://localhost/bodima-app/controller/iteamCon.php?success'>
            <input type="hidden" name="cancel_url" value="http://localhost/bodima-app/controller/payhereOnlineCancelIshan.php?request_id=<?php echo $request_id;?>">
            <input type="hidden" name="notify_url" value="http://localhost/bodima-app/config/paycon.php"> 



            <!-- <br><p>Boarding Details</p> -->
            <?php
            $F_post_id=$postid;
            $house_num=1;
            $lane='aaa';
            $city='aa';
            $first_name='hgg';
            $last_name='vbvv';
            $st_email='fgf@gmail.com';
            ?>
            <input type="hidden" name="order_id" value="<?php echo $F_post_id;?>">
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
			<input type = "button" id="submit"  value = "Close" onclick = "window.location = '../controller/iteamCon.php?deletePost'"/>
            
            <input type="submit" id="foodpay" value="Pay" name="value" style="margin: 0%;"> 
   
            </div>
        </form>
        </div>
    </div>
		
    
    <?php }?>
</div>
		
</body>
</html>
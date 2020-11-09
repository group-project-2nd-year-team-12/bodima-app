<?php include('../config/database.php');?>
<?php include('../models/reg_userIshan.php');?>


 <?php session_start(); 
//print_r($_SESSION);?>

 <?php if (!isset($_SESSION['first_name'])) {
    header('Location: ../index.php');
} 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Boarding Owner Page</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" type="text/css" href="../resource/css/main.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="../resource/css/nav1.css"> -->
	<link rel="stylesheet" type="text/css" href="../resource/css/nav.css">
   <link rel="stylesheet" href="../resource/css/requestlistIshan.css"> 
    <link rel="stylesheet" href="../resource/css/footer.css">
    <link rel="stylesheet" href="../resource/css/all.css">



</head>
<body>
<div class="container" id="container">
       <?php include 'nav.php' ?>


<div class="container">
    <div class="new-order">
        <h5>Confirm Boarding Deal</h5>
    </div>

<main role="main">

      <section >
        <div >
            <?php
        //  print_r($_SESSION);
           $BO_email=$_SESSION['email'];
           $BOid=$_SESSION['BOid'];
       // echo "<br>".$_SESSION['Bid'];

         

          
        
          $data=reg_userIshan::SelectConBODeal($connection,$BOid);
            


             if ($data) {
                $i=0;

                while ($user=mysqli_fetch_assoc($data)) {
                    $i++;
                    ?>





                <div class="item-wrap">
                       <h3>Request  :<?php echo $i?></h3>
                      
                    <div class="cart-item">
                    <img src="<?php echo $user['image']; ?>" style="width:140px;height:150px;">
                    <form action="../controller/CDealBoardingOIshan.php" method="post">

                          <div class="product-details">
                            
                            <h5>Student Eamil :<span><?php echo $user['student_email']; ?></span></h5>

                            
                          
                        </div>
                       

                         <h4>Request :<span><?php echo $user['message']; ?></span></h4>
                      

                        <h4>Request Date :<span><?php echo $user['date']; ?></span></h4>


                        <div class="btn1">
                                 <input type="hidden" name='B_post_id' value="<?php echo $user['B_post_id']; ?>">
                                <input type="hidden" name='student_email' value="<?php echo $user['student_email']; ?>">
                              <!--  <input type="hidden" name='address' value="<?php// echo $address; ?>">
                                <input type="hidden" name='email' value="<?php //echo $email; ?>">
                                <input type="hidden" name='first_name' value="<?php //echo $first_name; ?>">
                                <input type="hidden" name='last_name' value="<?php//echo $last_name; ?>"> -->
                                <button class="btn5" name="accept" type="submit">Add</button>
                               <!--  <button class="btn2" name="remove" type="submit">cancel</button> -->
                            </div>
                        
                    </div>
                </div>
            </form>
                <?php
                    }
                }else{
                    echo "No Pending Requests.";
                }
                //echo $user['date'];
            ?>

			 	
			 		<!-- 
			 		 <p >Student Email:<?php   ?></p> 

			 		 <p >Boarding post id:<?php //echo $user['B_post_id'] ?></p>
                      <p ><?php //echo $user['message'] ?></p>
                      <p>

                        <a  href="accept.php?B_post_id=<?php //echo $user['B_post_id']?> & student_email=<?php //echo $user['student_email']?>">Accept</a>
                        <a  href="reject.php?B_post_id=<?php //echo $user['B_post_id']?> & student_email=<?php //echo $user['student_email']?>">Reject</a>
                      </p>
                    <small><i><?php //echo $user['date'] ?></i></small>
                    <hr>
 -->
                  
           






            
           
          
        </div>
          
      </section>

    </main>

</div>
<script src="../resource/js/home1.js"></script>
<script src="../resource/js/jquery.js"></script>
</body>
</html>
<?php include 'footer.php'?>
<?php $connection->close(); ?>









                
                          
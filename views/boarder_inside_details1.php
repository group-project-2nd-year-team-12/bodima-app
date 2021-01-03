<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <title>profile</title>
	 <link rel="stylesheet" href="../resource/css/new_home.css">
	 <link rel="stylesheet" href="../resource/css/all.css">
	 <link rel="stylesheet" href="../resource/css/sidebar2.css">
	 
   
	 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="../resource/css/boarder_inside_details1.css">
    <link rel="stylesheet" href="../resource/css/extra.css">
</head>

 <body>


 <?php require "header1.php"?>
	 <div class="container1">
     	
     <div class="container2">
        <div class="sidebar_b">
        <?php require "sidebar1.php"?>	
        </div>
        <div class="middle_b"> 
        <!-- ../controller/boarder_list_controlN.php?boarderlist=1 -->

        <?php 
        $details=unserialize($_GET['details']);
        $parent=unserialize($_GET['parent']);
        $payments=unserialize($_GET['pay']);
        // print_r($payments);
        ?>

          <h1>boarders<a href="../controller/boarder_list_controlN.php?boarderlist=1"><button class="paid"><i class="fas fa-chevron-left"></i>Back</botton></a></h1>
              <div class="mid_E">
                  <div class="top_info">
                  <div style="margin-right:30px;"><img src="../resource/Images/a.jpg" class="profile_image" alt=""></div>
                  <div>
                  <h2><?php echo $details['first_name'].' '.$details['last_name']?></h2> 
                  <p>boarding : <?php echo $details['Bp_address']?></p>
                  <p>post no: 000<?php echo $details['B_post_id']?></p>
                 </div>
                </div>
                 <br/><br/>
                <h3>Rent &nbsp;Payments</h3>
                <hr/>
                <div class="filter_block">
                <span>filters</span>
                <hr/>
                </div>
                <div class="pay_list">
                    <div class="head_block">
                    <li>
                        <span>Month</span>
                        <span>amount</span>
                        <span>date</span>
                        <span>time</span>
                        <span>method</span>
                    </li>
                    </div>

                    <?php foreach($payments as $payment){?>
                    <li>
                    <span><?php echo $payment['year']?> <?php echo date('F', mktime(0, 0, 0,$payment['month'], 10)); ?></span>
                        <span><?php echo $payment['amount']?>.00</span>
                        <span><?php echo date("Y/m/d",strtotime($payment['paidDateTime']))?></span>
                        <span><?php echo date("H:i:s",strtotime($payment['paidDateTime']))?></span>
                        <span><h5>&nbsp;&nbsp;&nbsp;<?php echo $payment['cash/card']?></h5></span>
                    </li>
                    <?php }?>
                    
                </div>

              </div>
              <div class="mid_F">
                  <div class="button_set">
                    <li style="width: 30%;">Info</li>
                    <li style="width: 36%;">Set Notifications</li>
                    <li style="width: 33%;">Cash Payment Entry</li>
                  </div>
                  
                    <div class="Info">
                        <h3>Info</h3>
                        <hr/>
                        <span>boarder information</span>
                        <li>
                            <div class="info_th">Name </div>
                            <div class="info_td"> : <?php echo $details['first_name'].' '.$details['last_name']?></div>
                        </li>                        
                        <li>
                            <div class="info_th">gender </div>
                            <div class="info_td"> : <?php if($details['gender']=='Boys') {echo 'Male';}else{echo 'Female';}?></div>
                        </li>
                        <li>
                            <div class="info_th" style="text-tranform:uppercase;">NIC</div>
                            <div class="info_td"> : <?php echo $details['NIC']?> </div>
                        </li>
                        <li>
                            <div class="info_th">address </div>
                            <div class="info_td"> : <?php if(strlen(trim($details['address']))>0){ echo $details['address'];} else{echo 'none';}?></div>
                        </li>                        
                        <li>
                            <div class="info_th">institute </div>
                            <div class="info_td"> : <?php echo $details['institute']?></div>
                        </li> 
                        <li>
                            <div class="info_th">phone </div>
                            <div class="info_td"> : <?php echo $details['telephone']?></div>
                        </li> 
                        <br/>
                        <span>parent's information</span>
                        <br/>                      
                        <li>
                            <div class="info_th" style="width: 40%; padding-right:0px;">parent name</div>
                            <div class="info_td">: <?php echo $parent['parent_name']?></div>
                        </li>  
                        <li>
                            <div class="info_th">phone </div>
                            <div class="info_td" >: <?php echo $parent['parent_telephone']?></div>
                        </li>
                        <br/>  
                        <hr/>                   
                    </div>


                    <div class="Set_Notifications">
                        <h3>Set Notifications</h3>   
                        <hr/>
                        <div class="deadline_calender">
                        Set deadline :
                        </div>
                        <div class="radio">
                            <div class="radio_in">
                            <input type="radio" id="only_this_month" name="month" value="only_this_month">
                            <label for="only_this_month">Only this month</label><br>
                            </div>
                            <div class="radio_in">
                            <input type="radio" id="every_month" name="month" value="every_month">
                            <label for="every_month">Every month</label><br>
                            </div>
                        </div>
                        <div class="notification_description">
                        1. 1st notification will send - on 2020/10/02<br/>
                        2. 2nd remainder will send - on 2020/10/05<br/>
                        3. 3rd remainder will send on deadline<br/>
                        </div>
                        <hr/>
  

                    </div>

                    <div class="Cash_Payment_Entry">
                        <h3>Cash Payment Entry</h3>
                        <hr/>
                        <div class="w"  style="display:flex;">
                        <div class="p_entry_h">Month </div>
                        <div class="p_des">
                        <form>
                        : <select name='myfield' onchange='this.form.submit()'>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            </select>
                            <noscript><input type="submit" value="Submit"></noscript>
                        </form>
                        </div>
                        </div>

                        <div  class="w" style="display:flex;">
                        <div class="p_entry_h">Amount  </div>
                        <div class="p_des">
                        : <input type="text" name="amount" placeholder="6000.00">
                        </div>
                        </div>
                        <div class="a">
                        <button class="paid"><i class="fas fa-check"></i> PAID</botton>
                        </div>
                        </div>
                    </div>

                 
              
               
               
              </div>
        </div>
        
    </div>

	</div>	
	 
	 <script>
    // $('.btn').click(function(){
    //   $(this).toggleClass("click");
      $('.sidebar').toggleClass("show");
    // });
      $('.profile-btn').click(function(){
        $('nav ul .profile-show').toggleClass("show");
        $('nav ul .first').toggleClass("rotate");
      });
      $('.serv-btn').click(function(){
        $('nav ul .serv-show').toggleClass("show1");
        $('nav ul .second').toggleClass("rotate");
      });

      $('nav ul .open-show').toggleClass("show1");

      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });
    </script>
</body>
</html>

    
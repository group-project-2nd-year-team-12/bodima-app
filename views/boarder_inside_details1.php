<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <title>boarder details</title>
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
    <link rel="stylesheet" href="../resource/js/jquery-ui.css">
	<script type="text/javascript" src="../resource/js/jquery.js"></script>
	<script type="text/javascript" src="../resource/js/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        if(isset($_GET['details']))
        {$details=unserialize($_GET['details']);}else{$details="NULL";} 
        
        if(isset($_GET['parent']))
        {$parent=unserialize($_GET['parent']);}else{$parent="NULL";}
        
        if(isset($_GET['pay']))
        {$payments=unserialize($_GET['pay']);}else{$payments="NULL";}

        if(isset($_GET['months']))
        {$months=unserialize($_GET['months']);}else{$months="NULL";}

        if(isset($_GET['amount']))
        {$amount=unserialize($_GET['amount']);}else{$amount="NULL";}
        
        if(isset($_GET['deal_list']))
        {$deal_list=unserialize($_GET['deal_list']); print_r($deal_list);}else{$deal_list="NULL";}

        // echo date('Y F');
      
        
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
                <span><a href="../controller/boarder_inside_controlN.php?Bid=<?php echo $details['Bid'];?>"><i class="fas fa-sync-alt"></i></a></span>
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

                    <?php if($payments=="NULL"){
                              echo "<li style='padding-left:150px;'><br>No payments recorded!</li>";}
                          else{
                            foreach($payments as $payment){?>
                    <li>
                    <span><?php echo $payment['year']?> <?php echo date('M', mktime(0, 0, 0,$payment['month'], 10)); ?></span>
                        <span><?php echo $payment['amount']?>.00</span>
                        <span><?php echo date("Y/m/d",strtotime($payment['paidDateTime']))?></span>
                        <span><?php echo date("H:i:s",strtotime($payment['paidDateTime']))?></span>
                        <span><h5>&nbsp;&nbsp;&nbsp;<?php echo $payment['cash_card']?></h5></span>
                    </li>
                    <?php }}?>
                    
                </div>

              </div>
              <div class="mid_F">
                  <div class="button_set">
                    <li style="width: 30%;" id="info">Info</li>
                    <li style="width: 36%;" id="notifi">Set Notifications</li>
                    <li style="width: 33%;" id="cashpay">Cash Payment Entry</li>
                  </div>
                  <div class="flexy" >
                    <div class="Info" id="Info">
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
                            <div class="info_td">: <?php if(isset($parent['parent_name'])){echo $parent['parent_name'];} else{echo "no value entered";}?></div>
                        </li>  
                        <li>
                            <div class="info_th">phone </div>
                            <div class="info_td" >: <?php if(isset($parent['parent_telephone'])){echo $parent['parent_telephone'];} else{echo "no value entered";}?></div>
                        </li>
                        <br/>  
                        <hr/>                   
                    </div>


                    <div class="Set_Notifications" id="Set_Notifications">
                        <h3>Set Notifications</h3> 
                        <form method="post" id="setmsg" action="../controller/boarder_inside_controlN.php?Bid=<?php echo $details['Bid']?>" >
                        <hr/>
                        <div class="deadline_calender">
                        Set deadline : <input type="text" name="calendar" id="calendar" autocomplete='off' />
                        
                        </div>
                        <div class="radio">
                            <div class="radio_in">
                            <input type="radio" id="only_this_month" name="occure" value="only_this_month">
                            <label for="only_this_month">Only this month</label><br>
                            </div>
                            <div class="radio_in">
                            <input type="radio" id="every_month" name="occure" value="every_month">
                            <label for="every_month">Every month</label><br>
                            </div>
                        </div>
                        <div class="description_block">
                            <br/>
                        <span id="downbefore"><i class="fas fa-chevron-down"></i> notification description...</span>
                        <span id="upafter"><i class="fas fa-chevron-up"></i> notification description...</span>
                            <div class="notification_description" id="notification_description">
                            
                            </div>
                        </div>
                        <br/>
                        <div id="text">
                                <textarea name="mssage" id="mssage" cols="50" rows="4" >preview not available! please select deadline first.</textarea>
                        </div>
                        <div class="btn_block">
                       
                        <div><button type="submit" id="set" name="set" class="x" onclick="confirmSET()">Send</button></div>
                        </form>
                        <div id="preview" name="preview" class="y"> See Preview</div>
                        </div>
                        <br/>
                        <hr/>
  
                   
                    </div>

                    <div class="Cash_Payment_Entry" id="Cash_Payment_Entry">
                    <form method="post" action="../controller/boarder_inside_controlN.php" >
                        <h3>Cash Payment Entry</h3>
                        <hr/>
                        <input type="hidden" name="Bid" value="<?php echo $details['Bid'];?>">
                        <div class="w"  style="display:flex;">
                        <div class="p_entry_h">Month </div>
                        <div class="p_des">
                        
                        : <select name='setdate'>

                            <?php 
                                   
                                
                                  $xflag=0;
                                  $c=0;
                                  foreach($months as $month)
                                  {

                                    if($month['month']=="over")
                                    {
                                        $xflag=1;
                                    }else if($xflag==0){
                                        if(strtotime(date('Y F'))>=$month['time'])
                                        {
                                            echo "<option>".$month['month']."</option>";
                                            $c=$c+1;
                                        }else{
                                            $xflag=1;
                                        
                                        }
                                      
                                    }
                                  }

                                  if($c==0 && $_GET['f']==1){
                                    echo "<option> all payments complete</option>";
                                  }else{
                                    foreach($deal_list as $val){
                                      echo "<option>".$val['month']."</option>";
                                    }
                                    
                                  }

                                  

                              
                              ?>
                            </select>
                        </div>
                        </div>

                        <div  class="w" style="display:flex;">
                        <div class="p_entry_h">Amount  </div>
                        <div class="p_des">
                        : <input type="text" name="amount" value="<?php echo $amount['cost_per_person']?>" placeholder="<?php echo $amount['cost_per_person']?>.00">
                        </div>
                        </div>
                        <div class="a">
                          <?php if($xflag==0){?>
                        <button type="submit" class="paid" name="paidurl" id="paid" ><i class="fas fa-check" ></i> PAID</botton>
                        <?php }else{?>
                          <button type="submit" class="paid" name="paidurl" id="paid" disabled>
                        <?php
                        }?>
                      </div>
                        </form>
                        </div>
                        </div>
                    </div>

                 
              
               
               
              </div>
        </div>
        
    </div>

    </div>

    <script >
		// $(document).ready(function(){
		// 	$("#calendar").datepicker({
    //     minDate:-0,
    //     maxDate:"+4m"
    //   });
		// });

    $(document).ready(function() {
    
    $("#calendar").datepicker({
         minDate:-0,
          maxDate:"+4m",
      onSelect: function(dateText) {
        var date = $(this).datepicker("getDate"); //Get the Date object with actual date
            date.setDate(date.getDate()-3);
            m=date.getMonth()+1;
            d=date.getDate() ;      // 30
            y=date.getFullYear();
            
      display(" 1. 1st notification will send today <br>2. 2nd remainder will send - on " +m+'/'+d+'/'+y+"<br>3. 3rd remainder will send on deadline ("+dateText+")");

       dynamic_notify(date.getDate()+3,m,y); 
      
      }
    })
  
    function display(msg) {
       $('#notification_description').html(msg).append();
    }

    function dynamic_notify(d,m,y) {
      var month_name=getMonthName(m-1);
       var content = month_name + " is due. Please pay the rent before "+m+'/'+d+'/'+y;
      $("#mssage").val(content);
    }

    getMonthName = function (v) {
    var n = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    return n[v]
}
    });




	</script>
<script>


   
    

</script>	
    <script>
		$(document).ready(function(){
		  $("#cashpay").click(function(){
		    $("#Cash_Payment_Entry").css("order","1");
		    $("#Info").css("order","2");
            $("#Set_Notifications").css("order","3");
		  });

          $("#notifi").click(function(){
            $("#Set_Notifications").css("order","1");
		    $("#Cash_Payment_Entry").css("order","3");
		    $("#Info").css("order","2"); 
		  });

          $("#info").click(function(){
            $("#Set_Notifications").css("order","2");
		    $("#Cash_Payment_Entry").css("order","3");
		    $("#Info").css("order","1"); 
		  });

          $("#downbefore").click(function(){
            $("#downbefore").hide();
            $("#notification_description").hide("slow");
            $("#upafter").show();
		  });

          $("#upafter").click(function(){
            $("#downbefore").show();
            $("#notification_description").show("slow");
            $("#upafter").hide();
		  });

          $("#preview").click(function(){
            $("#preview").hide();
            $("#text").show("slow");
            $("#set").show("slow");
            
		  });

      
		});
</script>


	 
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


      $("#set").click(function(){
        alert("Do you want to send the notification? confirm settings : click OK.")
        $("#setmsg").submit();
       
      });
    </script>
</body>
</html>

    
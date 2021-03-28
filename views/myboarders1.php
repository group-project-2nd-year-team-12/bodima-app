<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <title>myborders</title>
	 <link rel="stylesheet" href="../resource/css/new_home.css">
	 <link rel="stylesheet" href="../resource/css/all.css">
	 <link rel="stylesheet" href="../resource/css/sidebar2.css">
	 
   
	 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="../resource/css/myboarders1.css">
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
          <h1>MY BOARDERS</h1>
              <div class="mid_C">
              <div style="display:flex; justify-content:space-between;">  
              <h3>List view</h3>
                <div class="search_boarder">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search_boarder" id="search_boarder" placeholder="Search here. . .">
                </div>
                </div>
                <hr/>
                <div class="h1btn"><div><a href="../controller/BOwner_reports_Control.php?q=1"><button class="p_edit" name="p_edit" value="Edit"><i class="fas fa-print"></i>Genarate Reports</button></a></div></div>
                <div class="list_view">
                  

                  <?php $boarderlist=unserialize($_GET['blist']);
                      foreach($boarderlist as $detail ){?>
                                  <!-- boarder_inside_details1 -->
                                  <!-- ../controller/boarder_inside_controlN.php?Bid=-->
                      <div class="l_item" onclick="location.href='../controller/boarder_inside_controlN.php?Bid=<?php echo $detail['Bid']?>'" >
                        <div><img src="<?php echo $detail['profileimage']?>" class="profile_image" alt=""></div>
                        <li><?php echo $detail['first_name'].' '.$detail['last_name']?><p>boarding : <?php echo $detail['Bp_address'] ?></p><p>post no:000<?php echo $detail['B_post_id'] ?></p></li>
                        <div class="icon_strip">
                        <a><i class="fas fa-info"></i></a>
                        <a><i class="fas fa-bell"></i></a>
                        <a><i class="fas fa-dollar-sign"></i></a>
                        </div>
                        <a href="#"><button class="boarder_delete">Remove</button></a>
                    </div>

                     <?php }?>

                    
                </div>

              </div>
              <div class="mid_D">
              <div class="stat_bar2">
                  <div class="stat_item2"><li>Boarders</li><span> 6</span><p>results</p></div>
                  <div class="stat_item2"><li>Requests</li><span> 14</span><p>results</p></div>
                  <div class="stat_item2"><li>Notifications</li><span>4</span><p>results</p></div>


</br></br></br></br>
                </div>
              </div>
        </div>
        
    </div>

	</div>	
	 <!-- ********************sidebar ************************************************ -->
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

<!-- ******************** search boarders -live ********************************** -->
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
	
	$('#search_boarder').keyup(function(){
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

</script>


</body>
</html>

    
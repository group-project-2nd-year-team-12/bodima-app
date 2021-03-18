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
    <link rel="stylesheet" href="../resource/css/BOwner_reports.css">
    <link rel="stylesheet" href="../resource/css/extra.css">
    <link rel="stylesheet" href="../resource/js/jquery-ui.css">
	<script type="text/javascript" src="../resource/js/jquery.js"></script>
	<script type="text/javascript" src="../resource/js/jquery-ui.js"></script>
</head>

 <body>
 <?php require "header1.php"?>
	 <div class="container1">
         <?php 
         $results=unserialize($_GET['results']);
         $border_names=unserialize($_GET['bname']);
         $postnum=unserialize($_GET['postnum']);

        //  print_r($results);
         ?>
     <div class="container2">
        <div class="sidebar_b">
        <?php require "sidebar1.php"?>	
        </div>
        <div class="middle_b">
          <h1>Genarate Reports</h1>
          <form method="post" action="../controller/BOwner_reports_Control.php">
          <div class="mid_N">
          <div class="filterBtnSet">
              <div class="inner_filterBtnSet">
                <div class="filtr_1">
                    <div class="fltr_btn" id="fltr_btn"><i class="fas fa-filter"></i></div>
                </div> 
                    <div class="filtr_1">
                    <div class="fltr_btn" style="background-color:rgb(221, 220, 220);"><i class="fas fa-ellipsis-h"></i></div>
                </div>    
                <div class="filtr_1">
                    <span>Sort by</span>
                    <select name="sort_by">
                        <option value="paidDateTime">date</option>
                        <option value="first_name">name</option>
                        <option value="amount">amount</option>
                        <option value="B_post_id">post number</option>
                        <!-- don't change option values >> these are database column names  -->
                    </select>
                </div>
                <div class="filtr_1">
                    <span>Order</span>
                    <select name="order">
                        <option value="DESC">Descending</option>
                        <option value="ASC">Ascending</option>
                    </select>
                </div>
                </div>
                <div class="go2">
                        <input type="submit" name="go1" id="go1" value="Go">
                    </div>
            </div>

            <div class="filters" id="filters">
                <div class="filt_title">
                    <span>Filters 
                    <i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="filt_body">
                    <div class="inner_filt_body">
                    <div class="filtr_1">
                        <span>Boarder Name</span>
                        <select name=filter_Bid>
                            <option value="all">All</option>
                            <option value="48">Anuki Gayara</option>
                            <option value="37">Nimasha</option>
                        </select>
                    </div>
                    <div class="filtr_1" style=" margin: 0px 5px 0px 20px;">
                        <span><i class="far fa-calendar-alt"></i> From</span>
                        <input type="text" name="fromDate" id="fromDate" autocomplete='off'/>
                    </div>
                    <div class="filtr_1" style=" margin: 0px 20px 0px 5px;">
                        <span>to</span>
                        <input type="text" name="toDate" id="toDate" autocomplete='off'/>
                    </div>
                    <div class="filtr_1">
                        <span>Method</span>
                        <select name="method" style="width:80px;">
                            <option value="all">All</option>
                            <option value="online">Online</option>
                            <option value="cash">Cash</option>
                        </select>
                    </div>
                    <div class="filtr_1">
                        <span>PostNo</span>
                        <select name="filter_postno" style="width:80px;">
                            <option value="all">All</option>
                            <option value="1">0001</option>
                            <option value="4">0004</option>
                            <option value="5">0033</option>
                            <option value="2222">2222</option>
                        </select>
                    </div>
                    </div>
                    <div class="go1">
                        <input type="submit" name="go1" id="go1" value="Go">
                    </div>
                </div>
            </div>
</div>
</form>

              <div class="mid_M">
              <div style="display:flex; justify-content:space-between;">  
              <h3>Details</h3>
              <div class="h1btn"><div><a href="../views/BOwner_reports.php"><button class="p_edit" name="p_edit" value="Edit"><i class="far fa-file-pdf"></i>Genarate PDF</button></a></div></div>

                </div>
                <hr/>
                <div class="list_view">
                <div class="result">
                        

                        <?php 
                        if($results=='no result found'){
                            echo "no results found";
                        }else{
                            $size=sizeof($results);
                            echo $size." results available"; ?>
                        <table>
                        <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Payment Month</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>postNo</th>
                        </tr>

                        <?php 
                        foreach($results as $row){ ?>
                        <tr>
                        <td><?php echo $row['paidDateTime']?></td>
                        <td><?php echo $row['first_name']?></td>
                        <td><?php echo $row['year'].' '.date("F",mktime(0,0,0,$row['month'],0,0))?></td>
                        <td><?php echo $row['amount']?> </td>
                        <td><?php echo $row['cash_card']?></td>
                        <td><?php echo '000'.$row['B_post_id']?></td>
                        </tr>

                        <?php }}?>
                        

                        </table>
                        </div>
    
                </div>

              </div>
              
        </div>
        
    </div>

    </div>	
    
    <script>
		$(document).ready(function(){
			$("#toDate").datepicker({
        maxDate:0
      });
		});

        $(document).ready(function(){
			$("#fromDate").datepicker({
        maxDate:0
      });
		

        
            $("#fltr_btn").click(function(){
                $("#filters").show("slow");
            });
        });
	</script>
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
</body>
</html>

    
















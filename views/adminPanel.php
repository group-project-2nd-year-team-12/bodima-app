<?php require_once ('../config/database.php');
      require_once ('../models/adminModel.php');
      include ('adminChart.php');
?>
<?php 
$userCount=$_GET['student']+$_GET['boarding_owner']+$_GET['boarder']+$_GET['food_supplier'];
$bConut=$_GET['boarding_count'];
$fConut=$_GET['food_count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resource/css/admin.css">
    <link rel="stylesheet" href="../resource/css/all.css">
    <title>Document</title>
  
</head>
<body onload="checked('dash')">
    <div class="container">
        <div class="wrapper">
        <?php include 'adminSidebar.php' ?>
        <?php include ("liveSupport.php"); ?>
            <div class="content" style="overflow:hidden">
                                <!-- dashboard card -->
            <div class="background">
            <h3>Dash Board</h3>
            <div>
                
            </div>
                    <div class="numbers">
                        <div class="num1">
                            <h2>Users</h2>
                            <div  class="num-format">
                                <div style="text-align: center;"><img src="https://img.icons8.com/pastel-glyph/64/bdc3ff/business-group--v1.png"/></div>
                                <h1><?php echo $userCount; ?></h1>
                            </div>
                        </div>
                        <div class="num2">
                            <h2>Boarding Posts</h2>
                            <div  class="num-format">
                                <div style="text-align: center;"><img src="https://img.icons8.com/fluent-systems-regular/64/67ff84/cottage.png"/></div>
                                <h1><?php echo $bConut; ?></h1>
                            </div>
                        </div>
                        <div class="num3">
                            <h2>Food posts</h2>
                            <div  class="num-format">
                                <div style="text-align: center;"><img src="https://img.icons8.com/wired/64/f3f9af/kawaii-french-fries.png"/></div>
                                <h1><?php echo $fConut; ?></h1>
                            </div>
                        </div>
                        <div class="num4">
                            <h2>Complaint</h2>
                             <div class="num-format">
                                <div style="text-align: center;"><img src="https://img.icons8.com/wired/64/ff9393/strike.png"/></div>
                                <h1><?php echo $userCount; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="orderDetails">
                        <div>
                           <div>
                                <img src="https://img.icons8.com/wired/40/3c55b1/kawaii-egg.png"/>
                                <h4>All Orders</h4>
                           </div>
                           <h2 id="all"></h2>
                        </div>
                        <div>
                           <div>
                           <img src="https://img.icons8.com/wired/40/3c55b1/kawaii-cupcake.png"/>
                                <h4 >Pending Orders</h4>
                           </div>
                           <h2 id="pendingOrder">34</h2>
                        </div>
                        <div>
                           <div>
                           <img src="https://img.icons8.com/wired/40/3c55b1/kawaii-bread-1.png"/>
                                <h4>Complete Orders</h4>
                           </div>
                           <h2 id="completeOrder"></h2>
                        </div>
                    </div>
                    <div class="requestDetails">
                    <div>
                           <div>
                           <img src="https://img.icons8.com/wired/40/3c55b1/work-from-home.png"/>
                                <h4>Boarding request</h4>
                           </div>
                           <h2 id="allReq"></h2>
                        </div>
                        <div>
                           <div>
                           <img src="https://img.icons8.com/wired/40/3c55b1/secured-by-alarm-system.png"/>
                                <h4>Pending request</h4>
                           </div>
                           <h2 id="penReq"></h2>
                        </div>
                        <div>
                           <div>
                           <img src="https://img.icons8.com/wired/40/3c55b1/hospital-3.png"/>
                                <h4>Accept request</h4>
                           </div>
                           <h2 id="comReq"></h2>
                        </div>
                    </div>
                </div>
                    <!-- profit chart -->
                    <div class="content-3">
                    <div class="chart3" style="background-color:  rgba(145, 145, 255, 0.300);">
                        <h3>All Revinue</h3>
                        <div><img src="https://img.icons8.com/pastel-glyph/80/4a90e2/graph--v1.png"/></div>
                        <div class="box-details">
                            <h2><i class="fas fa-long-arrow-alt-up"></i> <span id="allRenu"></span></h2>
                            <h5>2021</h5>
                        </div>
                    </div>
                    <div class="chart3" style="background-color:  rgba(145, 145, 255, 0.300);">
                        <h3>Revinue Boarding Posts</h3>
                        <div><img src="https://img.icons8.com/windows/80/4a90e2/rgb-histogram.png"/></div>
                        <div class="box-details">
                            <h2><i class="fas fa-long-arrow-alt-up"></i> <span id="boardingRenu"></span></h2>
                            <h5>2021</h5>
                        </div>
                    </div>
                    <div class="chart3" style="background-color:  rgba(145, 145, 255, 0.300);">
                        <h3>Revinue Food Posts</h3>
                        <div><img src="https://img.icons8.com/ios/80/4a90e2/scatter-plot.png"/></div>
                        <div class="box-details">
                            <h2><i class="fas fa-long-arrow-alt-up"></i> <span id="foodRenu"></span></h2>
                            <h5>2021</h5>
                        </div>
                    </div>
                    <div class="chart3" style="background-color:  rgba(145, 145, 255, 0.300);">
                        <h3>Order Transaction</h3>
                        <div><img src="https://img.icons8.com/pastel-glyph/80/4a90e2/line-chart--v1.png"/></div>
                        <div class="box-details">
                            <h2><i class="fas fa-long-arrow-alt-up"></i> <span id="orderTotal"></span></h2>
                            <h5>2021</h5>
                        </div>
                    </div>
             
                </div>
                <div class="charts">
                    <div class="chart1">
                        <h3><i class="fa fa-chart-pie"></i> Users</h3>
                        <div id="userDetails" style="width: 400px; height: 200px;background-color:white;"></div>
                    </div>
                    <div class="chart2">
                        <h3><i class="fa fa-chart-bar"></i> New  Users Registration</h3>
                        <div id="chart_admin" style="width: 100%; height: 200px;"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</body>
<script src="../resource/js/admin.js"></script>
<script src="../resource/js/jquery.js"></script>
<script src="../resource/js/dashboard.js"></script>
</html>


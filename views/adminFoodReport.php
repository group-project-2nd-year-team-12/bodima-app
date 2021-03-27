<?php
require_once ('../config/database.php');
require_once ('../models/adminModel.php');
require_once ('adminChart.php');
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
<body onload="checked('report')">

    <div class="container">

        <div class="wrapper">
        <?php include 'adminSidebar.php' ?>
      
        <div style="overflow-x: hidden;" class="content">
        <!-- circle -->
        <div class="summery">
            <h4>Value Of Total Transaction</h4>
            <div class="circle">
                <h1 id="addPec"></h1>
            </div>
        </div>

        <!-- all users -->
        <div class="numUser">
            <img src="https://img.icons8.com/cotton/64/4a90e2/stairs.png"/>
            <div>
                <h2 id="userNumCount"></h2>
                <h3>POSTS</h3>
            </div>
        </div>

        <div class="report-box">
            <div>
                <h2 id="reportName">Food Details</h2>
                <select name="type"  id="report-type">
                    <option id="User" value="User">User Details</option>
                    <option id="Food" value="Food" selected>Order Details</option>
                    <!-- <option id="Boarding" value="Boarding">Borarding Post</option> -->
                </select>  
            </div>
            <div><a id="userPDF"><i class="fa fa-file-download fa-lg"></i> Get file here</a></div>
        </div>
          <form id="flterReport" class="time" method="post">
          <div>
                <h4 style="padding:0 5px;">Year</h4>
                <select name="year" id="report-year">
                    <!-- <option value="2020">2020</option> -->
                    <option value="2021">2021</option>
                </select>
            </div>
            <div>
                <h4  style="padding:0 5px; ">Month</h4>
                <select style="border: 2px solid #b0cfff;" name="year" id="report-month">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="Auguest">Auguest</option>
                    <option value="September">September</option>
                    <option value="Octomber">Octomber</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
          </form>
        <div class="report-details">
            <div id="report-table" class="report-table">
                <table>  
                    <tr style="height: 70px;">  
                        <th>Term</th>
                        <th >Order type </th>  
                        <th >Number of Order</th> 
                        <th >Number of Deliverd Order</th> 
                        <th >Value Of Order</th>
                        <!-- <th >Value for Bodima(10%)</th> -->
                    </tr>
                    <!-- <tr>
                        <td rowspan="3">Short Term</td>
                        <td rowspan="3">Long Term</td>
                    </tr> -->
                    <tr style="height: 70px;">  
                    <td rowspan="3">Short Term</td> 
                        <td style="background-color: #101a5e; color:white">Breakfast </td>
                        <td id="countSB" style="background-color: rgb(209, 209, 209);"></td>
                        <td id="countSBD"></td>
                        <td id="valueSBD" class="positive"></td>
                        <!-- <td id="gainSB"></td> -->
                    </tr>
                    <tr style="height: 70px;">  
                        <td style="background-color: #101a5e; color:white">Lunch   </td>
                        <td id="countSL" style="background-color: rgb(209, 209, 209);"></td>
                        <td id="countSLD"></td>
                        <td id="valueSLD" class="positive"></td>
                        <!-- <td id="gainSL"></td> -->
                    </tr>
                    <tr style="height: 70px;"> 
                        <td style="background-color: #101a5e; color:white">Dinner  </td>
                        <td id="countSD" style="background-color: rgb(209, 209, 209);"></td>
                        <td id="countSDD"></td>
                        <td id="valueSDD" class="positive" ></td>
                        <!-- <td id="gainSD"></td> -->
                    </tr>
                    <tr style="height: 70px;"> 
                    <td rowspan="3">Long Term</td>  
                        <td style="background-color: #101a5e; color:white">Breakfast </td>
                        <td id="countLB" style="background-color: rgb(209, 209, 209);"></td>
                        <td id="countLBD" ></td>            
                        <td id="valueLBD" class="positive"></td>
                        <!-- <td id="gainLB"></td> -->
                    </tr>
                    <tr style="height: 70px;">  
                        <td style="background-color: #101a5e; color:white">Lunch </td>
                        <td id="countLL" style="background-color: rgb(209, 209, 209);"></td>
                        <td id="countLLD"></td>
                        <td id="valueLLD" class="positive" ></td>
                        <!-- <td id="gainLL"></td> -->
                    </tr>
                    <tr style="height: 70px;">  
                        <td style="background-color: #101a5e; color:white">Dinner </td>
                        <td id="countLD" style="background-color: rgb(209, 209, 209);"></td>
                        <td id="countLDD" ></td>            
                        <td id="valueLDD" class="positive"></td>
                        <!-- <td id="gainLD"></td> -->
                    </tr>
                </table>
            </div>
            <div class="report-chart">
                <div style="width: 500px;height:250px" id="termChart"></div>
                <div style="width: 500px;height:250px" id="orderChart"></div>
            </div>
        </div>
        </div>
        </div>
    </div>
</body>
    <script src="../resource/js/admin.js"></script>
    <script src="../resource/js/jquery.js"></script>
    <script src="../resource/js/foodReport.js"></script>
</html>


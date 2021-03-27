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
            <h4>New Registration </h4>
            <div class="circle">
                <h1 id="addPec"></h1>
            </div>
        </div>
        <!-- all users -->
        <div class="numUser">
            <img src="https://img.icons8.com/cotton/64/4a90e2/stairs.png"/>
            <div>
                <h2 id="userNumCount"></h2>
                <h3>USERS </h3>
            </div>
        </div>
        <div class="report-box">
            <div>
                <h2 id="reportName">Boardings Details</h2>
                <select name="type"  id="report-type">
                    <option id="User" value="User">User Details</option>
                    <option id="Food" value="Food" >Order Details</option>
                    <option id="Boarding" value="Boarding" selected>Borarding Post</option>
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
                    <tr>  
                        <th >User type </th>  
                        <th >Number of user</th> 
                        <th >New Registration</th> 
                        <th >Registration rate</th>
                    </tr>
                    <tr>  
                        <td style="background-color: #101a5e; color:white">Student </td>
                        <td id="stu" style="background-color: rgb(209, 209, 209);"></td>
                        <td id="stuC"></td>
                        <td id="sRate" class="positive"></td>
                    </tr>
                    <tr>  
                        <td style="background-color: #101a5e; color:white">Border  </td>
                        <td id="boa" style="background-color: rgb(209, 209, 209);"></td>
                        <td id="boaC"></td>
                        <td id="bRate" class="positive"></td>
                    </tr>
                    <tr>  
                        <td style="background-color: #101a5e; color:white">Boarding Owner </td>
                        <td id="boardings" style="background-color: rgb(209, 209, 209);"></td>
                        <td id="boardingC"></td>
                        <td id="boRate" class="positive" >34%</td>
                    </tr>
                    <tr>  
                        <td style="background-color: #101a5e; color:white">Food Supplier </td>
                        <td id="foodSupplier" style="background-color: rgb(209, 209, 209);"></td>
                        <td id="foodC" ></td>            
                        <td id="fRate" class="positive">34%</td>
                    </tr>
                         </tr>
                </table>
            </div>
            <div class="report-chart">
                <div style="width: 500px;height:250px" id="chart3"></div>
                <div style="width: 500px;height:250px" id="curve_chart"></div>
            </div>
        </div>
        </div>
        </div>
    </div>
</body>
    <script src="../resource/js/admin.js"></script>
    <script src="../resource/js/jquery.js"></script>
    <script src="../resource/js/boardingReport.js"></script>
</html>


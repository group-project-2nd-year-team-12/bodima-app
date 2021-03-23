<?php
require_once ('../../config/database.php');
require_once ('../../models/adminModel.php');
require_once ('chart.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resource/css/admin.css">
    <link rel="stylesheet" href="../../resource/css/all.css">
    <title>Document</title>
</head>
<body onload="checked('report')">

    <div class="container">

        <div class="wrapper">
        <?php include 'slide-bar.php' ?>
      
        <div style="overflow-x: hidden;" class="content">
        <div class="report-box">
            <div>
                <h2>Users details</h2>
                <select name="" id="report-type">
                    <option value="">User Details</option>
                    <option value="">Food Advertisment</option>
                    <option value="">Borarding Advertisment</option>
                </select>
            </div>
        
            <div><a id="userPDF" href="../../controller/adminPanelCon.php?userPDF"><i class="fa fa-file-download fa-lg"></i> Get file here</a></div>
        </div>
        <div class="time">
        <div>
                <select name="" id="report-type">
                    <option value="">2019</option>
                    <option value="">2020</option>
                    <option value="">2021</option>
                </select>
            </div>
            <div>
                <select name="" id="report-type">
                    <option value="">January</option>
                    <option value="">February</option>
                    <option value="">March</option>
                </select>
            </div>
        </div>
        <div class="report-details">
            <div class="report-table">
                <table>  
                    <tr>  
                        <th width="15%">User type </th>  
                        <th width="15%">Number of user </th>  
                        <th width="15%">Daily loging rate</th> 
                        <th width="15%">Registration rate</th>
                    </tr>
                    <tr>  
                        <td style="background-color: #101a5e; color:white">Student </td>
                        <td id="stuC"></td>
                        <td>34%</td>
                        <td>45% <span class="negative">+4%</span></td>
                    </tr>
                    <tr>  
                        <td style="background-color: #101a5e; color:white">Border  </td>
                        <td id="boaC"></td>
                        <td>34%</td>
                        <td>45% <span class="positive">+4%</span></td>
                    </tr>
                    <tr>  
                        <td style="background-color: #101a5e; color:white">Boarding Owner </td>
                        <td id="boardingC"></td>
                        <td>34%</td>
                        <td>45% <span class="negative">+4%</span></td>
                    </tr>
                    <tr>  
                        <td style="background-color: #101a5e; color:white">Food Supplier </td>
                        <td id="foodC"></td>
                        <td>34%</td>
                        <td>45% <span class="positive">+4%</span></td>
                    </tr>
               
                   <!-- <?php $student=adminModel::userDetails('student',$connection);
                    while($data=mysqli_fetch_assoc($student)){?>
                     
                            <td width="10%"><?php echo $data['Reg_id'] ?></td>  
                            <td width="20%"><?php echo $data['first_name'] ?></td>  
                            <td width="20%"><?php echo $data['last_name'] ?></td>  
                   
       <?php } ?> -->
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
    <script src="../../resource/js/admin.js"></script>
    <script src="../../resource/js/jquery.js"></script>
    <script src="../../resource/js/report.js"></script>
</html>


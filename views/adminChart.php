<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Line chart  of admin panel -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      <?php 
      $allUser=adminModel::userDetailsAll($connection);
      $nowYear=date("Y");
      $nowMonth=date("F");
      $nowCount=0;
      $i=0;
      while($row=mysqli_fetch_assoc($allUser))
      {
          $date=strtotime($row['reg_date']);
          $year[$i]=date("Y",$date);
          if($year[$i]==$nowYear)
          {
            $month[$i]=date("F",$date);
          }
          $i++;
      }
      $counts = array_count_values($month);
      // print_r($month);
      // echo "dsfsfsdf";
      $mont=89;
      ?>
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'new user',],
          ['Jan',  <?php echo $counts['January']?>, ],
          ['Feb',  <?php echo $counts['February']?>,],
          ['Mar',  <?php echo $counts['March']?>,  ],
        ]);

        var options = {
          title: 'Registration Rate',
          backgroundColor: 'transparent',
          legend: { position: 'bottom' },
          titleTextStyle: {
            //  color: 'red',
             fontSize: 18
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>




<!-- Pie chart on report page  -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      <?php
      $student=adminModel::userDetails('student',$connection);
      $boarder=adminModel::userDetails('boarder',$connection);
      $food_supplier=adminModel::userDetails('food_supplier',$connection);
      $boardings_owner=adminModel::userDetails('boardings_owner',$connection);
      ?>
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['User Type', 'Number of users'],
          ['Student',     <?php echo $student->num_rows ?>],
          ['Boarder',       <?php echo  $boarder->num_rows?>],
          ['Boarding Owner',   <?php echo $food_supplier->num_rows?>],
          ['Food Supplier',  <?php echo $boardings_owner->num_rows?>],
        ]);

        var options = {
          title: 'User type',
          backgroundColor: 'transparent',
          legend:{
            textStyle:{
                fontSize:12,
                bold:'true',
            }
          },
          slices: {
            0: { color: '#101e5a' },
            1: { color: '#283a8b' },
            2: { color: '#576abe' },
            3: { color: '#8899e4' },
          },
          titleTextStyle: {
            //  color: 'red',
             fontSize: 18
            }
          // chartArea:{left:5,top:10,width:"100%",height:"90%"},
        };

        var chart = new google.visualization.PieChart(document.getElementById('userDetails'));
        chart.draw(data, options);
      }
</script>

<!-- Pie chart on admin panel page  -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      <?php
      $student=adminModel::userDetails('student',$connection);
      $boarder=adminModel::userDetails('boarder',$connection);
      $food_supplier=adminModel::userDetails('food_supplier',$connection);
      $boardings_owner=adminModel::userDetails('boardings_owner',$connection);
      ?>
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['User Type', 'Number of users'],
          ['Student',     <?php echo $student->num_rows ?>],
          ['Boarder',       <?php echo  $boarder->num_rows?>],
          ['Boarding Owner',   <?php echo $food_supplier->num_rows?>],
          ['Food Supplier',  <?php echo $boardings_owner->num_rows?>],
        ]);

        var options = {
          title: 'User type',
          backgroundColor: 'transparent',
          legend:{
            textStyle:{
                fontSize:12,
                bold:'true',
            }
          },
          slices: {
            0: { color: '#101e5a' },
            1: { color: '#283a8b' },
            2: { color: '#576abe' },
            3: { color: '#8899e4' },
          },
          titleTextStyle: {
            //  color: 'red',
             fontSize: 18
            }
          // chartArea:{left:5,top:10,width:"100%",height:"90%"},
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart3'));
        chart.draw(data, options);
   
      }
</script>

<!-- Line chart  page report -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      <?php 
      $allUser=adminModel::userDetailsAll($connection);
      $nowYear=date("Y");
      $nowMonth=date("F");
      $nowCount=0;
      $i=0;
      while($row=mysqli_fetch_assoc($allUser))
      {
          $date=strtotime($row['reg_date']);
          $year[$i]=date("Y",$date);
          if($year[$i]==$nowYear)
          {
            $month[$i]=date("F",$date);
          }
          $i++;
      }
      $counts = array_count_values($month);
      // print_r($month);
      // echo "dsfsfsdf";
      $mont=89;
      ?>
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'new user',],
          ['Jan',  <?php echo $counts['January']?>, ],
          ['Feb',  <?php echo $counts['February']?>,],
          ['Mar',  <?php echo $counts['March']?>,  ],
        ]);

        var options = {
          title: 'Registration Rate',
          backgroundColor: 'transparent',
          legend: { position: 'bottom' },
          titleTextStyle: {
            //  color: 'red',
             fontSize: 18
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_admin'));

        chart.draw(data, options);
      }
    </script>
  </head>

  
<!-- Pie chart on food report page  -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      <?php
      $request=adminModel::foodRequest($connection);
      $short=0;
      $long=0;
      while($row=mysqli_fetch_assoc($request)){
        if($row['term']=='shortTerm')
        {
          $short++;
        }
        if($row['term']=='longTerm')
        {
          $long++;
        }
      }
      ?>
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Term', 'Number of term'],
          ['Short Term',     <?php echo $short ?>],
          ['Long Term',       <?php echo  $long?>],
        ]);

        var options = {
          title: 'User type',
          backgroundColor: 'transparent',
          legend:{
            textStyle:{
                fontSize:12,
                bold:'true',
            }
          },
          slices: {
            0: { color: '#101e5a' },
            1: { color: '#283a8b' },
            2: { color: '#576abe' },
            3: { color: '#8899e4' },
          },
          titleTextStyle: {
            //  color: 'red',
             fontSize: 18
            }
          // chartArea:{left:5,top:10,width:"100%",height:"90%"},
        };

        var chart = new google.visualization.PieChart(document.getElementById('termChart'));

        chart.draw(data, options);
      }
</script>




<!-- Line chart  food report -->
<html>
<head>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      <?php 
      $request=adminModel::foodRequest($connection);
      $nowYear=date("Y");
      $nowCount=0;
      $i=0;
      $month=array();
      while($row=mysqli_fetch_assoc($request))
      {
          $date=strtotime($row['time']);
          $year[$i]=date("Y",$date);
          if($year[$i]==$nowYear)  
          {
            $month[$i]=date("F",$date);
          }
          $i++;
      }
      $counts = array_count_values($month);

      ?>
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Orders',],
          ['Jan',  <?php echo $counts['January']?>, ],
          ['Feb',  <?php echo $counts['February']?>,],
          ['Mar',  <?php echo $counts['March']?>,  ],
        ]);

        var options = {
          title: 'Orders',
          backgroundColor: 'transparent',
          legend: { position: 'bottom' },
          titleTextStyle: {
            //  color: 'red',
             fontSize: 18
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('orderChart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  
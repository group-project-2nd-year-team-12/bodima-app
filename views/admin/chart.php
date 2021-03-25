<!-- google  chart  -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['User Type', 'Number of Users'],
          ['Student',    ],
          ['Boarding Owners',    ],
          ['Boarder',  ],
          ['Food supplier ', ]
        ]);

        var options = {
        //   title: 'Users',
          pieHole: 0.5,
          radius:10,
          position:'left',
          legend:{
            textStyle:{
                fontSize:12,
                bold:'true',
            }
          },
          chartArea:{left:5,top:10,width:"95%",height:"90%"},
          backgroundColor: 'transparent',
          pieSliceText: 'none',
          
        //   colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
          titleTextStyle: {
            //  color: 'red',
             fontSize: 18
            },
            hAxis : {textStyle:  {fontName: 'TimesNewRoman',fontSize: 14,bold: true}}
        };
        var data_breq = google.visualization.arrayToDataTable([
          ['User Type', 'Boarding request',{ role: 'annotation' },{ role: "style" }],
          ['request',    15,'Request accepted','green'],
          ['request',    25,'Request rejected','red']
          
        ]);

        var options_breq = {
        //   title: 'Users',
  
          position:'left',
          bar: {groupWidth: "60%",
                
          },
          legend:{
            textStyle:{
                fontSize:12,
                bold:'true',
            }
          },
         
          chartArea:{left:5,top:10,width:"95%",height:"90%"},
          
        //   colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
          titleTextStyle: {
            //  color: 'red',
             fontSize: 18
            },
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart1'));
        chart.draw(data, options);
        var chart = new google.visualization.BarChart(document.getElementById('chart3'));
        chart.draw(data_breq, options_breq);
        var chart = new google.visualization.BarChart(document.getElementById('chart4'));
        chart.draw(data_breq, options_breq);
        var chart = new google.visualization.BarChart(document.getElementById('chart5'));
        chart.draw(data_breq, options_breq);
      }
    </script>
  



<script type="text/javascript">
google.charts.load('49', {'packages': ['vegachart']}).then(drawChart);

function drawChart() {
  const dataTable = new google.visualization.DataTable();
  dataTable.addColumn({type: 'string', 'id': 'category'});
  dataTable.addColumn({type: 'number', 'id': 'amount'});
  dataTable.addRows([
    ['January', 28],
    ['February', 55],
    ['March', 43],
    ['April', 91],
    ['May', 81],
    ['Juny', 53],
    ['July', 19],
    ['Augest', 87],
    ['September', 87],
    ['Octomber', 87],
    ['November', 87],
    ['December', 87],
  ]);

  const options = {
    "vega": {
      "$schema": "https://vega.github.io/schema/vega/v4.json",
      "width": 600,
      "height": 160,
      // "padding": 5,

      'data': [{'name': 'table', 'source': 'datatable'}],

      "signals": [
        {
          "name": "tooltip",
          "value": {},
          "on": [
            {"events": "rect:mouseover", "update": "datum"},
            {"events": "rect:mouseout",  "update": "{}"}
          ]
        }
      ],

      "scales": [
        {
          "name": "xscale",
          "type": "band",
          "domain": {"data": "table", "field": "category"},
          "range": "width",
          "padding": 0.05,
          "round": true
        },
        {
          "name": "yscale",
          "domain": {"data": "table", "field": "amount"},
          "nice": true,
          "range": "height"
        }
      ],

      "axes": [
        { "orient": "bottom", "scale": "xscale" },
        { "orient": "left", "scale": "yscale" }
      ],

      "marks": [
        {
          "type": "rect",
          "from": {"data":"table"},
          "encode": {
            "enter": {
              "x": {"scale": "xscale", "field": "category"},
              "width": {"scale": "xscale", "band": 1},
              "y": {"scale": "yscale", "field": "amount"},
              "y2": {"scale": "yscale", "value": 0}
            },
            "update": {
              "fill": {"value": "steelblue"}
            },
            "hover": {
              "fill": {"value": "red"}
            }
          }
        },
        {
          "type": "text",
          "encode": {
            "enter": {
              "align": {"value": "center"},
              "baseline": {"value": "bottom"},
              "fill": {"value": "#333"}
            },
            "update": {
              "x": {"scale": "xscale", "signal": "tooltip.category", "band": 0.5},
              "y": {"scale": "yscale", "signal": "tooltip.amount", "offset": -2},
              "text": {"signal": "tooltip.amount"},
              "fillOpacity": [
                {"test": "datum === tooltip", "value": 0},
                {"value": 1}
              ]
            }
          }
        }
      ]
    }
  };

  const chart = new google.visualization.VegaChart(document.getElementById('chart2'));
  chart.draw(dataTable, options);
}
      
    </script>



<!-- Pie chart on report page  -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

  
<!-- Pie chart on food report page  -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
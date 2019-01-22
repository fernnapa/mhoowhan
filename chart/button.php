<?php  
 $conn = mysqli_connect("localhost", "root", "", "project_com");  
 mysqli_query($conn, "SET NAMES 'utf8' "); 

 $query = "SELECT ac_date, ac_status, a_status.status_name, count(ac_date) as number 
 FROM allocate INNER JOIN a_status ON allocate.ac_status = a_status.status_id 
 WHERE allocate .ac_status in(2) 
 GROUP by ac_status, ac_date
 ";  

 $result = mysqli_query($conn, $query);  
 ?>  

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['วันที่','สถานะ', 'จำนวน']

        <?php

        while($row = mysqli_fetch_array($result))  {;
                         $date = $row["ac_date"];
                         $status = $row["status_name"];
                         $num = $row["number"];

                         echo "['$date','$status', '$num'],";
        }
        ?>
        
        ]);
        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>
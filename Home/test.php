<?php  
 $conn = mysqli_connect("localhost", "root", "", "project_com");  
 mysqli_query($conn, "SET NAMES 'utf8' "); 

 $query = "

 SELECT ac_dep, department.dep_name, count(ac_id) as total FROM allocate LEFT JOIN department ON department.dep_id = allocate.ac_dep GROUP BY ac_dep ORDER BY `ac_id` DESC
 
 ";  


 $result = mysqli_query($conn, $query);  
 ?>  

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['หน่วยงาน', 'จำนวน'],  
                        <?php   
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["dep_name"]."', ".$row["total"]."],";   // แสดงผลข้อมูลด้านข้าง
                          }  
                        ?>  
        ]);

        var options = {
          title: 'Chess opening moves',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Chess opening moves',
                   subtitle: 'popularity by percentage' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  </head>
  <body>
    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>


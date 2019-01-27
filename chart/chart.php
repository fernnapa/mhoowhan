<?php  
 $conn = mysqli_connect("localhost", "root", "", "project_com");  
 mysqli_query($conn, "SET NAMES 'utf8' "); 

 $query = "

 SELECT eq_status, a_status.status_name, count(eq_status) as number 
 FROM equipment INNER JOIN a_status 
 ON equipment.eq_status = a_status.status_id 
 WHERE equipment.eq_status in(1,2,3) 
 GROUP by eq_status
 
 ";  


 $result = mysqli_query($conn, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Google Chart API </title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript"> 
            
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart(){  
                var data = google.visualization.arrayToDataTable([  
                          ['eq_status', 'number'],  
                        <?php   
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["status_name"]."', ".$row["number"]."],";   // แสดงผลข้อมูลด้านข้าง
                          }  
                        ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of status',  
                      //is3D:true,  
                      pieHole: 0.4 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>

      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>  
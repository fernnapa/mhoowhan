<?php  
session_start();
// include("../Home/db_connect.php");
?>  
<!DOCTYPE html>
<html lang="en">

<head>
  
  <?php include("menu/link.php"); ?>
  <style type="text/css">
BODY {
    width: 100%;
}

#chart-container {
    width: 100%;
    height: 100%;
}
</style>


</head>

<?php include("menu/navbar_leader.php"); ?>

<body>
  
<?php  
 $conn = mysqli_connect("localhost", "root", "", "project_com");  
 mysqli_query($conn, "SET NAMES 'utf8' "); 

 $query = "
 SELECT eq_status,a_status.status_name, count(eq_status) as number 
 FROM equipment INNER JOIN a_status 
 ON equipment.eq_status = a_status.status_id 
 WHERE equipment.eq_status in(1,2,3) 
 GROUP by eq_status
 ";  

 $result = mysqli_query($conn, $query);  
 ?>  

 
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
                      //title: 'เปอร์เซ็นต์ของสถานะการจัดการครุภัณฑ์ศูนย์คอมพิวเตอร์',  
                      //is3D:true,  
                      pieHole: 0.4 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
          </script> 


           

        <script type="text/javascript" src="../chart/js/jquery.min.js"></script>
        <script type="text/javascript" src="../chart/js/Chart.min.js"></script>

        <script>
        $(document).ready(function () {
            showGraph();
          });


          function showGraph()
          {
            {
                $.post("../chart/data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].dep_name);
                        marks.push(data[i].number);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                
                                label: 'หน่วยงาน',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>


    </head>

      <body>  
           <br />
           <div class="table-responsive" style="font-family:Prompt;">
                   <table>
                    <h3 align="center" style="font-family:Prompt;">การจัดการครุภัณฑ์ของศูนย์คอมพิวเตอร์</h3> 
                        <tr><td id="piechart" style=" font-family:Prompt;"></td>  
                        
                        <td id="chart-container" style="width: 550px; height: 350px; font-family:Prompt;"><canvas id="graphCanvas"></canvas></td>
                        

                        
                        </tr>
                  </table>
            </div>
        
    

                </div>
              </div>
            </div>
          </div>
        </div>
      
        <footer class="footer">
          <div class="container-fluid clearfix">
          <span class="copytext">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="http://ccs.sut.ac.th/2012/" target="_blank">The Center for Computer Services. SUT</a></span>
          </div>
        </footer>
     
      </div>
   
    </div>
  
  </div>
 

  
</body>
</html>


<?php  
 include("db_connect.php");

 if(isset($_GET["search"])){

  $start = $_GET["start"];
  $end = $_GET["end"];

  $sql_range = "SELECT ac_dep, department.dep_name, count(ac_id) as total FROM allocate LEFT JOIN department ON department.dep_id = allocate.ac_dep GROUP BY ac_dep ORDER BY `ac_id` DESC";
	$sql_r2 = "SELECT pm_dep, department.dep_name, count(pm_id) as total FROM permit LEFT JOIN department ON department.dep_id = permit.pm_dep GROUP BY pm_dep ORDER BY `pm_id` DESC";
	$sql_r3 = "SELECT eq_status,a_status.status_name, count(eq_status) as number FROM equipment INNER JOIN a_status ON equipment.eq_status = a_status.status_id WHERE equipment.eq_status in(1,2,3) GROUP by eq_status"; 
	$sql_r4 = "SELECT ald_type_name, ald_status_name ,a_status.status_name, count(ald_type_name) as number FROM `allocate_detail` INNER JOIN allocate ON allocate.ac_id = allocate_detail.ac_id INNER JOIN a_status ON a_status.status_id = allocate.ac_status WHERE allocate.ac_status in(2) GROUP by ald_type_name";  
  $sql_r5 = "SELECT pmd_type_name, pmd_status_name, a_status.status_name, count(pmd_type_name) as number FROM `permit_detail` INNER JOIN permit ON permit.pm_id = permit_detail.per_id INNER JOIN a_status ON a_status.status_id = permit.pm_status WHERE permit.pm_status in(3) GROUP by pmd_type_name";
	
	
 $rs_range = $conn->query($sql_range);
 $rs_r2 = $conn->query($sql_r2);
 $rs_r3 = $conn->query($sql_r3);
 $rs_r4 = $conn->query($sql_r4);
 $rs_r5 = $conn->query($sql_r5);

 }
  //echo  $sql_range;
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ระบบติดตามการใช้งานครุภัณฑ์ศูนย์คอมพิวเตอร์</title>
	<link rel="icon" href="images/favicon.png" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!-- [if lt IE 9]> -->
	<script src="js/respond.min.js"></script> 
        <!-- <![endif] -->

	<link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
	</head>
	<body>
		
	<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.php"><img src="images/banner.png" style="width: 200px;"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li class="active"><a href="report.php">Report</a></li>
								<li><a href="map.php">Map</a></li>
								<li><a href="aboutus.php">About Me</a></li>
								<li><button type="button" class="btn btn-warning btn-md" onclick="window.location='Home/login.php'">
          										<span class="glyphicon glyphicon-log-in"></span> Log In
        						</button></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	
		
			<div class="container">
				<div class="row row-pb-md">
					<div id="div-1" class="col-70">   
          <h3 style="font-family:Prompt;">สถิติการจัดสรรครุภัณฑ์ให้กับหน่วยงาน</h3>  

          <form action="report.php" id="bar1" action="get">
            <table >      
              <tr>
                <td style="font-family:Prompt;"><b>วันที่จัดสรร :</b> </td>
                <td>
                  <select name="start" class="form-control" style="width:200px"> 

                    <?php 
                        $sql_date_start = "SELECT distinct(ac_date) FROM `allocate` order by ac_date asc";
                         $rs_date_start = mysqli_query($conn, $sql_date_start);
                    ?>

                    <?php while($row_date_start = $rs_date_start->fetch_assoc()){ ?>                               
                        <option value="<?php echo $row_date_start["ac_date"]; ?>"><?php echo $row_date_start["ac_date"]; ?></option>
                                  
                    <?php } ?>   
                  </select>
                </td>


				<td style="font-family:Prompt;"><b >&nbsp; ถึง &nbsp; </b></td>
                <td>
                  <select name="end" class="form-control" style="width:200px">
                                  
                    <?php 
                        $sql_date_end = "SELECT distinct(ac_date) FROM `allocate` order by ac_date desc";
                        $rs_date_end = $conn->query($sql_date_end);
                    ?>

                    <?php while($row_date_end = $rs_date_end->fetch_assoc()){ ?>     
                        <option value="<?php echo $row_date_end["ac_date"]; ?>"><?php echo $row_date_end["ac_date"]; ?></option>

                    <?php } ?>   
                  </select>
                </td>



                <td> &nbsp;&nbsp;<input type="submit" name="search" value="Search" class="btn btn-warning">  </td>       
              </tr>
            </table>
          </form>
          <hr/>
          
          <div  align="center">
            <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
          </div>

          <hr/>
					<br/>

					<h3 style="font-family:Prompt;">สถิติการยืม-คืนครุภัณฑ์ให้กับหน่วยงาน</h3> 

					<form action="report.php" id="bar2" action="get">
            <table >      
              <tr>
                <td style="font-family:Prompt;"><b>วันที่ยืม-คืน :</b> </td>
                <td>
                  <select name="start" class="form-control" style="width:200px"> 

                    <?php 
                        $sql_date_start = "SELECT distinct(pm_date) FROM `permit` order by pm_date asc";
                         $rs_date_start = mysqli_query($conn, $sql_date_start);
                    ?>

                    <?php while($row_date_start = $rs_date_start->fetch_assoc()){ ?>                               
                        <option value="<?php echo $row_date_start["pm_date"]; ?>"><?php echo $row_date_start["pm_date"]; ?></option>
                                  
                    <?php } ?>   
                  </select>
                </td>


								<td style="font-family:Prompt;"><b >&nbsp; ถึง &nbsp; </b></td>
                <td>
                  <select name="end" class="form-control" style="width:200px">
                                  
                    <?php 
                        $sql_date_end = "SELECT distinct(pm_date) FROM `permit` order by pm_date desc";
                        $rs_date_end = $conn->query($sql_date_end);
                    ?>

                    <?php while($row_date_end = $rs_date_end->fetch_assoc()){ ?>     
                        <option value="<?php echo $row_date_end["pm_date"]; ?>"><?php echo $row_date_end["pm_date"]; ?></option>

                    <?php } ?>   
                  </select>
                </td>



                <td> &nbsp;&nbsp;<input type="submit" name="search" value="Search" class="btn btn-warning">  </td>       
              </tr>
            </table>
          </form>
          <hr/>
          
          <div  align="center">
            <div id="columnchart_materiall" style="width: 800px; height: 500px;"></div>
          </div>

					<hr/>
					<br/>

					<h3 style="text-align: center; font-family:Prompt;">เปอร์เซ็นการจัดการครุภัณฑ์ของศูนย์คอมพิวเตอร์</h3> 
          <div align="center">
              <div id="piechart" style="width: 550px; height: 350px; font-family:Prompt;"></div>  
				  </div> 

					<hr/>
					<br/>

					<h3 style="text-align: center; font-family:Prompt;">การจัดสรรครุภัณฑ์แต่ละประเภท</h3><br/>
					<div align="center">
							<div id="dual_x_div" style="width: 600px; height: 300px; font-family:Prompt;"></div>
				  </div> 

					<hr/>
					<br/>

					<h3 style="text-align: center; font-family:Prompt;">การยืม-คืนครุภัณฑ์แต่ละประเภท</h3><br/>
					<div align="center">
							<div id="duall_x_div" style="width: 600px; height: 300px; font-family:Prompt;"></div>
				  </div>




		</div>
		</div>
	</div>

	<?php
			include ('Home/footer.php');
	?>

	<!-- table advance -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	

	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script> 
	</body>
</html>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['หน่วยงาน', 'จำนวน'],

        <?php while( $row = $rs_range->fetch_assoc()){ ?> 

          ['<?php echo $row["dep_name"]; ?>', <?php echo $row["total"]; ?>],
      
        <?php } ?>  
        ]);

        var options = {
          chart: {
            title: 'หน่วยงานที่มีการจัดสรรครุภัณฑ์คอมพิวเตอร์',
            subtitle: 'มหาวิทยาลัยเทคโนโลยีสุรนารี',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


		

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['หน่วยงาน', 'จำนวน'],

        <?php while( $row = $rs_r2->fetch_assoc()){ ?> 

          ['<?php echo $row["dep_name"]; ?>', <?php echo $row["total"]; ?>],
      
        <?php } ?>  
        ]);

        var options = {
          chart: {
            title: 'หน่วยงานที่มีการยืม-คืนครุภัณฑ์คอมพิวเตอร์',
            subtitle: 'มหาวิทยาลัยเทคโนโลยีสุรนารี',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_materiall'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
</script>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript"> 
            


           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart(){  
                var data = google.visualization.arrayToDataTable([  
                          ['สถานะ', 'จำนวน'],  
                        <?php    
                          while($row = mysqli_fetch_array($rs_r3))  
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


		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['ประเภท', 'จำนวน'],  
                        <?php    
                          while($row = mysqli_fetch_array($rs_r4))  
                          {  
                               echo "['".$row["ald_type_name"]."', ".$row["number"]."],";   // แสดงผลข้อมูลด้านข้าง
                          }  
                        ?>  
        ]);

        var options = {
          width: 800,
          
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: {label: 'จำนวน'}, // Bottom x-axis.
              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
      chart.draw(data, options);
    };
    </script>


		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['ประเภท', 'จำนวน'],  
                        <?php    
                          while($row = mysqli_fetch_array($rs_r5))  
                          {  
                               echo "['".$row["pmd_type_name"]."', ".$row["number"]."],";   // แสดงผลข้อมูลด้านข้าง
                          }  
                        ?>  
        ]);

        var options = {
          width: 800,
          
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: {label: 'จำนวน'}, // Bottom x-axis.
              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('duall_x_div'));
      chart.draw(data, options);
    };
    </script>








    
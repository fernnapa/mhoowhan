<?php  
      include("db_connect.php");

                if(isset($_POST["search"])){

                  $start = $_POST["start"];
                  $end = $_POST["end"];


                  $sql_range = $_POST["search"];




                $sql_range = "SELECT ac_date, ac_dep, department.dep_name, count(ac_id) as total 
                FROM allocate 
                INNER JOIN department ON department.dep_id = allocate.ac_dep 
                INNER JOIN a_status ON allocate.ac_status = a_status.status_id
                WHERE a_status.status_id in(2) AND ac_date BETWEEN '$start' AND '$end' 
                GROUP BY department.dep_name ORDER BY `ac_id` DESC";

                $sql_range2 ="SELECT pm_date_analys, pm_dep, department.dep_name, count(pm_id) as total 
                FROM permit
                INNER JOIN department ON department.dep_id = permit.pm_dep 
                INNER JOIN a_status ON permit.pm_status = a_status.status_id
                WHERE a_status.status_id in(3) AND pm_date_analys BETWEEN '$start' AND '$end' 
                GROUP BY department.dep_name ORDER BY `pm_id` DESC";                        

                $rs_range = $conn->query($sql_range);
                $rs_range2 = $conn->query($sql_range2);

                }

    ?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>รายงาน</title>
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

  <style>
            .table-responsive {
              
              overflow-x: auto;
              overflow-y: hidden;
             
            }
            table, th, td    {
            }
            td {
                padding: 5px;
                text-align: center;    
            }
            th {
                padding: 5px;
            }
            body{
                font-family: 'Kanit', sans-serif;
            }
            .search-table-outter { overflow-x: scroll; }
         
    </style>

	</head>
	<body>
		
	<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.php"><img src="images/logo1.png" style="width: 200px;"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li class="active"><a href="report.php">Report</a></li>
								<li><a href="Map_All.php">Map</a></li>
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



     <div class="fluid-container table-responsive">
          <table align="center" style="width:100%" class="w3-teal">
          <tr>
            <th ><p><h3 style="text-align:center; font-family:Prompt;"><b>สถิติการจัดสรรครุภัณฑ์ให้กับหน่วยงาน</b></h3></th>
            <form action="report.php" method="POST">
                                <table border="0" align="center">
                                <tr>
                                    <br><td style="font-family:Prompt;"><b>วันที่จัดสรร</b> </td>
                                    <td>
                                    <select name="start" class="form-control" style="width:200px"> 
                    <!--DISTINCT เป็นคำสั่งที่ใช้สำหรับการระบุเงื่อนไขการเลือกข้อมูลในตารางTableโดยทำการเลือกข้อมูลที่ซ้ำกันมาเพียงแค่Recordเดียว/ASCเรียงจากน้อยไปหามาก -->
                                
                                    <?php 
                                        $sql_date_start = "SELECT distinct(ac_date) FROM `allocate` order by ac_date asc";
                                        $rs_date_start = mysqli_query($conn, $sql_date_start);
                                    ?>

                                    <?php while($row_date_start = $rs_date_start->fetch_assoc()){ ?>
                                        <option value="<?php echo $row_date_start["ac_date"]; ?>"><?php echo $row_date_start["ac_date"]; ?></option>
                                    <?php } ?>   
                                    </select>
                                    </td>


                                <td style="font-family:Prompt;"><b>&emsp;ถึง&emsp;</b></td>

                            <!--DISTINCT เป็นคำสั่งที่ใช้สำหรับการระบุเงื่อนไขการเลือกข้อมูลในตารางTableโดยทำการเลือกข้อมูลที่ซ้ำกันมาเพียงแค่Recordเดียว/DESCเรียงจากมากไปหาน้อย -->
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

                                <td> <input type="submit" name="search" value="ค้นหา" class="btn btn-info" style="font-family:Prompt;">  </td>       
                                </tr>
                                </table>
                                </form>
                                <hr/>
                                
                                <p style="text-align: left; font-family:Prompt; font-size: 15px; ">&emsp;&emsp;&emsp;&emsp;&emsp;วันที่จัดสรร&emsp;<?php echo @$start."    ถึง     ".@$end ?></p>


                                <div align="center">
                                <div id="columnchart_material" style="width: 65%; height: 450px;" class="table responsive"></div>
                                </div>
        
                            </tr>
                    </table>


              
       
                                <hr/>
                                <p><h3 style="text-align:center; font-family:Prompt;"><b>สถิติการยืม-คืนครุภัณฑ์ให้กับหน่วยงาน</b></h3>
                                <p style="text-align: left; font-family:Prompt; font-size: 15px; ">&emsp;&emsp;&emsp;&emsp;&emsp;วันที่ยืม-คืน&emsp;<?php echo @$start."    ถึง     ".@$end ?></p>
                                
                                <div align="center">
                                <div id="columnchart_material2" style="width: 65%; height: 450px;" ></div>
                                </div>
                                <br/><hr/>
               
        
                
                                <div align="center">
                                <h3 style="text-align: center; font-family:Prompt;">การจัดสรรครุภัณฑ์แต่ละประเภท</h3><br/>
                                    <div id="dual_x_div" style=" font-family:Prompt;"></div>
                                </div><br/><br/><hr/>
                              <div align="center">
                                <h3 style="text-align: center; font-family:Prompt;">การยืม-คืนครุภัณฑ์แต่ละประเภท</h3><br/>
                                    <div id="duall_x_div" style=" font-family:Prompt;"></div>
                              </div>
                              
                   
              <br/>
              <br/><br/>
               
                </div>
                </div>
   </div>  
</div>
	

   <?php include("Home/footer.php"); ?>




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
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['ประเภท', 'จำนวน'],  
                        <?php  
                              $sql_r3 = "SELECT ald_type_name, ald_status_name ,a_status.status_name, count(ald_type_name) as number FROM `allocate_detail` 
                              INNER JOIN allocate ON allocate.ac_id = allocate_detail.ac_id 
                              INNER JOIN a_status ON a_status.status_id = allocate.ac_status 
                              WHERE allocate.ac_status in(2) 
                              GROUP by ald_type_name"; 
                                $rs_r3 = $conn->query($sql_r3);

                          while($row = mysqli_fetch_array($rs_r3))  
                          {  
                               echo "['".$row["ald_type_name"]."', ".$row["number"]."],";   // แสดงผลข้อมูลด้านข้าง
                          }  
                        ?>  
        ]);

        var options = {
          width: 800,
          colors:['#F7DC6F'],
          
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
                     
  
                          $sql_r4 = "SELECT pmd_type_name, pmd_status_name, a_status.status_name, count(pmd_type_name) as number FROM `permit_detail` 
                          INNER JOIN permit ON permit.pm_id = permit_detail.per_id 
                          INNER JOIN a_status ON a_status.status_id = permit.pm_status 
                          WHERE permit.pm_status in(3) 
                          GROUP by pmd_type_name";
                          
                          
                          $rs_r4 = $conn->query($sql_r4);
     
                          while($row2 = mysqli_fetch_array($rs_r4))  
                          {  
                               echo "['".$row2["pmd_type_name"]."', ".$row2["number"]."],";   // แสดงผลข้อมูลด้านข้าง
                          }  
                        ?>  
        ]);

        var options = {
          width: 800,
          colors:['#F5B7B1'],
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


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['หน่วยงาน', 'จำนวน'],

      <?php while( $row = $rs_range->fetch_assoc()){ ?> 

        ['<?php echo $row["dep_name"];?>', <?php echo $row["total"]; ?>],
    
      <?php } ?>  
      ]);

      var options = {
        chart: {
          title: 'แผนภูมิการจัดสรรครุภัณฑ์คอมพิวเตอร์ให้กับแต่ละหน่วยงาน',
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

      <?php while( $row = $rs_range2->fetch_assoc()){ ?> 

        ['<?php echo $row["dep_name"];?>', <?php echo $row["total"]; ?>],
    
      <?php } ?>  
      ]);

      var options = {
        chart: {
          title: 'แผนภูมิการยืม-คืนครุภัณฑ์คอมพิวเตอร์ให้กับแต่ละหน่วยงาน',
        }
  
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>


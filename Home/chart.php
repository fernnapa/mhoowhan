<?php  
 include("db_connect.php");

 if(isset($_GET["search"])){

  $start = $_GET["start"];
  $end = $_GET["end"];

 $sql_range = "SELECT pm_dep, department.dep_name, count(pm_id) as total FROM permit INNER JOIN department ON department.dep_id = permit.pm_dep WHERE pm_firstdate AND pm_enddate BETWEEN '$start' AND '$end' GROUP BY pm_dep ORDER BY `pm_id` DESC";
 
 $rs_range = $conn->query($sql_range);
 }
  //echo  $sql_range;
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ระบบติดตามการใช้งานครุภัณฑ์ศูนย์คอมพิวเตอร์</title>
	<link rel="icon" href="../images/favicon.png" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="../css/flexslider.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!-- [if lt IE 9]> -->
	<script src="../js/respond.min.js"></script> 
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
							<div id="colorlib-logo"><a href="index.php"><img src="../images/banner.png" style="width: 200px;"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li ><a href="index.php">Home</a></li>
								<li class="active">
									<a href="chart.php">Report</a>
								</li>
								<li><a href="#">About Me</a></li>
								<li><button type="button" class="btn btn-warning btn-md" onclick="window.location='login.php'">
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
          <h3 style="font-family:Prompt;">สถิติการยืม-คืนครุภัณฑ์ให้กับหน่วยงาน</h3>  
          <p><?php echo $start." To ".$end ?></p>                 <!---          วันที่เริ่มต้น-สิ้นสุด       ---->

          <form action="chart.php" action="get">
            <table >      
              <tr>
                <td style="font-family:Prompt;"><b>Start</b> </td>
                <td>
                  <select name="start" class="form-control" style="width:200px"> 

                    <?php 
                        $sql_date_start = "SELECT distinct(pm_firstdate) FROM `permit` order by pm_firstdate asc";
                         $rs_date_start = mysqli_query($conn, $sql_date_start);
                    ?>

                    <?php while($row_date_start = $rs_date_start->fetch_assoc()){ ?>                               
                        <option value="<?php echo $row_date_start["pm_firstdate"]; ?>"><?php echo $row_date_start["pm_firstdate"]; ?></option>
                                  
                    <?php } ?>   
                  </select>
                </td>


                <td style="font-family:Prompt;"><b >End</b></td>
                <td>
                  <select name="end" class="form-control" style="width:200px">
                                  
                    <?php 
                        $sql_date_end = "SELECT distinct(pm_enddate) FROM `permit` order by pm_enddate desc";
                        $rs_date_end = $conn->query($sql_date_end);
                    ?>

                    <?php while($row_date_end = $rs_date_end->fetch_assoc()){ ?>     
                        <option value="<?php echo $row_date_end["pm_enddate"]; ?>"><?php echo $row_date_end["pm_enddate"]; ?></option>

                    <?php } ?>   
                  </select>
                </td>

                <td> <input type="submit" name="search" value="Search" class="btn btn-warning">  </td>       
              </tr>
            </table>
          </form>
          <hr/>
          
          <div  align="center">
            <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
          </div>

          <hr/>
				</div>
			</div>
		
	</div>

	<?php
			include ('footer.php');
	?>

	<!-- table advance -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	

	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="../js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script> 
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
            title: 'หน่วยงานที่มีการยืม-คืน ครุภัณฑ์คอมพิวเตอร์',
            subtitle: 'มหาวิทยาลัยเทคโนโลยีสุรนารี',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
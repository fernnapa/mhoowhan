<?php  
 include("db_connect.php");
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


	<style>

.modal-dialog.a{
        max-width : 950px;
        max-height: 550px;
    }
            table, th, td{
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
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="report.php">Report</a></li>
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
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/tracker2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container">
			   			<div class="row">
				   			<div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						<p class="meta">
											<span class="cat"  style="font-family:Prompt;"><a href="http://it2.sut.ac.th/project61_g20/">Events</a></span>
										</p>
					   					<h1 align="center" style="font-family:Prompt;">TRACKER CCS.</h1>
										<h4 style="font-family:Prompt;">ระบบติดตามการใช้งานครุภัณฑ์คอมพิวเตอร์ เป็นระบบที่พัฒนาขึ้นเพื่ออำนวยความสะดวกแก่เจ้าหน้าที่ที่รับผิดชอบในการจัดการข้อมูลครุภัณฑ์ของศูนย์คอมพิวเตอร์ มหาวิทยาลัยเทคโนโลยีสุรนารี </h4>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img11.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container">
			   			<div class="row">
				   			<div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						<p class="meta">
												<span class="cat"  style="font-family:Prompt;"><a href="https://www.facebook.com/KasetSUT/">Events</a></span>
											</p>
											<h1 align="center" style="font-family:Prompt;">Internet of Thing</h1>
											<h4 align="left" style="font-family:Prompt;">“Internet of Things” คือ แนวคิดที่เชื่อมต่อคอมพิวเตอร์อัจฉริยะให้คุยกันได้เองโดยไม่ต้องผ่านคน</h4>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img10.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container">
			   			<div class="row">
				   			<div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						<p class="meta">
												<span class="cat" style="font-family:Prompt;"><a href="http://its.sut.ac.th/">Events</a></span>
											</p>
					   					<h1 style="font-family:Prompt;">INTERNET DATA CENTER</h1>
										<h4 style="font-family:Prompt;">Internet data center ณ ศูนย์คอมพิวเตอร์ มีการเชื่อมต่อเข้าอินเตอร์เน็ตผ่านโครงข่ายความเร็วสูง มีระบบรักษาความปลอดภัยที่น่าเชื่อถือ </h4>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<br/><br/><br/><br/>

		<!-----------------detail---------------------------->
		<div class="modal fade" tabindex="1" role="dialog" id="ModalViewAC">
        <div class="modal-dialog a" role="document">
            <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-family:Prompt;"><b>รายการครุภัณฑ์</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body table-responsive">
                    <form id="ViewAC" ></form>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ปิด</button>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>

  		<!-----------------detail---------------------------->
		<div id="colorlib-container">
			<div class="container">
				<div class="row row-pb-md">
					<div id="div-1" class="col-70">   
					<div class="container table table-striped table-bordered">
               		<h3 align="center" style="font-family:Prompt;">การติดตามการใช้งานครุภัณฑ์ของศูนย์คอมพิวเตอร์</h3>  
                	<hr/>

					<div class="table-responsive" id="result" style="font-family:Prompt;">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-hover table table-striped table-bordered " >
                    <thead>
                    <tr>
						<td style="text-align: center; font-weight: bold; width='150px'">ลำดับที่</td>
						<td style="text-align: center; font-weight: bold; width='500px'">หน่วยงาน</td>
						<td style="text-align: center; font-weight: bold; width='350px'">ชื่อ-สกุล</td>
                        <td style="text-align: center; font-weight: bold; width='500px'">ตำแหน่ง</td>
                        <td style="text-align: center; font-weight: bold; width='100px'">สถานะ</td>
                        <td style="text-align: center; font-weight: bold; width='100px'">พนักงานจัดสรร</td>
						<td></td>
                    </tr>
                    </thead>
                    <tr>
                    <?php
                       	$sql = "SELECT * FROM allocate
                            LEFT JOIN a_status
                            ON allocate.ac_status = a_status.status_id
                            LEFT JOIN department
                            ON allocate.ac_dep = department.dep_id
							LEFT JOIN employee
							ON allocate.ac_emp = employee.emp_id          
                          
                            WHERE ac_status = 2";
                         $result = mysqli_query($conn, $sql);
                       	 while($data = mysqli_fetch_array($result)):
                         $id = $data['ac_id'];
                         $stn = $data['status_name'];

                         if($stn == "จัดสรร"){ ?>
						  <td style="text-align:center"><?php echo $data['ac_id']; ?></td>
						  <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
						  <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                          <td style="text-align:left"><?php echo $data['ac_position']; ?></td>
                          <td style="text-align:left"><?php echo $data['status_name']; ?></td>             
                          <td style="text-align:center"><?php echo $data['emp_fname']." ".$data['emp_lname']; ?></td>
                          <td style="text-align:center"><button type="button" name="submitview" class="btn btn-info btn-md"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_DC_dt(<?php echo $data['ac_id']; ?>)"><i class="glyphicon glyphicon-file"></i>&nbsp;รายละเอียด</button></td>

                              
                      <?php } ?>

                    </tr>
                         <?php endwhile; ?>

                         	<?php
                                $sql2 = "SELECT * FROM permit
                                LEFT JOIN a_status
                                ON permit.pm_status = a_status.status_id
                                LEFT JOIN department
                                ON permit.pm_dep = department.dep_id
								LEFT JOIN employee
								ON permit.pm_empno = employee.emp_id
                               
                              
                                WHERE pm_status= 3 ";
                              $result2 = mysqli_query($conn, $sql2);
                              while($data1 = mysqli_fetch_array($result2)):
                              $idpm = $data1['pm_id'];
                              $stnpm = $data1['status_name'];

                        	if($stnpm == "ยืม - คืน"){ ?>  
								<td style="text-align:center"><?php echo $data1['pm_id']; ?></td>
								<td style="text-align:left"><?php echo $data1['dep_name']; ?></td>
								<td style="text-align:left"><?php echo $data1['pm_username']; ?></td>
								<td style="text-align:left"><?php echo $data1['pm_position']; ?></td>
                                <td style="text-align:left"><?php echo $data1['status_name']; ?></td>
								<td style="text-align:center"><?php echo $data1['emp_fname']." ".$data1['emp_lname']; ?></td>  
                     			<td style="text-align:center"><button type="button" name="submitview" class="btn btn-info btn-md"  data-toggle="modal" data-target="#ModalViewAC" onclick="showPM_DC_dt(<?php echo $data1['pm_id']; ?>)"><i class="glyphicon glyphicon-file"></i>&nbsp;รายละเอียด</button></td>
                            
                      		  <?php } ?>
                			</tr>
                         	 <?php endwhile; ?>

                  	</table>
                  	</form>
                  	</div>
				</div>
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



<!-- /.script modal ค้นหา -->
<script>

$(document).ready(function(){  
      $('#tableshow').DataTable({
  		"searching": true,
  
    	"oLanguage": {
   		"sSearch": "ค้นหา : "
 		},
        retrieve: true,
	  });  
}); 
</script>

  
<!-- /.script modal การจัดสรร --> 
<script>
        function showAC_DC_dt(str) {
        var xhttp;    
        if (str == "") {
            document.getElementById("ViewAC").innerHTML = "";
                return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ViewAC").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "getAC_DC_dt.php?id="+str, true);
        xhttp.send();
        }
</script>


<!-- /.script modal การยืม-คืน -->
<script>
        function showPM_DC_dt(str) {
        var xhttp;    
        if (str == "") {
            document.getElementById("ViewAC").innerHTML = "";
                return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
            	document.getElementById("ViewAC").innerHTML = this.responseText;
        	}
        };
        xhttp.open("GET", "getPM_DC_dt.php?id="+str, true);
        xhttp.send();
        }
  </script>
  

</body>
</html>


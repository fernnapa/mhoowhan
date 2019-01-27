<?php  
 include("db_connect.php");

 $query ="SELECT * FROM `allocate` 
 RIGHT JOIN allocate_detail
 ON allocate_detail.ac_id = allocate.ac_id 
 LEFT JOIN a_status
 ON a_status.status_id = allocate.ac_status
 LEFT JOIN department
 ON department.dep_id = allocate.ac_dep"; 
 $result = mysqli_query($conn, $query); 

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
								<li class="active"><a href="index.php">Home</a></li>
								<li class="has-dropdown">
									<a href="#">Report</a>
									<ul class="dropdown">
										<li><a href="#">สถิติการใช้งาน</a></li>
									</ul>
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
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(../images/sut-iot.png);">
			   		<div class="overlay"></div>
			   		<div class="container">
			   			<div class="row">
				   			<div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						<p class="meta">
											<span class="cat"  style="font-family:Prompt;"><a href="http://iot.sut.ac.th/mobile/login.php">Events</a></span>
										</p>
					   					<h1 align="center" style="font-family:Prompt;">SUT Internet of Things</h1>
										<h4 style="font-family:Prompt;">ศูนย์คอมพิวเตอร์ ได้พัฒนาระบบเครือข่ายไร้สายสำหรับอุปกรณ์สมัยใหม่ (Internet of Thing) โดยใช้ชื่อสัญญาณว่า @SUT-IoT โดย @SUT-IoT ถูกออกแบบมาให้รองรับอุปกรณ์ที่ต้องการเชื่อมต่อ internet เช่น Smart TV, Smart watch, IP Camera เป็นต้น​</h4>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(../images/img05.jpg);">
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
			   	<li style="background-image: url(../images/img03.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container">
			   			<div class="row">
				   			<div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						<p class="meta">
												<span class="cat" style="font-family:Prompt;"><a href="http://its.sut.ac.th/">Events</a></span>
											</p>
					   					<h1 style="font-family:Prompt;">IT Fundamental Services</h1>
										<h4 style="font-family:Prompt;">“Internet of Things” คือ แนวคิดที่เชื่อมต่อคอมพิวเตอร์อัจฉริยะให้คุยกันได้เองโดยไม่ต้องผ่านคน </h4>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<!--------------------------------ตารางการจัดสรร--------------------------------------->

		<div id="colorlib-container">
			<div class="container">
				<div class="row row-pb-md">
					<div id="div-1" class="col-70">   
					<div class="container table table-striped table-bordered ">  
               			<h3 align="center" style="font-family:Prompt;">การจัดสรรการใช้งานครุภัณฑ์ของศูนย์คอมพิวเตอร์</h3>  
                		<br />  
                		<div class="table-responsive">  
                    		<table id="allocate_data" align="center" class="table table-striped table-bordered" style="font-family:Prompt;">  
                          		<thead>  
                               		<tr>  
									   		
											<td style="text-align: center;">รหัสบาร์โคด</td>   
                                    		<td style="text-align: center;">รายการ</td>  
                                    		<td style="text-align: center;">ชื่อ</td>  
                                    		<td style="text-align: center;">หน่วยงาน</td>  
                                    		<td style="text-align: center;">สถานะ</td>  
                                    		<td style="text-align: center;"></td>  
											<td style="text-align: center;"></td>  

                               		</tr>  
                         		</thead>  

								 <?php  
                          		while($row = mysqli_fetch_array($result))  
                          		{  
                               	echo '  
									   	<tr>  
									   		     
									  		<td style="text-align:left">'.$row["ald_eq_barcode"].'</td>  
									   		<td style="text-align:center">'.$row["ald_type_name"].'</td>									
							   				<td style="text-align:left">'.$row["ac_name"].'</td>  
							   				<td style="text-align:left">'.$row["dep_name"].'</td>
							   				<td style="text-align:left">'.$row["status_name"].'</td>  
							   				<td><button type="submit" id="detail" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#myModalView" value="'.$row["ac_id"].'" onclick="showAllocate('.$row["ac_id"].')" form="myFormView"><i class="glyphicon glyphicon-file">&nbsp;</i>รายละเอียด</button> </td>
											<td><button type="submit" id="view" class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#myModalView" value="'.$row["ac_id"].'" onclick="showPic('.$row["ac_id"].')" form="myFormView"><i class="glyphicon glyphicon-picture">&nbsp;</i>รูปภาพ</button> </td>

										</tr>  
                               	';  
                          		}  
                          		?>  
                    		</table>  

							<div class="modal fade" tabindex="-1" role="dialog" id="myModalView">
                         		<div class="modal-dialog" role="document">
                            		<div class="modal-content">
                              			<div class="modal-header">
                                			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    		<h4 class="modal-title">รายละเอียด</h4>
                              			</div>
                              		<div class="modal-body">          
                                   		<table style="width:90%" align="center" id="txtHint"></table>       
                              		</div>  
                              		<div class="modal-footer">
                                    	<button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                              		</div>
                            	</div>
                        	</div>       
                		</div>  
           			</div> 
					</div>
					
				</div>
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

	<!--  read data  -->							  	
	<script>  
 		$(document).ready(function(){  
      		$('#allocate_data').DataTable();  
 		});  
 	</script>  

 	<script>
        $('#myFormView').on('submit', function(e){
            $('#myModalView').modal('show');
            e.preventDefault();
        });
    </script>
            
	<!-- /.script show Detail -->   
	<script>
        function showAllocate(str) {
        var xhttp;    
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getDetail.php?id="+str, true);
            xhttp.send();
        }
    </script>	


	<!-- /.script show View Pic -->   
	<script>
        function showPic(str) {
        var xhttp;    
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getPic.php?id="+str, true);
            xhttp.send();
        }
    </script>	
	

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


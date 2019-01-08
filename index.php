<?php  
 include ('fern/con_db.php');
 $query ="SELECT * FROM allocate INNER JOIN a_status
 ON a_status.status_id = allocate.ac_status
 ORDER BY ac_id ASC"; 
 $result = mysqli_query($connect, $query);  
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
	
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	
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

	</head>
	<body>
		
	<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index_member.php"><img src="images/logo.png" alt=""></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a href="index_member.php">Home</a></li>
								<li><a href="fern/map.php">Map</a></li>
								<li class="has-dropdown">
									<a href="#">Report</a>
									<ul class="dropdown">
										<li><a href="#">สถิติการใช้งาน</a></li>
										<li><a href="#">ยอดการจัดสรรประจำปี</a></li>
										<li><a href="#">ยอดครุภัณฑ์ประจำปี</a></li>
										<li><a href="#">รายงานการจัดสรรประจำเดือน</a></li>
									</ul>
								</li>
								<li><a href="#">About Me</a></li>
								<li><button type="button" class="btn btn-warning btn-md" onclick="window.location='fern/login.php'">
          										<span class="glyphicon glyphicon-log-out"></span> Log out
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
			   	<li style="background-image: url(images/img4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container">
			   			<div class="row">
				   			<div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						<p class="meta">
												<span class="cat"><a href="http://www.sut.ac.th/2012/news/detail/3/news20181215">Events</a></span>
												<span class="date">| 12 มกราคม 2562</span>
											</p>
					   					<h1 align="center">วันเด็กแห่งชาติ ประจำปี 2562 </h1>
										<h3 align="center">Children's Day </h3>
										<h4>ณ อาคารสุรพัฒน์ 2 มหาวิทยาลัยเทคโนโลยีสุรนารี</h4>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img8.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container">
			   			<div class="row">
				   			<div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						<p class="meta">
												<span class="cat"><a href="https://www.facebook.com/KasetSUT/">Events</a></span>
												<span class="date">| 12-20 มกราคม 2562</span>
											</p>
											<h1 align="center">SAF 2019</h1>
											<h3 align="center">เกษตรสุรนารี'62</h3>
											<h4 align="center">ณ มหาวิทยาลัยเทคโนโลยีสุรนารี</h4>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img9.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container">
			   			<div class="row">
				   			<div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						<p class="meta">
												<span class="cat"><a href="https://www.facebook.com/story.php?story_fbid=2169289539999620&id=2062108024051106">Events</a></span>
												<span class="date">| 14-16 มกราคม 2562</span>
												<span class="pos">By Sut-UKpsf</span>
											</p>
					   					<h1>SUT Teaching Academics Recognition Scheme (STARS)</h1>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>


	
		<div id="colorlib-container">
			<div class="container">
				<div class="row row-pb-md">
					<div class="container table table-striped table-bordered ">  
               			<h3 align="center">ระบบติดตามการใช้งานครุภัณฑ์ศูนย์คอมพิวเตอร์</h3>  
                		<br />  
                		<div class="table-responsive">  
                    		<table id="allocate_data" align="center" class="table table-striped table-bordered">  
                          		<thead>  
                               		<tr>  
							   				<td style="text-align: center;">ลำดับที่</td> 
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
							   				<td width="10%" style="text-align:center">'.$row["ac_id"].'</td>  
											<td style="text-align:left">'.$row["ac_barcode"].'</td>  
											<td style="text-align:center">'.$row["ac_title"].'</td>
							   				<td style="text-align:left">'.$row["ac_name"].'</td>  
							   				<td style="text-align:left">'.$row["ac_dname"].'</td>
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
            xhttp.open("GET", "fern/getDetail.php?id="+str, true);
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
            xhttp.open("GET", "fern/getPic.php?id="+str, true);
            xhttp.send();
        }
    </script>	
	

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


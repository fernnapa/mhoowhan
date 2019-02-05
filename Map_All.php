
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
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
   
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
            input[type="text"] {
                    height: 50px; 
                    }
         
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
							<div id="colorlib-logo"><a href="index.php"><img src="images/banner.png" style="width: 200px;"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="report.php">Report</a></li>
								<li class="active"><a href="Map_All.php">Map</a></li>
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
		


  		<!-----------------detail---------------------------->
		
          <div class="container">
				<div class="row row-pb-md">
					<div id="div-1" class="col-70">   

                    <?php 
                        include("db_connect.php");

                        $sqlListData = "SELECT * FROM `department`";
        
                        $rsListData = mysqli_query($conn, $sqlListData);

                        $check = 0;

                        if(isset($_GET['address']))
                        {
                          $check = 1;
                            $address = $_GET['address'];
                            $strSQL = "SELECT * FROM department"; 
                            $rs = mysqli_query($conn, $strSQL);
                            $infomation = $rs->fetch_assoc();       //เอาค่าไปแสดง description
                  
                            $objQuery = mysqli_query($conn, $strSQL);
                            ?>
                                  
                           <div align="center">
                        <form action="Map_ALL.php" method="post">
                            <h3 align ="center" style="font-family:Prompt;">หน่วยงานที่มีการจัดสรรครุภัณฑ์คอมพิวเตอร์</h3><br/>
                            <table align="center" border="0">
                            <tr>
                            <td>
                            <select name="address" class="form-control" style="width:100%">
                              <option selected value="all">ทั้งหมด</option>
                                <?php while($row = $rsListData->fetch_assoc()){ ?>
                
                                  <option value="<?php echo $row["dep_id"]; ?>"> <?php echo $row["dep_name"]; ?> </option>
                
                                <?php } ?>
                            </select>                         
                              </td>
                            <td><button class="btn btn-primary" type="submit" name="search" style="font-family:Prompt;">ค้นหา</button></td>
                            </tr>
                            </table> 
                        </form>
                
                      </div>
                      <br/>
                
                      <div id="map"></div> 
                     <br/>
                      <?php  }
                        if(isset($_POST["search"]) && $_POST["address"] != "all")
                        {   //ถ้ามีการ search และมีค่าที่ไม่ใช่ "ทั้งหมด" links ไป index_unique
                            $address = $_POST["address"];          
                            header('Location: map.php?address='.$address); 
                          } 
                    if($check == 0) {   //เมื่อเปิดหน้ามาครั้งเเรกยังไม่มีการเรียก search หรือ การรับค่า GET
                
                          $strSQL = "SELECT * FROM department"; ?>
                           <div align="center">
                        <form action="Map_All.php" method="post">
                            <h3 align ="center" style="font-family:Prompt;">หน่วยงานที่มีการจัดสรรครุภัณฑ์คอมพิวเตอร์</h3><br/>
                            <table align="center" border="0">
                            <tr>
                            <td>
                            <select name="address" class="form-control" style="width:100%">
                              <option selected value="all">ทั้งหมด</option>
                                <?php while($row = $rsListData->fetch_assoc()){ ?>
                
                                  <option value="<?php echo $row["dep_id"]; ?>"> <?php echo $row["dep_name"]; ?> </option>
                
                                <?php } ?>
                            </select>                         
                              </td>
                            <td><button class="btn btn-primary" type="submit" name="search" style="font-family:Prompt;">ค้นหา</button></td>
                            </tr>
                            </table> 
                        </form>
                
                      </div>
                      <br/>
                
                      <div id="map"></div> 
                     <br/>
                     <?php } ?> 
                    <!--  //จบลูป ที่เมื่อเปิดหน้ามาครั้งเเรกยังไม่มีการเรียก search หรือ การรับค่า GET -->


                 <?php
                
                          $rs = mysqli_query($conn, $strSQL);
                          $infomation = $rs->fetch_assoc();       //เอาค่าไปแสดง description
                
                          $objQuery = mysqli_query($conn, $strSQL);
                
                ?>
                
					
                 
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



    
<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 500px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
</style>


<script>
          function initMap() {
            // The location of 
            var sut = {lat: 14.8803505, lng: 102.0156959};
            // The map, centered at Uluru
            var maps = new google.maps.Map(
                document.getElementById('map'), {zoom: 15, center: sut});
            // The marker, positioned at Uluru
                
            var marker, info;
                    $.getJSON("jsondata.php", function(jsonObj){
                        $.each(jsonObj, function(i, item){

                            marker = new google.maps.Marker({
                                
                                position: new google.maps.LatLng(item.lat, item.lng),
                                map: maps,
                            });

                                info = new google.maps.InfoWindow();
                                google.maps.event.addListener(marker, 'click', (function(marker, i){
                                return function(){
                                    info.setContent(item.dep_name);
                                    info.open(maps,marker);
                                }
                                })(marker, i));
                            });
                        })
                    }


                


</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXkgT4Hw83wzhkNsSJ05qL_dMkzX8EsuE&callback=initMap"
    async defer></script>

    </div>
  </div>


  
	</body>
</html>


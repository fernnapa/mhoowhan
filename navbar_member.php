		
	<div class="colorlib-loader"></div>	
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
								<li><a href="#">Manage</a></li>
								<li><a href="#">Map</a></li>
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
								<li><button type="button" class="btn btn-warning btn-md" onclick="window.location='fern/logout.php'">
          							<span class="glyphicon glyphicon-log-out"></span> Log out</button>
								</li>
							</ul>
						</div>
					</div>
							<br/><h4>คุณ <?php echo $_SESSION["User"] ?></h4>
				</div>
			</div>
		</nav>
	
	<!-- table advance -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script> 
	


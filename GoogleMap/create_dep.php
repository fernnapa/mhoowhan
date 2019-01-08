<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
 

<title>MAP</title>
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  	<!-- Bootstrap core CSS -->
 	<link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css" crossorigin="anonymous">

	<script type="text/javascript" src="jquery-3.2.1.min.js" ></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXkgT4Hw83wzhkNsSJ05qL_dMkzX8EsuE&callback=initMap"
	type="text/javascript"></script>
	<script language="JavaScript">

	
function initMap() { 
	var myOptions = {
	  zoom: 17,
	  center: new google.maps.LatLng(14.8779385,102.0187503),
	};

	var map = new google.maps.Map(document.getElementById('map_canvas'),
		myOptions);

	/////marker อันแรก /////////////////
	var marker = new  google.maps.Marker({
		map:map,
		position: new google.maps.LatLng(14.8779385,102.0187503),
		draggalbe:true         ///marker จะลากได้

	});

	var infowindow = new google.maps.InfoWindow({
		map:map,
		content:"Hello",
		position: new google.maps.LatLng(14.8779385,102.0187503)

	});

	//////// ฟังก์ชันเวลาคลิกที่แผนที่จะแสดงค่าพิกัด////////////////
	google.maps.event.addListener(map,'click',function(event){
		infowindow.open(map,marker);
		infowindow.setContent("LatLng = " + event.latLng);
		infowindow.setPosition(event.latLng);
		marker.setPosition(event.latLng);

		$("#lat").val(event.latLng.lat());
		$("#lng").val(event.latLng.lng());

		
	});	

}


function saveLocation(){
var dep_no = $("#dep_no").val();
var location_name  = $("#location_name").val();
var lat  = $("#lat").val();
var lng  = $("#lng").val();

$.ajax({
method:"POST",
url:"insert_dep.php",
data:{ dep_no:dep_no,location_name:location_name,lat:lat,lng:lng   }
}).done(function(){
	swal( {
		    title: "เพิ่มข้อมูลสำเร็จ",
            icon: "success",
            button: "ตกลง",
            }).then (function(){ 
                     location.reload();
					 location.href = "../fern/index_Department.php"
                  	}
             )
});
}

</script>
</head>
<body>

  	

	<div class="row">

		<div class="col-8">
		<div id="map_canvas" style="width:100%;height:600px"></div>
		</div>

		<div class="col-3">
		<div style="margin-top:60px">
		<br/><br/>
				<form>
						<h2 align="center">เพิ่มข้อมูลหน่วยงาน</h2><br/>
						<div class="form-group">
						  <label for="location_name">รหัสหน่วยงาน</label>
						  <input type="text" class="form-control" id="dep_no" placeholder="ระบุรหัสหน่วยงาน">
						</div>
						<div class="form-group">
						  <label for="location_name">Location Name</label>
						  <input type="text" class="form-control" id="location_name" placeholder="ระบุชื่อสถานที่">
						</div>
						<div class="form-group">
								<label for="lat">Lat</label>
								<input type="text" class="form-control" id="lat" placeholder="ระบุละติจูด">
						</div>
						<div class="form-group">
							<label for="Lng">Lng</label>
							<input type="text" class="form-control" id="lng" placeholder="ระบุลองจิจูด">
						</div>
						<div align="center">
							<button type="button" onclick="saveLocation()" class="btn btn-success">บันทึกข้อมูล</button>
							<button type="reset" class="btn btn-danger" data-dismiss="modal" id="myReset">ยกเลิก</button>
						</div>  
					</form>

		</div>
		</div>

	</div>

	</body>
	</html>
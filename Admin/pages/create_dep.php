<?php  
session_start();
include("../../db_connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
  <style type="text/css">
body { 
    height:100%;
    margin:0;padding:0;
    font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
    font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
    width:100%;
    height:400px;
    margin:auto;
/*  margin-top:100px;*/
}
</style>
  <title>เพิ่มข้อมูลหน่วยงาน</title>
  
  <?php include("link.php"); ?>

  <?php include("navbar.php"); ?>



    <script type="text/javascript" src="bootstrap-4/js/jquery-3.2.1.min.js" ></script>
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
url:"../../GoogleMap/insert_dep.php",
data:{ dep_no:dep_no,location_name:location_name,lat:lat,lng:lng   }
}).done(function(){
	swal( {
		    title: "เพิ่มข้อมูลสำเร็จ",
            icon: "success",
            button: "ตกลง",
            }).then (function(){ 
                     location.reload();
					 location.href = "index_department.php"
                  	}
             )
});
}

</script>






</head>
<body >

<h3 align="center" style="font-family:Prompt;"><b>เพิ่มข้อมูลหน่วยงาน</b></h3><hr/>

<div class="row">

		<div class="col-8">
			<div id="map_canvas" style="width:100%;height:600px"></div>
		</div>

		<div class="col-3"><br/>
		<div style="margin-top:20px">
				<form>
						<div class="form-group" style="font-family:Prompt;">
						  <label for="location_name">รหัสหน่วยงาน</label>
						  <input type="text" class="form-control" id="dep_no" style="font-family:Prompt;" placeholder="ระบุรหัสหน่วยงาน" required>
						</div>
						<div class="form-group" style="font-family:Prompt;">
						  <label for="location_name">ชื่อหน่วยงาน</label>
						  <input type="text" class="form-control" id="location_name" style="font-family:Prompt;" placeholder="ระบุชื่อสถานที่" required>
						</div>
						<div class="form-group" style="font-family:Prompt;">
								<label for="lat">ละติจูด</label>
								<input type="text" class="form-control" id="lat" style="font-family:Prompt;" placeholder="ระบุละติจูด" required>
						</div>
						<div class="form-group" style="font-family:Prompt;">
							<label for="Lng">ลองจิจูด</label>
							<input type="text" class="form-control" id="lng" style="font-family:Prompt;" placeholder="ระบุลองจิจูด" required>
						</div>
						<div align="center" style="font-family:Prompt;">
							<button type="button" onclick="saveLocation()" class="btn btn-success" style="font-family:Prompt;">บันทึกข้อมูล</button>
							<button type="reset" class="btn btn-danger" data-dismiss="modal" id="myReset" style="font-family:Prompt;">ยกเลิก</button>
						</div>  
					</form>
		</div>
		</div>
	</div>

            





</div>
</div>
</div>

    <?php include ("footer.php"); ?>
</body>
</html>
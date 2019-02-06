<?php  
session_start();
include("../../db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>เพิ่มข้อมูลหน่วยงาน</title>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
  <?php include("link.php"); ?>

  <style>
body{
                font-family: 'Kanit', sans-serif;
            }
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
    width:100%;
    height:400px;
    margin:auto;
/*  margin-top:100px;*/
}
</style>
  
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
		position: new google.maps.LatLng(14.878789578874512,102.01873730805005),
		draggalbe:true         ///marker จะลากได้

	});

	var infowindow = new google.maps.InfoWindow({
		map:map,
		content:"เลือกตำเเหน่งของหน่วยงานที่ต้องการ",
		position: new google.maps.LatLng(14.878789578874512,102.01873730805005)

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


// function saveLocation(){
// var dep_no = $("#dep_no").val();
// var location_name  = $("#location_name").val();
// var lat  = $("#lat").val();
// var lng  = $("#lng").val();

// $.ajax({
// method:"POST",
// url:"../../GoogleMap/insert_dep.php",
// data:{ dep_no:dep_no,location_name:location_name,lat:lat,lng:lng   }
// }).done(function(){
// 	swal( {
// 		    title: "เพิ่มข้อมูลสำเร็จ",
//             icon: "success",
//             button: "ตกลง",
//             }).then (function(){ 
//                      location.reload();
// 					 location.href = "index_department.php"
//                   	}
//              )
// });
// }

// </script>






</head>
<body >
<div class="card">
      <div class="card-body">
		<table border="0" align="center" style="width:100%;" class="w3-teal ">
                    <tr>
                    <td style="text-align:center"><p><h3 style="font-family:Prompt;"><b>เพิ่มข้อมูลหน่วยงาน</b></h3></a></button></td>
                    </tr>
    	</table>
		<br>
		<div class="row">

		<div class="col-8">
			<div id="map_canvas" style="width:100%;height:600px"></div>
		</div>

		<div class="col-3"><br/>
		<div style="margin-top:20px">
				<form id="Add_dep">
						<div class="form-group" style="font-family:Prompt;">
						  <label for="location_name">รหัสหน่วยงาน</label>
						  <input type="text" class="form-control" id="dep_no" name="dep_no" style="font-family:Prompt;" placeholder="ระบุรหัสหน่วยงาน" required>
						</div>
						<div class="form-group" style="font-family:Prompt;">
						  <label for="location_name">ชื่อหน่วยงาน</label>
						  <input type="text" class="form-control" id="location_name" name="location_name" style="font-family:Prompt;" placeholder="ระบุชื่อสถานที่" required>
						</div>
						<div class="form-group" style="font-family:Prompt;">
								<label for="lat">ละติจูด</label>
								<input type="text" class="form-control" id="lat" name="lat" style="font-family:Prompt;" placeholder="ระบุละติจูด" required>
						</div>
						<div class="form-group" style="font-family:Prompt;">
							<label for="Lng">ลองจิจูด</label>
							<input type="text" class="form-control" id="lng" name="lng" style="font-family:Prompt;" placeholder="ระบุลองจิจูด" required>
						</div>
						<div align="center" style="font-family:Prompt;">
							<button type="submit"  class="btn btn-success" style="font-family:Prompt;" form="Add_dep" value="submit" name="Dep_create" id="submit" >บันทึกข้อมูล</button>
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

	</div>
</div>

<script>          
        $(document).ready(function(){  
            $('#Dep_create').on("click", function(){  
                $('#Add_dep').submit();  
            });  
            $('#Add_dep').on('submit', function(e){  
                e.preventDefault();  
                $.ajax({  
                    url :"insert_dep.php",  
                    method:"POST",  
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,  
                    success:function(data){
                        var a = data;
                            if(data == 1){
                                swal( {
                                    title: "เพิ่มข้อมูลสำเร็จ",
                                    icon: "success",
                                    button: "ตกลง",
                                }).then (function(){ 
                                    location.reload();
                                });
                            }if(data == 2){
                                swal( {
                                    title: "เพิ่มข้อมูลไม่สำเร็จ",
                                    text: "รูปนี้ถูกใช้ในระบบเเล้ว",
                                    icon: "error",
                                    button: "กรอกข้อมูลอีกครั้ง",
                                });
                            }if (data == 3){
                                swal( {
                                    title: "เพิ่มข้อมูลไม่สำเร็จ",
                                    text: "รหัสหน่วยงานนี้ ถูกใช้ในระบบเเล้ว",
                                    icon: "error",
                                    button: "ตกลง",
                                });
                            }if(data == 4){
                                swal( {
                                    title: "เพิ่มข้อมูลไม่สำเร็จ",
                                    text: "Serialนี้ ถูกใช้ในระบบเเล้ว",
                                    icon: "error",
                                    button: "ตกลง",
                                });
                            }if (data == 5){
                                swal( {
                                    title: "เพิ่มข้อมูลไม่สำเร็จ",
                                    text: "กรุณากรอกข้อมูลให้ครบถ้วน",
                                    icon: "error",
                                    button: "ตกลง",
                                });
                            }if (data == 6){
                                swal( {
                                    title: "เพิ่มข้อมูลไม่สำเร็จ",
                                    text: "เกิดข้อผิดพลาดเกี่ยวกับฐานข้อมูล",
                                    icon: "error",
                                    button: "ตกลง",
                                });
                            }if (data == 7){
                                swal( {
                                    title: "เพิ่มข้อมูลไม่สำเร็จ",
                                    text: "กรุณานำไฟล์ที่เป็นนามสกุล.jpg",
                                    icon: "error",
                                    button: "ตกลง",
                                });
                            }     
                    }  
                })  
            });  
        });     
    </script> 




</body>
</html>
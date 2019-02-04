<!doctype html>
<html lang="en">
  <head>
    <title>Google Map API 3</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<script src="https://use.fontawesome.com/9209785d2d.js"></script>
	
<style type="text/css">
/* css สำหรับ div คลุม google map อีกที */
#contain_map{
    position:relative;
    height:400px;
    margin:auto;    
} 
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
    height:400px;
    margin:auto;
/*  margin-top:100px;*/
}
/*css กำหนดรูปแบบ ของ input สำหรับพิมพ์ค้นหา effect */
.controls_tools {
    border: 1px solid transparent;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    height: 32px;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}
/*css กำหนดรูปแบบ ของ input สำหรับพิมพ์ค้นหา*/
#pac-input {
    background-color: #fff;
    padding: 0 11px 0 13px;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    text-overflow: ellipsis;
}
/*css กำหนดรูปแบบ ของ input สำหรับพิมพ์ค้นหา ขณะ focus*/
#pac-input:focus {
    border-color: #4d90fe;
    margin-left: -1px;
    padding-left: 14px;  /* Regular padding-left + 1. */     
}
</style>

  </head>
  <body>
  <div class="container">
   <!-- <h1><a href="index.php">Google Map API 3</a></h1>-->
	
	<div class="row mb-5">
		<div id="contain_map"  class="col">
		<input id="pac-input" class="controls_tools form-control" type="text"placeholder="Enter a location">  
	 	<div id="map_canvas"></div>
		</div>
	</div>
	<div class="alert alert-warning" role="alert" id="alert" style="display:none;"></div>
	 <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">
	<dl class="row" id="row-desc">
	  <dt class="col-sm-3">Description</dt>
	  <dd class="col-sm-9"  id="place_value"><em>แสดงรายละเอียดของแผนที่</em></dd>
	 </dl>
 
	<div class="row mt-3">

		<div class="col-sm-3 col-12">
			<div class="input-group">
			  <div class="input-group-addon">Latitude</div>
				  <input class="form-control"  name="lat_value" type="text" id="lat_value" value="0">
			</div>
		</div>	

		<div class="col-sm-3 col-12">
			<div class="input-group">
			  <div class="input-group-addon">Longitude</div>
				  <input class="form-control" name="lon_value" type="text" id="lon_value" value="0">
			</div>
		</div>	

		<div class="col-sm-3 col-12">
			<div class="input-group">
			  <div class="input-group-addon">Zoom</div>
				  <input class="form-control"  name="zoom_value" type="text" id="zoom_value" value="0" size="5">
		  </div>
		</div>	

	</div>
	
	<div class="row mt-3">
	<div class="col">
	 <input type="submit" class="btn btn-primary" name="button" id="button" value="บันทึก" />  
	</div>	
	</div>
	
  </form>  

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
function detectBrowser() {
  var useragent = navigator.userAgent;
  var mapdiv = document.getElementById("map_canvas");

  if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
//    mapdiv.style.width = '100%';
//    mapdiv.style.height = '100%';
  } else {
/*    mapdiv.style.width = '600px';
    mapdiv.style.height = '800px';
*/  }
}


var geocoder; // กำหนดตัวแปรสำหรับ เก็บ Geocoder Object ใช้แปลงชื่อสถานที่เป็นพิกัด
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var my_Marker; // กำหนดตัวแปรสำหรับเก็บตัว marker
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
var inputSearch; // กำหนดตัวแปร สำหรับ อ้างอิง input สำหรับพิมพ์ค้นหา
var autocomplete; // กำหนดตัวแปร สำหรับเก็บค่า การใช้งาน places Autocomplete
var infowindow;// กำหนดตัวแปร สำหรับใช้แสดง popup สถานที่ ที่ค้นหาเจอ
function initialize() { // ฟังก์ชันแสดงแผนที่
	detectBrowser();
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
    geocoder = new GGM.Geocoder(); // เก็บตัวแปร google.maps.Geocoder Object
	

//&nbsp;&nbsp;&nbsp;&nbsp;// เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี&nbsp;&nbsp;&nbsp; 
//&nbsp;&nbsp;&nbsp;&nbsp;
if(navigator.geolocation){  
				// หาตำแหน่งปัจจุบันโดยใช้ getCurrentPosition เรียกตำแหน่งครั้งแรกครั้งเดียวเมื่อเปิดมาหน้าแผนที่
				navigator.geolocation.getCurrentPosition(showPosition, showError);    
	
				function showPosition(position){    
					var myPosition_lat=position.coords.latitude; // เก็บค่าตำแหน่ง latitude  ปัจจุบัน  
					var myPosition_lon=position.coords.longitude;  // เก็บค่าตำแหน่ง  longitude ปัจจุบัน           

					$("#lat_value").val(myPosition_lat);  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
					$("#lon_value").val(myPosition_lon);  // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
				}		 

				function showError(error) {
					$('#alert').show();
					switch(error.code) {
						case error.PERMISSION_DENIED:
							$('#alert').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> User denied the request for Geolocation.');
							break;
						case error.POSITION_UNAVAILABLE:
							$('#alert').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Location information is unavailable.');
							break;
						case error.TIMEOUT:
							$('#alert').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> The request to get user location timed out.');
							break;
						case error.UNKNOWN_ERROR:
							$('#alert').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> An unknown error occurred.');
							break;
					}
				}
			   
	}else{
		 // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง    
		 $('#alert').show();
		 $('#alert').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> บราวเซอร์ ไม่สนับสนุน การระบุตำแหน่ง คลิกลากที่หมุดเพื่อหาตำแหน่งจุดที่ต้องการ!');
	}
	
	if($("#lat_value").val()>0&&$("#lon_value").val()>0){
		// กำหนดจุดเริ่มต้นของแผนที่
		var my_Latlng  = new GGM.LatLng($("#lat_value").val(),$("#lon_value").val());
	}else{
		// กำหนดจุดเริ่มต้นของแผนที่
		var my_Latlng  = new GGM.LatLng(14.8803505, 102.0156959); //lat,lon ของ AppliCAD
	}
	
	var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
	// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
	var my_DivObj=$("#map_canvas")[0];
	// กำหนด Option ของแผนที่
	var myOptions = {
		zoom: 22, // กำหนดขนาดการ zoom
		center: my_Latlng , // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
		mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
	};
	map = new GGM.Map(my_DivObj,myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
	 
	my_Marker = new GGM.Marker({ // สร้างตัว marker ไว้ในตัวแปร my_Marker
		position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
		map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
		draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
		title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
	});
 
        var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
        map.panTo(my_Point); // ให้แผนที่แสดงไปที่ตัว marker        

	// เรียกขอข้อมูลสถานที่จาก Google Map
	geocoder.geocode({'latLng': my_Point}, function(results, status) {
	  if (status == GGM.GeocoderStatus.OK) {
		if (results[1]) {
			// แสดงข้อมูลสถานที่ใน textarea ที่มี id เท่ากับ place_value
		  $("#place_value").html(results[1].formatted_address); // 
		}
	  } else {
		  // กรณีไม่มีข้อมูล
		//alert("Geocoder failed due to: " + status);
	  }
	}); 
					
	$("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
	$("#lon_value").val(my_Point.lng());  // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
	$("#zoom_value").val(map.getZoom());  // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu          
   
	inputSearch = $("#pac-input")[0]; // เก็บตัวแปร dom object โดยใช้ jQuery
    // จัดตำแหน่ง input สำหรับการค้นหา ด้วย คำสั่งของ google map
    //map.controls[GGM.ControlPosition.TOP_LEFT].push(inputSearch);
	
    // เรียกใช้งาน Autocomplete โดยส่งค่าจากข้อมูล input ชื่อ inputSearch
    autocomplete = new GGM.places.Autocomplete(inputSearch);
    autocomplete.bindTo('bounds', map); 
     
    infowindow = new GGM.InfoWindow();// เก็บ InfoWindow object ไว้ในตัวแปร infowindow
    // เก็บ Marker object พร้อมกำหนดรูปแบบ ไว้ในตัวแปร my_Marker
	

    // เมื่อแผนที่มีการเปลี่ยนสถานที่ จากการค้นหา
    GGM.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();// เปิด ข้อมูลตัวปักหมุด (infowindow)
        my_Marker.setVisible(false);// ซ่อนตัวปักหมุด (marker) 
        var place = autocomplete.getPlace();// เก็บค่าสถานที่จากการใช้งาน autocomplete ไว้ในตัวแปร place
        if (!place.geometry) {// ถ้าไม่มีข้อมูลสถานที่ 
			 my_Marker.setVisible(true);// แสดงตัวปักหมุด จากการซ่อนในการทำงานก่อนหน้า
			 searchPlace($("#pac-input").val())  // ฟังก์ฃันค้นหาสถานที่
            return;
        }
         
        // ถ้ามีข้อมูลสถานที่  และรูปแบบการแสดง  ให้แสดงในแผนที่
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else { // ให้แสดงแบบกำหนดเอง
            map.setCenter(place.geometry.location);
            map.setZoom(13);  // แผนที่ขยายที่ขนาด 13 ถือว่าเหมาะสม
        }
		/** // กำหนดรูปแบบของ icons การแสดงสถานที่ */
        /*my_Marker.setIcon(({
            url: place.icon,
            size: new GGM.Size(71, 71),
            origin: new GGM.Point(0, 0),
            anchor: new GGM.Point(17, 34),
            scaledSize: new GGM.Size(35, 35)
        }))*/;
         
        // ปักหมุด (marker) ตำแหน่ง สถานที่ที่เลือก
        my_Marker.setPosition(place.geometry.location);
        my_Marker.setVisible(true);// แสดงตัวปักหมุด จากการซ่อนในการทำงานก่อนหน้า
		var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
         
        // สรัางตัวแปร สำหรับเก็บชื่อสถานที่ จากการรวม ค่าจาก array ข้อมูล
        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

		// แสดงข้อมูลสถานที่ใน textarea ที่มี id เท่ากับ place_value
	  $("#place_value").html(address); // 

        $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
        $("#lon_value").val(my_Point.lng());  // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
        $("#zoom_value").val(map.getZoom());  // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu          
         
        // แสดงข้อมูลในตัวปักหมุด (infowindow)
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address+"<br /><a href='https://maps.google.com/?saddr=Current+Location&daddr="+my_Point.lat()+","+my_Point.lng()+"' target='_blank'>คลิกเพื่อดูใน Google Maps</a>");
        infowindow.open(map, my_Marker);// แสดงตัวปักหมุด (infowindow)
         
    });
		
    // กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร   
    GGM.event.addListener(my_Marker, 'dragend', function() {
        var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
        map.panTo(my_Point); // ให้แผนที่แสดงไปที่ตัว marker        

        // เรียกขอข้อมูลสถานที่จาก Google Map
        geocoder.geocode({'latLng': my_Point}, function(results, status) {
          if (status == GGM.GeocoderStatus.OK) {
            if (results[1]) {
                // แสดงข้อมูลสถานที่ใน textarea ที่มี id เท่ากับ place_value
              $("#place_value").html(results[1].formatted_address); // 
            }
          } else {
              // กรณีไม่มีข้อมูล
            alert("Geocoder failed due to: " + status);
          }
        }); 		
		
        $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
        $("#lon_value").val(my_Point.lng());  // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
        $("#zoom_value").val(map.getZoom());  // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu          
    });     
 
    // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
    GGM.event.addListener(map, 'zoom_changed', function() {
        $("#zoom_value").val(map.getZoom());   // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value    
    });
	     
	GGM.event.addListener(my_Marker, "click", function(){ // เมื่อคลิกตัว marker แต่ละตัว  
		 var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
		infowindow.setContent(my_Marker.title+"<br /><a href='https://maps.google.com/?saddr=Current+Location&daddr="+my_Point.lat()+","+my_Point.lng()+"' target='_blank'>คลิกเพื่อดูใน Google Maps</a>");
		infowindow.open(map, my_Marker);
	}); 
 
}

function searchPlace(textsearch){
	var AddressSearch = textsearch;
        if(geocoder){ // ตรวจสอบว่าถ้ามี Geocoder Object 
            geocoder.geocode({
                 address: AddressSearch // ให้ส่งชื่อสถานที่ไปค้นหา
            },function(results, status){ // ส่งกลับการค้นหาเป็นผลลัพธ์ และสถานะ
                if(status == GGM.GeocoderStatus.OK) { // ตรวจสอบสถานะ ถ้าหากเจอ
                    var my_Point=results[0].geometry.location; // เอาผลลัพธ์ของพิกัด มาเก็บไว้ที่ตัวแปร
                    map.setCenter(my_Point); // กำหนดจุดกลางของแผนที่ไปที่ พิกัดผลลัพธ์
					
                    my_Marker.setMap(map); // กำหนดตัว marker ให้ใช้กับแผนที่ชื่อ map                   
                    my_Marker.setPosition(my_Point); // กำหนดตำแหน่งของตัว marker เท่ากับ พิกัดผลลัพธ์
					
					// เรียกขอข้อมูลสถานที่จาก Google Map
					geocoder.geocode({'latLng': my_Point}, function(results, status) {
					  if (status == GGM.GeocoderStatus.OK) {
						if (results[1]) {
							// แสดงข้อมูลสถานที่ใน textarea ที่มี id เท่ากับ place_value
						  $("#place_value").html(results[1].formatted_address); // 
						}
					  } else {
						  // กรณีไม่มีข้อมูล
						alert("Geocoder failed due to: " + status);
					  }
					}); 						
					
                    $("#lat_value").val(my_Point.lat());  // เอาค่า latitude พิกัดผลลัพธ์ แสดงใน textbox id=lat_value
                    $("#lon_value").val(my_Point.lng());  // เอาค่า longitude พิกัดผลลัพธ์ แสดงใน textbox id=lon_value 
                    $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu                               
                }else{
                    // ค้นหาไม่พบแสดงข้อความแจ้ง
                    alert("Geocode was not successful for the following reason: " + status);
                 }
            });
        } 
}

$(function(){
    // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
    // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
    // v=3.2&sensor=false&language=th&callback=initialize
    //  v เวอร์ชัน่ 3.2
    //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
    //  language ภาษา th ,en เป็นต้น
    //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize  
    $("<script/>", {
      "type": "text/javascript",
      src: "https://maps.googleapis.com/maps/api/js?key=AIzaSyA3c2Rg3iypKRyHBoey-7mhgMb7BVjHKbI&callback=initialize&libraries=places"
    }).appendTo("body");    
});
</script>  
  </body>
</html>
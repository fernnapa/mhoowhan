<?php  
session_start();
include("../../Home/db_connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>เพิ่มข้อมูลหน่วยงาน</title>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
  
  <style type="text/css">
  html { height: 100% }
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

  <?php include("link.php"); ?>


</head>
  <?php include("navbar.php"); ?>
<body>
<h4 align="center" style="font-family:Prompt;"><b>เพิ่มข้อมูลหน่วยงาน</b></h4><br/>
<div id="map_canvas"></div>
<br/>

 <div id="showDD" style="margin:auto;padding-top:5px;width:550px;">  
  <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">  
    
    <div class="form-group" style="font-family:Prompt;">
    <label for="location_name">รหัสหน่วยงาน</label>
    <input type="text" class="form-control" name = "dep_no" id="dep_no" style="font-family:Prompt;" placeholder="ระบุรหัสหน่วยงาน" required>
    </div> 

    <div class="form-group" style="font-family:Prompt;">					
    <label for="location_name">ชื่อหน่วยงาน</label>
	<input type="text" class="form-control" name = "location_name" id="location_name" style="font-family:Prompt;" placeholder="ระบุชื่อสถานที่" required>
    </div> 

    <div class="form-group" style="font-family:Prompt;">
    <label for="lat">ละติจูด</label>
    <input type="text" class="form-control" name="lat_value" id="lat_value" value="0" style="font-family:Prompt;" placeholder="ระบุละติจูด" required>
    </div> 

    <div class="form-group" style="font-family:Prompt;">
    <label for="Lng">ลองจิจูด</label>
    <input type="text" class="form-control" name = "lon_value" id="lon_value" style="font-family:Prompt;" placeholder="ระบุลองจิจูด" required>
    </div> 

    <div align="center" style="font-family:Prompt;">
		<button type="button" onclick="saveLocation()" class="btn btn-success" style="font-family:Prompt;">บันทึกข้อมูล</button>
		<button type="reset" class="btn btn-danger" data-dismiss="modal" id="myReset" style="font-family:Prompt;">ยกเลิก</button>
	</div>  		
  </form>  
</div> 


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<script type="text/javascript">
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
function initialize() { // ฟังก์ชันแสดงแผนที่
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
    // กำหนดจุดเริ่มต้นของแผนที่
    var my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);
    var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
    var my_DivObj=$("#map_canvas")[0]; 
    // กำหนด Option ของแผนที่
    var myOptions = {
        zoom: 17, // กำหนดขนาดการ zoom
        center: my_Latlng , // กำหนดจุดกึ่งกลาง
        mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
    };
    map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
 
 
 
    // เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี
    if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position){
                var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
                var infowindow = new GGM.InfoWindow({
                    map: map,
                    position: pos,
                    content: 'คุณอยู่ที่นี่.'
                });
                 
                var my_Point = infowindow.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
                map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker       
                $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
                $("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
                map.setCenter(pos);
            },function() {
                // คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน
            });
    }else{
         // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง
    }
   
    // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
    GGM.event.addListener(map, 'zoom_changed', function() {
        $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value  
    });
 
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
      src: "//maps.google.com/maps/api/js?key=AIzaSyCXkgT4Hw83wzhkNsSJ05qL_dMkzX8EsuE&sensor=false&language=th&callback=initialize"
    }).appendTo("body");    
});
</script> 

<script>
function saveLocation() {
        var dep_no = escape(document.getElementById('dep_no').value);
        var location_name = escape(document.getElementById('location_name').value);
        var lat_value = document.getElementById('lat_value').value;
        var lat_value = document.getElementById('lon_value').value;
        var url = 'phpsqlinfo_addrow.php?name=' + dep_no + '&location_name=' + location_name +
                  '&type=' + type + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

        downloadUrl(url, function(data, responseCode) {

          if (responseCode == 200 && data.length <= 1) {
            infowindow.close();
            messagewindow.open(map, marker);
          }
        });
      }
</script>

    <?php include ("footer.php"); ?>
</body>
</html>
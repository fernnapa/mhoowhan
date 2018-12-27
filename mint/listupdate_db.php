<meta charset="UTF-8">
<!--font-->
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

<style>
body {
        font-family: 'Kanit', sans-serif;
}
h1 {
        font-family: 'Kanit', sans-serif;
}
</style>
<?php
//1. เชื่อมต่อ database: 
include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	$com_no = $_REQUEST["com_no"];
	$bar_id = $_REQUEST["bar_id"];
	$com_list = $_REQUEST["com_list"];
	$com_sn = $_REQUEST["com_sn"];
	$refer = $_REQUEST["refer"];	
                                        $TOR = $_REQUEST["TOR"];
                                        $Status_com =$_REQUEST["Status_com"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE db_com SET  
	bar_id='$bar_id' ,
	com_list='$com_list' , 
	com_sn='$com_sn' ,
	refer='$refer' ,
	TOR='$TOR' ,
                                        Status_com ='$Status_com' 
	WHERE com_no='$com_no' ";		

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('บันทึกการจัดสรรเรียบร้อย');";
	echo "window.location = 'Showlist.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('บันทึกการจัดสรรไม่สำเร็จ');";
	echo "</script>";
}
?>
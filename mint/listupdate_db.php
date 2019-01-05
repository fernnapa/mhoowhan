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
	$barcode_id = $_REQUEST["barcode_id"];
                                        $Status_com =$_REQUEST["Status"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
                  $sql = "UPDATE db_com SET  

                  Status_com ='$Status_com' 
                  WHERE barcode_id ='$barcode_id' ";		
	
                  $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

	
	$bar_id = $_REQUEST["barcode_id"];
	$com_list = $_REQUEST["list_com"];
	$SN = $_REQUEST["SN"];
	$com_refer = $_REQUEST["refer"];
	$TOR = $_REQUEST["TOR"];
	$Status_com= $_REQUEST["Status"];
	$ins_no = $_REQUEST["ins_no"];
	$ins = $_REQUEST["ins"];
	$prefix = $_REQUEST["prefix"];
	$emp_name = $_REQUEST["emp_name"];
	$position = $_REQUEST["position"];
	$emp_id = $_REQUEST["emp_id"];
	$category = $_REQUEST["category"];
	$emp_no = $_REQUEST["emp_no"];

                  $sql2 ="INSERT INTO `com_eq`(`bar_id`, `com_list`, `com_SN`, `com_refer`, `com_TOR`, `com_status`, `ins_no`, `ins_name`, `prefix`, `emp_name`, `emp_posi`, `emp_no`, `category`, `allocate_no`) 
                  VALUES ('$bar_id','$com_list','$SN','$com_refer','$TOR','$Status_com','$ins_no','$ins','$prefix','$emp_name','$position',
                  '$emp_id','$category','$emp_no')";
                
                  $query = mysqli_query($con, $sql2) or die (mysqli_error($con)); 


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
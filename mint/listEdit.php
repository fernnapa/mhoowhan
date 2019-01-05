

<?php
//1. เชื่อมต่อ database: 
include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	
                                        $barcode_id = $_REQUEST["barcode_id"];
	$list_com = $_REQUEST["list_com"];
	$SN = $_REQUEST["SN"];
	$refer = $_REQUEST["refer"];
	$TOR = $_REQUEST["TOR"];
	$Status_com= $_REQUEST["Status"];
	$ins_no = $_REQUEST["ins_no"];
	$ins_name = $_REQUEST["ins"];
	$prefix = $_REQUEST["prefix"];
	$emp_name = $_REQUEST["emp_name"];
	$position = $_REQUEST["position"];
	$emp_id = $_REQUEST["emp_no"];
	$category = $_REQUEST["category"];
	$emp_no = $_REQUEST["emp_no"];
	// echo $barcode_id;
	// echo $list_com;
	// echo $SN;
	// echo $refer;
	// echo $TOR;
	// echo $Status_com;
	// echo $ins_no;
	// echo $ins_name;
	// echo $prefix;
	// echo $emp_name;
	// echo $position;
	// echo $emp_id;
	// echo $category;
	// echo $emp_no;

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
                  $sql = "UPDATE com_eq LEFT JOIN db_com ON db_com.barcode_id = com_eq.bar_id SET  
	bar_id ='$barcode_id',
	ins_no = '$ins_no',
	ins_name = '$ins_name',
	prefix = '$prefix',
	emp_name = '$emp_name',
	emp_posi = '$position',
	emp_no = '$emp_id',
	category = '$category',
	allocate_no = '$emp_no'
                  WHERE bar_id ='$barcode_id' ";		
	
                 $result = mysqli_query($con, $sql) or die (mysqli_error($con)); 



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
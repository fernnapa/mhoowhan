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
	$eq_barcode = $_REQUEST["barcode"];
                                        $eq_status =$_REQUEST["status"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
                  	$sql = "UPDATE equipment 
	LEFT JOIN tor ON equipment.eq_tor = tor.tor_id
                  	LEFT JOIN type_eq ON tor.tor_type = type_eq.type_id
	LEFT JOIN contract ON tor.tor_contract = contract.con_id
                  	LEFT JOIN a_status ON equipment.eq_status = a_status.status_id 
	SET  
                  	eq_status ='$eq_status' 
                  	WHERE eq_barcode ='$eq_barcode' ";		
	
                  	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

	
	// $bar_id = $_REQUEST["barcode_id"];
	// $com_list = $_REQUEST["list_com"];
	// $SN = $_REQUEST["SN"];
	// $com_refer = $_REQUEST["refer"];
	// $TOR = $_REQUEST["TOR"];
	// $Status_com= $_REQUEST["Status"];
	// $ins_no = $_REQUEST["ins_no"];
	// $ins = $_REQUEST["ins"];
	// $prefix = $_REQUEST["prefix"];
	// $emp_name = $_REQUEST["emp_name"];
	// $position = $_REQUEST["position"];
	// $emp_id = $_REQUEST["emp_id"];
	// $category = $_REQUEST["category"];
	// $emp_no = $_REQUEST["emp_no"];

	$bar_id= $_REQUEST["barcode"];
     	$title= $_REQUEST["titletor"];
     	$sn= $_REQUEST["serial"];
	$status_com= $_REQUEST["status"];
	$dname= $_REQUEST["dname"];
     	$dep= $_REQUEST["dep_no"];
     	$tname = $_REQUEST["tname"];
     	$name = $_REQUEST["name"];
     	$position = $_REQUEST["position"];
     	$empid = $_REQUEST["empid"];
     	$typeR = $_REQUEST["typeR"];
	$refer = $_REQUEST["refer"];
	$contract = $_REQUEST["con"]; 
     	$note = $_REQUEST["note"];
	$allocate_id = $_REQUEST["allo_no"];
	     
                  $sql3 ="INSERT INTO `allocate`(`ac_barcode`, `ac_title`, `ac_dep`, `ac_dname`,`ac_contract`, `ac_tname`, `ac_name`, `ac_position`, `ac_empid`, `ac_typeR`, `ac_serial`, `ac_refer`, `ac_note`, `ac_emp`, `ac_status`)
                                            VALUES ('$bar_id','$title','$dep','$dname','$contract','$tname','$name','$position','$empid','$typeR','$sn','$refer','$note','$allocate_id','$status_com')";


//                   $sql2 ="INSERT INTO `com_eq`(`bar_id`, `com_list`, `com_SN`, `com_refer`, `com_TOR`, `com_status`, `ins_no`, `ins_name`, `prefix`, `emp_name`, `emp_posi`, `emp_no`, `category`, `allocate_no`) 
//                   VALUES ('$bar_id','$com_list','$SN','$com_refer','$TOR','$Status_com','$ins_no','$ins','$prefix','$emp_name','$position',
//                   '$emp_id','$category','$emp_no')";
                
                  $query = mysqli_query($con, $sql3) or die (mysqli_error($con)); 


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
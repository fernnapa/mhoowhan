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
session_start();

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
	
                  	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

	
	

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
	     
//                   $sql3 ="INSERT  INTO `allocate`(`ac_barcode`, `ac_title`, `ac_dep`, `ac_dname`,`ac_contract`, `ac_tname`, `ac_name`, `ac_position`, `ac_empid`, `ac_typeR`, `ac_serial`, `ac_refer`, `ac_note`, `ac_emp`, `ac_status`)
// 	    VALUES ('$bar_id','$title','$dep','$dname','$contract','$tname','$name','$position','$empid','$typeR','$sn','$refer','$note','$allocate_id','$status_com')";
	
	$sql2 ="UPDATE allocate SET
	 ac_barcode='$bar_id',
	 ac_title='$title',
	 ac_dep='$dep',
	 ac_dname='$dname',
	 ac_contract='$contract',
	 ac_tname='$tname',
	 ac_name='$name',
	 ac_position='$position',
	 ac_empid='$empid',
	 ac_typeR='$typeR',
	 ac_serial='$sn',
	 ac_refer='$refer',
	 ac_note='$note',
	 ac_emp='$allocate_id',
	 ac_status='$status_com' 
	 WHERE ac_barcode = '$bar_id'";

               
                  $query = mysqli_query($conn, $sql2) or die (mysqli_error($conn)); 


                  mysqli_close($conn); //ปิดการเชื่อมต่อ database 

                  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('บันทึกการจัดสรรเรียบร้อย');";
	echo "window.location = 'Showlistallo.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('บันทึกการจัดสรรไม่สำเร็จ');";
	echo "</script>";
	}

?>
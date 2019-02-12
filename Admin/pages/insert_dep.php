<?php  
include("../../db_connect.php");

if($_POST['dep_no'] != ""  && $_POST['location_name'] != "" && $_POST['lat'] != "" && $_POST['lng'] != "" )
{
    $dep_no = $_POST["dep_no"];
    $loca = $_POST["location_name"];
    $lat = $_POST["lat"];
    $lng = $_POST["lng"];

    // echo $dep_no;
    // echo $loca;
    // echo $lat;
    // echo $lng;
    // return;

    $check = "SELECT * FROM `department` WHERE `dep_no` = '$dep_no'";   //เช็คค่าที่รับมาว่ารหัสหน่วยงานตรงกับใน db ไหม
    $result = mysqli_query($conn, $check);
    $num_rows = mysqli_num_rows($result);   //เข้าไปนับใน result ว่ามีกี่แถว
    if($num_rows>0)  //ถ้ามีรหัสหน่วยงานตรงกับใน db ที่นับได้มากกว่า 0 แถว
    {   
          $data = 3;   //รหัสหน่วยงานนี้ ถูกใช้ในระบบเเล้ว 
          echo $data;
          return;
    }

    $sql = "INSERT INTO `department`(`dep_no`, `dep_name`, `lat`, `lng`) 
    VALUES ('$dep_no','$loca','$lat','$lng')";
    if(mysqli_query($conn, $sql)){   
        $data = 1;   //เพิ่มข้อมูลสำเร็จ
        echo $data;
    }else{
        $data = 6;  //เพิ่มข้อมูลไม่สำเร็จ ผิดพลาดเกี่ยวกับ db
        echo $data;
        return;
    }

}else{
    $data = 5;  //เพิ่มไม่สำเร็จ กรอกไม่ครบ
    echo $data;
    return;
}
?>
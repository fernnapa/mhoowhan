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

    $check = "SELECT * FROM `department` WHERE `dep_no` = '$dep_no'";
    $result = mysqli_query($conn, $check);
    $num_rows = mysqli_num_rows($result);
    if($num_rows>0)
    {   
          $data = 3;
          echo $data;
          return;
    }

    $sql = "INSERT INTO `department`(`dep_no`, `dep_name`, `lat`, `lng`) 
    VALUES ('$dep_no','$loca','$lat','$lng')";
    if(mysqli_query($conn, $sql)){   
        $data = 1; 
        echo $data;
    }else{
        $data = 6;
        echo $data;
        return;
        }



}else
{
    $data = 5;
    echo $data;
    return;
}


?>
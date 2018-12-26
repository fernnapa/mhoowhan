<?php
include_once 'db_connect.php';

if($_POST['dep_name'] != "" && $_POST['dep_latitude'] != "" && $_POST['dep_longtitude'] != ""){
    $dep_id = mysqli_escape_string($conn, $_POST['dep_id']); 
    $dep_name = mysqli_escape_string($conn, $_POST['dep_name']); 
    $dep_latitude = mysqli_escape_string($conn, $_POST['dep_latitude']); 
    $dep_longtitude = mysqli_escape_string($conn, $_POST['dep_longtitude']); 


    $sql = "UPDATE `department` SET `dep_name`='$dep_name',`latitude`='$dep_latitude',`longtitude`='$dep_longtitude' WHERE `dep_id` = $dep_id";

    
        if(mysqli_query($conn, $sql)){
          $data = 1; 
          echo $data;
        }else{
          $data = "0";
          echo $data;
        }
  }else{
          $data = "0";
          echo $data;
  }

?>


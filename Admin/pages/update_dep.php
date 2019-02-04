<?php
include("../../db_connect.php");

if($_POST['dep_no'] != "" && $_POST['dep_name'] != "" ){
    $dep_id = mysqli_escape_string($conn, $_POST['dep_id']);
    $dep_no = mysqli_escape_string($conn, $_POST['dep_no']); 
    $dep_name = mysqli_escape_string($conn, $_POST['dep_name']); 
   


    $sql = "UPDATE `department` SET `dep_no`='$dep_no',`dep_name`='$dep_name' WHERE `dep_id` = $dep_id";

    
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


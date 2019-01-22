<?php
require_once 'db_connect.php';

    if(isset($_POST['id'])){
    $id =  $_POST['id'];        

            $sql = "SELECT * FROM permit_detail WHERE per_id = $id";
            $result1 = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($result1))
            {
               $eq_id = $data['pmd_eq_id']; 
               $status = 3;
                $equpdate = "UPDATE `equipment` SET `eq_status`='$status' WHERE `eq_id` = $eq_id";
                mysqli_query($conn, $equpdate);
                $stn = "SELECT * FROM `a_status` WHERE `status_id` = $status";
                $result2 = mysqli_query($conn, $stn);
                while($data = mysqli_fetch_array($result2))
            {
                $sttn = $data['status_name'];
            }
                $equpdate = "UPDATE `permit_detail` SET `pmd_status_name`='$sttn' WHERE `pmd_eq_id` = $eq_id";
                mysqli_query($conn, $equpdate);
            }
            $status_permit = 3;
            $permitUD = "UPDATE `permit` SET `pm_status`='$status_permit' WHERE `pm_id` = $id";
            if(mysqli_query($conn, $permitUD))
            {
                $data = 1;
                echo $data;
            }else{
                $data = 2;
                echo $data;
                return;
            }
    }
?>
<?php
require_once 'db_connect.php';

    if(isset($_POST['id'])){
    $id =  $_POST['id'];        

            $sql = "SELECT * FROM allocate_detail WHERE ac_id = $id";
            $result1 = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($result1))
            {
               $eq_id = $data['ald_eq_id']; 
               $status = 2;
                $equpdate = "UPDATE `equipment` SET `eq_status`='$status' WHERE `eq_id` = $eq_id";
                mysqli_query($conn, $equpdate);
                $stn = "SELECT * FROM `a_status` WHERE `status_id` = $status";
                $result2 = mysqli_query($conn, $stn);
                while($data = mysqli_fetch_array($result2))
            {
                $sttn = $data['status_name'];
            }
                $equpdate = "UPDATE `allocate_detail` SET `ald_status_name`='$sttn' WHERE `ald_eq_id` = $eq_id";
                mysqli_query($conn, $equpdate);
            }
            $status_allocate = 2;
            $allocateUD = "UPDATE `allocate` SET `ac_status`='$status_allocate' WHERE `ac_id` = $id";
            if(mysqli_query($conn, $allocateUD))
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
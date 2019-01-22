<?php
require_once 'db_connect.php';

    if(isset($_POST['id'])){
    $id =  $_POST['id'];        
    

            $sql = "SELECT * FROM allocate_detail WHERE ac_id = $id";
            $result = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($result))
            {
               $eq_id = $data['ald_eq_id']; 
               $status = 1;
                $equpdate = "UPDATE `equipment` SET `eq_status`='$status' WHERE `eq_id` = $eq_id";
                mysqli_query($conn, $equpdate);
               
                $eqDel = "DELETE FROM `allocate_detail` WHERE `ald_id` = $id";
                mysqli_query($conn, $eqDel);
            }
            $permitDel = "DELETE FROM `allocate` WHERE `ac_id` = $id";
            if(mysqli_query($conn, $permitDel))
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
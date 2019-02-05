<?php 
include("../db_connect.php");

    if(isset($_POST['eqid'])){


        $ideq = $_POST['eqid'];
        $st = 1;
        $edit =  "UPDATE `equipment` SET `eq_status`= $st WHERE `eq_id` = $ideq"; 
        if(mysqli_query($conn, $edit)){
        
          }else{
            $data = 2;
            echo $data;
            return;
          }

        $del = "DELETE FROM `permit_detail` WHERE `pmd_eq_id` = $ideq";
        if(mysqli_query($conn, $del)){
            $data = 1; 
            echo $data;
          }else{
            $data = 2;
            echo $data;
            return;

          }
       
    }
?>
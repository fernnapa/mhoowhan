<?php

include("../../db_connect.php");
  
  if(isset($_POST['x'])){     
    $con_id = mysqli_escape_string($conn, $_POST['x']);
  
    // echo $con_id;
    // return;
    
        $sql6 = "SELECT * FROM `equipment` 
        LEFT JOIN tor
        ON equipment.eq_tor = tor.tor_id
        LEFT JOIN contract
        ON tor.tor_contract = contract.con_id 
        LEFT JOIN type_eq
        ON tor.tor_type = type_eq.type_id WHERE con_id = $con_id";
          $result6 = mysqli_query($conn, $sql6);
           while($data6 = mysqli_fetch_array($result6))
            {
              $eq_barcode = $data6['eq_barcode']; 
              $eq_serial = $data6['eq_serial']; 
              $type_name = $data6['type_name']; 
              $con_name = $data6['con_name']; 
              $stn = "หมดอายุสัญญา";

              $sql7 = "INSERT INTO `backup_contract`( `buc_barcode`, `buc_serial`, `buc_type_name`, `buc_con_name`, `buc_status`) 
              VALUES ('$eq_barcode','$eq_serial','$type_name','$con_name','$stn')";
                  mysqli_query($conn, $sql7);
            }
            
       
        $sql ="SELECT * FROM `contract` WHERE `con_id` = $con_id";
        $result = mysqli_query($conn, $sql);
        while($data = mysqli_fetch_array($result))
        {
           $con_name = $data['con_name']; 
        }
        $data = "";
        $sql2 = "SELECT * FROM `permit_detail` WHERE `pmd_con_name`= '$con_name'";
        $result2 = mysqli_query($conn, $sql2);
        while($data2 = mysqli_fetch_array($result2))
        {
          $perid = "";
           $eqid = $data2['pmd_eq_id'];
           $perid = $data2['per_id'];
           $data = $data2['per_id'];
           $sql3 = "DELETE FROM `permit_detail` WHERE `pmd_eq_id` = '$eqid'";
           mysqli_query($conn, $sql3);
        }

        $pid = $data;
        $sql4 = "SELECT * FROM `permit` WHERE `pm_id` = '$pid'";
        $result4 = mysqli_query($conn, $sql4);
        while($data3 = mysqli_fetch_array($result4))
        {
           $pmid = $data3['pm_id']; 
           $sql5 = "DELETE FROM `permit` WHERE `pm_id` = '$pmid'";
           mysqli_query($conn, $sql5);
        }



        $data = "";
        $sql9 = "SELECT * FROM `allocate_detail` WHERE `ald_con_name`= '$con_name'";
        $result9 = mysqli_query($conn, $sql9);
        while($data9 = mysqli_fetch_array($result9))
        {
          $perid = "";
           $eqid = $data9['ald_eq_id'];
           $perid = $data9['ac_id'];
           $data = $data9['ac_id'];
           $sql8 = "DELETE FROM `allocate_detail` WHERE `ald_eq_id` = $eqid";
           mysqli_query($conn, $sql8);
        }

        $pid8 = $data;
        $sql7 = "SELECT * FROM `allocate` WHERE `ac_id` = '$pid8'";
        $result7 = mysqli_query($conn, $sql7);
        while($data7 = mysqli_fetch_array($result7))
        {
           $pmid = $data7['ac_id']; 
           $x = "DELETE FROM `allocate` WHERE `ac_id` = '$pmid'";
           mysqli_query($conn, $x);
        }
       
        $sql2 = "DELETE from contract WHERE con_id = $con_id";
            if(mysqli_query($conn, $sql2)){
              $data = 1;
              echo $data;
            }else{
              $data = 0;
              echo $data;
            }
          }
?>
<?php
include ("db_connect.php");
        if(isset($_POST["Import"])){

              echo $filename=$_FILES["file"]["tmp_name"];
              $check_repeat = 0;

                  if($_FILES["file"]["size"] > 0)
      {

         $file = fopen($filename, "r");
         while (($Data = fgetcsv($file, 100000, ",")) !== FALSE)
      {
			 
         $result_check = mysqli_query($conn, "SELECT * FROM equipment WHERE eq_barcode='" . $Data[0] . "'");
         if(mysqli_num_rows($result_check) > 0){
               $check_repeat = 1;
         }else{
            $t = $Data[1];
            $c = $Data[12];
            
            $id = "SELECT tor_id FROM tor 
            LEFT JOIN type_eq ON type_eq.type_id = tor.tor_type
            LEFT JOIN contract ON contract.con_id = tor.tor_contract
            WHERE type_name = '$t' AND con_name = '$c'";
            $rs = $conn->query($id);
            while($row = mysqli_fetch_assoc($rs)){
               $s = $row["tor_id"];
               
            }
            $st = $Data[13];
            $sts = "SELECT * FROM `a_status` 
            WHERE status_name = '$st'"; 
            $status = $conn->query($sts);
            while($row = mysqli_fetch_assoc($status)){
               $stt = $row["status_id"];

             

            } 
            $bar = $Data[0];
            $sn = $Data[9];

            $date = $_REQUEST["date"];
            $empno = $_REQUEST["empno"];
            $no = "SELECT * FROM `employee` WHERE emp_id = $empno"; 
            $emp = $conn->query($no);
            while($row = mysqli_fetch_assoc($emp)){
               $empn = $row["emp_no"];

            }
            $result = mysqli_query($conn, "INSERT INTO `equipment`(`eq_barcode`, `eq_tor`, `eq_serial`,`eq_status`) 
                                                           values('$bar','$s','$sn', '$stt')" ) or die ('Error');



               if($stt == 2){
                  
                  $dep = $Data[2];
                  $dp = "SELECT * FROM `department` 
                  WHERE dep_no = '$dep'"; 
                  $depno = $conn->query($dp);
                  while($row = mysqli_fetch_assoc($depno)){
                     $dpid = $row["dep_id"];
                  }


            $result2 = mysqli_query($conn, "INSERT INTO `allocate`(`ac_title`, `ac_dep`, `ac_tname`, `ac_name`, `ac_position`, `ac_empid`, `ac_typeR`, `ac_emp`, `ac_date`, `ac_status`) 
                                                            VALUES ('$Data[5]','$dpid','$Data[4]','$Data[5]','$Data[6]','$Data[7]','$Data[8]','$empn','$date','$stt')") or die ('Error'); 
              
               
                  $allo = "SELECT * FROM `allocate` ORDER BY ac_id DESC LIMIT 1";
                  $al_id = $conn->query($allo);
                  while($row = mysqli_fetch_assoc($al_id)){
                     $alloid = $row["ac_id"];
                  }
                  
                  $barcode = $Data[0];
                  $serial = $Data[9];
                  $eq = "SELECT * FROM `equipment` 
                  LEFT JOIN tor ON equipment.eq_tor = tor.tor_id
                  LEFT JOIN a_status ON equipment.eq_status = a_status.status_id
                  LEFT JOIN contract ON tor.tor_contract = contract.con_id
                  LEFT JOIN type_eq ON tor.tor_type = type_eq.type_id
                  WHERE eq_barcode = '$barcode' AND eq_serial = '$serial'";
                  $eq_id = $conn->query($eq);
                  while($row = mysqli_fetch_assoc($eq_id)){
                     $eqid = $row["eq_id"];
                     $con_name = $row["con_name"];
                     $type_name = $row["type_name"];
                     $status_name = $row["status_name"];


                     $ald  = mysqli_query($conn,"INSERT INTO `allocate_detail`(`ald_eq_id`, `ald_eq_barcode`, `ald_eq_serial`, `ald_con_name`, `ald_type_name`, `ald_status_name`, `ac_id`) 
                                                      VALUES ('$eqid','$barcode','$serial','$con_name','$type_name','$status_name','$alloid')")  or die ('Error'); 
                  
               }
            }
                  if(!$result && !$result2){
                        echo "<script type=\"text/javascript\">
                        alert(\"Invalid File:Please Upload CSV File.\");
                        window.location = \"index_com_unallocate.php\"
                        </script>";
                  }
        }

     }
                           fclose($file);
                     if($check_repeat == 0){
                  //throws a message if data successfully imported to mysql database from excel file
                        echo "<script type=\"text/javascript\">
                     alert(\"ไฟล์ข้อมูล CSV ได้ทำการเพิ่มเรียบร้อย\");
                     window.location = \"index_com_unallocate.php\"
                     </script>"; 	
                     }else{

                                 //กรณีมีข้อมูลซ้ำ
                                    echo "<script type=\"text/javascript\">
                                    alert(\"ไฟล์ข้อมูล CSV ได้ทำการเพิ่มเรียบร้อยและมีบางรายการที่ซ้ำ\");
                                    window.location = \"index_com_unallocate.php\"
                                    </script>"; 	
                     }
                        
                              mysqli_close($conn); 
                        }
                     }	 
                  ?>
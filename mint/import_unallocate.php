<?php
include ("connection.php");
        if(isset($_POST["Import"])){

              echo $filename=$_FILES["file"]["tmp_name"];
              $check_repeat = 0;

                  if($_FILES["file"]["size"] > 0)
      {

         $file = fopen($filename, "r");
         while (($Data = fgetcsv($file, 100000, ",")) !== FALSE)
      {
			 
          $result_check = mysqli_query($con, "SELECT * FROM equipment WHERE eq_barcode='" . $Data[0] . "'");
         if(mysqli_num_rows($result_check) > 0){
               $check_repeat = 1;
         }else{
            $t = $Data[1];
            $c = $Data[12];
            
            $id = "SELECT tor_id FROM tor 
            LEFT JOIN type_eq ON type_eq.type_id = tor.tor_type
            LEFT JOIN contract ON contract.con_id = tor.tor_contract
            WHERE type_name = '$t' AND con_name = '$c'";
            $rs = $con->query($id);
            while($row = mysqli_fetch_assoc($rs)){
               $s = $row["tor_id"];
               
            }
            $st = $Data[13];
            $sts = "SELECT * FROM `a_status` WHERE status_id = $st"; 
            $status = $con->query($sts);
            while($row = mysqli_fetch_assoc($status)){
               $stt = $row["status_id"];

             

            } 
            $bar = $Data[0];
            $sn = $Data[9];
            $result = mysqli_query($con, "INSERT INTO `equipment`(`eq_barcode`, `eq_tor`, `eq_serial`,`eq_status`) 
                                                           values('$bar','$s','$sn', '$stt')" ) or die ('Error');

               $result2 = mysqli_query($con, "INSERT INTO `allocate`(`ac_barcode`, `ac_title`, `ac_dep`, `ac_dname`, `ac_tname`, `ac_name`, `ac_position`, `ac_empid`, `ac_typeR`, `ac_serial`, `ac_refer`, `ac_status`) 
                                                            values ('$bar','$s','$Data[2]','$Data[3]','$Data[4]','$Data[5]','$Data[6]','$Data[7]','$Data[8]','$sn','$Data[10]','$st')") or die ('Error');                                       
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
  		
            mysqli_close($con); 
        }
     }	 
?>
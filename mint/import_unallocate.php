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
			 
          $result_check = mysqli_query($con, "SELECT * FROM db_com WHERE barcode_id='" . $Data[0] . "'");
         if(mysqli_num_rows($result_check) > 0){
               $check_repeat = 1;
         }else{
               $result2 = mysqli_query($con, "INSERT INTO `db_com`(`barcode_id`, `list_com`, `SN`,`Status_com`) 
                                                          VALUES ('$Data[0]','$Data[1]','$Data[9]','$Data[3]')" ) or die ('Error');
               
         if(! $result2){
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
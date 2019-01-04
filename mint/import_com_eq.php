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
			 
          $result_check = mysqli_query($conn, "SELECT * FROM com_eq WHERE bar_id='" . $Data[0] . "'");
         if(mysqli_num_rows($result_check) > 0){
               $check_repeat = 1;
         }else{
               $result = mysqli_query($conn, "INSERT INTO `com_eq`(`bar_id`, `com_list`, `com_SN`, `com_refer`, `ins_no`, `ins_name`, `prefix`, `emp_name`, `emp_posi`, `emp_no`, `category`) 
                                                           values('$Data[0]','$Data[1]','$Data[9]','$Data[10]','$Data[2]','$Data[3]','$Data[4]','$Data[5]','$Data[6]','$Data[7]','$Data[8]')" ) or die ('Error');
         if(! $result){
               echo "<script type=\"text/javascript\">
               alert(\"Invalid File:Please Upload CSV File.\");
               window.location = \"index_import.php\"
               </script>";
           }
        }

     }
         fclose($file);
               if($check_repeat == 0){
//throws a message if data successfully imported to mysql database from excel file
    	echo "<script type=\"text/javascript\">
	alert(\"ไฟล์ข้อมูล CSV ได้ทำการเพิ่มเรียบร้อย\");
	window.location = \"index_import.php\"
	</script>"; 	
	 }else{

 //กรณีมีข้อมูลซ้ำ
	echo "<script type=\"text/javascript\">
	alert(\"ไฟล์ข้อมูล CSV ได้ทำการเพิ่มเรียบร้อยและมีบางรายการที่ซ้ำ\");
	window.location = \"index_import.php\"
	</script>"; 	
               }
  		
            mysqli_close($conn); 
        }
     }	 
?>
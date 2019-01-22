<?php  
 require_once 'db_connect.php';
            
                $status = 10;
                $id = $_POST['pm_id'];
                $head_DC = $_POST['pm_head_DC'];
             
                $sql = "UPDATE `permit` SET `pm_status`= '$status', `pm_head_dc`= '$head_DC' WHERE `pm_id` = $id";
                if(mysqli_query($conn, $sql))
                          {
                                $data = 1; 
                                echo $data;
                          }else{
                                $data = 6;
                                echo $data;
         }                
   
 ?>  

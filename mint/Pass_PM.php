<?php  
 require_once 'db_connect.php';
            
                $status = 6;
                $id = $_POST['pm_id'];
                $head = $_POST['pm_head'];

            
        
                $sql = "UPDATE `permit` SET `pm_status`= '$status', `pm_head`= '$head'  WHERE `pm_id` = $id";
                if(mysqli_query($conn, $sql))
                          {
                                $data = 1; 
                                echo $data;
                          }else{
                                $data = 6;
                                echo $data;
         }                
   
 ?>  



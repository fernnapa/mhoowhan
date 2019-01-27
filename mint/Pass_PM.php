<?php  
 require_once 'db_connect.php';
            
                $status = 6;
                $id = $_POST['pm_id'];
                $head = $_POST['pm_head'];
                $heposi = $_POST['pm_hd_position'];

            
        
                $sql = "UPDATE `permit` SET `pm_status`= '$status', 
                                            `pm_head`= '$head',
                                            `pm_hd_position`= '$heposi'
                                                      WHERE `pm_id` = $id";
                if(mysqli_query($conn, $sql))
                          {
                                $data = 1; 
                                echo $data;
                          }else{
                                $data = 6;
                                echo $data;
         }                
   
 ?>  



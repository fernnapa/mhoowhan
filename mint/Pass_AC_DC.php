<?php  
 require_once 'db_connect.php';
            
                $status = 10;
                $id = $_POST['ac_id'];
                $achead = $_POST['ac_head_DC'];
               
        
                $sql = "UPDATE `allocate` SET `ac_status`= '$status', 
                                              `ac_head_dc`= '$achead' 
                                               WHERE `ac_id` = $id";
                if(mysqli_query($conn, $sql))
                          {
                                $data = 1; 
                                echo $data;
                          }else{
                                $data = 6;
                                echo $data;
         }                
   
 ?>  
 

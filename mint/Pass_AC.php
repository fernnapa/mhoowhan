<?php  
 require_once 'db_connect.php';
            
                $status = 6;
                $id = $_POST['ac_id'];
                $achead = $_POST['ac_head'];
        
                $sql = "UPDATE `allocate` SET `ac_status`= '$status', `ac_head`= '$achead' WHERE `ac_id` = $id";
                if(mysqli_query($conn, $sql))
                          {
                                $data = 1; 
                                echo $data;
                          }else{
                                $data = 6;
                                echo $data;
         }                
   
 ?>  



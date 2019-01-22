<?php  
 require_once 'db_connect.php';
 


               if($_POST['ac_note'] != "" ){
                $status = 8;
                $note = $_POST['ac_note'];
                $id = $_POST['id_ac'];
                $achead = $_POST['ac_head'];

                $sql = "UPDATE `allocate` SET `ac_status`= '$status',
                                              `ac_note`= '$note',
                                              `ac_head`= '$achead' WHERE `ac_id` = $id";
                if(mysqli_query($conn, $sql))
                          {
                                $data = 1; 
                                echo $data;
                          }else{
                                $data = 6;
                                echo $data;
         }
                  }else{
                          $data = 2;
                          echo $data;
                          return;
                        }
         
      
                        
   
 ?>  



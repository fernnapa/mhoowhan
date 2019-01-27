<?php  
 require_once 'db_connect.php';
 


               if($_POST['ac_note'] != "" ){
                $status = 11;
                $note = $_POST['ac_note'];
                $id = $_POST['id_ac'];
                $achead = $_POST['ac_head_dc'];
                $acdcposi = $_POST['ac_dc_position'];
               
               

                $sql = "UPDATE `allocate` SET `ac_status`= '$status',
                                              `ac_note`= '$note',
                                              `ac_head_dc`= '$achead',
                                              `ac_dc_position`= '$acdcposi'
                                              WHERE `ac_id` = $id";

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



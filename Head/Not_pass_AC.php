<?php  
include("../db_connect.php");
 


               if($_POST['ac_note'] != "" ){
                $status = 8;
                $note = $_POST['ac_note'];
                $id = $_POST['id_ac'];
                $achead = $_POST['ac_head'];
                $acheposi = $_POST['ac_hd_position'];
                


                $sql = "UPDATE `allocate` SET `ac_status`= '$status',
                                              `ac_note`= '$note',
                                              `ac_head`= '$achead', 
                                              `ac_hd_position`= '$acheposi' 
                                              WHERE `ac_id` = $id";

                                          //     echo $sql;
                                          //     return;
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



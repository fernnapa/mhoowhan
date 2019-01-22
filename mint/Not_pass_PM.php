<?php  
 require_once 'db_connect.php';
 


               if($_POST['pm_note'] != "" ){
                $status = 8;
                $note = $_POST['pm_note'];
                $id = $_POST['id_pm'];
                $head = $_POST['pm_head'];


                $sql = "UPDATE `permit` SET `pm_status`= '$status',`pm_note`= '$note', `pm_head`= '$head' WHERE `pm_id` = $id";
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



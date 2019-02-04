<?php  
include("../../db_connect.php");          

               if($_POST['con_name'] != "" )
            
               {  
                    $id = $_POST['con_id'];
                     $name = $_POST['con_name'];
                     $des = $_POST['con_des'];
                     $exp = $_POST['con_exp'];

                $sql = "UPDATE `contract` SET `con_name`='$name', `con_des`='$des', `con_exp`='$exp' WHERE `con_id` = $id";                   
                                    if(mysqli_query($conn, $sql)){
                                                  $data = 1; 
                                                  echo $data;
                                            
                                    }else{
                                                  $data = 0;
                                                  echo $data;
                                         }
                          
                }else{
                          $data = 0;
                          echo $data;
                        }
         
      

   
 ?>  



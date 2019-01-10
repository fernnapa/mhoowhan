<?php  
 require_once 'db_connect.php';
          

               if($_POST['type_name'] != "" )
            
               {  
                    $id = $_POST['type_id'];
                     $name = $_POST['type_name'];

                     $result = "SELECT * FROM type_eq WHERE type_name = '$name' AND NOT type_id = '$id'";
                     $result = mysqli_query($conn, $result);
                       $num_rows = mysqli_num_rows($result);        
                       if($num_rows>0){
                              $data = 2;
                               echo $data;
                       }else{
                  
                $sql = "UPDATE `type_eq` SET `type_name`='$name' WHERE `type_id` = $id";                   
                                    if(mysqli_query($conn, $sql)){
                                                  $data = 1; 
                                                  echo $data;
                                            
                                    }else{
                                                  $data = 0;
                                                  echo $data;
                                         }
                                        }                          
                }else{
                          $data = 0;
                          echo $data;
                        }
         
      

   
 ?>  


